<?php
if (!defined('ABSPATH')) exit;

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    register_nav_menus([
        'primary' => 'Primary Menu',
        'footer'  => 'Footer Menu',
    ]);
});

function topicgrow_is_new_post($days = 3) {
    return (get_the_time('U') > strtotime("-{$days} days"));
}

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'pretendard',
        'https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css'
    );
    wp_enqueue_style(
        'topicgrow-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
    wp_enqueue_script(
        'topicgrow-main',
        get_stylesheet_directory_uri() . '/js/main.js',
        [],
        wp_get_theme()->get('Version'),
        true
    );
});
