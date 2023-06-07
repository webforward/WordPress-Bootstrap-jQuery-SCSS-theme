<div class="my-2 my-sm-5">
    <div class="container">
        <div class="text-center">
            <h3 class="my-1"><?php the_sub_field('title'); ?></h3>
            <div class="my-1 editable-content">
                <?php the_sub_field('text'); ?>
            </div>

            <?php
            $images = get_sub_field('images');
            $size = '150x150';
            if ($images): ?>
                <div class="images row">
                    <?php foreach ($images as $image_id): ?>
                        <div class="image col-6 col-md-3 col-lg-2">
                            <?php echo wp_get_attachment_image($image_id, $size); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>