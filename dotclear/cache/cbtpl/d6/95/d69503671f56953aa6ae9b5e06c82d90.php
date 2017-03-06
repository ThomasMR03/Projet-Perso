<div id="footer">
	<?php echo tplSimpleMenu::displayMenu('desktop-hidden','','title'); ?>
	<div id="custom">
  		<?php publicWidgets::widgetsHandler('custom',''); ?>
  	</div>
  	<p class="right">th&egrave;me rougeglace par <a href="http://www.ouik.fr">Franck</a> | <?php printf(__("Powered by %s"),"<a href=\"http://dotclear.org/\">Dotclear</a>"); ?> | <a href="#top">haut de page</a></p>
</div>

<?php if ($core->hasBehavior('publicFooterContent')) { $core->callBehavior('publicFooterContent',$core,$_ctx);} ?>