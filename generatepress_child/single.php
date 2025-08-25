<?php
/* Single Post Template */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="container">
  <div class="row post-content py-5">
    <div class="col-sm-8 mx-auto">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if (has_post_thumbnail()): ?>
          <figure><?php the_post_thumbnail('full'); ?></figure>
        <?php endif; ?>

        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </article>
    </div>
</div>
<?php
// === Related posts (same categories) ===
$cats = wp_get_post_categories(get_the_ID());
$q    = new WP_Query([
  'post__not_in'         => [ get_the_ID() ],
  'ignore_sticky_posts'  => true,
  'posts_per_page'       => 5,
  'category__in'         => $cats,
]);

if ( $q->have_posts() ): ?>
<section class="related my-5 py-3">
  <div class="container">
    <h3 class="fs-5 fw-bold mb-3"><?php _e('مطالب مرتبط','simurgh'); ?></h3>

    <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
      <?php while ( $q->have_posts() ): $q->the_post(); ?>
      <div class="col">
        <article class="card h-100 border-0 bg-transparent">
          <!-- Image (1:1) -->
          <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) {
              the_post_thumbnail('related-thumb', ['class'=>'card-img-top img-fluid']);
            } else { ?>
              <img class="card-img-top img-fluid" src="<?php echo esc_url( get_stylesheet_directory_uri().'/assets/placeholder-1x1.png'); ?>" alt="">
            <?php } ?>
          </a>

          <div class="card-body">
            <h4 class="card-title fs-6 fw-bold mb-1">
              <a href="<?php the_permalink(); ?>" class="link-dark text-decoration-none text-reset"><?php the_title(); ?></a>
            </h4>

            <div class="text-muted small mb-2">
              <?php
                $ago = human_time_diff( get_the_time('U'), current_time('timestamp') );
                echo esc_html( sprintf( __('%s پیش', 'simurgh'), $ago ) );
              ?>
            </div>

            <!-- Labels (tags; fallback to categories) -->
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
          </div>
        </article>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php 
endif; 
// comments_template(); 

endwhile; 

get_footer();
