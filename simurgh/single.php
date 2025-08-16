<?php
/* Single Post Template */
get_header(); ?>

<main class="container post-content">
  <?php while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php if (has_post_thumbnail()): ?>
        <figure><?php the_post_thumbnail('full'); ?></figure>
      <?php endif; ?>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </article>

    <section class="related" aria-labelledby="related-title">
      <h3 id="related-title"><?php _e('مطالب مرتبط','simurghname-child'); ?></h3>
      <div class="related-grid">
        <?php
        $cats = wp_get_post_categories(get_the_ID());
        $q = new WP_Query([
          'post__not_in'      => [get_the_ID()],
          'posts_per_page'    => 4,
          'ignore_sticky_posts' => 1,
          'category__in'      => $cats
        ]);
        while ($q->have_posts()): $q->the_post(); ?>
          <article class="card">
            <a class="card-thumb" href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()) { the_post_thumbnail('card-thumb'); } ?>
            </a>
            <div class="card-body">
              <h4 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              <div class="card-actions">
                <a href="<?php the_permalink(); ?>"><?php _e('مطالعه','simurghname-child'); ?></a>
              </div>
            </div>
          </article>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </section>

    <?php comments_template(); ?>

  <?php endwhile; ?>
</main>

<?php get_footer();
