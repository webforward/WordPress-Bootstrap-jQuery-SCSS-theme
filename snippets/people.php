<?php
$image = wp_get_attachment_image_src(get_field('people_image', 'option'), '1000x350');
?>
<section class="people" style="background-image: url('<?php echo $image[0]; ?>')"></section>