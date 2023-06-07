<?php
$image = wp_get_attachment_image_src(get_field('people_image', 'option'), '1000x350');
?>
<section class="homepage-people py-2 text-center" style="background-image: url('<?php echo $image[0]; ?>'); background-color: <?php the_field('people_background_colour'); ?>">
    <div class="col-md-6 mx-auto px-2">
        <h3 class="mb-1"><?php the_field('people_title'); ?></h3>
        <p class="fw-bold mb-1"><?php the_field('people_text'); ?></p>
        <div>
            <?php
            $button_field = 'people_buttons';
            require get_template_directory() . '/snippets/buttons.php';
            ?>
        </div>
    </div>
</section>