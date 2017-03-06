<div id="top">
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
</div>

<p id="prelude">
	<a href="#main"><?php echo __('To content'); ?></a><span> |
	</span><a href="#blognav"><?php echo __('To menu'); ?></a><span> |
	</span><a href="#search"><?php echo __('To search'); ?></a>
</p>

<div id="toptags">
	<ul>
		<?php
$_ctx->meta = $core->meta->computeMetaStats($core->meta->getMetadata(array('meta_type'=>'tag','limit'=>24))); $_ctx->meta->sort('meta_id_lower','asc'); ?><?php while ($_ctx->meta->fetch()) : ?>
			<li class="tag<?php echo $_ctx->meta->roundpercent; ?>"><a href="<?php echo context::global_filters($core->blog->url.$core->url->getURLFor("tag",rawurlencode($_ctx->meta->meta_id)),array (
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
),'TagURL'); ?>"><?php echo context::global_filters($_ctx->meta->meta_id,array (
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
),'TagID'); ?></a></li>
		<?php endwhile; $_ctx->meta = null; ?>
	</ul>
</div>
<div id="nav">
  <?php echo tplSimpleMenu::displayMenu('mobile-hidden','','title'); ?>
</div>
<p class="breadcrumb"><?php echo tplBreadcrumb::displayBreadcrumb(' » '); ?></p>

<?php if ($core->hasBehavior('publicTopAfterContent')) { $core->callBehavior('publicTopAfterContent',$core,$_ctx);} ?>