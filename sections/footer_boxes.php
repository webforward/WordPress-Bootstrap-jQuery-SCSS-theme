<section class="footer_boxes my-2 my-sm-3">
    <div class="container">
        <div class="boxes">
            <?php
            if (have_rows('fb_boxes', 'option')): ?>
                <div class="row">
                    <?php while (have_rows('fb_boxes', 'option')): the_row(); ?>
                        <div class="col-lg-4 gy-1">
                            <div class="box">
                                <?php if (get_sub_field('icon')) : ?>
                                    <div class="image mb-1">
                                        <?php echo wp_get_attachment_image(get_sub_field('icon'), '100x100'); ?>
                                    </div>
                                <?php endif; ?>

                                <h4 class="h3 m-0 <?php the_sub_field('title_class'); ?>"><?php the_sub_field('title'); ?></h4>

                                <?php if (strlen(get_sub_field('text')) > 20) : ?>
                                    <div class="mt-1 editable-content">
                                        <?php the_sub_field('text'); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="mt-1">
                                    <?php
                                    $button_field = 'buttons';
                                    require get_template_directory() . '/snippets/buttons.php';
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>