<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
  <div class="header-inner">
    <?php if (has_custom_logo()) : ?>
      <div class="logo">
        <?php the_custom_logo(); ?>
      </div>
    <?php else : ?>
      <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
        <?php bloginfo('name'); ?>
      </a>
    <?php endif; ?>
    <nav class="primary" id="primary-menu">
      <?php
      wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'items_wrap'     => '<ul>%3$s</ul>',
          'fallback_cb'    => false,
      ]);
      ?>
    </nav>
    <div class="header-actions">
      <div class="burger" id="burger-toggle" role="button" tabindex="0" aria-expanded="false" aria-controls="primary-menu" aria-label="메뉴 열기"><span></span><span></span><span></span></div>
    </div>
  </div>
</header>
