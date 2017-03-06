<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
#
# This file is part of Dotclear 2.
#
# Copyright (c) 2003-2012 Olivier Meunier and Association Dotclear
# Licensed under the GPL version 2.0 license.
# See LICENSE file or
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
#
# -- END LICENSE BLOCK ------------------------------------

error_reporting(E_ALL & ~E_NOTICE);

if (function_exists('date_default_timezone_set')) {
	date_default_timezone_set('UTC');
} elseif (!ini_get('safe_mode') && function_exists('putenv')) {
	putenv('TZ=UTC');
}

define('DC_LOADER_VERSION','0.9');
define('DC_LOADER_SERVICE','https://download.dotclear.org/loader/static/');
define('DC_LOADER_ARCHIVE','https://download.dotclear.org/latest.zip');
define('DC_LOADER_LANG', getLanguage());
//~ define('DC_LOADER_LANG', 'FR');

$can_write = is_writable(dirname(__FILE__));
$can_fetch = false;
if ((boolean)ini_get('allow_url_fopen')) {
	$can_fetch = true;
}
if (function_exists('curl_init')) {
	$can_fetch = true;
	define('DC_LOADER_CURL',true);
}

$step = !empty($_REQUEST['step']) ? (integer)$_REQUEST['step'] : 1;
$got_php5 = (!version_compare(phpversion(),'5.2','<'));
if (!$got_php5 && $step != 2) {
	$step = 1;
}

function __($str)
{
	If ($GLOBALS['__l10n'][$str]<>'') {
		return $GLOBALS['__l10n'][$str];
	} else {
		return $str;
	}
}

function fetchRemote($src,&$dest,$step=0) # Rudimentary HTTP client
{
	if ($step > 3) {
		return false;
	}

	$src = parse_url($src);
	$host = $src['host'];
	$path = $src['path'];
	$port = $src['scheme'] == 'https' ? 443 : 80;
	$scheme = $src['scheme'] == 'https' ? 'ssl://' : '';

	if (($s = @fsockopen($scheme.$host,$port,$errno,$errstr,5)) === false) {
		return false;
	}

	fwrite($s,
		'GET '.$path." HTTP/1.0\r\n"
		.'Host: '.$host."\r\n"
		."User-Agent: Dotclear Net Install\r\n"
		."Accept: text/xml,application/xml,application/xhtml+xml,text/html,text/plain,image/png,image/jpeg,image/gif,*/*\r\n"
		."\r\n"
	);

	$i = 0;
	$in_content = false;
	while (!feof($s))
	{
		$line = fgets($s,4096);

		if (rtrim($line,"\r\n") == '' && !$in_content) {
			$in_content = true;
			$i++;
			continue;
		}

		if ($i == 0) {
			if (!preg_match('/HTTP\/(\\d\\.\\d)\\s*(\\d+)\\s*(.*)/',rtrim($line,"\r\n"), $m)) {
				fclose($s);
				return false;
			}
			$status = (integer) $m[2];
			if ($status < 200 || $status >= 400) {
				fclose($s);
				return false;
			}
		}

		if (!$in_content)
		{
			if (preg_match('/Location:\s+?(.+)$/',rtrim($line,"\r\n"),$m)) {
				fclose($s);
				return fetchRemote(trim($m[1]),$dest,$step+1);
			}
			$i++;
			continue;
		}

		if (is_resource($dest)) {
			fwrite($dest,$line);
		} else {
			$dest .= $line;
		}

		$i++;
	}

	fclose($s);
	return true;
}

function getLanguage($default = 'en')
{
	if (!empty($_REQUEST['lang'])) {
		return $_REQUEST['lang'];
	}
	if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
		$languages = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
		$l = explode(';',$languages[0]);
		$dlang = substr(trim($l[0]),0,2);
		return strtolower($dlang);
	}
	return $default;
}

function getLocation()
{
	$server_name = explode(':',$_SERVER['HTTP_HOST']);
	$server_name = $server_name[0];
	if ($_SERVER['SERVER_PORT'] == '443')
	{
		$scheme = 'https';
		$port = '';
	}
	elseif (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')
	{
		$scheme = 'https';
		$port = ($_SERVER['SERVER_PORT'] != '443') ? ':'.$_SERVER['SERVER_PORT'] : '';
	}
	else
	{
		$scheme = 'http';
		$port = ($_SERVER['SERVER_PORT'] != '80') ? ':'.$_SERVER['SERVER_PORT'] : '';
	}

	$loc = preg_replace('#(\\\|/)$#','',dirname($_SERVER['SCRIPT_NAME']));

	return $scheme.'://'.$server_name.$port.$loc.'/';
}

function openPage()
{
	header('Content-Type: text/html; charset=UTF-8');
	echo
	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" '.
	' "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'."\n".
	'<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="'.DC_LOADER_LANG.'" lang="'.DC_LOADER_LANG.'">'."\n".
	"<head>\n".
	'  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />'."\n".
	'  <title>'.__('Dotclear 2 NetInstall').'</title>'."\n".
	'  <meta name="ROBOTS" content="NOARCHIVE,NOINDEX,NOFOLLOW" />'."\n".
	'  <link rel="stylesheet" type="text/css" media="screen" href="'.DC_LOADER_SERVICE.'install.css" />'."\n".
	'</head>'."\n".
	'<body  id="dotclear-admin" class="install">'."\n".
	'<div id="content">'."\n".
	'<h1>'.__('Dotclear NetInstall').'</h1>'."\n".
	'<div id="main">'."\n";
}

function closePage()
{
	echo
	'</div>'."\n".
	'</div>'."\n".
	'</body>'."\n".
	'</html>';
}

function initPHP5()
{
	$htaccess = dirname(__FILE__).'/.htaccess';
	if (file_exists($htaccess)) {
		if (!is_readable($htaccess) || !is_writable($htaccess)) {
			return false;
		}
	}
	$rawdatas = '';
	if (!fetchRemote(DC_LOADER_SERVICE.'hosting.txt',$rawdatas)) {
		return false;
	}
	$rawdatas = explode("\n",$rawdatas);
	if (!($my_hostname = @gethostbyaddr($_SERVER['SERVER_ADDR']))) {
		return false;
	}
	$found = false;
	foreach ($rawdatas as $line) {
		list($name,$hostname,$rule) = explode('|',trim($line));
		if (preg_match('!'.preg_quote($hostname).'$!',$my_hostname)) {
			$found = $rule;
			break;
		}
	}
	if ($found) {
		if (false !== ($fh = @fopen($htaccess,"ab"))) {
			fwrite($fh,"\n".$found);
			fclose($fh);
			return true;
		}
	}
	return false;
}

function cleanFiles()
{
	@unlink(dirname(__FILE__).'/dcl_files.php');
	@unlink(dirname(__FILE__).'/dcl_unzip.php');
	@unlink(dirname(__FILE__).'/dotclear-install.zip');
}

function grabFiles()
{
	$failed = true;
	$lib_files = @fopen(dirname(__FILE__).'/dcl_files.php','wb');
	$lib_unzip = @fopen(dirname(__FILE__).'/dcl_unzip.php','wb');
	$dc_zip    = @fopen(dirname(__FILE__).'/dotclear-install.zip','wb');

	if (!$lib_files || !$lib_unzip || !$dc_zip  ) {
		return false;
	}

	if (fetchRemote(DC_LOADER_SERVICE.'lib.files.php',$lib_files)) {
		if (fetchRemote(DC_LOADER_SERVICE.'class.unzip.php',$lib_unzip)) {
			if (fetchRemote(DC_LOADER_ARCHIVE,$dc_zip)) {
				$failed = false;
			}
		}
	}

	fclose($lib_files);
	fclose($lib_unzip);
	fclose($dc_zip);

	if ($failed) {
		cleanFiles();
		return false;
	}
	return true;
}

function writeMessage($level,$title,$lines)
{
	if (empty($lines)) {
		return;
	}

	echo
	'<div class="msg1">'.
	'<h2>'.$title.'</h2>';
	$level = ' class='.$level;
	foreach ($lines as $line) {
		echo '<p'.$level.'>'.$line.'</p>';
		$level = '';
	}
	echo '</div>';
}

function writeMessage1($level,$title,$lines)
{
	if (empty($lines)) {
		return;
	}

	echo
	'<div class="msg '.$level.'">'.
	'<h3>'.$title.'</h3>';
	foreach ($lines as $line) {
		echo '<p>'.$line.'</p>';
	}
	echo '</div>';
}

function nextAction($label,$step,$more='')
{
	echo
	'<form action="'.$_SERVER['SCRIPT_NAME'].'" method="post">'.
	$more.
	'<p><input type="hidden" name="step" value="'.$step.'" />'.
	'<input type="hidden" name="lang" value="'.DC_LOADER_LANG.'" />'.
	'<input type="submit" name="submit" value="'.$label.'" />'.
	'</p></form>';
}

if (!$can_fetch) {
	openPage();
	echo
	'<h2>'.__('NetInstall').'</h2>'."\n";
	writeMessage('warning',__('Damnit!'), array(
		__('Due to restrictions in your PHP configuration, NetInstall cannot get its job done.'),
		sprintf(__('Please see the <a href="%s">Dotclear documentation</a> to perform a normal installation.'),
			__('https://dotclear.org/documentation/2.0/admin/install')),
		__('Really sorry for the inconvenience.')
	));
	closePage();
	exit;
}

function initializeL10n()
{
	fetchRemote('https://download.dotclear.org/loader/static/l10n/'.DC_LOADER_LANG.'.php',$l10n);
	fetchRemote('https://download.dotclear.org/loader/static/l10n/'.DC_LOADER_LANG.'.md5',$md5);
	If (md5($l10n) == trim($md5) || trim($md5) == 'debug') {
		eval('?>'.$l10n);
	}
}

initializeL10n();
switch ($step) {
	case 1 : {
		openPage();
		echo
		'<h2>'.__('Welcome to NetInstall').'</h2>'."\n".
		'<p>'.__('This tool is meant to retrieve the latest Dotclear 2 archive and unzip it in your webspace.').'</p>'.
		'<p>'.__('Right after then, you will be redirect to the Dotclear 2 Setup Wizard.').'</p>';

		if (!$can_write) {
			writeMessage('message',__('Write access is needed'), array(
				__('It looks like NetInstall wont be able to write in the current directory, and this is required to follow on.'),
				__('Please try to change the permissions to allow write access, then reload this page by hitting the Refresh button.')
			));
			nextAction(__('Refresh'),1);
		}
		elseif (!$got_php5) {
			writeMessage('message',__('PHP 5 is required'), array(
				sprintf(__('It appears your webhost is currently running PHP %s.'), PHP_VERSION),
				__('NetInstall may try to switch your configuration to PHP 5 by creating or modifying a .htaccess file.'),
				__('Note you can change your configuration by yourself and restart NetInstall after that.')
			));
			nextAction(__('Try to activate PHP 5'),2);
		}
		else {
			nextAction(__('Retrieve and unzip Dotclear'),3,
				'<p><label for="destination">'.__('Destination:').'</label> '.
				getLocation().
				'<input type="text" id="destination" name="destination" '.
				'value="dotclear" size="15" maxlength="100" /></p>'
			);
		}
		closePage();
		break;
	}
	case 2 : {
		if (!empty($_POST['submit']) && !$got_php5) {
			if (($got_php5 = initPHP5())) {
				header('Location: '.$_SERVER['SCRIPT_NAME'].'?step=1');
			}
		}
		elseif ($got_php5) {
			header('Location: '.$_SERVER['SCRIPT_NAME'].'?step=1');
		}
		else {
			openPage();
			writeMessage('message',__('OMG!'),array(
				__('NetInstall was not able to activate PHP 5.'),
				__('You may referer to your hosting provider\'s support and see how you could switch to PHP 5 by yourself.'),
				__('Hope to see you back soon.')
			));
			closePage();
		}
		break;
	}
	case 3 : {
		$msg = array(__('WTF are you doing here that way?!'));
		$level = 'error';
		$text = '';
		if (!empty($_POST['submit']) && isset($_POST['destination']))
		{
			$msg = array();
			$dest = preg_replace('/[^A-Za-z0-9_\/-]/','',$_POST['destination']);
			$dest = preg_replace('#/+#','/',$dest);

			if (file_exists(dirname(__FILE__).'/./'.$dest.'/inc/config.php') || file_exists(dirname(__FILE__).'/./'.$dest.'/conf/dotclear.ini'))
			{
				$level = 'message';
				$msg[] = __('It seems like a previous Dotclear installation is still sitting in that space.');
				$msg[] = __('You need to rename or remove it before we can go further...');
			}
			elseif (grabFiles())
			{
				$lib_files = dirname(__FILE__).'/dcl_files.php';
				$lib_unzip = dirname(__FILE__).'/dcl_unzip.php';
				$dc_zip    = dirname(__FILE__).'/dotclear-install.zip';
				if (!file_exists($lib_files) || !file_exists($lib_unzip) || !file_exists($dc_zip)) {
					$msg[] = __('Files needed for this automatic installation could not be downloaded.');
					$msg[] = sprintf(__('Please see the <a href="%s">Dotclear documentation</a> to perform a normal installation.'),
						__('https://dotclear.org/documentation/2.0/admin/install'));
					$msg[] = __('Really sorry for the inconvenience.');
				}

				require $lib_files;
				require $lib_unzip;
				$uz = new fileUnzip($dc_zip);
				$files = $uz->getList();
				if (count($files) == 0) {
					$msg[] = __('The integrity of the downloaded archive could not be verified.');
					$msg[] = sprintf(__('Please see the <a href="%s">Dotclear documentation</a> to perform a normal installation.'),
						__('https://dotclear.org/documentation/2.0/admin/install'));
					$msg[] = __('Really sorry for the inconvenience.');
				}

				foreach ($files as $k => $v)
				{
					if ($v['is_dir']) {
						continue;
					}
					$t = preg_replace('#^dotclear/#','./'.$dest.'/',$k);
					$uz->unzip($k,$t);
				}

				if (!is_dir(dirname(__FILE__).'/./'.$dest))
				{
					$msg[] = __('The downloaded archive file could not be extracted.');
					$msg[] = sprintf(__('Please see the <a href="%s">Dotclear documentation</a> to perform a normal installation.'),
						__('https://dotclear.org/documentation/2.0/admin/install'));
					$msg[] = __('Really sorry for the inconvenience.');
				}
				else
				{
					# Remove files, create public directory, and self-destruction
					files::makeDir('./'.$dest.'/public');
					cleanFiles();
//					@unlink(__FILE__);

					$redir = preg_replace('#/+#','/',dirname($_SERVER['SCRIPT_NAME']).'/'.$dest.'/admin/install/wizard.php');

					header('Location: '.$redir);
				}
			}
			else
			{
				$msg[] = __('An error occurred while grabbing the necessary files to go on.');
				$msg[] = sprintf(__('Please see the <a href="%s">Dotclear documentation</a> to perform a normal installation.'),
					__('https://dotclear.org/documentation/2.0/admin/install'));
				$msg[] = __('Really sorry for the inconvenience.');
			}
		}
		openPage();
		writeMessage($level,__('Something went wrong ...'),$msg);
		echo $text;
		closePage();
		break;
	}
}
?>
