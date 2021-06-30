<?php 
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.0.7
 * 
 * LearnPress Course Options Functions
 * Created by CMSMasters
 * 
 */


if (!function_exists('get_custom_lpr_course_meta_fields')) {
function get_custom_lpr_course_meta_fields() {
	$cmsmasters_option = language_school_get_global_options();
	
	
	$cmsmasters_global_lpr_post_layout = (isset($cmsmasters_option['language-school' . '_lpr_post_layout']) && $cmsmasters_option['language-school' . '_lpr_post_layout'] !== '') ? $cmsmasters_option['language-school' . '_lpr_post_layout'] : 'fullwidth';

	$cmsmasters_global_bottom_sidebar = (isset($cmsmasters_option['language-school' . '_bottom_sidebar']) && $cmsmasters_option['language-school' . '_bottom_sidebar'] !== '') ? (($cmsmasters_option['language-school' . '_bottom_sidebar'] == 1) ? 'true' : 'false') : 'true';
	
	$cmsmasters_global_bottom_sidebar_layout = (isset($cmsmasters_option['language-school' . '_bottom_sidebar_layout'])) ? $cmsmasters_option['language-school' . '_bottom_sidebar_layout'] : '14141414';
	
	$cmsmasters_global_bg = (isset($cmsmasters_option['language-school' . '_theme_layout']) && $cmsmasters_option['language-school' . '_theme_layout'] === 'boxed') ? true : false;
	
	$cmsmasters_global_lpr_course_title = (isset($cmsmasters_option['language-school' . '_lpr_course_title']) && $cmsmasters_option['language-school' . '_lpr_course_title'] !== '') ? $cmsmasters_option['language-school' . '_lpr_course_title'] : '';
	
	$cmsmasters_global_lpr_course_image = (isset($cmsmasters_option['language-school' . '_lpr_course_image']) && $cmsmasters_option['language-school' . '_lpr_course_image'] !== '') ? $cmsmasters_option['language-school' . '_lpr_course_image'] : '';
	
	
	$cmsmasters_option_name = 'cmsmasters_lpr_course_';
	
	
	$tabs_array = array();
	
	
	$tabs_array['cmsmasters_lpr_course'] = array( 
		'label' => esc_html__('Course', 'language-school'), 
		'value'	=> 'cmsmasters_lpr_course' 
	);
	
	
	$tabs_array['cmsmasters_layout'] = array( 
		'label' => esc_html__('Layout', 'language-school'), 
		'value'	=> 'cmsmasters_layout' 
	);
	
	
	if ($cmsmasters_global_bg) {
		$tabs_array['cmsmasters_bg'] = array( 
			'label' => esc_html__('Background', 'language-school'), 
			'value'	=> 'cmsmasters_bg' 
		);
	}
	
	
	$tabs_array['cmsmasters_heading'] = array( 
		'label' => esc_html__('Heading', 'language-school'),
		'value'	=> 'cmsmasters_heading' 
	);
	
	
	$custom_lpr_course_meta_fields = array( 
		array( 
			'id'	=> $cmsmasters_option_name . 'tabs', 
			'type'	=> 'tabs', 
			'std'	=> 'cmsmasters_lpr_course', 
			'options' => $tabs_array 
		), 
		array( 
			'id'	=> 'cmsmasters_lpr_course', 
			'type'	=> 'tab_start', 
			'std'	=> 'true' 
		),  
		array( 
			'label'	=> esc_html__('Course Title', 'language-school'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'title', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsmasters_global_lpr_course_title 
		), 
		array( 
			'label'	=> esc_html__('Course Featured Image', 'language-school'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'image', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsmasters_global_lpr_course_image 
		), 
		array( 
			'id'	=> 'cmsmasters_lpr_course', 
			'type'	=> 'tab_finish' 
		), 
		array( 
			'id'	=> 'cmsmasters_layout', 
			'type'	=> 'tab_start', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Page Color Scheme', 'language-school'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_page_scheme', 
			'type'	=> 'select_scheme', 
			'hide'	=> 'false', 
			'std'	=> 'default' 
		), 
		array( 
			'label'	=> esc_html__('Page Layout', 'language-school'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_layout', 
			'type'	=> 'radio_img', 
			'hide'	=> '', 
			'std'	=> $cmsmasters_global_lpr_post_layout, 
			'options' => array( 
				'r_sidebar' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg', 
					'label' => esc_html__('Right Sidebar', 'language-school'), 
					'value'	=> 'r_sidebar' 
				), 
				'l_sidebar' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg', 
					'label' => esc_html__('Left Sidebar', 'language-school'), 
					'value'	=> 'l_sidebar' 
				), 
				'fullwidth' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg', 
					'label' => esc_html__('Full Width', 'language-school'), 
					'value'	=> 'fullwidth' 
				) 
			) 
		), 
		array( 
			'label'	=> esc_html__('Choose Right\Left Sidebar', 'language-school'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_sidebar_id', 
			'type'	=> 'select_sidebar', 
			'hide'	=> 'true', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Bottom Sidebar', 'language-school'), 
			'desc'	=> esc_html__('Show', 'language-school'), 
			'id'	=> 'cmsmasters_bottom_sidebar', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsmasters_global_bottom_sidebar 
		), 
		array( 
			'label'	=> esc_html__('Choose Bottom Sidebar', 'language-school'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_bottom_sidebar_id', 
			'type'	=> 'select_sidebar', 
			'hide'	=> 'true', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Choose Bottom Sidebar Layout', 'language-school'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_bottom_sidebar_layout', 
			'type'	=> 'select', 
			'hide'	=> 'true', 
			'std'	=> $cmsmasters_global_bottom_sidebar_layout, 
			'options' => array( 
				'11' => array( 
					'label' => '1/1',
					'value'	=> '11' 
				), 
				'1212' => array( 
					'label' => '1/2 + 1/2',
					'value'	=> '1212' 
				), 
				'1323' => array( 
					'label' => '1/3 + 2/3',
					'value'	=> '1323' 
				), 
				'2313' => array( 
					'label' => '2/3 + 1/3',
					'value'	=> '2313' 
				), 
				'1434' => array( 
					'label' => '1/4 + 3/4',
					'value'	=> '1434' 
				), 
				'3414' => array( 
					'label' => '3/4 + 1/4',
					'value'	=> '3414' 
				), 
				'131313' => array( 
					'label' => '1/3 + 1/3 + 1/3',
					'value'	=> '131313' 
				), 
				'121414' => array( 
					'label' => '1/2 + 1/4 + 1/4',
					'value'	=> '121414' 
				), 
				'141214' => array( 
					'label' => '1/4 + 1/2 + 1/4',
					'value'	=> '141214' 
				), 
				'141412' => array( 
					'label' => '1/4 + 1/4 + 1/2',
					'value'	=> '141412' 
				), 
				'14141414' => array( 
					'label' => '1/4 + 1/4 + 1/4 + 1/4',
					'value'	=> '14141414' 
				) 
			) 
		), 
		array( 
			'id'	=> 'cmsmasters_layout', 
			'type'	=> 'tab_finish' 
		) 
	);
	
	
	return $custom_lpr_course_meta_fields;
}
}

