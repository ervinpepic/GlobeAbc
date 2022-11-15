<?php 
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.2.7
 * 
 * Admin Panel Fonts Options
 * Created by CMSMasters
 * 
 */


function language_school_options_font_tabs() {
	$tabs = array();
	
	$tabs['content'] = esc_attr__('Content', 'language-school');
	$tabs['link'] = esc_attr__('Links', 'language-school');
	$tabs['nav'] = esc_attr__('Navigation', 'language-school');
	$tabs['heading'] = esc_attr__('Heading', 'language-school');
	$tabs['other'] = esc_attr__('Other', 'language-school');
	$tabs['google'] = esc_attr__('Google Fonts', 'language-school');
	
	return $tabs;
}


function language_school_options_font_sections() {
	$tab = language_school_get_the_tab();
	
	switch ($tab) {
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_html__('Content Font Options', 'language-school');
		
		break;
	case 'link':
		$sections = array();
		
		$sections['link_section'] = esc_html__('Links Font Options', 'language-school');
		
		break;
	case 'nav':
		$sections = array();
		
		$sections['nav_section'] = esc_html__('Navigation Font Options', 'language-school');
		
		break;
	case 'heading':
		$sections = array();
		
		$sections['heading_section'] = esc_html__('Headings Font Options', 'language-school');
		
		break;
	case 'other':
		$sections = array();
		
		$sections['other_section'] = esc_html__('Other Fonts Options', 'language-school');
		
		break;
	case 'google':
		$sections = array();
		
		$sections['google_section'] = esc_html__('Serving Google Fonts from CDN', 'language-school');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return $sections;
} 


function language_school_options_font_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = language_school_get_the_tab();
	}
	
	
	$cmsmasters_option = language_school_get_global_options();
	
	
	$options = array();
	
	switch ($tab) {
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_content_font', 
			'title' => esc_html__('Main Content Font', 'language-school'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'13', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	case 'link':
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'language-school' . '_link_font', 
			'title' => esc_html__('Links Font', 'language-school'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'13', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'language-school' . '_link_hover_decoration', 
			'title' => esc_html__('Links Hover Text Decoration', 'language-school'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'none', 
			'choices' => language_school_text_decoration_list() 
		);
		
		break;
	case 'nav':
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'language-school' . '_nav_title_font', 
			'title' => esc_html__('Navigation Title Font', 'language-school'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Poppins:300,400,500,600,700', 
				'font_size' => 			'12', 
				'line_height' => 		'20', 
				'font_weight' => 		'600', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'language-school' . '_nav_dropdown_font', 
			'title' => esc_html__('Navigation Dropdown Font', 'language-school'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'12', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		break;
	case 'heading':
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'language-school' . '_h1_font', 
			'title' => esc_html__('H1 Tag Font', 'language-school'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Poppins:300,400,500,600,700', 
				'font_size' => 			'28', 
				'line_height' => 		'36', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'language-school' . '_h2_font', 
			'title' => esc_html__('H2 Tag Font', 'language-school'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Poppins:300,400,500,600,700', 
				'font_size' => 			'24', 
				'line_height' => 		'32', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'language-school' . '_h3_font', 
			'title' => esc_html__('H3 Tag Font', 'language-school'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Poppins:300,400,500,600,700', 
				'font_size' => 			'20', 
				'line_height' => 		'28', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'language-school' . '_h4_font', 
			'title' => esc_html__('H4 Tag Font', 'language-school'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Poppins:300,400,500,600,700', 
				'font_size' => 			'16', 
				'line_height' => 		'24', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'language-school' . '_h5_font', 
			'title' => esc_html__('H5 Tag Font', 'language-school'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Poppins:300,400,500,600,700', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'language-school' . '_h6_font', 
			'title' => esc_html__('H6 Tag Font', 'language-school'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Poppins:300,400,500,600,700', 
				'font_size' => 			'12', 
				'line_height' => 		'20', 
				'font_weight' => 		'600', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		break;
	case 'other':
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'language-school' . '_button_font', 
			'title' => esc_html__('Button Font', 'language-school'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Raleway:300,400,500,600,700', 
				'font_size' => 			'12', 
				'line_height' => 		'36', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'language-school' . '_small_font', 
			'title' => esc_html__('Small Tag Font', 'language-school'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'11', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'language-school' . '_input_font', 
			'title' => esc_html__('Text Fields Font', 'language-school'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'13', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'language-school' . '_quote_font', 
			'title' => esc_html__('Blockquote Font', 'language-school'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Poppins:300,400,500,600,700', 
				'font_size' => 			'16', 
				'line_height' => 		'30', 
				'font_weight' => 		'500', 
				'font_style' => 		'normal' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	case 'google':
		$options[] = array( 
			'section' => 'google_section', 
			'id' => 'language-school' . '_google_web_fonts', 
			'title' => esc_html__('Google Fonts', 'language-school'), 
			'desc' => '', 
			'type' => 'google_web_fonts', 
			'std' => cmsmasters_google_fonts_list()
		);
		
		$options[] = array( 
			'section' => 'google_section', 
			'id' => 'language-school' . '_google_web_fonts_subset', 
			'title' => esc_html__('Google Fonts Subset', 'language-school'), 
			'desc' => '', 
			'type' => 'select_multiple', 
			'std' => '', 
			'choices' => array( 
				esc_html__('Latin Extended', 'language-school') . '|' . 'latin-ext', 
				esc_html__('Arabic', 'language-school') . '|' . 'arabic', 
				esc_html__('Cyrillic', 'language-school') . '|' . 'cyrillic', 
				esc_html__('Cyrillic Extended', 'language-school') . '|' . 'cyrillic-ext', 
				esc_html__('Greek', 'language-school') . '|' . 'greek', 
				esc_html__('Greek Extended', 'language-school') . '|' . 'greek-ext', 
				esc_html__('Vietnamese', 'language-school') . '|' . 'vietnamese', 
				esc_html__('Japanese', 'language-school') . '|' . 'japanese', 
				esc_html__('Korean', 'language-school') . '|' . 'korean', 
				esc_html__('Thai', 'language-school') . '|' . 'thai', 
				esc_html__('Bengali', 'language-school') . '|' . 'bengali', 
				esc_html__('Devanagari', 'language-school') . '|' . 'devanagari', 
				esc_html__('Gujarati', 'language-school') . '|' . 'gujarati', 
				esc_html__('Gurmukhi', 'language-school') . '|' . 'gurmukhi', 
				esc_html__('Hebrew', 'language-school') . '|' . 'hebrew', 
				esc_html__('Kannada', 'language-school') . '|' . 'kannada', 
				esc_html__('Khmer', 'language-school') . '|' . 'khmer', 
				esc_html__('Malayalam', 'language-school') . '|' . 'malayalam', 
				esc_html__('Myanmar', 'language-school') . '|' . 'myanmar', 
				esc_html__('Oriya', 'language-school') . '|' . 'oriya', 
				esc_html__('Sinhala', 'language-school') . '|' . 'sinhala', 
				esc_html__('Tamil', 'language-school') . '|' . 'tamil', 
				esc_html__('Telugu', 'language-school') . '|' . 'telugu' 
			) 
		);
		
		break;
	}
	
	return $options;	
}

