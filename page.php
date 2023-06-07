<?php get_header(); ?>

<?php require 'sections/headline.php'; ?>

    <div class="container">
        <div class="row g-2">
            <div class="col-md-3">
                <?php require get_template_directory() . '/sections/sidebar.php'; ?>
            </div>
            <div class="col-md-9">
                <?php require get_template_directory() . '/snippets/breadcrumbs.php'; ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="editable-content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; endif; ?>
            </div>

        </div>
    </div>
<?php get_footer(); ?>