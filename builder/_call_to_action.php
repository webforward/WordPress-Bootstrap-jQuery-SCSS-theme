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
                <div class="right_text bg-white p-2 h-100 editable-content">
                    <?php the_sub_field('right_text'); ?>
                </div>

            </div>
        </div>
    </div>
</div>