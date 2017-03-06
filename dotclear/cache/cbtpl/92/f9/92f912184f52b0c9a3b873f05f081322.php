<div id="top" role="banner">
  <div id="f"></div>
    <script type="text/javascript">
    // <![CDATA[
    //var so = new SWFObject(swf, id, width, height, version, background-color [, quality, xiRedirectUrl, redirectUrl, detectKey]);
		var so = new SWFObject("<?php echo context::global_filters($core->blog->settings->system->themes_url."/".$core->blog->settings->system->theme,array (
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
),'BlogThemeURL'); ?>/effet.swf", "effet12", "850", "180", "8.0.0", "#FFFFFF");
		so.addParam("loop", "false");
		so.addParam("WMODE", "transparent");
		so.addParam("quality", "high");
		so.addVariable("link_url", "<?php echo context::global_filters($core->blog->url,array (
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
),'BlogURL'); ?>");		
		so.addVariable("custom_xml_url", "<?php echo context::global_filters($core->blog->settings->system->themes_url."/".$core->blog->settings->system->theme,array (
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
),'BlogThemeURL'); ?>/");		
		so.addVariable("custom_img_url", "<?php echo context::global_filters($core->blog->settings->system->themes_url."/".$core->blog->settings->system->theme,array (
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
),'BlogThemeURL'); ?>/images/your_image.jpg");	
		so.write("f");		
								
		// ]]>
		</script>

  <?php if ($core->hasBehavior('publicTopAfterContent')) { $core->callBehavior('publicTopAfterContent',$core,$_ctx);} ?>


	</div>
	
<?php echo tplBreadcrumb::displayBreadcrumb(''); ?>

<p id="prelude" role="navigation"><a href="#main"><?php echo __('To content'); ?></a> |
<a href="#blognav"><?php echo __('To menu'); ?></a> |
<a href="#search"><?php echo __('To search'); ?></a></p>