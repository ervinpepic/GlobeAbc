<?php 
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version 	1.1.8
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function language_school_options_general_tabs() {
	$cmsmasters_option = language_school_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'language-school');
	
	if ($cmsmasters_option['language-school' . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'language-school');
	}
	
	$tabs['header'] = esc_attr__('Header', 'language-school');
	$tabs['content'] = esc_attr__('Content', 'language-school');
	$tabs['footer'] = esc_attr__('Footer', 'language-school');
	
	return $tabs;
}


function language_school_options_general_sections() {
	$tab = language_school_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'language-school');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'language-school');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'language-school');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'language-school');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'language-school');

		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return $sections;
} 


function language_school_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = language_school_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'language-school' . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'language-school'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'boxed', 
			'choices' => array( 
				esc_html__('Liquid', 'language-school') . '|liquid', 
				esc_html__('Boxed', 'language-school') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'language-school' . '_logo_type', 
			'title' => esc_html__('Logo Type', 'language-school'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'image', 
			'choices' => array( 
				esc_html__('Image', 'language-school') . '|image', 
				esc_html__('Text', 'language-school') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'language-school' . '_logo_url', 
			'title' => esc_html__('Logo Image', 'language-school'), 
			'desc' => esc_html__('Choose your website logo image.', 'language-school'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'language-school' . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'language-school'), 
			'desc' => esc_html__('Choose logo image for retina displays. Logo for Retina displays should be twice the size of the default one.', 'language-school'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'language-school' . '_logo_title', 
			'title' => esc_html__('Logo Title', 'language-school'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => ((get_bloginfo('name')) ? get_bloginfo('name') : 'Language School'), 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'language-school' . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'language-school'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'language-school' . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'language-school'), 
			'desc' => esc_html__('enable', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'language-school' . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'language-school'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'language-school' . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'language-school'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'language-school' . '_bg_col', 
			'title' => esc_html__('Background Color', 'language-school'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => '#f0f0f0' 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'language-school' . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'language-school' . '_bg_img', 
			'title' => esc_html__('Background Image', 'language-school'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'language-school'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'language-school' . '_bg_rep', 
			'title' => esc_html__('Background Repeat', 'language-school'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'language-school') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'language-school') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'language-school') . '|repeat-y', 
				esc_html__('Repeat', 'language-school') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'language-school' . '_bg_pos', 
			'title' => esc_html__('Background Position', 'language-school'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'top center', 
			'choices' => array( 
				esc_html__('Top Left', 'language-school') . '|top left', 
				esc_html__('Top Center', 'language-school') . '|top center', 
				esc_html__('Top Right', 'language-school') . '|top right', 
				esc_html__('Center Left', 'language-school') . '|center left', 
				esc_html__('Center Center', 'language-school') . '|center center', 
				esc_html__('Center Right', 'language-school') . '|center right', 
				esc_html__('Bottom Left', 'language-school') . '|bottom left', 
				esc_html__('Bottom Center', 'language-school') . '|bottom center', 
				esc_html__('Bottom Right', 'language-school') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'language-school' . '_bg_att', 
			'title' => esc_html__('Background Attachment', 'language-school'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'language-school') . '|scroll', 
				esc_html__('Fixed', 'language-school') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'language-school' . '_bg_size', 
			'title' => esc_html__('Background Size', 'language-school'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'language-school') . '|auto', 
				esc_html__('Cover', 'language-school') . '|cover', 
				esc_html__('Contain', 'language-school') . '|contain' 
			) 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'language-school' . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'language-school'), 
			'desc' => esc_html__('enable', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'language-school' . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content', 'language-school'), 
			'desc' => esc_html__('enable', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'language-school' . '_header_top_line', 
			'title' => esc_html__('Top Line', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'language-school' . '_header_top_height', 
			'title' => esc_html__('Top Height', 'language-school'), 
			'desc' => esc_html__('pixels', 'language-school'), 
			'type' => 'number', 
			'std' => '38', 
			'min' => '30' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'language-school' . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'language-school'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'language-school') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'language-school' . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'language-school'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				esc_html__('None', 'language-school') . '|none', 
				esc_html__('Top Line Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'language-school') . '|social', 
				esc_html__('Top Line Navigation (will be shown if set in Appearance - Menus tab)', 'language-school') . '|nav' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'language-school' . '_header_styles', 
			'title' => esc_html__('Header Styles', 'language-school'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'default', 
			'choices' => array( 
				esc_html__('Default Style', 'language-school') . '|default', 
				esc_html__('Compact Style Left Navigation', 'language-school') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'language-school') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'language-school') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'language-school' . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'language-school'), 
			'desc' => esc_html__('pixels', 'language-school'), 
			'type' => 'number', 
			'std' => '100', 
			'min' => '80' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'language-school' . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'language-school'), 
			'desc' => esc_html__('pixels', 'language-school'), 
			'type' => 'number', 
			'std' => '50', 
			'min' => '40' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'language-school' . '_header_search', 
			'title' => esc_html__('Header Search', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'language-school' . '_header_button_check', 
			'title' => esc_html__('Header Button', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'language-school' . '_header_button_text', 
			'title' => esc_html__('Header Button Title', 'language-school'), 
			'desc' => esc_html__('Enter title for header button', 'language-school'), 
			'type' => 'text', 
			'std' => '', 
			'class' => ''
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'language-school' . '_header_button_link', 
			'title' => esc_html__('Header Button Link', 'language-school'), 
			'desc' => esc_html__('Enter link for header button', 'language-school'), 
			'type' => 'text', 
			'std' => '', 
			'class' => ''
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'language-school' . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'language-school'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'none', 
			'choices' => array( 
				esc_html__('None', 'language-school') . '|none', 
				esc_html__('Header Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'language-school') . '|social', 
				esc_html__('Header Custom HTML', 'language-school') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'language-school' . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'language-school'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'language-school') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
	if (CMSMASTERS_WOOCOMMERCE) {
		$options[] = array(
			'section' => 'header_section',
			'id' => 'language-school' . '_woocommerce_cart_dropdown',
			'title' => esc_html__('Disable WooCommerce Cart', 'language-school'),
			'desc' => '',
			'type' => 'checkbox',
			'std' => 0
		);
	}
	
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'language-school'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'language-school'), 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'language-school'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Archive Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'language-school'), 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'language-school'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Search Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'language-school'), 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
	if (CMSMASTERS_EVENTS_CALENDAR) {
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_events_layout', 
			'title' => esc_html__('Events Calendar Layout Type', 'language-school'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Search Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'language-school'), 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
	}
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'language-school'), 
			'desc' => esc_html__('Layout for pages of non-listed types. Choosing layout with a sidebar please make sure to add widgets to the Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'language-school'), 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'language-school'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'left', 
			'choices' => array( 
				esc_html__('Left', 'language-school') . '|left', 
				esc_html__('Right', 'language-school') . '|right', 
				esc_html__('Center', 'language-school') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_heading_scheme', 
			'title' => esc_html__('Heading Color Scheme by Default', 'language-school'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'first', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'language-school'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'language-school'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'language-school'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'language-school') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'language-school') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'language-school') . '|repeat-y', 
				esc_html__('Repeat', 'language-school') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'language-school'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'language-school') . '|scroll', 
				esc_html__('Fixed', 'language-school') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'language-school'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'language-school') . '|auto', 
				esc_html__('Cover', 'language-school') . '|cover', 
				esc_html__('Contain', 'language-school') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'language-school'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => '#01a2a6' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'language-school'), 
			'desc' => esc_html__('pixels', 'language-school'), 
			'type' => 'number', 
			'std' => '90', 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_bottom_scheme', 
			'title' => esc_html__('Bottom Color Scheme', 'language-school'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'bottom', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'language-school'), 
			'desc' => esc_html__('show', 'language-school') . '<br><br>' . esc_html__('Please make sure to add widgets in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'language-school' . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'language-school'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => '14141414', 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'language-school' . '_footer_scheme', 
			'title' => esc_html__('Footer Color Scheme', 'language-school'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'footer', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'language-school' . '_footer_type', 
			'title' => esc_html__('Footer Type', 'language-school'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'small', 
			'choices' => array( 
				esc_html__('Default', 'language-school') . '|default', 
				esc_html__('Small', 'language-school') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'language-school' . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'language-school'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				esc_html__('None', 'language-school') . '|none', 
				esc_html__('Footer Navigation (will be shown if set in Appearance - Menus tab)', 'language-school') . '|nav', 
				esc_html__('Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'language-school') . '|social', 
				esc_html__('Custom HTML', 'language-school') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'language-school' . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'language-school' . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'language-school'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'language-school'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'language-school' . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'language-school'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'language-school'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'language-school' . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'language-school' . '_footer_social', 
			'title' => esc_html__('Footer Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'language-school' . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'language-school'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'language-school') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'language-school' . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'language-school'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '&copy; ' . date('Y') . ' ' . 'Language School', 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

