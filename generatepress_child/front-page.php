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
          <article class="mb-4">
            <a href="<?php the_permalink(); ?>" class="d-block mb-2">
              <?php if (has_post_thumbnail()) {
                the_post_thumbnail($img_size, ['class' => $img_class]);
              } else { ?>
                <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/placeholder.png'); ?>"
                  class="<?php echo esc_attr($img_class); ?>" alt="<?php esc_attr_e('Placeholder', 'gp-child'); ?>">
              <?php } ?>
            </a>

            <h3 class="fs-6 fw-bold mb-1">
              <a class="link-dark text-decoration-none" href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
            </h3>

            <div class="small fd text-muted">
              <?php
              echo esc_html(
                sprintf(
                  __('%s پیش', 'gp-child'),
                  human_time_diff(get_the_time('U'), current_time('timestamp'))
                )
              );
              ?>
            </div>
            <div>
              <?php
              $tags = get_the_tags();
              if ( $tags ) {
                $tags = array_slice( $tags, 0, 2 );
                foreach ( $tags as $t ) {
                  echo '<a class="btn btn-outline-dark btn-sm rounded-0" href="'.esc_url(get_tag_link($t)).'">'.esc_html($t->name).'</a>';
                }
              } else {
                $cats_small = array_slice( get_the_category(), 0, 2 );
                foreach ( $cats_small as $c ) {
                  echo '<a class="btn btn-outline-dark btn-sm rounded-0" href="'.esc_url(get_category_link($c)).'">'.esc_html($c->name).'</a>';
                }
              }
              ?>
            </div>
          </article>
        </div>

      <?php endwhile;
      wp_reset_postdata(); ?>

    </div>
  </div>


  <?php get_footer();
