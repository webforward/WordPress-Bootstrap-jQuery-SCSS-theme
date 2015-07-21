<?php

/* `Add Support for Menus
----------------------------------------------------------------------------------------------------*/
require_once('wp-bootstrap-navwalker/wp_bootstrap_navwalker.php');
add_theme_support('menus');
register_nav_menu( 'main-menu', 'Main menu' ); // Create our header menu

/* `Add Support for Post thumbnail
----------------------------------------------------------------------------------------------------*/
add_theme_support('post-thumbnails');
//set_post_thumbnail_size( 800, 800 );

/* `Custom image sizes
----------------------------------------------------------------------------------------------------*/

//add_image_size( 'category-thumb', 300 ); // 300 pixels wide (and unlimited height)
//add_image_size( 'custom-size', 220, 180 ); // 220 pixels wide by 180 pixels tall, soft proportional crop mode
//add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)

/* `Register a sidebar
----------------------------------------------------------------------------------------------------*/

if (function_exists('register_sidebar'))
	register_sidebar(array(
		'name' 			=> 'Sidebar',
		'id'            => 'sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '',
		'after_title'	=> '',
));


/* `Add Bootstrap img-responsive to images in the content and post thumbnail
----------------------------------------------------------------------------------------------------*/

function add_image_responsive_class($content) {
	global $post;
	$pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
	$replacement = '<img$1class="$2 img-responsive"$3>';
	$content = preg_replace($pattern, $replacement, $content);
	return $content;
}
add_filter('the_content', 'add_image_responsive_class');
the_post_thumbnail('thumbnail', array('class' => 'img-responsive'));


/* `Create custom post type
----------------------------------------------------------------------------------------------------*/

//function create_posttypes() {
//	// Example - Testimonials
//	// Don't forget to create single-<post_type>.php and archive-<post_type>.php
//	register_post_type( 'testimonials',
//		// CPT Options
//		array(
//			'labels' => array(
//				'name' => __('Testimonials'),
//				'singular_name' => __( 'Testimonial' )
//			),
//			'public' => true,
//			'has_archive' => true,
//			'rewrite' => array('slug' => 'testimonials'),
//		)
//	);
//}
//add_action('init', 'create_posttypes');


/* `Style the WYSIWYG edtior in the admin
----------------------------------------------------------------------------------------------------*/

//function custom_editor_styles() {
//	add_editor_style('style-editor.css');
//}
//add_action('init', 'custom_editor_styles');


/* `Set your custom excerpt legth.
----------------------------------------------------------------------------------------------------*/

//function custom_excerpt_length($length) {
//	return 30;
//}
//add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/* `The "Read more" link after the excerpt
----------------------------------------------------------------------------------------------------*/

//function new_excerpt_more( $more ) {
//	return '<p><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read more »</a></p>';
//}
//add_filter( 'excerpt_more', 'new_excerpt_more' );

/* `Disable comments completely
----------------------------------------------------------------------------------------------------*/

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');

/* `Customize the login logo url else it will go to WordPress.
----------------------------------------------------------------------------------------------------*/

function custom_loginlogo_url($url) {
	return get_site_url();
}
add_filter( 'login_headerurl', 'custom_loginlogo_url' );

/* `Customize the login logo.
----------------------------------------------------------------------------------------------------*/

//function my_login_logo() {
//    echo '<style type="text/css">
//       #login h1 a {
//		   background-image:url('.get_bloginfo('stylesheet_directory').'/images/login_logo.png) !important;
//		   background-size: 320px 99px !important; height: 99px !important; width: 320px !important;
//       }
//    </style>';
//}
//add_action('login_head', 'my_login_logo');


/* `Customize the login page.
----------------------------------------------------------------------------------------------------*/

//function my_login_stylesheet() {
//	wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/style-login.css' );
//}
//add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


/* `Powered by message on login page.
----------------------------------------------------------------------------------------------------*/

function my_login_message() {
	$message = '<div id="poweredby" style="position:absolute;bottom:10px;right:10px">Powered by <a href="http://www.webfwd.co.uk/" target="_blank">Webforward</a></div>';
	return $message;
}
add_filter('login_message', 'my_login_message');


/* `Let's clean up WordPress meta head.
----------------------------------------------------------------------------------------------------*/

remove_action('wp_head', 'wp_generator');                               // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'rsd_link');									// Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link');							// Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); 							// Display the index link
remove_action('wp_head', 'feed_links', 2);								// Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'feed_links_extra', 3);						// Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);		// Display the prev,start links
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);				// Display the short url of the ucrrent page
add_filter('login_errors', 'show_less_login_info');                     // Show less info to users on failed login for security
add_filter('the_generator', 'no_generator');	                        // Do not generate and display WordPress version
// Remove Emoji support in new Wordpress 4.2
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
// Remove .recentcomments from the WP Head
add_action( 'widgets_init', 'my_remove_recent_comments_style' );
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'  ) );
}

/* `Add more functions
----------------------------------------------------------------------------------------------------*/

?>
