<div id="footer">
  <p><strong><?php printf(__("Powered by %s"),"<a href=\"http://dotclear.org/\">Dotclear</a>"); ?></strong> - <?php echo __('Theme'); ?> <strong><a href="http://13sportif.free.fr/index.php/post/2007/11/06/Theme-13zoli-pour-Dotclear2">13zoli</a></strong>
     <?php echo __('by'); ?> <a href="http://13sportif.free.fr/">13'sportif</a>
  </p>
</div>

<?php if ($core->hasBehavior('publicFooterContent')) { $core->callBehavior('publicFooterContent',$core,$_ctx);} ?>
