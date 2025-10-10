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
        if ($tags) {
            $tags = array_slice($tags, 0, 2);
            foreach ($tags as $t) {
                echo '<a class="btn btn-outline-dark btn-sm rounded-0" href="' . esc_url(get_tag_link($t)) . '">' . esc_html($t->name) . '</a>';
            }
        } else {
            $cats_small = array_slice(get_the_category(), 0, 2);
            foreach ($cats_small as $c) {
                echo '<a class="btn btn-outline-dark btn-sm rounded-0" href="' . esc_url(get_category_link($c)) . '">' . esc_html($c->name) . '</a>';
            }
        }
        ?>
    </div>
</article>