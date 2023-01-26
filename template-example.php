<?php
/*
Template Name: Example
*/
get_header(); ?>
<div class="container">
    <div class="row">
        <div id="content" class="col-md-9">
            <h1><?php the_title(); ?></h1>
            <div>
                <?php the_content(); ?>
            </div>
        </div>
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
