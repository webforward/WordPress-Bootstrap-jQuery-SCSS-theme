<a class="item-programme" href="<?php the_permalink(); ?>" style="display: flex">
    <div class="image">
        <?php echo wp_get_attachment_image( get_field('icon'), '100x100' ); ?>
    </div>

    <?php
    $sectors = get_the_terms( get_the_ID(), 'sectors' );
    if (isset($sectors[0])) echo '<p>'.esc_html($sectors[0]->name).'</p>';
    ?>
    <h4><?php the_title(); ?></h4>
    <p class="m-0">
        <span class="btn btn-sm btn-outline arrow btn-theme">See Course</span>
    </p>
</a>