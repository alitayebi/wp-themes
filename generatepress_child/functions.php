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

// Function to get number of post views
function getPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

// Function to set/increase post view count
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Prevent prefetching from adding false views
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function gp_modify_archive_order( $query ) {
  if ( ! is_admin() && $query->is_main_query() && is_home() || $query->is_archive() ) {

    if ( isset( $_GET['orderby'] ) && $_GET['orderby'] === 'views' ) {
      $query->set( 'meta_key', 'post_views_count' ); // your post view counter meta key
      $query->set( 'orderby', 'meta_value_num' );   // ensure numerical sorting
      $query->set( 'order', 'DESC' );               // highest to lowest
    } 
    else {
      $query->set( 'orderby', 'date' );
      $query->set( 'order', 'DESC' );
    }
  }
}
add_action( 'pre_get_posts', 'gp_modify_archive_order' );
