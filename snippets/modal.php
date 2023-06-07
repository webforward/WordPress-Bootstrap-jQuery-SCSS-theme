<?php
if (get_field('enable_modal', 'options')){
    echo '<div class="alert-modal d-none">';
    echo '<div class="content">';
    echo '<div class="close"><p>Close</p> <img src="'.get_stylesheet_directory_uri().'/images/close.svg" class="img-fluid"/></div>';
    echo '<div class="title">';
    echo get_field('modal_title', 'options');
    echo '</div>';
    echo '<div class="text">';
    echo get_field('modal_text', 'options');
    echo '</div>';
    echo '<div class="buttons">';
                            echo '<a href="tel:01983475006">01983 475006</a>';
    echo '<a href="mailto:askus@smarttar.co.uk">Email askus@smarttar.co.uk</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}