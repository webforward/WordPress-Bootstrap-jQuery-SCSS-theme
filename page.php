<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div id="content" class="col-md-9">
                <div class="posts">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div <?php post_class() ?>>
                            <h1><?php the_title(); ?></h1>

                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
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