<?php
/**
 * The template for displaying the header.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php wp_head(); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.rtl.min.css" integrity="sha384-Xbg45MqvDIk1e563NLpGEulpX6AvL404DP+/iCgW9eFa2BqztiwTexswJo2jLMue" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?> <?php generate_do_microdata( 'body' ); ?>>
<?php
	/**
	 * wp_body_open hook.
	 *
	 * @since 2.3
	 */
	do_action( 'wp_body_open' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- core WP hook.

	/**
	 * generate_before_header hook.
	 *
	 * @since 0.1
	 *
	 * @hooked generate_do_skip_to_content_link - 2
	 * @hooked generate_top_bar - 5
	 * @hooked generate_add_navigation_before_header - 5
	 */
	do_action( 'generate_before_header' );
  $size = is_singular('post') ? 480 : 300;
?>
<header class="hero <?php if (is_front_page()): ?>bg-gray-100<?php else: ?>bg-gray-200<?php endif ?> d-flex align-items-end flex-column" style="min-height: <?php echo $size; ?>px;">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg">
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse  ps-5 ms-5 mt-5" id="navbarSupportedContent">
        <ul class="navbar-nav mx-0 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">درباره سیمرغنامه</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">تماس با ما</a>
          </li>
        </ul>
        <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'items_wrap'     => '<ul class="navbar-nav bg-white rounded-pill px-3 me-auto mb-2 mb-lg-0">%3$s</ul>',
          'fallback_cb'    => false,
          // wrap <a> text in a span with the class you want
          'link_before'    => '<span class="nav-link">', 
          'link_after'     => '</span>',
        ]);
        ?>
      </div>
      <?php
      ?>
      <a class="navbar-brand brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <?php if ( is_front_page() ) : ?>
            <!-- Front-page logo -->
            <img src="https://simurghnameh.com/assets/logo-l0.png" alt="Simurghnameh" class="logo logo--front">
          <?php else : ?>
            <!-- Default logo -->
            <img src="https://simurghnameh.com/assets/logo-inv.png" alt="Simurghnameh" class="logo logo--default">
          <?php endif; ?>
      </a>
    </nav>
  </div>
  <?php if (is_singular('post')): ?>
  <div class="container mt-auto pt-5">
      <div class="row">
        <div class="col-sm-8 px-4 mx-auto">
          <h1><?php the_title(); ?></h1>
          <div class="meta fd">
          <?php
          $author = get_the_author();

          // relative time: "n days ago"
          $relative = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . ' ' . __( 'پیش', 'textdomain' );

          echo esc_html( implode( ' • ', array_filter( [ $author, $relative ] ) ) );
          ?>
          <div class="float-end"><i class="bi bi-share-fill"></i></div>
          </div>
        </div>
      </div>
  </div>
  <?php endif; ?>
</header>

	<?php
	/**
	 * generate_after_header hook.
	 *
	 * @since 0.1
	 *
	 * @hooked generate_featured_page_header - 10
	 */
	do_action( 'generate_after_header' );
	?>

	<main class="<?php if (is_front_page()): ?>bg-gray-100<?php else: ?>bg-light<?php endif ?>">
		<?php
		/**
		 * generate_inside_site_container hook.
		 *
		 * @since 2.4
		 */
		do_action( 'generate_inside_site_container' );
		?>
		<div class="container" <?php generate_do_attr( 'site-content' ); ?>>
			<?php
			/**
			 * generate_inside_container hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_inside_container' );
