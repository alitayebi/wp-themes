<?php
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('child-style', get_stylesheet_uri(), ['parent-style'], wp_get_theme()->get('Version'));
  if (is_rtl()) { wp_enqueue_style('child-rtl', get_stylesheet_directory_uri().'/rtl.css', ['child-style'], wp_get_theme()->get('Version')); }
});

add_action('after_setup_theme', function () {
  add_theme_support('post-thumbnails');
  add_image_size('card-thumb', 600, 450, true);
  register_nav_menus([
    'primary' => __('Primary Menu', 'simurghname-child'),
    'footer'  => __('Footer Menu',  'simurghname-child'),
  ]);
});
