<div class="my-2 my-sm-5<?php echo get_sub_field('overflow') ? ' overflow' : ''; ?>" style=" background-color: <?php the_sub_field('background_colour'); ?>">
    <div class="container<?php echo get_sub_field('background_colour') ? ' py-2 py-sm-3':''; ?>">
        <div class="row">
            <div class="col-lg-4" style="color: <?php the_sub_field('text_colour'); ?>">
                <h3 class="mb-1"><?php the_sub_field('title'); ?></h3>
                <div class="my-1 editable-content">
                    <?php the_sub_field('text'); ?>
                </div>
                <div class="my-1">
                    <?php
                    $button_field = 'buttons';
                    require get_template_directory() . '/snippets/buttons.php';
                    ?>
                </div>
            </div>
            <div class="col-lg-7 offset-md-1">
                <div class="testimonials">
                    <?php
                    $the_query = new WP_Query(array(
                        'post_type' => 'testimonials',
                        'posts_per_page' => get_sub_field('posts_per_page'),
                        'orderby' => get_sub_field('order_by'),
                        'sortby' => 'DESC',
                    ));

                    if ($the_query->have_posts()): ?>
                        <div class="testimonials">
                            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                                <div class="testimonial">
                                    <div>
                                        <span class="quote">&quot;</span>
                                        <?php echo strip_tags(get_the_content()); ?>
                                        <span class="quote">&quot;</span>
                                    </div>
                                    <p class="fw-bold text-theme m-0 mt-1"><?php the_title(); ?></p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <?php wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>