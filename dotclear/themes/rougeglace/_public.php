<?php
# ***** BEGIN LICENSE BLOCK *****
#
# Thème Rouge glace par franck[à]ouik.fr pour Dotclear
# Librement inspiré du thème Hermione par Kozlika - http://ateliers.klafoutis.org/
# Licensed under the GPL version 2.0 license.
# See LICENSE file or
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
#
# ***** END LICENSE BLOCK *****

# empêcher l'exécution du fichier en dehors de Dotclear
if (!defined('DC_RC_PATH')) {return;}

l10n::set(dirname(__FILE__).'/locales/'.$_lang.'/public');

# appel css simplemenu
if ($core->blog->settings->themes->rougeglace_menu)
{
	$core->addBehavior('publicHeadContent',
		array('tplRougeglace_menu','publicHeadContent'));
}

class tplRougeglace_menu
{
	public static function publicHeadContent($core)
	{
	$url = $core->blog->settings->themes_url.'/'.$core->blog->settings->theme;
		echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/simplemenu.css\" />\n";
	}
}

# appel css breadcrumb
if ($core->blog->settings->themes->rougeglace_breadcrumb)
{
	$core->addBehavior('publicHeadContent',
		array('tplRougeglace_breadcrumb','publicHeadContent'));
}

class tplRougeglace_breadcrumb
{
	public static function publicHeadContent($core)
	{
	$url = $core->blog->settings->themes_url.'/'.$core->blog->settings->theme;
		echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/breadcrumb.css\" />\n";
	}
}
