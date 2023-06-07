<?php
    $col_lg = floor(12 / get_sub_field('columns_lg'));
    $col_sm = floor(12 / get_sub_field('columns_sm'));
?>
<div class="my-2 my-sm-5<?php echo get_sub_field('overflow') ? ' overflow' : ''; ?>">
    <div class="container-fluid py-2 py-sm-3" style="background-color: <?php the_sub_field('background_colour'); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-6 ">
                    <h3 style="color: <?php the_sub_field('title_colour'); ?>"><?php the_sub_field('title'); ?></h3>
                </div>
            </div>

            <div class="boxes">
                <?php
                if (have_rows('boxes')): ?>
                    <div class="row">
                        <?php while (have_rows('boxes')): the_row(); ?>
                            <div class="col-md-<?php echo $col_sm; ?> col-xl-<?php echo $col_lg; ?> gy-1">
                                <div class="box">
                                    <?php if (get_sub_field('icon')) : ?>
                                    <div class="image mb-1">
                                        <?php echo wp_get_attachment_image(get_sub_field('icon'), '100x100'); ?>
                                    </div>
                                    <?php endif; ?>

                                    <h4 class="m-0 <?php the_sub_field('title_class'); ?>"><?php the_sub_field('title'); ?></h4>

                                    <?php if (strlen(get_sub_field('text')) > 20) : ?>
                                        <div class="my-1 editable-content">
                                            <?php the_sub_field('text'); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div>
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
    </div>
</div>