<?php 
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version 	1.3.1
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function language_school_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'language-school');
	$tabs['icon'] = esc_attr__('Social Icons', 'language-school');
	$tabs['lightbox'] = esc_attr__('Lightbox', 'language-school');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'language-school');
	$tabs['error'] = esc_attr__('404', 'language-school');
	$tabs['code'] = esc_attr__('Custom Codes', 'language-school');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'language-school');
	}
	
	return $tabs;
}


function language_school_options_element_sections() {
	$tab = language_school_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'language-school');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'language-school');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'language-school');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'language-school');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'language-school');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'language-school');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'language-school');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return $sections;	
} 


function language_school_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = language_school_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => 'language-school' . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'language-school'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => '' 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => 'language-school' . '_social_icons', 
			'title' => esc_html__('Social Icons', 'language-school'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => array( 
				'cmsmasters-icon-linkedin|#|' . esc_html__('Linkedin', 'language-school') . '|true||', 
				'cmsmasters-icon-facebook|#|' . esc_html__('Facebook', 'language-school') . '|true||', 
				'cmsmasters-icon-gplus|#|' . esc_html__('Google', 'language-school') . '|true||', 
				'cmsmasters-icon-twitter|#|' . esc_html__('Twitter', 'language-school') . '|true||', 
				'cmsmasters-icon-skype|#|' . esc_html__('Skype', 'language-school') . '|true||' 
			) 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'language-school'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'dark', 
			'choices' => array( 
				esc_html__('Dark', 'language-school') . '|dark', 
				esc_html__('Light', 'language-school') . '|light', 
				esc_html__('Mac', 'language-school') . '|mac', 
				esc_html__('Metro Black', 'language-school') . '|metro-black', 
				esc_html__('Metro White', 'language-school') . '|metro-white', 
				esc_html__('Parade', 'language-school') . '|parade', 
				esc_html__('Smooth', 'language-school') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_path', 
			'title' => esc_html__('Path', 'language-school'), 
			'desc' => esc_html__('Sets path for switching windows', 'language-school'), 
			'type' => 'radio', 
			'std' => 'vertical', 
			'choices' => array( 
				esc_html__('Vertical', 'language-school') . '|vertical', 
				esc_html__('Horizontal', 'language-school') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'language-school'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'language-school'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'language-school'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'language-school'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'language-school'), 
			'type' => 'number', 
			'std' => 1, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'language-school'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'language-school'), 
			'type' => 'number', 
			'std' => 0.2, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'language-school'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'language-school'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'language-school'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'language-school'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'language-school'), 
			'type' => 'select', 
			'std' => 'center', 
			'choices' => array( 
				esc_html__('Center', 'language-school') . '|center', 
				esc_html__('Fit', 'language-school') . '|fit', 
				esc_html__('Fill', 'language-school') . '|fill', 
				esc_html__('Stretch', 'language-school') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'language-school'), 
			'desc' => esc_html__('Sets buttons be available or not', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'language-school'), 
			'desc' => esc_html__('Enable the arrow buttons', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'language-school'), 
			'desc' => esc_html__('Sets the fullscreen button', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'language-school'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'language-school'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'language-school'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'language-school'), 
			'desc' => esc_html__('Sets the swipe navigation', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'language-school' . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'language-school'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'language-school' . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'language-school' . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'language-school' . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'language-school' . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'language-school' . '_sitemap_pj_categs', 
			'title' => esc_html__('Portfolio Archives by Categories', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'language-school' . '_sitemap_pj_tags', 
			'title' => esc_html__('Portfolio Archives by Tags', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'language-school' . '_error_color', 
			'title' => esc_html__('Text Color', 'language-school'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#292929' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'language-school' . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'language-school'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#fbfbfb' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'language-school' . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'language-school' . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'language-school'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'language-school'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'language-school' . '_error_bg_rep', 
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
			'section' => 'error_section', 
			'id' => 'language-school' . '_error_bg_pos', 
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
			'section' => 'error_section', 
			'id' => 'language-school' . '_error_bg_att', 
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
			'section' => 'error_section', 
			'id' => 'language-school' . '_error_bg_size', 
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
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'language-school' . '_error_search', 
			'title' => esc_html__('Search Line', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'language-school' . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'language-school' . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'language-school'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'language-school' . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'language-school'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'language-school' . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'language-school'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'language-school' . '_gmap_api_key', 
			'title' => esc_html__('Google Maps API key', 'language-school'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'language-school' . '_twitter_access_data', 
			'title' => esc_html__('Twitter Access Data', 'language-school'), 
			'desc' => sprintf(
				/* translators: Twitter access data. %s: Link to twitter access data generator */
				esc_html__( 'Generate %s and paste access data to fields.', 'language-school' ),
				'<a href="' . esc_url( 'https://api.cmsmasters.net/wp-json/cmsmasters-api/v1/twitter-request-token' ) . '" target="_blank">' .
					esc_html__( 'twitter access data', 'language-school' ) .
				'</a>'
			), 
			'type' => 'multi-text', 
			'std' => array(),
			'class' => 'regular-text', 
			'choices' => array( 
				esc_html__('Consumer Key', 'language-school') . '|consumer_key', 
				esc_html__('Consumer Secret', 'language-school') . '|consumer_secret', 
				esc_html__('Access Token', 'language-school') . '|access_token', 
				esc_html__('Access Token Secret', 'language-school') . '|access_token_secret' 
			) 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'language-school' . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'language-school'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'language-school' . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'language-school'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

