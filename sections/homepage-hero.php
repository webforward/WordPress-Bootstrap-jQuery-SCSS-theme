<section class="homepage-hero">
    <div class="container mt-1">
        <div class="row">
            <div class="col-lg-6 col-md-8 mt-1 mt-sm-2">
                <div class="content">
                    <h1 class="mb-1"><?php the_field('hero_title'); ?></h1>
                    <div class="my-1">
                        <?php the_field('hero_text'); ?>
                    </div>
                    <div class="my-1">
                        <?php
                        $button_field = 'hero_buttons_buttons';
                        require get_template_directory() . '/snippets/buttons.php';
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-4">
                <div class="boxes mt-1 mt-sm-2">
                    <?php if (have_rows('hero_boxes')): ?>
                        <?php while (have_rows('hero_boxes')):
                            the_row();
                            $link = get_sub_field('link');
                            ?>
                            <a class="box mb-1" href="<?php echo $link['url'] ?? ''; ?>"
                               target="<?php echo $link['target'] ?? ''; ?>">
                                <h4 class="m-0 <?php the_sub_field('title_class'); ?>"><?php the_sub_field('title'); ?></h4>
                                <?php if (get_sub_field('image')) : ?>
                                    <div class="image">
                                        <?php echo wp_get_attachment_image(get_sub_field('image'), '600x600'); ?>
                                    </div>
                                <?php endif; ?>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>