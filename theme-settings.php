<?php

add_action( 'admin_menu', 'tploptions_add_admin_menu' );
add_action( 'admin_init', 'tploptions_settings_init' );

function get_tploption($field) {
    global $tploptions;
    $options = get_option("tploptions_settings");
    return $options[$tploptions['field_prefix'].'_'.$field];
}
function the_tploption($field) {
    echo get_tploption($field);
}

///

function tploptions_add_admin_menu() {
    global $tploptions;
    add_menu_page($tploptions['menu_title'], $tploptions['menu_title'], 'manage_options', 'tploptions_settings', 'tploptions_options_page' );
}

function tploptions_settings_init() {
    // This displays the settings page
    global $tploptions, $tploption_fields;
    register_setting( 'tploptions', 'tploptions_settings' );
    add_settings_section('tploptions_section', '', 'tploptions_settings_section_callback', 'tploptions');
    $x=0;
    foreach ($tploption_fields as $f) {
        list($type, $slug, $title, $args) = $f;
        $id = $tploptions['field_prefix'].'_'.$f[1];
        add_settings_field($id, $title, $id.'_render', 'tploptions', 'tploptions_section', $args);
        $x++;
    }
};

$x=0;
foreach ($tploption_fields as $f) {
    $id = $tploptions['field_prefix'].'_'.$f[1];
    switch ($f[0]) {
        case 'textfield':
            $fn = '
                function '.$id.'_render() {
                    global $tploptions;
                    $options = get_option("tploptions_settings");
                    echo "<input type=\"text\" name=\"tploptions_settings['.$id.']\" value=\"".$options["'.$id.'"]."\" style=\"width: 100%\">";
                    if ($tploptions["debug"]) { echo "</td><td><span style=\"color: #999\"> <em>use </em>get_tploption(\"'.str_replace($tploptions['field_prefix'].'_', '', $id).'\")<em> to display this field.</em></span>"; }
                }
            ';
            break;
    }

    eval($fn);
    $x++;
}

function tploptions_settings_section_callback() {
    global $tploptions;
    echo $tploptions['page_description'];
}

function tploptions_options_page(  ) {
    global $tploptions;

    echo '<form action="options.php" method="post">';
    echo '<h2>'.$tploptions['page_title'].'</h2>';
    settings_fields( 'tploptions' );
    do_settings_sections( 'tploptions' );
    submit_button();
    echo '</form>';

}
