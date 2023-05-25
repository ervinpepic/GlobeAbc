<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.2.9
 * 
 * Single Post Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = language_school_get_global_options();


list($cmsmasters_layout) = language_school_theme_page_layout_scheme();


$cmsmasters_post_author_box = get_post_meta(get_the_ID(), 'cmsmasters_post_author_box', true);

$cmsmasters_post_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_post_more_posts', true);


echo '<!-- Start Content  -->' . "\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo '<div class="content entry">' . "\n\t";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo '<div class="content entry fr">' . "\n\t";
} else {
	echo '<div class="middle_content entry">';
}


if (have_posts()) : the_post();
	echo '<div class="blog opened-article">' . "\n";
	
	
	if ( 'tribe_event_series' === get_post_type( get_the_ID() ) ) {
		the_content();
	} else {
		if (get_post_format() != '') {
			get_template_part('framework/post-type/blog/post/' . get_post_format());
		} else {
			get_template_part('framework/post-type/blog/post/standard');
		}
		
		
		if ($cmsmasters_option['language-school' . '_blog_post_nav_box']) {
			language_school_prev_next_posts();
		}
		
		
		if ($cmsmasters_post_author_box == 'true') {
			language_school_author_box(esc_html__('About author', 'language-school'), 'h6', 'h3');
		}
		
		
		if (get_the_tags()) {
			$tgsarray = array();
			
			foreach (get_the_tags() as $tagone) {
				$tgsarray[] = $tagone->term_id;
			}
		} else {
			$tgsarray = '';
		}
		
		
		if ($cmsmasters_post_more_posts != 'hide') {
			language_school_related( 
				'h6', 
				$cmsmasters_post_more_posts, 
				$tgsarray, 
				$cmsmasters_option['language-school' . '_blog_more_posts_count'], 
				$cmsmasters_option['language-school' . '_blog_more_posts_pause'], 
				'post' 
			);
		}
		
		
		echo language_school_get_post_pings(get_the_ID(), 'h6');
		
		
		comments_template(); 
	}
	
	
	echo '</div>';
endif;


echo '</div>' . "\n" . 
'<!--  Finish Content  -->' . "\n\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo "\n" . '<!--  Start Sidebar  -->' . "\n" . 
	'<div class="sidebar" role="complementary">' . "\n";
	
	
	get_sidebar();
	
	
	echo "\n" . '</div>' . "\n" . 
	'<!--  Finish Sidebar  -->' . "\n";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo "\n" . '<!--  Start Sidebar  -->' . "\n" . 
	'<div class="sidebar fl" role="complementary">' . "\n";
	
	
	get_sidebar();
	
	
	echo "\n" . '</div>' . "\n" . 
	'<!--  Finish Sidebar  -->' . "\n";
}


get_footer();

