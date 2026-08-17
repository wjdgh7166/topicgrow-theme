<?php
if (!defined('ABSPATH')) exit;

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    register_nav_menus([
        'primary' => 'Primary Menu',
        'footer'  => 'Footer Menu',
    ]);
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'inter',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap'
    );
    wp_enqueue_style(
        'topicgrow-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
});
