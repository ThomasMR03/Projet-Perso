<div id="footer">
  <div class="left"><p><?php echo context::global_filters($core->blog->settings->system->copyright_notice,array (
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
),'BlogCopyrightNotice'); ?> - <?php echo __('Powered by'); ?> <a href="http://www.dotclear.net/">DotClear</a></p></div>
  <div class="right"><p>Adapted by <a href="http://open-time.net/" hreflang="fr">Franck Paul</a> from a <acronym title="WordPress">WP</acronym> theme by <a href="http://wpthemepark.com/themes/fallseason/" hreflang="fr">Sadish Bala</a></p></div>
</div>
<?php if ($core->hasBehavior('publicFooterContent')) { $core->callBehavior('publicFooterContent',$core,$_ctx);} ?>
