<?php

use Kucrut\Vite;

require 'vendor/autoload.php';

// Disable Automatic Updates
const WP_AUTO_UPDATE_CORE = false; // Disables automatic wordpress core updates.
const CORE_UPGRADE_SKIP_NEW_BUNDLED = true; // Disables installation of twentytwenty* themes.

//flush_rewrite_rules(); // Dont forget to turn this off when you go live - this is for debugging slug/permalink issues.

/* `Output the template name in the footer
----------------------------------------------------------------------------------------------------*/

//add_action('get_footer', function () {
//    global $template;
//    echo basename($template);
//});

/* `Output the bootstrap responsive size in the header
----------------------------------------------------------------------------------------------------*/

add_action('wp_head', function () {
    echo '<div style="position: fixed; z-index:9999; color:red"><div class="d-block d-sm-none">XS</div>
    <div class="d-none d-sm-block d-md-none">SM</div><div class="d-none d-md-block d-lg-none">MD</div>
    <div class="d-none d-lg-block d-xl-none">LG</div><div class="d-none d-xl-block">XL</div></div>';
});


/* `Theme Settings Support - Buy ACF Pro - It's Amazing!
----------------------------------------------------------------------------------------------------*/

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

//	acf_add_options_sub_page(array(
//		'page_title' 	=> 'Footer Box Settings',
//		'menu_title'	=> 'Footer Boxes',
//		'parent_slug'	=> 'theme-settings',
//	));
}

/* `Enquire Vite resources
----------------------------------------------------------------------------------------------------*/
add_action('wp_enqueue_scripts', function () {
    Vite\enqueue_asset(
        __DIR__ . '/build',
        'src/theme.js',
        [
            'in-footer' => true
        ]
    );
});

/* `Enquire Custom JavaScript resources
----------------------------------------------------------------------------------------------------*/

//add_action('wp_enqueue_scripts', function () {
//    wp_enqueue_script('functionsjs', get_template_directory_uri() . '/functions.js', array('jquery'), '1.0.0', true);
//});

/* `Enquire Custom CSS resources
----------------------------------------------------------------------------------------------------*/

//add_action('wp_enqueue_scripts', function () {
//    wp_enqueue_style('style', get_template_directory_uri() . '/style.min.css');
//}, 99);

/* `Add Support for Menus
----------------------------------------------------------------------------------------------------*/
add_theme_support('menus');
register_nav_menu('main-menu', 'Navigation'); // Create our header menu

/* `Add Support for Post thumbnail
----------------------------------------------------------------------------------------------------*/
add_theme_support('post-thumbnails');
//set_post_thumbnail_size( 800, 800 );

/* `Custom image sizes
----------------------------------------------------------------------------------------------------*/

//add_image_size( 'category-thumb', 300 ); // 300 pixels wide (and unlimited height)
//add_image_size( 'custom-size', 220, 180 ); // 220 pixels wide by 180 pixels tall, soft proportional crop mode
//add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)

/* `Add SVG support in the WordPress media uploader
----------------------------------------------------------------------------------------------------*/

add_filter('upload_mimes', function($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

/* `Register widgets
----------------------------------------------------------------------------------------------------*/

add_action('widgets_init', function () {
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));
});

/* `Restore Classic Editor in the admin (replaces Gutenberg)
----------------------------------------------------------------------------------------------------*/

add_filter('use_block_editor_for_post', '__return_false', 10);

/* `Restore Classic Widgets in the admin (replaces Widget blocks)
----------------------------------------------------------------------------------------------------*/

add_action('after_setup_theme', function () {
    remove_theme_support('widgets-block-editor');
});

/* `Add Bootstrap img-fluid to images in the content and post thumbnail
----------------------------------------------------------------------------------------------------*/

add_filter('the_content', function ($content) {
    global $post;
    $pattern = "/<img(.*?)class=\"(.*?)\"(.*?)>/i";
    $replacement = '<img$1class="$2 img-fluid"$3>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
});
the_post_thumbnail('thumbnail', array('class' => 'img-fluid'));

/* `Stop Contact Form 7 from automatically adding P tags
----------------------------------------------------------------------------------------------------*/

//add_filter('wpcf7_autop_or_not', '__return_false'); 

/* `Create custom post type
----------------------------------------------------------------------------------------------------*/

//add_action('init', function () {
//    // Example - Testimonials
//    // Don't forget to create single-<post_type>.php and archive-<post_type>.php
//    register_post_type('testimonial',
//        // CPT Options
//        array(
//            'labels' => array(
//                'name' => __('Testimonials'),
//                'singular_name' => __('Testimonial')
//            ),
//            'public' => true,
//            'has_archive' => true,
//            'rewrite' => array('slug' => 'testimonials'),
//        )
//    );
//
//    register_taxonomy('sector', array('testimonial'), array(
//        'hierarchical' => true,
//        'labels' => array(
//            'name' => __('Sectors'),
//            'singular_name' => __('Sector')
//        ),
//        'show_ui' => true,
//        'show_admin_column' => true,
//        'query_var' => true,
//        'rewrite' => array('slug' => 'sector'),
//    ));
//});

/* `Show Post Type in admin menus
----------------------------------------------------------------------------------------------------*/

//add_action('admin_head-nav-menus.php', function () {
//    add_meta_box('add-cpt', 'Custom Post Types', function () {
//        $post_types = get_post_types(array('show_in_nav_menus' => true, 'has_archive' => true), 'object');
//
//        if ($post_types) :
//            foreach ($post_types as &$post_type) {
//                $post_type->classes = array();
//                $post_type->type = $post_type->name;
//                $post_type->object_id = $post_type->name;
//                $post_type->title = $post_type->labels->name;
//                $post_type->object = 'wfd-archive';
//            }
//            $walker = new Walker_Nav_Menu_Checklist(array());
//
//            echo '<div id="wfd-archive" class="posttypediv">';
//            echo '<div id="tabs-panel-wfd-archive" class="tabs-panel tabs-panel-active">';
//            echo '<ul id="ctp-archive-checklist" class="categorychecklist form-no-clear">';
//            echo walk_nav_menu_tree(array_map('wp_setup_nav_menu_item', $post_types), 0, (object)array('walker' => $walker));
//            echo '</ul>';
//            echo '</div>';
//            echo '</div>';
//            echo '<p class="button-controls">';
//            echo '<span class="add-to-menu">';
////		echo '<img class="waiting" src="' . esc_url( admin_url( 'images/wpspin_light.gif' ) ) . '" alt="" />';
//            echo '<input type="submit"' . disabled($nav_menu_selected_id, 0) . ' class="button-secondary submit-add-to-menu" value="' . 'Add to Menu' . '" name="add-ctp-archive-menu-item" id="submit-wfd-archive" />';
//            echo '</span>';
//            echo '</p>';
//        endif;
//    }, 'nav-menus', 'side', 'default');
//});

//add_filter('wp_get_nav_menu_items', function ($items, $menu, $args) {
//    foreach ($items as &$item) {
//        if ($item->object != 'wfd-archive') continue;
//        $item->url = get_post_type_archive_link($item->type);
//
//        if (get_query_var('post_type') == $item->type) {
//            $item->classes[] = 'current-menu-item';
//            $item->current = true;
//        }
//    }
//    return $items;
//}, 10, 3);

/* `Set your custom excerpt length
----------------------------------------------------------------------------------------------------*/

//add_filter('excerpt_length', function ($length) {
//    return 30;
//}, 999);

/* `The "Read more" link after the excerpt
----------------------------------------------------------------------------------------------------*/

//add_filter('excerpt_more', function ($more) {
//    return '<p><a class="read-more" href="' . get_permalink(get_the_ID()) . '">Read more »</a></p>';
//});

/* `Disable comments completely
----------------------------------------------------------------------------------------------------*/

// Disable support for comments and trackbacks in post types
add_action('admin_init', function () {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', function () {
    return false;
}, 20, 2);
add_filter('pings_open', function () {
    return false;
}, 20, 2);

// Hide existing comments
add_filter('comments_array', function ($comments) {
    $comments = array();
    return $comments;
}, 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Redirect any user trying to access comments page
add_action('admin_init', function () {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
});

// Remove comments metabox from dashboard
add_action('admin_init', function () {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

/* `Customize the login logo url. By default, it goes to wordpress.org
----------------------------------------------------------------------------------------------------*/

add_filter('login_headerurl', function ($url) {
    return get_site_url();
});

/* `Customize the login logo
----------------------------------------------------------------------------------------------------*/

//add_action('login_head', function () {
//    echo '<style type="text/css">
//       #login h1 a {
//		   background-image:url(' . get_bloginfo('stylesheet_directory') . '/images/login_logo.png) !important;
//		   background-size: 320px 99px !important; height: 99px !important; width: 320px !important;
//       }
//    </style>';
//});


/* `Customize the login page
----------------------------------------------------------------------------------------------------*/

add_action('login_enqueue_scripts', function () {
    Vite\enqueue_asset(
        __DIR__ . '/build',
        'src/login.js',
        [
            'css-only' => true
        ]
    );
});

/* `Powered by message on login page
----------------------------------------------------------------------------------------------------*/

add_filter('login_message', function () {
    $message = '<div id="poweredby" style="position:absolute;bottom:10px;left:0;width:100vw;text-align:center">Powered by <a href="https://www.webfwd.co.uk/" target="_blank">Webforward</a></div>';
    return $message;
});

/* `Give 'Posts' a custom name in the admin
----------------------------------------------------------------------------------------------------*/

//add_action('admin_menu', function () {
//    global $menu;
//    global $submenu;
//    $menu[5][0] = 'News';
//});

/* `Fix translate bug in Chrome v45
----------------------------------------------------------------------------------------------------*/

add_action('admin_enqueue_scripts', function () {
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false)
        wp_add_inline_style('wp-admin', '#adminmenu { transform: translateZ(0); }');
});

/* `Remove unwanted widgets.
----------------------------------------------------------------------------------------------------*/

add_action('widgets_init', function () {
//	unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
//	unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
//	unregister_widget('WP_Widget_Text');
//	unregister_widget('WP_Widget_Categories');
//	unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
//	unregister_widget('WP_Nav_Menu_Widget');
}, 11);

/* `Let's clean up WordPress meta head
----------------------------------------------------------------------------------------------------*/

add_filter('xmlrpc_enabled', '__return_false');                             // Disable XML RPC

remove_action('wp_head', 'wp_generator');                                   // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'rsd_link');                                       // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link');                               // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link');                                 // Display the index link
remove_action('wp_head', 'feed_links', 2);                           // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'feed_links_extra', 3);                     // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);  // Display the prev,start links
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);             // Display the short url of the ucrrent page
add_filter('the_generator', 'no_generator');                                // Do not generate and display WordPress version
// Remove Emoji support in new Wordpress 4.2
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
// Remove .recentcomments from the WP Head
add_action('widgets_init', function () {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
});

// Remove wp-json
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('template_redirect', 'rest_output_link_header', 11);
// Remove dns-prefetch Link from WordPress Head (Frontend)
remove_action('wp_head', 'wp_resource_hints', 2);

/* `Force admin bar to appear on the frontend
----------------------------------------------------------------------------------------------------*/

add_action('init', function () {
    if (is_user_logged_in()) {
        add_filter('show_admin_bar', '__return_true', 1000);
    }
});
/* `Remove Gutenberg block library from loading inline on the frontend
----------------------------------------------------------------------------------------------------*/

add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // Remove WooCommerce Block Styles
    wp_dequeue_style('global-styles'); // Remove theme.json
    wp_dequeue_style('classic-theme-styles'); // Remove Class Theme Styles
}, 100);

/* `Add data-turbo="false" to all admin bar links so that Turbo does not mess with the admin
----------------------------------------------------------------------------------------------------*/

add_action('wp_before_admin_bar_render', function () {
    echo '<div data-turbo="false">';
});
add_action('wp_after_admin_bar_render', function () {
    echo '</dev>';
});

/* `Example shortcode
----------------------------------------------------------------------------------------------------*/
//add_shortcode('button', function ($atts) {
//    $default = array(
//        'link' => '#',
//        'text' => 'My Button',
//        'class' => '',
//        'target' => ''
//    );
//    $atts = shortcode_atts($default, $atts);
//    return '<a class="btn ' . ($atts['class'] ? ' ' . $atts['class'] : '') . '" target="' . $atts['target'] . '" href="' . $atts['link'] . '">' . $atts['text'] . '</a>';
//});