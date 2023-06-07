<div id="sidebar">
    <div class="sidebar-contents">
        <?php while (have_rows('sidebar_menus')): the_row(); ?>
            <div class="menu-container">
                <h6 class="text-theme"><?php the_sub_field('title'); ?></h6>

                <?php wp_nav_menu([
                    'menu' => get_sub_field('menu')
                ]); ?>
            </div>
        <?php endwhile; ?>
    </div>
</div>