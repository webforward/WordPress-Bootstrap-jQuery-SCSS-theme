<?php
$button_field = $button_field ?? 'buttons';
if(have_rows($button_field)): ?>
    <div class="buttons">
        <?php while (have_rows($button_field)): the_row();
        $link = get_sub_field('link');
        $target = get_sub_field('target') === '_self' ? '' : get_sub_field('target');
        ?>
            <a class="btn btn-outline arrow <?php the_sub_field('class'); ?>" target="<?php echo $target; ?>" href="<?php echo $link['url'] ?? ''; ?>" title="<?php echo $link['title'] ?? ''; ?>"><?php the_sub_field('text'); ?></a>
            <br />
        <?php endwhile; ?>
    </div>
<?php endif;