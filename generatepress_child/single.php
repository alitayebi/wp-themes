<?php
/* Single Post Template */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="container">
  <div class="row post-content py-5">
    <div class="col-sm-8 mx-auto">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
    <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
      <?php while ( $q->have_posts() ): $q->the_post(); ?>
      <div class="col">
          <?php get_template_part('template-parts/card', 'post'); ?>
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
