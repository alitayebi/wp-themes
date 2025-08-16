<?php /* Top gray header w/ logo + primary menu */ ?>
<header class="site-hero">
  <div class="container">
    <div class="topbar">
      <div class="brand">
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <img src="<?php echo esc_url(get_stylesheet_directory_uri().'/assets/logo.svg'); ?>" alt="<?php bloginfo('name'); ?>">
        </a>
      </div>
      <nav class="primary-nav">
        <?php wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => '',
          'items_wrap'     => '<ul>%3$s</ul>',
          'fallback_cb'    => false
        ]); ?>
      </nav>
    </div>

    <?php if (is_single()): ?>
      <h1 class="post-title"><?php the_title(); ?></h1>
      <div class="post-meta">
        <?php
          $author = get_the_author();
          $date   = get_the_date();
          echo esc_html($author . ' • ' . $date);
        ?>
      </div>
    <?php endif; ?>
  </div>
</header>
