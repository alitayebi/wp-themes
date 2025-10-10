<?php
/**
 * The template for displaying the header.
 *
 * @package GeneratePress
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <?php wp_head(); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-Xbg45MqvDIk1e563NLpGEulpX6AvL404DP+/iCgW9eFa2BqztiwTexswJo2jLMue" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?> <?php generate_do_microdata('body'); ?>>
  <?php
  /**
   * wp_body_open hook.
   *
   * @since 2.3
   */
  do_action('wp_body_open'); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- core WP hook.
  
  /**
   * generate_before_header hook.
   *
   * @since 0.1
   *
   * @hooked generate_do_skip_to_content_link - 2
   * @hooked generate_top_bar - 5
   * @hooked generate_add_navigation_before_header - 5
   */
  do_action('generate_before_header');
  $size = is_singular('post') ? 480 : 300;
  $bg_style = '';
  $color_class = is_front_page() ? 'bg-gray-100' : 'bg-gray-200';
  $extra_class = '';

  if (is_singular('post') && has_post_thumbnail()) {
    $bg_url = get_the_post_thumbnail_url(null, 'full');
    if ($bg_url) {
      $bg_style = sprintf(
        "background-image: url('%s'); background-size: cover; background-position: center; background-repeat: no-repeat;",
        esc_url($bg_url)
      );
      $color_class = '';
      $extra_class = 'hero--has-bg'; // mark when background is active
    }
  }
  ?>
  <header class="hero p-0" >
    <div class="container-fluid p-0 pb-2 position-relative <?php echo esc_attr("$color_class $extra_class"); ?>" <?php if (is_single()): ?> style="min-height: <?php echo (int) $size; ?>px; <?php echo esc_attr($bg_style); ?>"<?php endif; ?>>
      <div class="row d-flex p-0 align-items-end position-relative" <?php if (is_single()): ?> style="min-height: <?php echo (int) $size; ?>px;"<?php endif; ?>>
        <div class="col-md-3">
          <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler mobile-menu-btn border-0" type="button" data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="menu collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mx-0 mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link text-black2" href="/about-en">about us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-black2" aria-current="page" href="/about-us">دربارۀ سیمرغنامه</a>
                </li>
              </ul>
              <?php
              wp_nav_menu([
                'theme_location' => 'primary',
                'container' => false,
                'items_wrap' => '<ul class="navbar-nav menu-secondary px-2 me-auto mb-2 mb-lg-0">%3$s</ul>',
                'fallback_cb' => false,
                // wrap <a> text in a span with the class you want
                'link_before' => '<span class="nav-link text-black2">',
                'link_after' => '</span>',
              ]);
              ?>
            </div>
            <?php
            ?>
          </nav>
        </div>
        <div class="col-md-6" style="margin-top:140px;">
          <?php if (is_front_page()): ?>
            <div class="row">
              <h1 class="fw-bold text-black2 page-title m-0"><?php _e('شیوه‌نامه‌ها', 'gp-child'); ?></h1>
              <div class="col-6 col-lg-8">
                <div class="text-muted fd">
                  <?php $pc = wp_count_posts('post')->publish;
                  printf(_n('%s مطلب', '%s مطلب', $pc, 'gp-child'), number_format_i18n($pc)); ?>
                </div>
              </div>
              <div class="col-6 col-lg-4">
                <div class="d-flex align-items-center gap-2 text-muted mt-auto">
                  <span>ترتیب</span>
                  <select class="form-select form-select-sm w-auto" onchange="location.href=this.value">
                    <option value="<?php echo esc_url(home_url('/')); ?>"><?php _e('جدیدترین', 'gp-child'); ?></option>
                    <option value="<?php echo esc_url(add_query_arg('orderby', 'random')); ?>">
                      <?php _e('تصادفی', 'gp-child'); ?>
                    </option>
                  </select>
                </div>
              </div>
            </div>
          <?php else: ?>
            <div class="row mt-auto py-3">
              <div class="col px-4 mx-auto">
                <h1><?php the_title(); ?></h1>
                <div class="meta fd">
                  <?php
                  $author = get_the_author();

                  // relative time: "n days ago"
                  $relative = human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('پیش', 'textdomain');

                  echo esc_html(implode(' • ', array_filter([$author, $relative])));
                  ?>
                  <div class="float-end"><i class="bi bi-share-fill"></i></div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
        <div class="col-md-3">
          <a class="navbar-brand brand" href="<?php echo esc_url(home_url('/')); ?>">
            <?php if (is_front_page()): ?>
              <!-- Front-page logo -->
              <img src="https://simurghnameh.com/assets/logo-l0.png" alt="Simurghnameh" class="logo logo--front">
            <?php else: ?>
              <!-- Default logo -->
              <img src="https://simurghnameh.com/assets/logo-inv.png" alt="Simurghnameh" class="logo logo--default">
            <?php endif; ?>
          </a>
        </div>
      </div>


      <div class="offcanvas offcanvas-top h-100" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div class="">
          <img class='mobile-menu-logo' src="https://simurghnameh.com/assets/logo-l02.png" class="layer-02">

        </div>
        <div class="offcanvas-body">

          <?php
          wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'items_wrap' => '<ul class="navbar-nav mx-0 pt-1 mb-lg-0 fw-bold">%3$s</ul>',
            'fallback_cb' => false,
            // wrap <a> text in a span with the class you want
            'link_before' => '<span class="nav-link">',
            'link_after' => '</span>',
          ]);
          ?>
          <ul class="navbar-nav mx-0 mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/about-en">about us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/about-us">درباره سیمرغنامه</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <?php
  /**
   * generate_after_header hook.
   *
   * @since 0.1
   *
   * @hooked generate_featured_page_header - 10
   */
  do_action('generate_after_header');
  ?>

  <main class="<?php if (is_front_page()): ?>bg-gray-100<?php else: ?>bg-light<?php endif ?>">
    <?php
    /**
     * generate_inside_site_container hook.
     *
     * @since 2.4
     */
    do_action('generate_inside_site_container');
    ?>
    <div class="container" <?php generate_do_attr('site-content'); ?>>
      <?php
      /**
       * generate_inside_container hook.
       *
       * @since 0.1
       */
      do_action('generate_inside_container');
