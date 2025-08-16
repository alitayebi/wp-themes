<?php /* header.php in child theme */ ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-hero">
  <div class="container">
    <div class="topbar">
      <div class="brand">
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <img src="<?php echo esc_url(get_stylesheet_directory_uri().'/assets/logo.svg'); ?>" alt="<?php bloginfo('name'); ?>">
        </a>
      </div>
      <nav class="primary-nav">
        <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'items_wrap'     => '<ul>%3$s</ul>',
          'fallback_cb'    => function () {
            echo '<ul>' . wp_list_pages(['title_li' => '', 'echo' => 0]) . '</ul>';
          }
        ]);
        ?>
      </nav>
    </div>

    <?php if (is_singular('post')): ?>
      <h1 class="post-title"><?php the_title(); ?></h1>
      <div class="post-meta">
        <?php
          $author = get_the_author();
          $date   = get_the_date();
          echo esc_html(implode(' • ', array_filter([$author, $date])));
        ?>
      </div>
    <?php endif; ?>
  </div>
</header>
