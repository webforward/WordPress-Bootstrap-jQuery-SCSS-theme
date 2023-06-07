<section class="footer_logos my-2 my-sm-3">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-lg-4">
                <h3 class="mt-1 mb-2"><?php the_field('fl_title', 'option'); ?></h3>
            </div>
            <div class="col-md-7 offset-lg-1">
                <?php
                $images = get_field('fl_logos', 'option');
                $size = '150x150';
                if ($images): ?>
                    <div class="images row">
                        <?php foreach ($images as $image_id): ?>
                            <div class="image col-6 col-lg-4 gx-lg-2 gy-1 px-2">
                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>