<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div id="content" class="col-md-9">
                <div id="post-entries">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                            <h2 class="storytitle"><?php the_title(); ?></h2>
                            <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                            <div class="entry-content"><?php the_content(); ?></div>
                            <div class="entry-links"><?php wp_link_pages(); ?></div>

                            <div class="meta"> Posted by: <?php the_author() ?> on <?php the_date(); ?> @ <?php the_time() ?> <?php edit_post_link(__('Edit This')); ?><br/>
                                <?php _e("Filed under:"); ?> <?php the_category(',') ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                <?php endwhile; endif; ?>
                </div>
            </div>
            <div class="col-md-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>