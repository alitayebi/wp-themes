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
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand brand" href="#">
        <img src="/assets/logo-inv.png" alt="لوگو">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>


  <div class="container-fluid position-relative">

    <!-- centered pill menu -->
    <div class="pill-nav">
        <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'items_wrap'     => '<ul class="nav">%3$s</ul>',
          'fallback_cb'    => function () {
            echo '<ul class="nav">' . wp_list_pages(['title_li' => '', 'echo' => 0]) . '</ul>';
          }
        ]);
        ?>
    </div>

    <!-- top row: logo left, links right -->
    <div class="d-flex align-items-center justify-content-between">

      <nav class="top-links d-none d-md-block">
        <a href="#">درباره سیمرغنامه</a>
        <a class="me-3" href="#">تماس با ما</a>
      </nav>
      <a class="brand d-inline-flex align-items-center" href="#">
        <img src="/assets/logo-inv.png" alt="لوگو">
      </a>

    </div>
    <?php if (is_singular('post')): ?>
    <!-- title + meta -->
    <div class="hero-title">
      <h1><?php the_title(); ?></h1>
      <div class="meta">
        <?php
        $author = get_the_author();
        $date   = get_the_date();
        echo esc_html(implode(' • ', array_filter([$author, $date])));
        ?>
      </div>
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
