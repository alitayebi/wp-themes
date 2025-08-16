<?php /* header.php in child theme */ ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.rtl.min.css" integrity="sha384-Xbg45MqvDIk1e563NLpGEulpX6AvL404DP+/iCgW9eFa2BqztiwTexswJo2jLMue" crossorigin="anonymous">
</head>
<body <?php body_class(); ?>>
<header class="hero">
  <div class="container position-relative">

    <!-- centered pill menu -->
    <div class="pill-nav">
      <ul class="nav">
        <li class="nav-item"><a class="nav-link" href="#">بلاگ</a></li>
        <li class="nav-item"><a class="nav-link" href="#">تالارها</a></li>
        <li class="nav-item"><a class="nav-link" href="#">نسخ خطی</a></li>
        <li class="nav-item"><a class="nav-link active" href="#">گنجینه اشیا</a></li>
      </ul>
    </div>

    <!-- top row: logo left, links right -->
    <div class="d-flex align-items-center justify-content-between">
      <a class="brand d-inline-flex align-items-center" href="#">
        <img src="/path/to/logo.svg" alt="لوگو">
      </a>

      <nav class="top-links d-none d-md-block">
        <a href="#">درباره سیمرغنامه</a>
        <a class="me-3" href="#">تماس با ما</a>
      </nav>
    </div>

    <!-- title + meta -->
    <div class="hero-title">
      <h1>عنوان پست در اینجا قرار می‌گیرد</h1>
      <div class="meta">۳ روز پیش</div>
    </div>

    <!-- corner chevron -->
    <div class="chev">&gt;</div>
  </div>
</header>
<!-- <header class="site-hero">
    <div class="container-fluid">
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
    </div>
    <?php if (is_singular('post')): ?>
    <div class="page-title container text-white">
        <div class="col-8 mx-auto">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="post-meta">
                <?php
                $author = get_the_author();
                $date   = get_the_date();
                echo esc_html(implode(' • ', array_filter([$author, $date])));
                ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</header> -->
