<?php
$position = get_sub_field('position');
?>
<div class="my-2 my-sm-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 <?php echo $position==='left'?'order-md-0 pe-md-2 pe-lg-4':'order-md-1 ps-md-2 ps-lg-4' ?>">
                <div class="image">
                    <?php echo wp_get_attachment_image( get_sub_field('image'), '600x600' ); ?>
                </div>
            </div>
            <div class="col-lg-6 <?php echo $position==='left'?'order-md-1':'order-md-0' ?>">
                <div class="content">
                    <h3 class="m-0"><?php the_sub_field('title'); ?></h3>
                    <div class="my-1 editable-content">
                        <?php the_sub_field('text'); ?>
                    </div>
                    <div>
                        <?php
                        $button_field = 'buttons';
                        require get_template_directory() . '/snippets/buttons.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>