<?php 
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.0.7
 * 
 * Admin Panel Post, Project, Profile Settings
 * Created by CMSMasters
 * 
 */


function language_school_options_single_tabs() {
	$tabs = array();
	
	
	$tabs['post'] = esc_attr__('Post', 'language-school');
	
	if (CMSMASTERS_PROJECT_COMPATIBLE && class_exists('Cmsmasters_Projects')) {
		$tabs['project'] = esc_attr__('Project', 'language-school');
	}
	
	if (CMSMASTERS_PROFILE_COMPATIBLE && class_exists('Cmsmasters_Profiles')) {
		$tabs['profile'] = esc_attr__('Profile', 'language-school');
	}
	
	if (CMSMASTERS_TIMETABLE) {
		$tabs['tt_event'] = esc_attr__('Timetable Event', 'language-school');
	}
	
	if (CMSMASTERS_LEARNPRESS) {
		$tabs['lpr_course'] = esc_attr__('Course', 'language-school');
	}
	
	return $tabs;
}


function language_school_options_single_sections() {
	$tab = language_school_get_the_tab();
	
	
	switch ($tab) {
	case 'post':
		$sections = array();
		
		$sections['post_section'] = esc_attr__('Blog Post Options', 'language-school');
		
		
		break;
	case 'project':
		$sections = array();
		
		$sections['project_section'] = esc_attr__('Portfolio Project Options', 'language-school');
		
		
		break;
	case 'profile':
		$sections = array();
		
		$sections['profile_section'] = esc_attr__('Person Block Profile Options', 'language-school');
		
		
		break;
	case 'tt_event':
		$sections = array();
		
		$sections['tt_event_section'] = esc_attr__('Timetable Event Options', 'language-school');
		
		
		break;
	case 'lpr_course':
		$sections = array();
		
		$sections['lpr_course_section'] = esc_attr__('LearnPress Course Options', 'language-school');
		
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	
	return $sections;
} 


function language_school_options_single_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = language_school_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'post':
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'language-school' . '_blog_post_layout', 
			'title' => esc_html__('Layout Type', 'language-school'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'language-school' . '_blog_post_title', 
			'title' => esc_html__('Post Title', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'language-school' . '_blog_post_date', 
			'title' => esc_html__('Post Date', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'language-school' . '_blog_post_cat', 
			'title' => esc_html__('Post Categories', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'language-school' . '_blog_post_author', 
			'title' => esc_html__('Post Author', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'language-school' . '_blog_post_comment', 
			'title' => esc_html__('Post Comments', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'language-school' . '_blog_post_tag', 
			'title' => esc_html__('Post Tags', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'language-school' . '_blog_post_like', 
			'title' => esc_html__('Post Likes', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'language-school' . '_blog_post_nav_box', 
			'title' => esc_html__('Posts Navigation Box', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'language-school' . '_blog_post_share_box', 
			'title' => esc_html__('Sharing Box', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'language-school' . '_blog_post_author_box', 
			'title' => esc_html__('About Author Box', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'language-school' . '_blog_more_posts_box', 
			'title' => esc_html__('More Posts Box', 'language-school'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'related', 
			'choices' => array( 
				esc_html__('Show Related Posts', 'language-school') . '|related', 
				esc_html__('Show Popular Posts', 'language-school') . '|popular', 
				esc_html__('Show Recent Posts', 'language-school') . '|recent', 
				esc_html__('Hide More Posts Box', 'language-school') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'language-school' . '_blog_more_posts_count', 
			'title' => esc_html__('More Posts Box Items Number', 'language-school'), 
			'desc' => esc_html__('posts', 'language-school'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'language-school' . '_blog_more_posts_pause', 
			'title' => esc_html__('More Posts Slider Pause Time', 'language-school'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'language-school'), 
			'type' => 'number', 
			'std' => '0', 
			'min' => '0', 
			'max' => '20' 
		);
		
		
		break;
	case 'project':
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_project_title', 
			'title' => esc_html__('Project Title', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_project_details_title', 
			'title' => esc_html__('Project Details Title', 'language-school'), 
			'desc' => esc_html__('Enter a project details block title', 'language-school'), 
			'type' => 'text', 
			'std' => 'Project details', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_project_date', 
			'title' => esc_html__('Project Date', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_project_cat', 
			'title' => esc_html__('Project Categories', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_project_author', 
			'title' => esc_html__('Project Author', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_project_comment', 
			'title' => esc_html__('Project Comments', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_project_tag', 
			'title' => esc_html__('Project Tags', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_project_like', 
			'title' => esc_html__('Project Likes', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_project_link', 
			'title' => esc_html__('Project Link', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_project_share_box', 
			'title' => esc_html__('Sharing Box', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_project_nav_box', 
			'title' => esc_html__('Projects Navigation Box', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_project_author_box', 
			'title' => esc_html__('About Author Box', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_more_projects_box', 
			'title' => esc_html__('More Projects Box', 'language-school'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'related', 
			'choices' => array( 
				esc_html__('Show Related Projects', 'language-school') . '|related', 
				esc_html__('Show Popular Projects', 'language-school') . '|popular', 
				esc_html__('Show Recent Projects', 'language-school') . '|recent', 
				esc_html__('Hide More Projects Box', 'language-school') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_more_projects_count', 
			'title' => esc_html__('More Projects Box Items Number', 'language-school'), 
			'desc' => esc_html__('projects', 'language-school'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_more_projects_pause', 
			'title' => esc_html__('More Projects Slider Pause Time', 'language-school'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'language-school'), 
			'type' => 'number', 
			'std' => '0', 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_project_slug', 
			'title' => esc_html__('Project Slug', 'language-school'), 
			'desc' => esc_html__('Enter a page slug that should be used for your projects single item', 'language-school'), 
			'type' => 'text', 
			'std' => 'project', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_pj_categs_slug', 
			'title' => esc_html__('Project Categories Slug', 'language-school'), 
			'desc' => esc_html__('Enter page slug that should be used on projects categories archive page', 'language-school'), 
			'type' => 'text', 
			'std' => 'pj-categs', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'language-school' . '_portfolio_pj_tags_slug', 
			'title' => esc_html__('Project Tags Slug', 'language-school'), 
			'desc' => esc_html__('Enter page slug that should be used on projects tags archive page', 'language-school'), 
			'type' => 'text', 
			'std' => 'pj-tags', 
			'class' => '' 
		);
		
		
		break;
	case 'profile':
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'language-school' . '_profile_post_title', 
			'title' => esc_html__('Profile Title', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'language-school' . '_profile_post_color', 
			'title' => esc_html__('Profile Color', 'language-school'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#01a2a6' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'language-school' . '_profile_post_details_title', 
			'title' => esc_html__('Profile Details Title', 'language-school'), 
			'desc' => esc_html__('Enter a profile details block title', 'language-school'), 
			'type' => 'text', 
			'std' => 'Profile details', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'language-school' . '_profile_post_cat', 
			'title' => esc_html__('Profile Categories', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'language-school' . '_profile_post_comment', 
			'title' => esc_html__('Profile Comments', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'language-school' . '_profile_post_like', 
			'title' => esc_html__('Profile Likes', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'language-school' . '_profile_post_nav_box', 
			'title' => esc_html__('Profiles Navigation Box', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'language-school' . '_profile_post_share_box', 
			'title' => esc_html__('Sharing Box', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'language-school' . '_profile_post_slug', 
			'title' => esc_html__('Profile Slug', 'language-school'), 
			'desc' => esc_html__('Enter a page slug that should be used for your profiles single item', 'language-school'), 
			'type' => 'text', 
			'std' => 'profile', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'language-school' . '_profile_pl_categs_slug', 
			'title' => esc_html__('Profile Categories Slug', 'language-school'), 
			'desc' => esc_html__('Enter page slug that should be used on profiles categories archive page', 'language-school'), 
			'type' => 'text', 
			'std' => 'pl-categs', 
			'class' => '' 
		);
		
		
		break;
	case 'tt_event':
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => 'language-school' . '_tt_event_hours', 
			'title' => esc_html__('Event Hours', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => 'language-school' . '_tt_event_hours_title', 
			'title' => esc_html__('Event Hours Title', 'language-school'), 
			'desc' => esc_html__('Enter a event hours block title', 'language-school'), 
			'type' => 'text', 
			'std' => 'Event Hours', 
			'class' => ''
		);
		
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => 'language-school' . '_tt_event_details_title', 
			'title' => esc_html__('Event Details Title', 'language-school'), 
			'desc' => esc_html__('Enter a event details block title', 'language-school'), 
			'type' => 'text', 
			'std' => 'Event Details', 
			'class' => ''
		);
		
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => 'language-school' . '_tt_event_cat', 
			'title' => esc_html__('Event Categories', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		
		break;
	case 'lpr_course':
		$options[] = array( 
			'section' => 'lpr_course_section', 
			'id' => 'language-school' . '_lpr_post_layout', 
			'title' => esc_html__('Layout Type', 'language-school'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'language-school') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lpr_course_section', 
			'id' => 'language-school' . '_lpr_course_title', 
			'title' => esc_html__('Course Title', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'),  
			'type' => 'checkbox', 
			'std' => 1
		);
		
		$options[] = array( 
			'section' => 'lpr_course_section', 
			'id' => 'language-school' . '_lpr_course_image', 
			'title' => esc_html__('Course Featured Image', 'language-school'), 
			'desc' => esc_html__('show', 'language-school'),  
			'type' => 'checkbox', 
			'std' => 1
		);
		
		
		break;
	}
	
	
	return $options;
}

