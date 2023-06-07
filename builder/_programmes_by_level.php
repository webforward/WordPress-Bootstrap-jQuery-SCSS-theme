<section class="programmes_by_level">
    <div class="my-1 my-sm-3 py-3">
        <div class="container">

            <?php
            $terms = get_sub_field('levels');
            if ($terms): ?>
                <?php foreach ($terms as $term): ?>
                    <h3><?php echo esc_html($term->name); ?></h3>
                    <?php
                    $args = array(
                        'post_type' => 'programmes',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'levels',
                                'field' => 'term_id',
                                'terms' => $term->term_id
                            )
                        ),
                        'order' => 'ASC',
                        'orderby' => 'title',
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) : ?>
                        <div class="programmes row mb-2">
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="col-md-3 gy-1">
                                    <?php require get_template_directory() . '/item-programme.php'; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                <?php endforeach; ?>
            <?php endif; wp_reset_query(); ?>

        </div>
    </div>
</section>