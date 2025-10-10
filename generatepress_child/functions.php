<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */
function register_my_menus() {
  register_nav_menus(
    array(
      'footer-menu1' => __( 'Footer Menu 1' ),
      'footer-menu2' => __( 'Footer Menu 2' )
    )
  );
}
add_action( 'after_setup_theme', 'register_my_menus' );
