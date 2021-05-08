<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version 	1.1.8
 * 
 * 404 Error Page Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = language_school_get_global_options();

?>

</div>

<!--  Start Content  -->
<div class="entry">
	<div class="error">
		<div class="error_bg">
			<div class="error_inner">
				<h1 class="error_title">404</h1>
			</div>
		</div>
	</div>
</div>
<div class="content_wrap fullwidth">
	<div class="error">
		<?php 
			echo '<h2 class="error_subtitle">' . esc_html__("We're sorry, but the page you were looking for doesn't exist.", 'language-school') . '</h2>';
			
			
			if ($cmsmasters_option['language-school' . '_error_search']) { 
				get_search_form(); 
			}
			
			
			if ($cmsmasters_option['language-school' . '_error_sitemap_button'] && $cmsmasters_option['language-school' . '_error_sitemap_link'] != '') {
				echo '<div class="error_button_wrap"><a href="' . esc_url($cmsmasters_option['language-school' . '_error_sitemap_link']) . '" class="button">' . esc_html__('Sitemap', 'language-school') . '</a></div>';
			}
		?>
	</div>
<!--  Finish Content  -->

<?php 
get_footer();

