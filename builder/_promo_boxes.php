<?php
$col_lg = floor(12 / get_sub_field('columns_lg'));
$col_sm = floor(12 / get_sub_field('columns_sm'));
?>
<div class="my-2 my-sm-5">
    <div class="container">
        <div class="boxes">
            <?php if (have_rows('boxes')): ?>
                <div class="row gy-1">
                    <?php while (have_rows('boxes')):
                        the_row();
                        $link = get_sub_field('link');
                    ?>
                        <div class="col-md-<?php echo $col_sm; ?> col-xl-<?php echo $col_lg; ?>">
                            <a class="box" href="<?php echo $link['url'] ?? ''; ?>" target="<?php echo $link['target'] ?? ''; ?>">
                                <h3 class="m-0 <?php the_sub_field('title_class'); ?>"><?php the_sub_field('title'); ?></h3>
                                <?php if (get_sub_field('image')) : ?>
                                    <div class="image">
                                        <?php echo wp_get_attachment_image(get_sub_field('image'), '600x600'); ?>
                                    </div>
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>