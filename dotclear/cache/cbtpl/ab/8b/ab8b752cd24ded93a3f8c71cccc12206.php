<div id="footer" role="contentinfo">
	<div class="container">
    <div id="blogcustom" class="sidebar" role="complementary">
      <?php publicWidgets::widgetsHandler('custom',''); ?>
    </div>
		<div id="footer_content">
			<p><?php printf(__("Powered by %s"),"<a href=\"http://dotclear.org/\">Dotclear</a>"); ?> - <?php echo __('Freshy theme'); ?> <a href="http://www.jide.fr">Julien de Luca</a> <?php echo __('adapted from Wordpress'); ?></p>
		</div>
	</div>
</div>

<?php if ($core->hasBehavior('publicFooterContent')) { $core->callBehavior('publicFooterContent',$core,$_ctx);} ?>