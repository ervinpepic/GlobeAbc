<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version 	1.2.4
 * 
 * TGM-Plugin-Activation 2.6.1
 * Created by CMSMasters
 * 
 */


language_school_locate_template('framework/class/class-tgm-plugin-activation.php', true);


if (!function_exists('language_school_register_theme_plugins')) {

function language_school_register_theme_plugins() { 
	$plugins = array( 
		array( 
			'name'					=> esc_html__('CMSMasters Content Composer', 'language-school'), 
			'slug'					=> 'cmsmasters-content-composer', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/cmsmasters-content-composer.zip', 
			'required'				=> true, 
			'version'				=> '1.8.2', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> true 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Mega Menu', 'language-school'), 
			'slug'					=> 'cmsmasters-mega-menu', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/cmsmasters-mega-menu.zip', 
			'required'				=> true, 
			'version'				=> '1.2.7', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> true 
		),  
		array( 
			'name'					=> esc_html__('CMSMasters Importer', 'language-school'), 
			'slug'					=> 'cmsmasters-importer', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/cmsmasters-importer.zip', 
			'required'				=> true, 
			'version'				=> '1.0.6', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> true 
		), 
		array( 
			'name' 					=> esc_html__('LayerSlider WP', 'language-school'), 
			'slug' 					=> 'LayerSlider', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/LayerSlider.zip', 
			'required'				=> false, 
			'version'				=> '6.11.9', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name' 					=> esc_html__('Revolution Slider', 'language-school'),
			'slug' 					=> 'revslider', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/revslider.zip', 
			'required'				=> false, 
			'version'				=> '6.5.11', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name'					=> esc_html__('Timetable', 'language-school'), 
			'slug'					=> 'timetable', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/timetable.zip', 
			'required'				=> false, 
			'version'				=> '6.8', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> true 
		), 
		array( 
			'name'					=> esc_html__('Envato Market', 'language-school'), 
			'slug'					=> 'envato-market', 
			'source'				=> 'https://envato.github.io/wp-envato-market/dist/envato-market.zip', 
			'required'				=> false 
		), 
		array( 
			'name'					=> esc_html__('LearnPress', 'language-school'), 
			'slug' 					=> 'learnpress', 
			'required' 				=> false 
		), 
		array( 
			'name'					=> esc_html__('LearnPress Course Review', 'language-school'), 
			'slug' 					=> 'learnpress-course-review', 
			'required' 				=> false 
		), 
		array( 
			'name'					=> esc_html__('LearnPress Courses Wishlist', 'language-school'), 
			'slug' 					=> 'learnpress-wishlist', 
			'required' 				=> false 
		), 
		array( 
			'name'					=> esc_html__('LearnPress Prerequisite Courses', 'language-school'), 
			'slug' 					=> 'learnpress-prerequisites-courses', 
			'required' 				=> false 
		), 
		array( 
			'name' 					=> esc_html__('Contact Form 7', 'language-school'), 
			'slug' 					=> 'contact-form-7', 
			'required' 				=> false 
		), 
		array( 
			'name' 					=> esc_html__('WordPress SEO by Yoast', 'language-school'), 
			'slug' 					=> 'wordpress-seo', 
			'required' 				=> false 
		), 
		array( 
			'name'					=> esc_html__('GDPR Cookie Consent', 'language-school'), 
			'slug'					=> 'cookie-law-info', 
			'required'				=> false 
		), 
		array( 
			'name' 					=> esc_html__('PayPal Donations', 'language-school'), 
			'slug' 					=> 'paypal-donations', 
			'required'				=> false 
		), 
		array( 
			'name' 					=> esc_html__('The Events Calendar', 'language-school'),
			'slug' 					=> 'the-events-calendar', 
			'required'				=> false 
		), 
		array( 
			'name'					=> esc_html__('MailPoet 3', 'language-school'), 
			'slug'					=> 'mailpoet', 
			'required'				=> false 
		)  
	);
	
	
	$config = array( 
		'id' => 			'language-school', 
		'menu' => 			'theme-required-plugins', 
		'strings' => array( 
			'page_title' => 	esc_html__('Theme Required & Recommended Plugins', 'language-school'), 
			'menu_title' => 	esc_html__('Theme Plugins', 'language-school'), 
			'return' => 		esc_html__('Return to Theme Required & Recommended Plugins', 'language-school') 
		) 
	);
	
	
	tgmpa($plugins, $config);
}

}

add_action('tgmpa_register', 'language_school_register_theme_plugins');
