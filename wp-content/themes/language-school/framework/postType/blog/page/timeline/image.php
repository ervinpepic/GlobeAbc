<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.8
 * 
 * Blog Page Timeline Image Post Format Template
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


$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);

?>

<!-- Start Image Article  -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_timeline_type'); ?>>
	<div class="cmsmasters_post_info entry-meta">
		<?php $date ? language_school_get_post_date('page', 'timeline') : ''; ?>
	</div>
	<div class="cmsmasters_post_cont">
	<?php 
		if (!post_password_required()) {
			if ($cmsmasters_post_image_link != '') {
				language_school_thumb(get_the_ID(), 'cmsmasters-masonry-thumb', false, 'img_' . get_the_ID(), true, true, true, true, $cmsmasters_post_image_link);
			} elseif (has_post_thumbnail()) {
				language_school_thumb(get_the_ID(), 'cmsmasters-masonry-thumb', false, 'img_' . get_the_ID(), true, true, true, true, false);
			}
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
<!-- Finish Image Article  -->

