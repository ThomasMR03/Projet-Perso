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
if (!defined('DC_CONTEXT_ADMIN')) { return; }

// chargement de la traduction
l10n::set(dirname(__FILE__).'/locales/'.$_lang.'/public');

#afficher menu
$menu = $core->blog->settings->themes->rougeglace_menu;

if (!empty($_POST))
{
	$core->blog->settings->addNameSpace('themes');
	$core->blog->settings->themes->put('rougeglace_menu',
			!empty($_POST['rougeglace_menu']),
			'boolean', 'Display simpleMenu');

	# update setting
	$menu = (!empty($_POST['rougeglace_menu']));

	$core->blog->triggerBlog();

	dcPage::success(__('Theme configuration has been successfully updated.'));
}

echo
'<div class="fieldset"><h4>'.__('Customizations').'</h4>'.
 '<p>'.
	form::checkbox('rougeglace_menu',1,$menu).
	'<label class="classic" for="rougeglace_menu">'.
		__('Display simpleMenu').
	'</label>'.
'</p>';

// affichage de breadcrumb
$breadcrumb = $core->blog->settings->themes->rougeglace_breadcrumb;

if (!empty($_POST))
{
	$core->blog->settings->addNameSpace('themes');
	$core->blog->settings->themes->put('rougeglace_breadcrumb',
			!empty($_POST['rougeglace_breadcrumb']),
			'boolean', 'Display breadcrumb');

	# update setting
	$breadcrumb = (!empty($_POST['rougeglace_breadcrumb']));

	$core->blog->triggerBlog();
}

echo
 '<p>'.
	form::checkbox('rougeglace_breadcrumb',1,$breadcrumb).
	'<label class="classic" for="rougeglace_breadcrumb">'.
		__('Display breadcrumb').
	'</label>'.
'</p>'.
'</div>';
