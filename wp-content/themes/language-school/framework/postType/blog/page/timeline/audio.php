<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.8
 * 
 * Blog Page Timeline Audio Post Format Template
 * Created by CMSMasters
 * 
 */
 


$cmsmasters_post_metadata = explode(',', $cmsmasters_metadata);


$date = (in_array('date', $cmsmasters_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsmasters_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsmasters_post_metadata) || is_home()) ? true : false;
$tags = (get_the_tags() && (in_array('tags', $cmsmasters_post_metadata) || is_home())) ? true : false;
$more = (in_array('more', $cmsmasters_post_metadata) || is_home()) ? true : false;


$cmsmasters_post_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_post_audio_links', true);

?>

<!-- Start Audio Article  -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_timeline_type'); ?>>
	<div class="cmsmasters_post_info entry-meta">
		<?php $date ? language_school_get_post_date('page', 'timeline') : ''; ?>
	</div>
	<div class="cmsmasters_post_cont">
	<?php 
		
		if (!post_password_required() && !empty($cmsmasters_post_audio_links) && sizeof($cmsmasters_post_audio_links) > 0) {
			$attrs = array(
				'preload' => 'none'
			);
			
			
			foreach ($cmsmasters_post_audio_links as $cmsmasters_post_audio_link_url) {
				$attrs[substr(strrchr($cmsmasters_post_audio_link_url, '.'), 1)] = $cmsmasters_post_audio_link_url;
			}
			
			
			echo '<div class="cmsmasters_audio">' . 
				wp_audio_shortcode($attrs) . 
			'</div>';
		}
		
		
		echo '<div class="cmsmasters_post_cont_inner">';
		
			language_school_post_heading(get_the_ID(), 'h6');
			
			
			if ($author || $categories || $tags) {
				echo '<div class="cmsmasters_post_cont_info entry-meta">';
					
					$author ? cmsmasters_post_author('page') : '';
					
					$categories ? language_school_get_post_category(get_the_ID(), 'category', 'page') : '';
					
					$tags ? language_school_get_post_tags('page') : '';
					
				echo '</div>';
			}
			
			
			language_school_post_exc_cont();
			
			
			if ($more || $likes || $comments) {
				echo '<footer class="cmsmasters_post_footer entry-meta">';
					
					$more ? language_school_post_more(get_the_ID()) : '';
					
					if ($comments || $likes) {
						echo '<div class="cmsmasters_post_meta_info">';
							
							$likes ? cmsmasters_get_post_like('page') : '';
							
							$comments ? language_school_get_post_comments('page') : '';
							
						echo '</div>';
					}
					
				echo '</footer>';
			}
	?>
		</div>
		<div class="cl"></div>
	</div>
</article>
<!-- Finish Audio Article  -->

