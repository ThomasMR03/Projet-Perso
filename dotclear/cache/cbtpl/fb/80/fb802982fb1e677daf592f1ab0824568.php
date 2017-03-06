<style type="text/css" media="screen">
@import url(<?php echo context::global_filters($core->blog->settings->system->themes_url."/".$core->blog->settings->system->theme,array (
  0 => NULL,
  'encode_xml' => 0,
  'encode_html' => 0,
  'cut_string' => 0,
  'lower_case' => 0,
  'upper_case' => 0,
  'encode_url' => 0,
  'remove_html' => 0,
  'capitalize' => 0,
  'strip_tags' => 0,
),'BlogThemeURL'); ?>/style.css);
</style>
<style type="text/css" media="print">
@import url(<?php echo context::global_filters($core->blog->settings->system->themes_url."/".$core->blog->settings->system->theme,array (
  0 => NULL,
  'encode_xml' => 0,
  'encode_html' => 0,
  'cut_string' => 0,
  'lower_case' => 0,
  'upper_case' => 0,
  'encode_url' => 0,
  'remove_html' => 0,
  'capitalize' => 0,
  'strip_tags' => 0,
),'BlogThemeURL'); ?>/../default/print.css);
</style>
<style type="text/css">.recentcomments a{display:inline !important;padding: 0 !important;margin: 0 !important;}</style>
<script type="text/javascript" src="<?php echo context::global_filters($core->blog->settings->system->themes_url."/".$core->blog->settings->system->theme,array (
  0 => NULL,
  'encode_xml' => 0,
  'encode_html' => 0,
  'cut_string' => 0,
  'lower_case' => 0,
  'upper_case' => 0,
  'encode_url' => 0,
  'remove_html' => 0,
  'capitalize' => 0,
  'strip_tags' => 0,
),'BlogThemeURL'); ?>/../default/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo context::global_filters($core->blog->settings->system->themes_url."/".$core->blog->settings->system->theme,array (
  0 => NULL,
  'encode_xml' => 0,
  'encode_html' => 0,
  'cut_string' => 0,
  'lower_case' => 0,
  'upper_case' => 0,
  'encode_url' => 0,
  'remove_html' => 0,
  'capitalize' => 0,
  'strip_tags' => 0,
),'BlogThemeURL'); ?>/../default/js/jquery.cookie.js"></script>

<?php try { echo $core->tpl->getData('user_head.html'); } catch (Exception $e) {} ?>

<?php if ($core->hasBehavior('publicHeadContent')) { $core->callBehavior('publicHeadContent',$core,$_ctx);} ?>