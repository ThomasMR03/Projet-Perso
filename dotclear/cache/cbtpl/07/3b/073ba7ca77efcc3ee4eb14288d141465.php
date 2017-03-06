  <?php if (tplFreshy2Theme::$config->right_sidebar != "none"): ?>

  <div id="sidebar" class="sidebar" role="complementary">
    <?php if (tplFreshy2Theme::$config->right_sidebar == "nav"): ?>

    <div id="blognav">
      <?php publicWidgets::widgetsHandler('nav',''); ?>
    </div> <!-- End #blognav -->
    
<?php endif; ?>

    <?php if (tplFreshy2Theme::$config->right_sidebar == "extra"): ?>

    <div id="blogextra">
      <?php publicWidgets::widgetsHandler('extra',''); ?>
    </div> <!-- End #blognav -->
    
<?php endif; ?>

  </div>
  
<?php endif; ?>


  <?php if (tplFreshy2Theme::$config->left_sidebar != "none"): ?>

  <div id="sidebar_left" class="sidebar" role="complementary">
    <?php if (tplFreshy2Theme::$config->left_sidebar == "nav"): ?>

    <div id="blognav">
      <?php publicWidgets::widgetsHandler('nav',''); ?>
    </div> <!-- End #blogextra -->
    
<?php endif; ?>

    <?php if (tplFreshy2Theme::$config->left_sidebar == "extra"): ?>

    <div id="blogextra">
      <?php publicWidgets::widgetsHandler('extra',''); ?>
    </div> <!-- End #blogextra -->
    
<?php endif; ?>

  </div>
  
<?php endif; ?>
