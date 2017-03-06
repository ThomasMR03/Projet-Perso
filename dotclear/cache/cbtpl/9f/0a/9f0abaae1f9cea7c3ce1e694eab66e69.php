<div id="top" role="banner">
  <h1><span><a href="<?php echo context::global_filters($core->blog->url,array (
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
),'BlogURL'); ?>"><?php echo context::global_filters($core->blog->name,array (
  0 => NULL,
  'encode_xml' => 0,
  'encode_html' => '1',
  'cut_string' => 0,
  'lower_case' => 0,
  'upper_case' => 0,
  'encode_url' => 0,
  'remove_html' => 0,
  'capitalize' => 0,
  'strip_tags' => 0,
),'BlogName'); ?></a></span></h1>

  <?php if ($core->hasBehavior('publicTopAfterContent')) { $core->callBehavior('publicTopAfterContent',$core,$_ctx);} ?>
</div>

<p id="prelude" role="navigation"><a href="#main"><?php echo __('To content'); ?></a> |
<a href="#blognav"><?php echo __('To menu'); ?></a> |
<a href="#search"><?php echo __('To search'); ?></a></p>
