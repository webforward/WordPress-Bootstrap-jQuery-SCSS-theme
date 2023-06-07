<ul class="social-icons">
    <?php while (have_rows('network', 'option')): the_row(); ?>
    <li>
        <a target="_blank" href="<?php the_sub_field('link'); ?>">
            <?php the_sub_field('svg'); ?>
        </a>
    </li>
    <?php endwhile; ?>
</ul>