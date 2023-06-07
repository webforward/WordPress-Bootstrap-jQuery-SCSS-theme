<?php
/*
Template Name: Landing Page
*/
get_header();
if (have_posts()) : while (have_posts()) : the_post();
    require 'sections/homepage-hero.php';
    require 'builder/builder.php';
endwhile;
endif;
get_footer();