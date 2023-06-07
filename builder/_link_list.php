<div class="my-2 my-sm-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
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
            <div class="col-lg-7 offset-lg-1">
                <?php if( have_rows('links') ): ?>
                    <ul class="links">
                        <?php while( have_rows('links') ): the_row();  ?>
                            <li><a class="border-theme" href="<?php the_sub_field('link'); ?>">
                                    <span class="image">
                                        <?php echo wp_get_attachment_image( get_sub_field('icon'), '100x100' ); ?>
                                    </span>
                                    <?php the_sub_field('title'); ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>