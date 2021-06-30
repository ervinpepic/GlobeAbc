<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.8
 * 
 * Posts Slider Standard Post Format Template
 * Created by CMSMasters
 * 
 */



$cmsmasters_metadata = explode(',', $cmsmasters_post_metadata);

$excerpt = in_array('excerpt', $cmsmasters_metadata) ? true : false;
$date = in_array('date', $cmsmasters_metadata) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_metadata))) ? true : false;
$author = in_array('author', $cmsmasters_metadata) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_metadata))) ? true : false;
$likes = in_array('likes', $cmsmasters_metadata) ? true : false;
$more = in_array('more', $cmsmasters_metadata) ? true : false;

?>

<!-- Start Standard Article  -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cmsmasters_slider_post_cont">
	<?php
		$date ? language_school_get_slider_post_date('post') : '';
		
		if (!post_password_required()) {
			language_school_thumb_rollover(get_the_ID(), 'cmsmasters-blog-masonry-thumb', false, true, false, false, false, false, false, false, true);
		}
		
		
		echo '<div class="cmsmasters_slider_post_cont_wrap">';
			
			language_school_slider_post_heading(get_the_ID(), 'post', 'h6');
			
			
			if ($author || $categories) {
				echo '<div class="cmsmasters_post_cont_info entry-meta">';
					
					$author ? language_school_get_slider_post_author('post') : '';
					
					$categories ? language_school_get_slider_post_category(get_the_ID(), 'category', 'post') : '';
					
				echo '</div>';
			}
			
			
			$excerpt ? language_school_slider_post_exc_cont('post') : '';
			
			
			if ($more || $likes || $comments) {
				echo '<footer class="cmsmasters_slider_post_footer entry-meta">';
					
					$more ? language_school_slider_post_more(get_the_ID()) : '';
					
					if ($likes || $comments) {
						echo '<div class="cmsmasters_slider_post_meta_info">';
							
							$likes ? language_school_slider_post_like('post') : '';
							
							$comments ? language_school_get_slider_post_comments('post') : '';
							
						echo '</div>';
					}
					
				echo '</footer>';
			}
			
		echo '</div>';
	?>
	</div>
</article>
<!-- Finish Standard Article  -->

