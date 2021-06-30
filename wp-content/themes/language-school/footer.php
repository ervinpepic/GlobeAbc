<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.5
 * 
 * Website Footer Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = language_school_get_global_options();


echo '</div>' . "\r" . 
	'</div>' . "\n" . 
'</div>' . "\n" . 
'<!--  Finish Middle  -->' . "\n\n\n";

get_sidebar('bottom');

echo '<a href="javascript:void(0);" id="slide_top" class="cmsmasters_theme_icon_slide_top"></a>' . "\n";
?>
	</div>
<!--  Finish Main  -->

<!--  Start Footer  -->
<footer id="footer" role="contentinfo" class="<?php echo 'cmsmasters_color_scheme_' . $cmsmasters_option['language-school' . '_footer_scheme'] . ($cmsmasters_option['language-school' . '_footer_type'] == 'default' ? ' cmsmasters_footer_default' : ' cmsmasters_footer_small'); ?>">
	<div class="footer_border">
		<div class="footer_inner">
		<?php 
		language_school_footer_logo($cmsmasters_option);
		
		
		language_school_get_footer_custom_html($cmsmasters_option);
		
		
		language_school_get_footer_nav($cmsmasters_option);
		
		
		language_school_get_footer_social_icons($cmsmasters_option);
		
		?>
			<span class="footer_copyright copyright">
			<?php 
			if (function_exists('the_privacy_policy_link')) {
				the_privacy_policy_link('', ' / ');
			}
			
			echo esc_html(stripslashes($cmsmasters_option['language-school' . '_footer_copyright']));
			?>
			</span>
		</div>
	</div>
</footer>
<!--  Finish Footer  -->

</div>
<span class="cmsmasters_responsive_width"></span>
<!--  Finish Page  -->

<?php wp_footer(); ?>
</body>
</html>
