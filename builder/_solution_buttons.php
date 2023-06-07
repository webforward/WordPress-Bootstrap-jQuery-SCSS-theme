<div class="my-2 my-sm-5">
    <div class="container">
        <h3 class="mb-1"><?php the_sub_field('title'); ?></h3>
        <div class="my-1 editable-content">
            <?php the_sub_field('text'); ?>
        </div>
        <div class="d-none d-sm-block">
            <div class="row gx-1">
                <?php if (have_rows('column')): ?>
                    <?php while (have_rows('column')):
                        the_row();
                        $theme = get_sub_field('theme')
                        ?>
                        <div class="col-md-6 col-lg-4 col-xxl">
                            <?php if (have_rows('buttons')): ?>
                                <?php while (have_rows('buttons')): the_row(); ?>
                                    <div
                                        class="btn w-100 text-theme<?php echo $theme; ?> btn-outline-theme<?php echo $theme;; ?>">
                                        <?php the_sub_field('text'); ?>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
