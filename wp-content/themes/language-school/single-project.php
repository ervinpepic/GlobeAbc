<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.8
 * 
 * Single Project Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = language_school_get_global_options();


$project_tags = get_the_terms(get_the_ID(), 'pj-tags');


$cmsmasters_project_author_box = get_post_meta(get_the_ID(), 'cmsmasters_project_author_box', true);

$cmsmasters_project_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_project_more_posts', true);


echo '<!-- Start Content  -->' . "\n" . 
'<div class="middle_content entry">';


if (have_posts()) : the_post();
	echo '<div class="portfolio opened-article">' . "\n";
	
	
	if (get_post_format() != '') {
		get_template_part('framework/postType/portfolio/post/' . get_post_format());
	} else {
		get_template_part('framework/postType/portfolio/post/standard');
	}
	
	
	if ($cmsmasters_option['language-school' . '_portfolio_project_nav_box']) {
		language_school_prev_next_posts();
	}
	
	
	if ($cmsmasters_project_author_box == 'true') {
		language_school_author_box(esc_html__('About author', 'language-school'), 'h6');
	}
	
	
	if ($project_tags) {
		$tgsarray = array();
		
		
		foreach ($project_tags as $tagone) {
			$tgsarray[] = $tagone->term_id;
		}  
	} else {
		$tgsarray = '';
	}
	
	
	if ($cmsmasters_project_more_posts != 'hide') {
		language_school_related( 
			'h6', 
			$cmsmasters_project_more_posts, 
			$tgsarray, 
			$cmsmasters_option['language-school' . '_portfolio_more_projects_count'],
			$cmsmasters_option['language-school' . '_portfolio_more_projects_pause'], 
			'project',
			'pj-tags'
		);
	}
	
	
	comments_template(); 
	
	
	echo '</div>';
endif;


echo '</div>' . "\n" . 
'<!--  Finish Content  -->' . "\n\n";


get_footer();

