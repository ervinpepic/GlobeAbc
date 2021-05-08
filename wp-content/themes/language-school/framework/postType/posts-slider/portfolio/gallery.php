<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.8
 * 
 * Posts Slider Gallery Project Format Template
 * Created by CMSMasters
 * 
 */



$cmsmasters_metadata = explode(',', $cmsmasters_project_metadata);

$title = in_array('title', $cmsmasters_metadata) ? true : false;
$excerpt = in_array('excerpt', $cmsmasters_metadata) ? true : false;
$categories = (get_the_terms(get_the_ID(), 'pj-categs') && in_array('categories', $cmsmasters_metadata)) ? true : false;
$comments = (comments_open() && in_array('comments', $cmsmasters_metadata)) ? true : false;
$likes = in_array('likes', $cmsmasters_metadata) ? true : false;


$cmsmasters_project_link_url = get_post_meta(get_the_ID(), 'cmsmasters_project_link_url', true);

$cmsmasters_project_link_redirect = get_post_meta(get_the_ID(), 'cmsmasters_project_link_redirect', true);


$cmsmasters_project_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsmasters_project_images', true))));

?>

<!-- Start Gallery Project  -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="slider_project_outer">
	<?php 
		language_school_thumb_rollover(get_the_ID(), 'cmsmasters-project-thumb', false, true, false, $cmsmasters_project_images, false, false, false, false, true, $cmsmasters_project_link_redirect, $cmsmasters_project_link_url);
		
		
		if ($title || $categories || $excerpt || $likes || $comments) {
			echo '<div class="slider_project_inner">';
				
				($title) ? language_school_slider_post_heading(get_the_ID(), 'project', 'h5', true, $cmsmasters_project_link_redirect, $cmsmasters_project_link_url) : '';
				
				
				if ($categories) {
					echo '<div class="cmsmasters_slider_project_cont_info entry-meta">';
						
						language_school_get_slider_post_category(get_the_ID(), 'pj-categs', 'project');
						
					echo '</div>';
				}
				
				
				($excerpt && language_school_slider_post_check_exc_cont('project')) ? language_school_slider_post_exc_cont('project') : '';
				
				
				if ($likes || $comments) {
					echo '<footer class="cmsmasters_slider_project_footer entry-meta">';
						
						($likes) ? language_school_slider_post_like('project') : '';
						
						($comments) ? language_school_get_slider_post_comments('project') : '';
						
					echo '</footer>';
				}
				
			echo '</div>';
		}
	?>
		<div class="cl"></div>
	</div>
</article>
<!-- Finish Gallery Project  -->

