<?php while (have_rows('headline_bar')): the_row(); ?>
    <?php if (get_sub_field('headline_title')): ?>
        <div class="container-fluid mb-3">
            <section class="headline py-2 bg-theme">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section mb-1">
                                        <h6 class="m-0"><?php the_sub_field('headline_section'); ?></h6>
                                    </div>
                                </div>
                                <div class="col-md-5 pe-lg-2">
                                    <h1><?php the_sub_field('headline_title'); ?></h1>
                                </div>
                                <div class="col-md-7">
                                    <p><?php the_sub_field('headline_text'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php endif; ?>
<?php endwhile; ?>