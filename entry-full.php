<div <?php post_class() ?>>
    <h2><?php the_title(); ?></h2>

    <?php if (has_post_thumbnail()) {
        the_post_thumbnail();
    } ?>

    <div class="entry-content"><?php the_content(); ?></div>

    <div class="entry-links"><?php wp_link_pages(); ?></div>

    <div class="meta"> Posted by: <?php the_author() ?> on <?php the_date(); ?>
        @ <?php the_time() ?> <?php edit_post_link(__('Edit This')); ?><br/>
        <?php _e("Filed under:"); ?> <?php the_category(',') ?>
    </div>
</div>