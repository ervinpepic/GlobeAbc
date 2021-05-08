<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.8
 * 
 * Blog Post Image Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = language_school_get_global_options();


$cmsmasters_post_title = get_post_meta(get_the_ID(), 'cmsmasters_post_title', true);

$cmsmasters_post_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_post_sharing_box', true);

$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);


list($cmsmasters_layout) = language_school_theme_page_layout_scheme();

if ($cmsmasters_layout == 'fullwidth') {
	$cmsmasters_image_thumb_size = 'cmsmasters-full-masonry-thumb';
} else {
	$cmsmasters_image_thumb_size = 'cmsmasters-masonry-thumb';
}

?>

<!-- Start Image Article  -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		language_school_get_post_date('post');
	?>
	<div class="cmsmasters_post_cont">
	<?php 
		if (!post_password_required()) {
			if ($cmsmasters_post_image_link != '') {
				language_school_thumb(get_the_ID(), $cmsmasters_image_thumb_size, false, 'img_' . get_the_ID(), true, true, true, true, $cmsmasters_post_image_link);
			} elseif (has_post_thumbnail()) {
				language_school_thumb(get_the_ID(), $cmsmasters_image_thumb_size, false, 'img_' . get_the_ID(), true, true, true, true, false);
			}
		}
		
		
		if ($cmsmasters_post_title == 'true') {
			language_school_post_title_nolink(get_the_ID(), 'h2');
		}
		
		
		if (get_the_content() != '') {
			echo '<div class="cmsmasters_post_content entry-content">';
				
				the_content();
				
				
				wp_link_pages(array( 
					'before' => '<div class="subpage_nav" role="navigation">' . '<strong>' . esc_html__('Pages', 'language-school') . ':</strong>', 
					'after' => '</div>', 
					'link_before' => '<span>', 
					'link_after' => '</span>' 
				));
				
			echo '<div class="cl"></div>' . 
			'</div>';
		}
		
		
		if (  
			$cmsmasters_option['language-school' . '_blog_post_author'] || 
			$cmsmasters_option['language-school' . '_blog_post_cat'] || 
			$cmsmasters_option['language-school' . '_blog_post_tag'] || 
			$cmsmasters_option['language-school' . '_blog_post_like'] || 
			$cmsmasters_option['language-school' . '_blog_post_comment'] 
		) {
			echo '<div class="cmsmasters_post_cont_info entry-meta">';
				
				if ( 
					$cmsmasters_option['language-school' . '_blog_post_like'] || 
					$cmsmasters_option['language-school' . '_blog_post_comment'] 
				) {
					echo '<div class="cmsmasters_post_meta_info">';
						
						cmsmasters_get_post_like('post');
						
						language_school_get_post_comments('post');
						
					echo '</div>';
				}
				
				
				cmsmasters_post_author('post');
				
				language_school_get_post_category(get_the_ID(), 'category', 'post');
				
				language_school_get_post_tags('post');
				
			echo '</div>';
		}
		
		
		if ($cmsmasters_post_sharing_box == 'true') {
			language_school_sharing_box(esc_html__('Share It', 'language-school'), 'h6');
		}
	?>
	</div>
</article>
<!-- Finish Image Article  -->

