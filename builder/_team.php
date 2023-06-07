<div class="my-2 my-sm-5">
    <div class="container">
        <?php if (have_rows('team_members')): ?>
            <div class="row">
                <?php while (have_rows('team_members')): the_row(); ?>
                    <div class="col-sm-6 col-lg-4 col-xl-3 gy-1">
                        <div class="item">
                            <div class="image">
                                <?php echo wp_get_attachment_image(get_sub_field('image'), '100x100'); ?>
                            </div>
                            <div class="content">
                                <h4 class="m-0"><?php the_sub_field('name'); ?></h4>
                                <p class="m-0"><?php the_sub_field('job_title'); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>