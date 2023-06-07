<div class="my-2 my-sm-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h3 class="mb-1"><?php the_sub_field('title'); ?></h3>
                <div class="my-1 editable-content">
                    <?php the_sub_field('text'); ?>
                </div>
                <div class="my-1">
                    <?php
                    $button_field = 'buttons';
                    require get_template_directory() . '/snippets/buttons.php';
                    ?>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <?php if( have_rows('accordion') ): $acc = rand(0,99999); $i=0; ?>
                <div class="accordion" id="accordion<?php echo $acc; ?>">
                        <?php while( have_rows('accordion') ): the_row();
                        $iteration = $acc.'-'.(++$i);
                        ?>
                            <div class="accordion-item border-theme">
                                <div class="accordion-header" id="heading<?php echo $iteration; ?>">
                                    <button class="h4 accordion-button<?php echo $i===1?'':' collapsed'; ?>"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse<?php echo $iteration; ?>"
                                            aria-expanded="<?php echo $i===1?'true':'false'; ?>"
                                            aria-controls="collapse<?php echo $iteration; ?>"
                                            >
                                        <?php the_sub_field('title'); ?>
                                    </button>
                                </div>
                                <div id="collapse<?php echo $iteration; ?>"
                                     class="accordion-collapse collapse <?php echo $i===1?'show':'collapsed'; ?>"
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