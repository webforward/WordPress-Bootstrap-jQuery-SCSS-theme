<?php get_header(); ?>

<?php require 'sections/headline.php'; ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="container">

        <div class="mb-2 mb-sm-5">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="h3"><?php the_field('text'); ?></h2>
                    <div class="my-1">
                        <?php
                        $button_field = 'buttons_buttons';
                        require get_template_directory() . '/snippets/buttons.php';
                        ?>
                    </div>
                </div>
                <div class="col-md-7 offset-md-1">
                    <h3 class="h4">Key Facts:</h3>
                    <div class="my-1">
                        <?php
                        $button_field = 'facts';
                        require get_template_directory() . '/snippets/features.php';
                        ?>
                    </div>


                    <h3 class="h4 my-1">Apprenticeship Overview:</h3>

                    <div class="editable-content">
                        <?php the_field('overview'); ?>
                    </div>

                    <?php if (get_field('accordion_title')) { ?>
                        <h4 class="my-1"><?php the_field('accordion_title'); ?></h4>
                    <?php } ?>
                    <?php if( have_rows('accordion_accordion') ): $acc = rand(0,99999); $i=0; ?>
                        <div class="accordion" id="accordion<?php echo $acc; ?>">
                            <?php while( have_rows('accordion_accordion') ): the_row();
                                $iteration = $acc.'-'.(++$i);
                                $open = false;
//                                $open = ($i===1);
                                ?>
                                <div class="accordion-item border-theme">
                                    <div class="accordion-header" id="heading<?php echo $iteration; ?>">
                                        <button class="h4 accordion-button<?php echo $open?'':' collapsed'; ?>"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse<?php echo $iteration; ?>"
                                                aria-expanded="<?php echo $i===1?'true':'false'; ?>"
                                                aria-controls="collapse<?php echo $iteration; ?>"
                                        >
                                            <?php the_sub_field('title'); ?>
                                        </button>
                                    </div>
                                    <div id="collapse<?php echo $iteration; ?>"
                                         class="accordion-collapse collapse <?php echo $open?'show':'collapsed'; ?>"
                                         aria-labelledby="heading<?php echo $iteration; ?>"
                                         data-bs-parent="#accordion<?php echo $acc; ?>">
                                        <div class="accordion-body editable-content">
                                            <?php the_sub_field('text'); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <section class="discover_boxes">
        <div class="mb-2 mb-sm-5 overflow">
            <div class="container-fluid py-2 py-sm-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xl-6">
                            <h3><?php
                                $title = get_field('cta_title', 'option');
                                echo str_replace('{{title}}', get_the_title(), $title);
                                ?></h3>
                        </div>
                    </div>

                    <div class="boxes">
                        <?php
                        if (have_rows('cta_boxes', 'option')): ?>
                            <div class="row">
                                <?php while (have_rows('cta_boxes', 'option')): the_row(); ?>
                                    <div class="col-md-6 gy-1">
                                        <div class="box">
                                            <?php if (get_sub_field('icon')) : ?>
                                                <div class="image mb-1">
                                                    <?php echo wp_get_attachment_image(get_sub_field('icon'), '100x100'); ?>
                                                </div>
                                            <?php endif; ?>

                                            <h3 class="m-0 <?php the_sub_field('title_class'); ?>"><?php the_sub_field('title'); ?></h3>

                                            <?php if (strlen(get_sub_field('text')) > 20) : ?>
                                                <div class="mt-1 editable-content">
                                                    <?php the_sub_field('text'); ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="mt-1">
                                                <?php
                                                $button_field = 'buttons';
                                                require get_template_directory() . '/snippets/buttons.php';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="related_programmes">
        <div class="my-1 my-sm-3">
            <div class="container">
                <h3>Related Courses:</h3>

                <?php
                $programmes = get_field('related');
                if ($programmes): ?>
                    <div class="programmes row">
                        <?php foreach ($programmes as $post): ?>
                            <div class="col-md-3 gy-1">
                                <?php require get_template_directory() . '/item-programme.php'; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php
                    wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>