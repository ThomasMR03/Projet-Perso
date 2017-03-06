<div id="footer" role="contentinfo">
  <p><?php printf(__("Powered by %s"),"<a href=\"http://dotclear.org/\">Dotclear</a>"); ?> - <?php echo __('Theme by'); ?> <strong><a href="http://www.7themes.com/">7themes</a></strong></p>
</div>

<?php if ($core->hasBehavior('publicFooterContent')) { $core->callBehavior('publicFooterContent',$core,$_ctx);} ?>