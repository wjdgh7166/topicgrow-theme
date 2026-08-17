<footer class="site-footer">
  <div class="wrap">
    <div class="footer-top">
      <div class="footer-logo"><?php bloginfo('name'); ?></div>
      <div class="footer-menu">
        <?php
        wp_nav_menu([
            'theme_location' => 'footer',
            'container'      => false,
            'items_wrap'     => '<ul>%3$s</ul>',
            'fallback_cb'    => false,
        ]);
        ?>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</span>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
