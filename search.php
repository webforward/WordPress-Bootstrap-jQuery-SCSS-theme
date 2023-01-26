<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div id="content" class="col-md-9">
                <?php require 'search-form.php'; ?>
                
                <div class="posts">
                    <?php
                    if (have_posts())
                        while (have_posts()) {
                            the_post();
                            require 'entry.php';
                        }
                    else
                        _e('<div>Sorry, no posts matched your criteria.</div>');
                    ?>
                </div>
            </div>
            <div class="col-md-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>