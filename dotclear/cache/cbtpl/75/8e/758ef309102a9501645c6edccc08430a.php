<div id="header">
	<div class="container">
		<div id="title" role="banner">
			<h1><a href="<?php echo context::global_filters($core->blog->url,array (
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
),'BlogName'); ?></a></h1>
			<div class="description">
				<small><?php echo context::global_filters($core->blog->desc,array (
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
),'BlogDescription'); ?></small>
			</div>
			<ul id="quicklinks">
			<li><form id="searchform" action="<?php echo context::global_filters($core->blog->url,array (
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
),'BlogURL'); ?>" method="get"><p><input type="text" size="12" maxlength="255" id="s" name="q" value="" /> <input class="btn" type="submit" id="searchsubmit" value="<?php echo __('Search'); ?>" /></p></form></li>
			</ul>
		</div>

		  <?php if ($core->hasBehavior('publicTopAfterContent')) { $core->callBehavior('publicTopAfterContent',$core,$_ctx);} ?>
		<div id="header_image">

			<div id="menu" role="navigation">
			<div class="menu_container">
			<?php if (tplFreshy2Theme::$config->menu == "simplemenu"): ?>
<?php echo tplSimpleMenu::displayMenu('','supranav','title'); ?>
<?php endif; ?>

			<?php if (tplFreshy2Theme::$config->menu == "freshymenu"): ?>

<?php endif; ?>

			</div><span class="menu_end"></span>
			</div>
		</div>

	</div>
</div>

<p id="prelude" role="navigation"><a href="#main"><?php echo __('To content'); ?></a> |
<a href="#blognav"><?php echo __('To menu'); ?></a> |
<a href="#search"><?php echo __('To search'); ?></a></p>