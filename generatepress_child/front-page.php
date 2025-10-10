<?php /* Front page – Bootstrap layout for GeneratePress */
get_header(); ?>

<style>
  :root {
    --page-bg: #ece7e1;
    --muted: #6b6b6b;
  }

  body.home {
    background: var(--page-bg);
  }

  .post-title a {
    color: #111;
    text-decoration: none;
  }

  .post-title a:hover {
    text-decoration: underline;
  }

  /* keep natural ratio but align heights visually */
  .thumb-sm {
    max-height: 240px;
    width: 100%;
    object-fit: cover;
    border-radius: .25rem;
  }

  .thumb-lg {
    max-height: 560px;
    width: 100%;
    object-fit: cover;
    border-radius: .25rem;
  }
</style>

<div class="container py-4">
  <div class="container py-5">
    <div class="row g-4">

      <?php
      $q = new WP_Query([
        'post_type' => 'post',
        'post_status' => 'publish',
        'ignore_sticky_posts' => true,
        'posts_per_page' => 12,
      ]);

      while ($q->have_posts()):
        $q->the_post();

        $is_featured = has_term(10, 'post_tag', get_the_ID());

        // Classes for grid
        $col_class = $is_featured ? 'col-12 col-md-4' : 'col-12 col-md-4';
        // Image sizes
        $img_size = $is_featured ? 'large' : 'medium';
        $img_class = 'w-100 card-img-top img-fluid';
        ?>

        <div class="<?php echo esc_attr($col_class); ?>">
          <?php get_template_part('template-parts/card', 'post'); ?>

        </div>

      <?php endwhile;
      wp_reset_postdata(); ?>

    </div>
  </div>


  <?php get_footer();
