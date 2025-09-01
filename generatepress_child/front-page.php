<?php /* Front page – Bootstrap layout for GeneratePress */
get_header(); ?>

<style>
  :root{ --page-bg:#ece7e1; --muted:#6b6b6b; }
  body.home{ background:var(--page-bg); }
  .post-title a{ color:#111; text-decoration:none; }
  .post-title a:hover{ text-decoration:underline; }
  /* keep natural ratio but align heights visually */
  .thumb-sm{ max-height:240px; width:100%; object-fit:cover; border-radius:.25rem; }
  .thumb-lg{ max-height:560px; width:100%; object-fit:cover; border-radius:.25rem; }
</style>

<div class="container py-4" >
  <div class="row align-items-start g-3">
      <div class="col-sm-8 mx-auto">
        <div class="row">
            <div class="col-6 col-lg-8">
                <h1 class="fw-bold display-6 m-0"><?php _e('بلاگ','gp-child'); ?></h1>
                <div class="small text-muted">
                    <?php $pc = wp_count_posts('post')->publish;
                    printf( _n('%s پست','%s پست',$pc,'gp-child'), number_format_i18n($pc) ); ?>
                </div>
            </div>
            <div class="col-6 col-lg-4">
                <div class="d-flex align-items-center gap-2 text-muted mt-auto">
                    <span>ترتیب</span>
                    <select class="form-select form-select-sm w-auto"
                            onchange="location.href=this.value">
                    <option value="<?php echo esc_url( home_url('/') ); ?>"><?php _e('جدیدترین','gp-child'); ?></option>
                    <option value="<?php echo esc_url( add_query_arg('orderby','comment_count') ); ?>"><?php _e('پربحث‌ترین','gp-child'); ?></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="container py-5">
  <div class="row g-4">

    <?php
    $q = new WP_Query([
      'post_type'           => 'post',
      'post_status'         => 'publish',
      'ignore_sticky_posts' => true,
      'posts_per_page'      => 12,
    ]);

    while ( $q->have_posts() ) : $q->the_post();

      $is_featured = has_term( 10, 'post_tag', get_the_ID() );    

      // Classes for grid
      $col_class = $is_featured ? 'col-12 col-md-4' : 'col-6 col-md-2';
      // Image sizes
      $img_size  = $is_featured ? 'large' : 'medium';
      $img_class = 'w-100 card-img-top img-fluid';
      ?>
      
      <div class="<?php echo esc_attr( $col_class ); ?>">
        <article class="mb-4">
          <a href="<?php the_permalink(); ?>" class="d-block mb-2">
            <?php if ( has_post_thumbnail() ) {
              the_post_thumbnail( $img_size, [ 'class' => $img_class ] );
            } else { ?>
              <img
                src="<?php echo esc_url( get_stylesheet_directory_uri() . '/placeholder.png' ); ?>"
                class="<?php echo esc_attr( $img_class ); ?>"
                alt="<?php esc_attr_e('Placeholder','gp-child'); ?>">
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
                sprintf( __('%s پیش','gp-child'),
                  human_time_diff( get_the_time('U'), current_time('timestamp') )
                )
              );
            ?>
          </div>
        </article>
      </div>

    <?php endwhile; wp_reset_postdata(); ?>

  </div>
</div>
  

<?php get_footer();
