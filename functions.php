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

// 같은 사이트 내 글끼리 링크할 때 생기는 자체 핑백(pingback) 방지
add_action('pre_ping', function (&$links) {
    $home = home_url();
    foreach ($links as $key => $link) {
        if (strpos($link, $home) === 0) {
            unset($links[$key]);
        }
    }
});

// Rank Math의 "PRO로 업그레이드" 홍보 배너(워드프레스 업데이트 화면 등에 표시)를 관리자 화면에서 숨김
add_action('admin_head', function () {
    echo '<style>#rank_math_pro_notice{display:none !important;}</style>';
});

add_action('wp_enqueue_scripts', function () {
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
