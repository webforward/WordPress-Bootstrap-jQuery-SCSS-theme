<?php
/*
Template Name: Page Builder
*/
get_header();
if (have_posts()) : while (have_posts()) : the_post();
    require 'sections/headline.php';
    require 'builder/builder.php';
endwhile;
endif;
get_footer();
