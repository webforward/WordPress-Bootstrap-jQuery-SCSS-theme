<?php
$features_field = $features_field ?? 'features';
if(have_rows($features_field)): ?>
    <ul class="features border-theme">
        <?php while (have_rows($features_field)): the_row(); ?>
            <li><strong class="text-theme"><?php the_sub_field('key'); ?>:</strong> <?php the_sub_field('value'); ?></li>
        <?php endwhile; ?>
    </ul>
<?php endif;