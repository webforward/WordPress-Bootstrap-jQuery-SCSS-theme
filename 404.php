<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div id="content" class="col-md-9">
                <div id="post-entries">
                    <div class="notfound">
                        <h2 class="storytitle">Error 404 - Not Found</h2>

                        <div class="entry-content">The page you were looking for has either been deleted or moved.</div>

                        <?php require_once(TEMPLATEPATH . "/searchform.php"); ?>
                    </div>
                </div>
        </div>
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
