<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.8
 * 
 * Images Page Template
 * Created by CMSMasters
 * 
 */


get_header();


echo '<!-- Start Content  -->' . "\n" . 
'<div id="middle_content">';


if (have_posts()) : the_post();
	echo '<div class="cmsmasters_attach_img entry image-attachment">' . "\n";
	
	$metadata = wp_get_attachment_metadata();
	
	echo '<footer class="cmsmasters_attach_img_info entry-meta">'; 
		edit_post_link(esc_html__('Edit Media', 'language-school'), '<span class="edit-link fr">', '</span>');
		
		echo esc_html__('Published', 'language-school') . ' <abbr class="published" title="' . esc_attr(get_the_date()) . '">' . get_the_date() . '</abbr> ' . esc_html__('at', 'language-school') . ' ' . esc_html($metadata['width']) . '&times;' . esc_html($metadata['height']) . ' ' . esc_html__('in', 'language-school') . ' ' . '<a href="' . esc_url(get_permalink($post->post_parent)) . '" title="' . cmsmasters_title($post->post_parent, false) . '">' . cmsmasters_title($post->post_parent, false) . '</a>' . 
	'</footer>' . 
	'<div class="tac">' . 
		language_school_thumb(get_the_ID(), 'slider-thumb', false, 'img_' . get_the_ID(), true, true, true, false, get_the_ID()) . 
	'</div>' . 
	'<div class="cl"></div>' . 
	'<br />';
?>
		<div class="navigation" role="navigation">
			<div class="fl"><?php previous_image_link(false, '&larr; ' . esc_html__('Previous', 'language-school')); ?></div>
			<div class="fr"><?php next_image_link(false, esc_html__('Next', 'language-school') . ' &rarr;'); ?></div>
			<div class="cl"></div>
			<br />
		</div>
<?php
	
	
	
	echo '</div>' . "\n" . 
	'<div class="divider"></div>';
endif;


comments_template();


echo '</div>' . "\n" . 
'<!--  Finish Content  -->' . "\n\n";


get_footer();

