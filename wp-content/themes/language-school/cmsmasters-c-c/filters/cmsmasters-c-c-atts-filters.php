<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version 	1.1.7
 * 
 * Content Composer Attributes Filters
 * Created by CMSMasters
 * 
 */

/* Register Admin Panel JS Scripts */
function register_admin_js_scripts() {
	global $pagenow;
	
	$cmsmasters_option = language_school_get_global_options();
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('composer-shortcodes-extend', get_template_directory_uri() . '/cmsmasters-c-c/js/cmsmasters-c-c-shortcodes-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('composer-shortcodes-extend', 'composer_shortcodes_extend', array( 
			'blog_field_layout_mode_puzzle' => 			esc_attr__('Puzzle', 'language-school'), 
			'quotes_field_slider_type_title' => 		esc_attr__('Slider Type', 'language-school'), 
			'quotes_field_slider_type_descr' => 		esc_attr__('Choose your quotes slider style type', 'language-school'), 
			'quotes_field_type_choice_box' => 			esc_attr__('Boxed', 'language-school'), 
			'quotes_field_type_choice_center' => 		esc_attr__('Centered', 'language-school'),
			'quotes_field_item_color_title' => 			esc_attr__('Color', 'language-school'),
			'quotes_field_item_color_descr' => 			esc_attr__('Enter this quote custom color', 'language-school'),
			'timetable_field_box_bd_color_title' => 	esc_attr__('Timetable box border color', 'language-school'),
			'learnpress_title' => 						esc_attr__('Courses', 'language-school'),
			'course_field_orderby_descr' => 			esc_attr__('Choose your courses order by parameter', 'language-school'),
			'course_field_categories_descr' => 			esc_attr__('Show courses associated with certain categories.', 'language-school'),
			'course_field_categories_descr_note' =>		esc_attr__('If you don\'t choose any course categories, all your courses will be shown', 'language-school'),
			'course_field_postsnumber_title' => 		esc_attr__('Courses Number', 'language-school'),
			'course_field_postsnumber_descr' => 		esc_attr__('Enter the number of courses to be shown in shortcode', 'language-school'),
			'course_field_postsnumber_descr_note' =>	esc_attr__('number, if empty - show all courses', 'language-school'),
			'course_field_col_count_descr' =>			esc_attr__('Choose number of courses per row', 'language-school'),
			
			/* Timetable Default Colors */
			'box_bg_color' => 					($cmsmasters_option['language-school' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_bg']), 
			'box_bd_color' => 					($cmsmasters_option['language-school' . '_default' . '_border'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_border']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_border']), 
			'box_hover_bg_color' => 			($cmsmasters_option['language-school' . '_default' . '_secondary'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_secondary']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_secondary']), 
			'box_txt_color' => 					($cmsmasters_option['language-school' . '_default' . '_color'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_color']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_color']), 
			'box_hover_txt_color' => 			($cmsmasters_option['language-school' . '_default' . '_alternate'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_alternate']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_alternate']), 
			'box_hours_txt_color' => 			($cmsmasters_option['language-school' . '_default' . '_secondary'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_secondary']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_secondary']), 
			'box_hours_hover_txt_color' => 		($cmsmasters_option['language-school' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_bg']), 
			'row1_bg_color' => 					($cmsmasters_option['language-school' . '_default' . '_alternate'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_alternate']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_alternate']), 
			'row1_txt_color' => 				($cmsmasters_option['language-school' . '_default' . '_color'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_color']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_color']), 
			'row2_bg_color' => 					($cmsmasters_option['language-school' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_bg']), 
			'row2_txt_color' => 				($cmsmasters_option['language-school' . '_default' . '_color'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_color']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_color']), 
			'booking_text_color' => 			($cmsmasters_option['language-school' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_bg']), 
			'booking_bg_color' => 				($cmsmasters_option['language-school' . '_default' . '_heading'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_heading']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_heading']), 
			'booking_hover_text_color' => 		($cmsmasters_option['language-school' . '_default' . '_link'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_link']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_link']), 
			'booking_hover_bg_color' => 		($cmsmasters_option['language-school' . '_default' . '_heading'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_heading']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_heading']), 
			'booked_text_color' => 				($cmsmasters_option['language-school' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_bg']), 
			'booked_bg_color' => 				($cmsmasters_option['language-school' . '_default' . '_heading'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_heading']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_heading']), 
			'unavailable_text_color' => 		($cmsmasters_option['language-school' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_bg']), 
			'unavailable_bg_color' => 			($cmsmasters_option['language-school' . '_default' . '_heading'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_heading']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_heading']), 
			'available_slots_color' => 			($cmsmasters_option['language-school' . '_default' . '_color'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_default' . '_color']) . ', 0.99)' : $cmsmasters_option['language-school' . '_default' . '_color']) 
		));
	}
}

add_action('admin_enqueue_scripts', 'register_admin_js_scripts');


// Pricing Table Item Shortcode Attributes Filter
add_filter('cmsmasters_pricing_table_item_atts_filter', 'cmsmasters_pricing_table_item_atts');

function cmsmasters_pricing_table_item_atts() {
	return array( 
		'price' => 					'100', 
		'coins' => 					'', 
		'currency' => 				'$', 
		'period' => 				'', 
		'features' => 				'', 
		'best' => 					'', 
		'best_bg_color' => 			'', 
		'best_text_color' => 		'', 
		'button_show' => 			'', 
		'button_title' => 			'', 
		'button_link' => 			'#', 
		'button_target' => 			'', 
		'button_style' => 			'', 
		'button_font_family' => 	'', 
		'button_font_size' => 		'', 
		'button_line_height' => 	'', 
		'button_font_weight' => 	'bold', 
		'button_font_style' => 		'', 
		'button_padding_hor' => 	'', 
		'button_border_width' => 	'', 
		'button_border_style' => 	'', 
		'button_border_radius' => 	'', 
		'button_bg_color' => 		'', 
		'button_text_color' => 		'', 
		'button_border_color' => 	'', 
		'button_bg_color_h' => 		'', 
		'button_text_color_h' => 	'', 
		'button_border_color_h' => 	'', 
		'button_icon' => 			'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
	);
}


// Quotes Shortcode Attributes Filter
add_filter('cmsmasters_quotes_atts_filter', 'cmsmasters_quotes_atts');

function cmsmasters_quotes_atts() {
	return array( 
		'mode' => 				'grid', 
		'type' => 				'boxed', 
		'columns' => 			'3', 
		'speed' => 				'10', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
	);
}


// Quote Item Shortcode Attributes Filter
add_filter('cmsmasters_quote_atts_filter', 'cmsmasters_quote_atts');

function cmsmasters_quote_atts() {
	return array( 
		'image' => 		'', 
		'name' => 		'', 
		'subtitle' => 	'', 
		'color' => 		'', 
		'link' => 		'', 
		'website' => 	'', 
		'classes' => 	'' 
	);
}


// Timetable Shortcode Attributes Filter
add_filter('cmsmasters_timetable_atts_filter', 'cmsmasters_timetable_atts');

function cmsmasters_timetable_atts() {
	return array( 
		'event' => 						'', 
		'event_category' => 			'', 
		'hour_category' => 				'', 
		'columns' => 					'', 
		'measure' => 					'1', 
		'filter_style' => 				'dropdown_list', 
		'filter_kind' => 				'event', 
		'filter_label' => 				esc_attr__('All Events', 'language-school'),
		'filter_label_2' => 			esc_attr__('All Events Categories', 'language-school'),
		'time_format' => 				'H.i', 
		'time_format_custom' => 		'', 
		'hide_all_events_view' => 		'0', 
		'hide_hours_column' => 			'0', 
		'show_end_hour' => 				'0', 
		'event_layout' => 				'1', 
		'hide_empty' => 				'0', 
		'disable_event_url' => 			'0', 
		'text_align' => 				'center', 
		'id' => 						'', 
		'row_height' => 				'31', 
		'desktop_list_view' => 			'0', 
		'event_description_responsive' => 'none', 
		'collapse_event_hours_responsive' => '0', 
		'colors_responsive_mode' => 	'0', 
		'export_to_pdf_button' => 		'0', 
		'generate_pdf_label' => 		esc_attr__('Generate PDF', 'language-school'),
		'show_booking_button' => 		'no', 
		'show_available_slots' => 		'no', 
		'available_slots_singular_label' => 	'{number_available}/{number_total} slot available', 
		'available_slots_plural_label' => 		'{number_available}/{number_total} slots available', 
		'default_booking_view' => 				'user', 
		'allow_user_booking' => 				'yes', 
		'allow_guest_booking' => 				'no', 
		'show_guest_name_field' => 				'yes', 
		'guest_name_field_required' => 			'yes', 
		'show_guest_phone_field' => 			'no', 
		'guest_phone_field_required' => 		'no', 
		'show_guest_message_field' => 			'no', 
		'guest_message_field_required' => 		'no', 
		'booking_label' => 				esc_attr__('Book now', 'language-school'),
		'booked_label' => 				esc_attr__('Booked', 'language-school'),
		'unavailable_label' => 			esc_attr__('Unavailable', 'language-school'),
		'booking_popup_label' => 		esc_attr__('Book now', 'language-school'),
		'login_popup_label' => 			esc_attr__('Log in', 'language-school'),
		'cancel_popup_label' => 		esc_attr__('Cancel', 'language-school'),
		'continue_popup_label' => 		esc_attr__('Continue', 'language-school'),
		'terms_checkbox' => 			'no', 
		'terms_message' => 				esc_attr__('Please accept terms and conditions', 'language-school'),
		'booking_popup_message' => 		'', 
		'booking_popup_thank_you_message' => '', 
		'box_bg_color' => 				'', 
		'box_bd_color' => 				'', 
		'box_hover_bg_color' => 		'', 
		'box_txt_color' => 				'', 
		'box_hover_txt_color' => 		'', 
		'box_hours_txt_color' => 		'', 
		'box_hours_hover_txt_color' => 	'', 
		'row1_bg_color' => 				'', 
		'row1_txt_color' => 			'', 
		'row2_bg_color' => 				'', 
		'row2_txt_color' => 			'', 
		'booking_text_color' => 		'', 
		'booking_bg_color' => 			'', 
		'booking_hover_text_color' => 	'', 
		'booking_hover_bg_color' => 	'', 
		'booked_text_color' => 			'', 
		'booked_bg_color' => 			'', 
		'unavailable_text_color' => 	'', 
		'unavailable_bg_color' => 		'', 
		'available_slots_color' => 		'', 
		'classes' => 					''
	);
}

/* Composer Lightbox Functions for LearnPress */
global $pagenow;


if ( 
	is_admin() && 
	$pagenow == 'post-new.php' || 
	($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
) {
	add_action('admin_footer', 'cmsmasters_learnpress_composer_shortcodes_init');
}


function cmsmasters_learnpress_composer_shortcodes_init() {
	if (wp_script_is('cmsmasters_content_composer_js', 'queue') && wp_script_is('cmsmasters_composer_lightbox_js', 'queue')) {
		cmsmasters_composer_learnpress();
		
		if (class_exists('LearnPress')) {
			cmsmasters_composer_lpr_course_categories();
		}
	}
}


function cmsmasters_composer_learnpress() {
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_learnpress() { ' . "\n\t\t";
	
	
	if (class_exists('LearnPress')) {
		$out .= "return 'true'; \n";
	} else {
		$out .= "return 'false'; \n";
	}
	
	
	$out .= '} ' . "\n" . 
		'cmsmasters_composer_learnpress();' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo language_school_return_content($out);
}


function cmsmasters_composer_lpr_course_categories() {
	$categories = get_terms('course_category', array( 
		'hide_empty' => 0 
	));
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_lpr_course_categories() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	if (!empty($categories)) {
		foreach ($categories as $category) {
			$out .= "\t\t\t\"" . urldecode(esc_attr($category->slug)) . "\" : \"" . esc_html($category->name) . "\", \n";
		}
		
		
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo language_school_return_content($out);
}
