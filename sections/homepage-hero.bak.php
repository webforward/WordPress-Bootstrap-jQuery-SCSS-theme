<section class="homepage-hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mt-1 mt-sm-2">
                <div class="content">
                    <h1 class="my-1"><?php the_field('hero_title'); ?></h1>
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
            <div class="col-lg-6 col-md-4">
                <div class="fingers">
                    <?php
                    if( have_rows('right_bar_links') ):
                        while( have_rows('right_bar_links') ) : the_row();
                            $name = get_sub_field('name');
                            $link = get_sub_field('link');
                            echo '<a href="'.$link.'"><em>'.$name.'</em></a>';
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>