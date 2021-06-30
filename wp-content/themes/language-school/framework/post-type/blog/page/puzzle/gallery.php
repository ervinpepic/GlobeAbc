<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.8
 * 
 * Blog Page Puzzle Gallery Post Format Template
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


$cmsmasters_post_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsmasters_post_images', true))));


$post_sort_categs = get_the_terms(0, 'category');

if ($post_sort_categs != '') {
	$post_categs = '';
	
	foreach ($post_sort_categs as $post_sort_categ) {
		$post_categs .= ' ' . $post_sort_categ->slug;
	}
	
	$post_categs = ltrim($post_categs, ' ');
}


$uniqid = uniqid();

?>

<!-- Start Gallery Article  -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_puzzle_type'); ?> data-category="<?php echo esc_attr($post_categs); ?>">
	<div class="cmsmasters_post_cont">
	<?php 
		if (!post_password_required()) {
			if (sizeof($cmsmasters_post_images) >= 1 && $cmsmasters_post_images[0] != '') {
				$first_post_image = array_shift($cmsmasters_post_images);
				
				
				$unique_id = uniqid('', true);
				$unique_id = strtr($unique_id, '.', '_');
				
				
				language_school_thumb(get_the_ID(), 'cmsmasters-project-thumb', false, 'img_' . get_the_ID(), true, false, true, true, $first_post_image, $unique_id);
				
				
				if (sizeof($cmsmasters_post_images) > 0) {
					echo '<div class="dn">';
					
					
					foreach ($cmsmasters_post_images as $cmsmasters_post_image) {
						$image_src = wp_get_attachment_image_src($cmsmasters_post_image, '|', true, 'full');
						
						
						echo '<figure>' . 
							'<a href="' . esc_url($image_src[0]) . '" title="' . esc_attr(cmsmasters_title(get_the_ID(), false)) . '" rel="ilightbox[img_' . get_the_ID() . '_' . $unique_id . ']">' . 
								wp_get_attachment_image(strstr($cmsmasters_post_image, '|', true), 'cmsmasters-project-thumb', false, array( 
									'class' => 	'full-width', 
									'alt' => 	esc_attr(cmsmasters_title(get_the_ID(), false)), 
									'title' => 	esc_attr(cmsmasters_title(get_the_ID(), false)) 
								)) . 
							'</a>' . 
						'</figure>';
					}
					
					
					echo '</div>';
				}
			} elseif (has_post_thumbnail()) {
				language_school_thumb(get_the_ID(), 'cmsmasters-project-thumb', false, 'img_' . get_the_ID(), true, false, true, true, false);
			} else {
				language_school_post_format_icon_placeholder(get_the_ID(), 'gallery');
			}
		} else {
			language_school_post_format_icon_placeholder(get_the_ID(), 'gallery');
		}
		
		
		echo '<div class="puzzle_post_content_wrapper">' . 
			'<div class="puzzle_post_content_wrap">';
			
			$date ? language_school_get_post_date('page', 'puzzle') : '';
			
			language_school_post_heading(get_the_ID(), 'h6');
			
			language_school_post_exc_cont();
			
			$more ? language_school_post_more(get_the_ID()) : '';
			
			
			if ($author || $categories || $tags || $likes || $comments) {
				echo '<footer class="cmsmasters_post_footer entry-meta">' . 
					'<div class="cmsmasters_post_footer_info">';
						
						$comments ? language_school_get_post_comments('page') : '';
						
						$likes ? cmsmasters_get_post_like('page') : '';
						
					echo '</div>';
					
					
					$author ? cmsmasters_post_author('page') : '';
					
					$categories ? language_school_get_post_category(get_the_ID(), 'category', 'page') : '';
					
					$tags ? language_school_get_post_tags('page') : '';
					
				echo '</footer>';
			}
			
			
		echo '</div>' . 
		'</div>';
	?>
	</div>
</article>
<!-- Finish Gallery Article  -->

