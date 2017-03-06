<div id="top">
<div id="topcontent">
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
  <h2><?php echo context::global_filters($core->blog->desc,array (
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
),'BlogDescription'); ?></h2>
</div>

<?php if ($core->hasBehavior('publicTopAfterContent')) { $core->callBehavior('publicTopAfterContent',$core,$_ctx);} ?>
</div>

<p id="prelude"><a href="#main"><?php echo __('To content'); ?></a> |
<a href="#blognav"><?php echo __('To menu'); ?></a> |
<a href="#topsearch"><?php echo __('To search'); ?></a></p>

<div id="topsearch">
<form action="<?php echo context::global_filters($core->blog->url,array (
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
),'BlogURL'); ?>" method="get">
<fieldset>
<label for="q">Recherche</label><br />
<input class="text" type="text" size="15" maxlength="255" id="q" name="q" value="" />
<input class="submit" type="submit" value="ok" />
</fieldset>
</form>
</div>

<div id="headerpic"></div>

<div id="menu">
<?php if($core->tpl->tagExists('MenuFreshy') === false) : ?>
	<?php if($core->tpl->tagExists('SimpleMenu') === false) : ?>
		<!-- menu normal a adapter -->
		<ul>
			<li class="first  current_page_item">
				<a title="Accueil" href="<?php echo context::global_filters($core->blog->url,array (
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
),'BlogURL'); ?>">Accueil</a>
			</li>
			<li class="page_item ">
				<a title="Archives" href="<?php echo context::global_filters($core->blog->url,array (
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
),'BlogURL'); ?>archive">Archives</a>
			</li>
			<li class="page_item ">
				<a title="Aide" href="<?php echo context::global_filters($core->blog->url,array (
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
),'BlogURL'); ?>pages/Mentions-legales">Mentions légales</a>
			</li>
			<li class="page_item ">
				<a title="Contact" href="<?php echo context::global_filters($core->blog->url,array (
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
),'BlogURL'); ?>contact">Contact</a>
			</li>
		</ul>
		<!-- fin menu normal a adapter -->
	<?php endif; ?>
	<?php if($core->tpl->tagExists('SimpleMenu') === true) : ?>
		<?php echo tplSimpleMenu::displayMenu('','',''); ?>
	<?php endif; ?>
<?php endif; ?>
<?php if($core->tpl->tagExists('MenuFreshy') === true) : ?>
	
<?php endif; ?>
</div>

<div id="menubottom"></div>
