<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.8
 * 
 * Quotes Grid Format Template
 * Created by CMSMasters
 * 
 */


$unique_id = uniqid('', true);
$unique_id = strtr($unique_id, '.', '_');
?>

<!-- Start Grid Article  -->

<article class="cmsmasters_quote_inner" <?php echo 'id="cmsmasters_quote_' . $unique_id . '"';?>>
	<div class="quote_content_wrap">
	<?php
		if ($quote_color != '') {
			cmsmasters_quote_color($unique_id, 'grid', $quote_color);
		}
		
		
		echo cmsmasters_divpdel('<div class="quote_content">' . "\n" . 
			do_shortcode(wpautop($quote_content)) . 
		'</div>' . "\n");
		
		echo '<div class="quote_info_wrap">';
		
		if ($quote_image != '') {
			echo '<figure class="quote_image">' . "\n" . 
				wp_get_attachment_image(strstr($quote_image, '|', true), 'thumbnail') . 
			'</figure>' . "\n";
		}
		
		echo '<div class="wrap_quote_title">';
		
			if ($quote_name != '') {
				echo '<h6 class="quote_title">' . esc_html($quote_name) . '</h6>' . "\n";
			}
			
			
			if ($quote_subtitle != '') {
				echo '<span class="quote_subtitle">' . esc_html($quote_subtitle) . '</span>' . "\n";
			}
			
			
			if ($quote_subtitle != '' && ($quote_link != '' || $quote_website != '')) {
				echo ' - ';
			}
			
			
			if ($quote_link != '' && $quote_website != '') {
				echo '<a class="quote_link" target="_blank" href="' . esc_url($quote_link) . '">' . esc_html($quote_website) . '</a>' . "\n";
			} elseif ($quote_link == '' && $quote_website != '') {
				echo '<span class="quote_site">' . esc_html($quote_website) . '</span>' . "\n";
			} elseif ($quote_link != '' && $quote_website == '') {
				echo '<a class="quote_link" target="_blank" href="' . esc_url($quote_link) . '">' . esc_html($quote_link) . '</a>' . "\n";
			}
		
		echo '</div>';
	?>
		</div>
	</div>
</article>
<!-- Finish Grid Article  -->

