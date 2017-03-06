<meta name="viewport" content="initial-scale=1.0" />
<!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="<?php echo context::global_filters($core->blog->settings->system->themes_url."/".$core->blog->settings->system->theme,array (
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
),'BlogThemeURL'); ?>/ie.css" media="screen" />
<![endif]-->

  <script type="text/javascript">
  //<![CDATA[
  $(function() {
  	if ($('body.dc-post, body.dc-page').length == 0) { return; }
  	if ($('#pr').length > 0) { return; }

  	var link = $('<a href="#">' + $('#comment-form h3:first').text() + '<\/a>').click(function() {
  		$('#comment-form fieldset').show(200);
  		$('#c_name').focus();
  		$(this).parent().html($(this).text());
  		return false;
  	});
  	$('#comment-form h3:first').empty().append(link);
  	$('#comment-form fieldset').hide();
  });
  //]]>
  </script>