<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.2.7
 * 
 * Main Theme Functions File
 * Created by CMSMasters
 * 
 */


/*** START EDIT THEME PARAMETERS HERE ***/

// Theme Settings System Fonts List
if (!function_exists('language_school_system_fonts_list')) {
	function language_school_system_fonts_list() {
		$fonts = array( 
			"Arial, Helvetica, 'Nimbus Sans L', sans-serif" => 'Arial', 
			"Calibri, 'AppleGothic', 'MgOpen Modata', sans-serif" => 'Calibri', 
			"'Trebuchet MS', Helvetica, Garuda, sans-serif" => 'Trebuchet MS', 
			"'Comic Sans MS', Monaco, 'TSCu_Comic', cursive" => 'Comic Sans MS', 
			"Georgia, Times, 'Century Schoolbook L', serif" => 'Georgia', 
			"Verdana, Geneva, 'DejaVu Sans', sans-serif" => 'Verdana', 
			"Tahoma, Geneva, Kalimati, sans-serif" => 'Tahoma', 
			"'Lucida Sans Unicode', 'Lucida Grande', Garuda, sans-serif" => 'Lucida Sans', 
			"'Times New Roman', Times, 'Nimbus Roman No9 L', serif" => 'Times New Roman', 
			"'Courier New', Courier, 'Nimbus Mono L', monospace" => 'Courier New', 
		);
		
		
		return $fonts;
	}
}



// Theme Settings Google Fonts List
if (!function_exists('language_school_get_google_fonts_list')) {
	function language_school_get_google_fonts_list() {
		$fonts = array( 
			'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic|Titillium Web', 
			'Roboto:300,300italic,400,400italic,500,500italic,700,700italic|Roboto', 
			'Roboto+Condensed:400,400italic,700,700italic|Roboto Condensed', 
			'Open+Sans:300,300italic,400,400italic,700,700italic|Open Sans', 
			'Open+Sans+Condensed:300,300italic,700|Open Sans Condensed', 
			'Droid+Sans:400,700|Droid Sans', 
			'Droid+Serif:400,400italic,700,700italic|Droid Serif', 
			'Poppins:300,400,500,600,700|Poppins', 
			'PT+Sans:400,400italic,700,700italic|PT Sans', 
			'PT+Sans+Caption:400,700|PT Sans Caption', 
			'PT+Sans+Narrow:400,700|PT Sans Narrow', 
			'PT+Serif:400,400italic,700,700italic|PT Serif', 
			'Ubuntu:400,400italic,700,700italic|Ubuntu', 
			'Ubuntu+Condensed|Ubuntu Condensed', 
			'Headland+One|Headland One', 
			'Source+Sans+Pro:300,300italic,400,400italic,700,700italic|Source Sans Pro', 
			'Lato:400,400italic,700,700italic|Lato', 
			'Cuprum:400,400italic,700,700italic|Cuprum', 
			'Oswald:300,400,700|Oswald', 
			'Yanone+Kaffeesatz:300,400,700|Yanone Kaffeesatz', 
			'Lobster|Lobster', 
			'Lobster+Two:400,400italic,700,700italic|Lobster Two', 
			'Questrial|Questrial', 
			'Raleway:300,400,500,600,700|Raleway', 
			'Dosis:300,400,500,700|Dosis', 
			'Cutive+Mono|Cutive Mono', 
			'Quicksand:300,400,700|Quicksand', 
			'Montserrat:400,700|Montserrat', 
			'Cookie|Cookie', 
		);
		
		
		return $fonts;
	}
}



// Theme Settings Text Transforms List
if (!function_exists('language_school_text_transform_list')) {
	function language_school_text_transform_list() {
		$list = array( 
			'none' => esc_html__('none', 'language-school'), 
			'uppercase' => esc_html__('uppercase', 'language-school'), 
			'lowercase' => esc_html__('lowercase', 'language-school'), 
			'capitalize' => esc_html__('capitalize', 'language-school'),
		);
		
		
		return $list;
	}
}



// Theme Settings Text Decorations List
if (!function_exists('language_school_text_decoration_list')) {
	function language_school_text_decoration_list() {
		$list = array( 
			'none' => esc_html__('none', 'language-school'), 
			'underline' => esc_html__('underline', 'language-school'), 
			'overline' => esc_html__('overline', 'language-school'), 
			'line-through' => esc_html__('line-through', 'language-school'), 
		);
		
		
		return $list;
	}
}



// Theme Settings Custom Color Schemes
if (!function_exists('language_school_custom_color_schemes_list')) {
	function language_school_custom_color_schemes_list() {
		$list = array( 
			'first' => esc_html__('Custom 1', 'language-school'), 
			'second' => esc_html__('Custom 2', 'language-school'), 
			'third' => esc_html__('Custom 3', 'language-school'), 
			'fourth' => esc_html__('Custom 4', 'language-school') 
		);
		
		
		return $list;
	}
}

/*** STOP EDIT THEME PARAMETERS HERE ***/



// Require Files Function
if (!function_exists('language_school_locate_template')) {
	function language_school_locate_template($template_names, $require_once = true, $load = true) {
		$located = '';
		
		
		foreach ((array) $template_names as $template_name) {
			if (!$template_name) {
				continue;
			}
			
			
			if (file_exists(get_stylesheet_directory() . '/' . $template_name)) {
				$located = get_stylesheet_directory() . '/' . $template_name;
				
				
				break;
			} elseif (file_exists(get_template_directory() . '/' . $template_name)) {
				$located = get_template_directory() . '/' . $template_name;
				
				
				break;
			}
		}
		
		
		if ($load && $located != '') {
			if ($require_once) {
				require_once($located);
			} else {
				require($located);
			}
		}
		
		
		return $located;
	}
}



// Theme Plugin Support Constants
if (class_exists('Cmsmasters_Content_Composer')) {
	define('CMSMASTERS_CONTENT_COMPOSER', true);
} else {
	define('CMSMASTERS_CONTENT_COMPOSER', false);
}

if (class_exists('woocommerce')) {
	define('CMSMASTERS_WOOCOMMERCE', false);
} else {
	define('CMSMASTERS_WOOCOMMERCE', false);
}

if (class_exists('Tribe__Events__Main')) {
	define('CMSMASTERS_EVENTS_CALENDAR', true);
} else {
	define('CMSMASTERS_EVENTS_CALENDAR', false);
}

if (class_exists('PayPalDonations')) {
	define('CMSMASTERS_PAYPALDONATIONS', true);
} else {
	define('CMSMASTERS_PAYPALDONATIONS', false);
}

if (class_exists('Cmsmasters_Donations')) {
	define('CMSMASTERS_DONATIONS', false);
} else {
	define('CMSMASTERS_DONATIONS', false);
}

if (function_exists('timetable_events_init')) {
	define('CMSMASTERS_TIMETABLE', true);
} else {
	define('CMSMASTERS_TIMETABLE', false);
}

if (class_exists('LearnPress')) {
	define('CMSMASTERS_LEARNPRESS', true);
} else {
	define('CMSMASTERS_LEARNPRESS', false);
}

if (class_exists('TC')) {
	define('CMSMASTERS_TC_EVENTS', false);
} else {
	define('CMSMASTERS_TC_EVENTS', false);
}

if (class_exists('Cmsmasters_Events_Schedule')) {
	define('CMSMASTERS_EVENTS_SCHEDULE', false);
} else {
	define('CMSMASTERS_EVENTS_SCHEDULE', false);
}

// CMSMasters Importer Compatibility
define('CMSMASTERS_IMPORTER', true);

// CMSMasters Custom Fonts Compatibility
define('CMSMASTERS_CUSTOM_FONTS', true);

// Theme Colored Categories Constant
define('CMSMASTERS_COLORED_CATEGORIES', false);

// Theme Projects Compatible
define('CMSMASTERS_PROJECT_COMPATIBLE', true);

// Theme Profiles Compatible
define('CMSMASTERS_PROFILE_COMPATIBLE', true);

// Developer Mode Constant
define('CMSMASTERS_DEVELOPER_MODE', false);

// Change FS Method
if (!defined('FS_METHOD')) {
	define('FS_METHOD', 'direct');
}


// Theme Image Thumbnails Size
if (!function_exists('language_school_get_image_thumbnail_list')) {
	function language_school_get_image_thumbnail_list() {
		$list = array( 
			'cmsmasters-small-thumb' => array( 
				'width' => 		60, 
				'height' => 	60, 
				'crop' => 		true 
			), 
			'cmsmasters-square-thumb' => array( 
				'width' => 		300, 
				'height' => 	300, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Square', 'language-school') 
			), 
			'cmsmasters-blog-masonry-thumb' => array( 
				'width' => 		580, 
				'height' => 	350, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Masonry Blog', 'language-school') 
			), 
			'cmsmasters-project-thumb' => array( 
				'width' => 		580, 
				'height' => 	580, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Project', 'language-school') 
			), 
			'cmsmasters-project-masonry-thumb' => array( 
				'width' => 		580, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry Project', 'language-school') 
			), 
			'post-thumbnail' => array( 
				'width' => 		860, 
				'height' => 	500, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Featured', 'language-school') 
			), 
			'cmsmasters-masonry-thumb' => array( 
				'width' => 		860, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry', 'language-school') 
			), 
			'cmsmasters-full-thumb' => array( 
				'width' => 		1160, 
				'height' => 	650, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Full', 'language-school') 
			), 
			'cmsmasters-project-full-thumb' => array( 
				'width' => 		1160, 
				'height' => 	750, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Project Full', 'language-school') 
			), 
			'cmsmasters-full-masonry-thumb' => array( 
				'width' => 		1160, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry Full', 'language-school') 
			) 
		);
		
		
		if (CMSMASTERS_EVENTS_CALENDAR) {
			$list['cmsmasters-event-thumb'] = array( 
				'width' => 		580, 
				'height' => 	420, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Event', 'language-school') 
			);
		}
		
		
		return $list;
	}
}



// Theme Settings All Color Schemes List
if (!function_exists('language_school_all_color_schemes_list')) {
	function language_school_all_color_schemes_list() {
		$list = array( 
			'default' => 		esc_html__('Default', 'language-school'), 
			'header' => 		esc_html__('Header', 'language-school'), 
			'navigation' => 	esc_html__('Navigation', 'language-school'), 
			'header_top' => 	esc_html__('Header Top', 'language-school'), 
			'bottom' => 		esc_html__('Bottom', 'language-school'), 
			'footer' => 		esc_html__('Footer', 'language-school') 
		);
		
		
		$out = array_merge($list, language_school_custom_color_schemes_list());
		
		
		return apply_filters('cmsmasters_all_color_schemes_list_filter', $out);
	}
}



// Theme Settings Color Schemes Default Colors
if (!function_exists('language_school_color_schemes_defaults')) {
	function language_school_color_schemes_defaults() {
		$list = array( 
			'default' => array( // content default color scheme
				'color' => 		'#909195', 
				'link' => 		'#01a2a6', 
				'hover' => 		'#bcbec1', 
				'heading' => 	'#3d3d47', 
				'bg' => 		'#ffffff', 
				'alternate' => 	'#fcfcfc', 
				'border' => 	'#e0e0e0', 
				'secondary' => 	'#fe5969'
			), 
			'header' => array( // Header color scheme
				'mid_color' => 		'#9f9fa7', 
				'mid_link' => 		'#3d3d47', 
				'mid_hover' => 		'#01a2a6', 
				'mid_bg' => 		'#ffffff', 
				'mid_bg_scroll' => 	'rgba(255,255,255,0.9)', 
				'mid_border' => 	'#e4e4e4', 
				'bot_color' => 		'#9f9fa7', 
				'bot_link' => 		'#3d3d47', 
				'bot_hover' => 		'#01a2a6', 
				'bot_bg' => 		'#ffffff', 
				'bot_bg_scroll' => 	'rgba(255,255,255,0.9)', 
				'bot_border' => 	'#e4e4e4' 
			), 
			'navigation' => array( // Navigation color scheme
				'title_link' => 			'#3d3d47', 
				'title_link_hover' => 		'#01a2a6', 
				'title_link_current' => 	'#01a2a6', 
				'title_link_subtitle' => 	'#9f9fa7', 
				'title_link_bg' => 			'rgba(255,255,255,0)', 
				'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
				'title_link_bg_current' => 	'rgba(255,255,255,0)', 
				'title_link_border' => 		'rgba(255,255,255,0)', 
				'dropdown_text' => 			'#9f9fa7', 
				'dropdown_bg' => 			'#ffffff', 
				'dropdown_border' => 		'#e4e4e4', 
				'dropdown_link' => 			'#3d3d47', 
				'dropdown_link_hover' => 	'#fe5969', 
				'dropdown_link_subtitle' => '#9f9fa7', 
				'dropdown_link_highlight' => '#fe5969', 
				'dropdown_link_border' => 	'#e4e4e4' 
			), 
			'header_top' => array( // Header Top color scheme
				'color' => 					'#9f9fa7', 
				'link' => 					'#9f9fa7', 
				'hover' => 					'#01a2a6', 
				'bg' => 					'#ffffff', 
				'border' => 				'#e0e0e0', 
				'title_link' => 			'#3d3d47', 
				'title_link_hover' => 		'#01a2a6', 
				'title_link_bg' => 			'rgba(255,255,255,0)', 
				'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
				'title_link_border' => 		'rgba(255,255,255,0)', 
				'dropdown_bg' => 			'#ffffff', 
				'dropdown_border' => 		'#dcdcdc', 
				'dropdown_link' => 			'#3d3d47', 
				'dropdown_link_hover' => 	'#fe5969', 
				'dropdown_link_highlight' => 'rgba(255,255,255,0)', 
				'dropdown_link_border' => 	'rgba(255,255,255,0)' 
			), 
			'bottom' => array( // Bottom sidebar color scheme
				'color' => 		'rgba(255,255,255,0.3)', 
				'link' => 		'rgba(255,255,255,0.3)', 
				'hover' => 		'#ffffff', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#3d3d47', 
				'alternate' => 	'#43434d', 
				'border' => 	'#4b4b54', 
				'secondary' => 	'#01a2a6' 
			), 
			'footer' => array( // Footer color scheme
				'color' => 		'rgba(255,255,255,0.3)', 
				'link' => 		'rgba(255,255,255,0.3)', 
				'hover' => 		'#ffffff', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#3d3d47', 
				'alternate' => 	'#01a2a6', 
				'border' => 	'#4b4b54', 
				'secondary' => 	'#fe5969' 
			), 
			'first' => array( // custom color scheme 1
				'color' => 		'#ffffff', 
				'link' => 		'rgba(255,255,255,0.8)', 
				'hover' => 		'#ffffff', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#01a2a6', 
				'alternate' => 	'rgba(255,255,255,0.1)', 
				'border' => 	'rgba(255,255,255,0.25)', 
				'secondary' => 	'#fe5969' 
			), 
			'second' => array( // custom color scheme 2
				'color' => 		'#ffffff', 
				'link' => 		'#ffffff', 
				'hover' => 		'#ffffff', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#17aaae', 
				'alternate' => 	'rgba(255,255,255,0.1)', 
				'border' => 	'rgba(255,255,255,0.25)', 
				'secondary' => 	'#fe5969' 
			), 
			'third' => array( // custom color scheme 3
				'color' => 		'#909195', 
				'link' => 		'#01a2a6', 
				'hover' => 		'#bcbec1', 
				'heading' => 	'#3d3d47', 
				'bg' => 		'#fcfcfc', 
				'alternate' => 	'#ffffff', 
				'border' => 	'#e0e0e0', 
				'secondary' => 	'#fe5969' 
			), 
			'fourth' => array( // custom color scheme 4
				'color' => 		'#ffffff', 
				'link' => 		'#ffffff', 
				'hover' => 		'#ffffff', 
				'heading' => 	'rgba(255,255,255,0.4)', 
				'bg' => 		'#f9b639', 
				'alternate' => 	'rgba(255,255,255,0.1)', 
				'border' => 	'rgba(255,255,255,0.25)', 
				'secondary' => 	'#ffffff' 
			) 
		);
		
		
		return $list;
	}
}



// CMSMasters Framework Directories Constants
define('CMSMASTERS_FRAMEWORK', 'framework');
define('CMSMASTERS_ADMIN', CMSMASTERS_FRAMEWORK . '/admin');
define('CMSMASTERS_SETTINGS', CMSMASTERS_ADMIN . '/settings');
define('CMSMASTERS_OPTIONS', CMSMASTERS_ADMIN . '/options');
define('CMSMASTERS_ADMIN_INC', CMSMASTERS_ADMIN . '/inc');
define('CMSMASTERS_CLASS', CMSMASTERS_FRAMEWORK . '/class');
define('CMSMASTERS_FUNCTION', CMSMASTERS_FRAMEWORK . '/function');
define('CMSMASTERS_COMPOSER', 'cmsmasters-c-c');
define('CMSMASTERS_DEMO_FILES_PATH', get_template_directory() . '/framework/admin/inc/demo-content/');



// Load Framework Parts
language_school_locate_template(CMSMASTERS_CLASS . '/Browser.php', true);

if (class_exists('Cmsmasters_Theme_Importer')) {
	require_once(CMSMASTERS_ADMIN_INC . '/demo-content-importer.php');
}

language_school_locate_template(CMSMASTERS_ADMIN_INC . '/config-functions.php', true);

language_school_locate_template(CMSMASTERS_FUNCTION . '/theme-functions.php', true);

language_school_locate_template(CMSMASTERS_SETTINGS . '/cmsmasters-theme-settings.php', true);

language_school_locate_template(CMSMASTERS_OPTIONS . '/cmsmasters-theme-options.php', true);

language_school_locate_template(CMSMASTERS_ADMIN_INC . '/admin-scripts.php', true);

language_school_locate_template(CMSMASTERS_ADMIN_INC . '/plugin-activator.php', true);

language_school_locate_template(CMSMASTERS_CLASS . '/widgets.php', true);

language_school_locate_template(CMSMASTERS_FUNCTION . '/breadcrumbs.php', true);

language_school_locate_template(CMSMASTERS_FUNCTION . '/likes.php', true);

language_school_locate_template(CMSMASTERS_FUNCTION . '/pagination.php', true);

language_school_locate_template(CMSMASTERS_FUNCTION . '/single-comment.php', true);

language_school_locate_template(CMSMASTERS_FUNCTION . '/theme-fonts.php', true);

language_school_locate_template(CMSMASTERS_FUNCTION . '/theme-colors-primary.php', true);

language_school_locate_template(CMSMASTERS_FUNCTION . '/theme-colors-secondary.php', true);

language_school_locate_template(CMSMASTERS_FUNCTION . '/template-functions.php', true);

language_school_locate_template(CMSMASTERS_FUNCTION . '/template-functions-post.php', true);

language_school_locate_template(CMSMASTERS_FUNCTION . '/template-functions-project.php', true);

language_school_locate_template(CMSMASTERS_FUNCTION . '/template-functions-profile.php', true);

language_school_locate_template(CMSMASTERS_FUNCTION . '/template-functions-shortcodes.php', true);

language_school_locate_template(CMSMASTERS_FUNCTION . '/template-functions-widgets.php', true);


$cmsmasters_wp_version = get_bloginfo('version');

if (version_compare($cmsmasters_wp_version, '5', '>=') || function_exists('is_gutenberg_page')) {
	require_once(get_template_directory() . '/gutenberg/cmsmasters-module-functions.php');
}


// Theme Colored Categories Functions
if (CMSMASTERS_COLORED_CATEGORIES) {
	language_school_locate_template(CMSMASTERS_FUNCTION . '/theme-colored-categories.php', true);
}


if (class_exists('Cmsmasters_Content_Composer')) {
	language_school_locate_template(CMSMASTERS_COMPOSER . '/filters/cmsmasters-c-c-atts-filters.php', true);
	
	language_school_locate_template(CMSMASTERS_COMPOSER . '/shortcodes/theme-shortcodes.php', true);
}



// Events functions
if (CMSMASTERS_EVENTS_CALENDAR) {
	language_school_locate_template('tribe-events/cmsmasters-events-functions.php', true);
}

// CMSMasters Events Schedule functions
if (CMSMASTERS_EVENTS_SCHEDULE) {
	language_school_locate_template('cmsmasters-events-schedule/cmsmasters-events-schedule-functions.php', true);
}


// Load Theme Local File
if (!function_exists('language_school_load_theme_textdomain')) {
	function language_school_load_theme_textdomain() {
		load_theme_textdomain('language-school', get_template_directory() . '/' . CMSMASTERS_FRAMEWORK . '/languages');
	}
}

// Load Theme Local File Action
if (!has_action('after_setup_theme', 'language_school_load_theme_textdomain')) {
	add_action('after_setup_theme', 'language_school_load_theme_textdomain');
}



// Framework Activation & Data Import
if (!function_exists('language_school_theme_activation')) {
	function language_school_theme_activation() {
		if (get_option('cmsmasters_active_theme') != 'language-school') {
			add_option('cmsmasters_active_theme', 'language-school', '', 'yes');
			
			
			language_school_add_global_options();
			
			
			language_school_add_global_icons();
			
			
			wp_redirect(esc_url(admin_url('admin.php?page=cmsmasters-settings&upgraded=true')));
		}
	}
}

add_action('after_switch_theme', 'language_school_theme_activation');



// Framework Deactivation
if (!function_exists('language_school_theme_deactivation')) {
	function language_school_theme_deactivation() {
		delete_option('cmsmasters_active_theme');
	}
}

// Framework Deactivation Action
if (!has_action('switch_theme', 'language_school_theme_deactivation')) {
	add_action('switch_theme', 'language_school_theme_deactivation');
}



// Plugin Activation Regenerate Styles
if (!function_exists('language_school_plugin_activation')) {
	function language_school_plugin_activation($plugin, $network_activation) {
		update_option('cmsmasters_plugin_activation', 'true');
		
		
		if ($plugin == 'classic-editor/classic-editor.php') {
			update_option('classic-editor-replace', 'no-replace');
		}
	}
}

add_action('activated_plugin', 'language_school_plugin_activation', 10, 2);

if (!function_exists('language_school_plugin_activation_regenerate')) {
	function language_school_plugin_activation_regenerate() {
		if (!get_option('cmsmasters_plugin_activation')) {
			add_option('cmsmasters_plugin_activation', 'false');
		}
		
		if (get_option('cmsmasters_plugin_activation') != 'false') {
			language_school_regenerate_styles();
			
			language_school_add_global_options();
			
			language_school_add_global_icons();
			
			update_option('cmsmasters_plugin_activation', 'false');
		}
	}
}

add_action('init', 'language_school_plugin_activation_regenerate');


function language_school_run_reinit_import_options($post_id, $key, $value) {
	if (!get_post_meta($post_id, 'cmsmasters_heading', true)) {
		$custom_post_meta_fields = language_school_get_custom_all_meta_fields();
		
		foreach ($custom_post_meta_fields as $field) {
			if ( 
				$field['type'] != 'tabs' && 
				$field['type'] != 'tab_start' && 
				$field['type'] != 'tab_finish' && 
				$field['type'] != 'content_start' && 
				$field['type'] != 'content_finish' 
			) {
				update_post_meta($post_id, $field['id'], $field['std']);
			}
		}
	}
	
	
	if ($key === 'cmsmasters_composer_show' && $value === 'true') {
		update_post_meta($post_id, 'cmsmasters_gutenberg_show', 'true');
	}
}

add_action('import_post_meta', 'language_school_run_reinit_import_options', 10, 3);



/* Fix Widgets Page */
function language_school_fix_widget_page() {
	if (CMSMASTERS_EVENTS_CALENDAR && is_admin() && get_current_screen()->base == "widgets") {
		wp_dequeue_script( 'tribe-select2');
		wp_deregister_script( 'tribe-select2' );
		wp_dequeue_script( 'lp-select2');
		wp_deregister_script( 'lp-select2' );
		wp_dequeue_script( 'rwmb-select2');
		wp_deregister_script( 'rwmb-select2' );
		wp_enqueue_style('select2', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css');
		wp_enqueue_script('select2', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.full.min.js', '', '', false);
	}
}

add_action('admin_enqueue_scripts', 'language_school_fix_widget_page');