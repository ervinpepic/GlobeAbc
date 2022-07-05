<?php
/**
 * @package 	WordPress
 * @subpackage 	GlobeABC
 * @version		1.1.2
 * 
 * Child Theme Functions File
 * Created by Ervin Pepic
 * 
 */
function language_school_child_enqueue_styles() {
    wp_enqueue_style('language-school-child-style', get_stylesheet_uri(), array('theme-style'), '1.0.0', 'screen, print');
}

add_action('wp_enqueue_scripts', 'language_school_child_enqueue_styles', 11);

function custom_login_stylesheet() {
   wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/login/login-styles.css' );
}
add_action( 'login_enqueue_scripts', 'custom_login_stylesheet' );
//* code goes here

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function wpb_login_logo_url() {
   return home_url();
}
add_filter( 'login_headerurl', 'wpb_login_logo_url' );

function wpb_login_logo_url_title() {
   return 'GlobeABC';
}
add_filter( 'login_headertext', 'wpb_login_logo_url_title' );


function remove_logo_wp_admin() {
   global $wp_admin_bar;
   $wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'remove_logo_wp_admin', 0 );


function custom_login_title($origtitle) { 
    return 'Login Page | ' . get_bloginfo('name');

}
add_filter('login_title', 'custom_login_title', 99);

function custom_admin_title($admin_title, $title) {
   return 'Admin Panel | ' . get_bloginfo('name');
}
add_filter('admin_title', 'custom_admin_title', 10, 2);

function custom_footer_copyright() {
   echo '<span id="footer-thankyou">Developed by Ervin pepic </span>';
}

add_filter('admin_footer_text', 'custom_footer_copyright');

// Function to change email address
function wpb_sender_email( $original_email_address ) {
    return 'globeabc@globeabc.com';
}
 
// Function to change sender name
function wpb_sender_name( $original_email_from ) {
    return 'GlobeAbc';
}

 
// Hooking up our functions to WordPress filters 
add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );
// Disable plugins auto-update UI elements.
add_filter( 'plugins_auto_update_enabled', '__return_false' );
 
// Disable themes auto-update UI elements.
add_filter( 'themes_auto_update_enabled', '__return_false' );
?>
