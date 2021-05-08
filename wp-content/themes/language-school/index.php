<?php 
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.8
 * 
 * Default Main Page Template
 * Created by CMSMasters
 * 
 */


get_header();


list($cmsmasters_layout) = language_school_theme_page_layout_scheme();


echo '<!-- Start Content  -->' . "\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo '<div class="content entry">' . "\n\t";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo '<div class="content entry fr">' . "\n\t";
} else {
	echo '<div class="middle_content entry">';
}

	echo '<div class="blog">' . "\n";
	
	if (have_posts()) :
		while (have_posts()) : the_post();
			if (get_post_format() != '') {
				get_template_part('framework/postType/blog/page/default/' . get_post_format());
			} else {
				get_template_part('framework/postType/blog/page/default/standard');
			}
		endwhile;
		
		echo cmsmasters_pagination();
	endif;
		
	echo '</div>' . "\n" . 
'</div>' . "\n" . 
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

