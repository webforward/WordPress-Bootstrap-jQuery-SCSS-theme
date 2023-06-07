<div class="my-2 my-sm-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 pe-md-2">
                <h3><?php the_sub_field('title'); ?></h3>
            </div>
            <div class="col-md-9">
                <?php
                $programmes = get_sub_field('programmes');
                if ($programmes): ?>
                    <div class="slider programmes">
                        <?php foreach ($programmes as $post):
                        require get_template_directory() . '/item-programme.php';
                        endforeach; ?>
                    </div>
                    <?php
                    wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>