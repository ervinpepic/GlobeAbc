<?php 
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.0.3
 * 
 * Admin Panel Theme Settings Import/Export
 * Created by CMSMasters
 * 
 */


function language_school_options_demo_tabs() {
	$tabs = array();
	
	
	$tabs['import'] = esc_attr__('Import', 'language-school');
	$tabs['export'] = esc_attr__('Export', 'language-school');
	
	
	return $tabs;
}


function language_school_options_demo_sections() {
	$tab = language_school_get_the_tab();
	
	
	switch ($tab) {
	case 'import':
		$sections = array();
		
		$sections['import_section'] = esc_html__('Theme Settings Import', 'language-school');
		
		
		break;
	case 'export':
		$sections = array();
		
		$sections['export_section'] = esc_html__('Theme Settings Export', 'language-school');
		
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	
	return $sections;
} 


function language_school_options_demo_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = language_school_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'import':
		$options[] = array( 
			'section' => 'import_section', 
			'id' => 'language-school' . '_demo_import', 
			'title' => esc_html__('Theme Settings', 'language-school'), 
			'desc' => esc_html__("Enter your theme settings data here and click 'Import' button", 'language-school'), 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		
		break;
	case 'export':
		$options[] = array( 
			'section' => 'export_section', 
			'id' => 'language-school' . '_demo_export', 
			'title' => esc_html__('Theme Settings', 'language-school'), 
			'desc' => esc_html__("Click here to export your theme settings data to the file", 'language-school'), 
			'type' => 'button', 
			'std' => esc_html__('Export Theme Settings', 'language-school'), 
			'class' => 'cmsmasters-demo-export' 
		);
		
		
		break;
	}
	
	
	return $options;	
}

