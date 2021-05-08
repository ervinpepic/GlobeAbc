<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.8
 * 
 * Blog Post Standard Post Format Template
 * Created by CMSMasters
 * 
 */
 
 
$cmsmasters_option = language_school_get_global_options();


$cmsmasters_post_title = get_post_meta(get_the_ID(), 'cmsmasters_post_title', true);

$cmsmasters_post_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_post_sharing_box', true);

?>

<!-- Start Standard Article  -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		language_school_get_post_date('post');
	?>
	<div class="cmsmasters_post_cont">
	<?php 
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
<!-- Finish Standard Article  -->

