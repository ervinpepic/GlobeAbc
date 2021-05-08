<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.7
 * 
 * Content Composer Theme Shortcodes
 * Created by CMSMasters
 * 
 */


/**
 * LearnPress
 */
if (CMSMASTERS_LEARNPRESS) {
	$cmsmasters_add = 'add_';

	$cmsmasters_add_shcd = $cmsmasters_add . 'shortcode';

	function cmsmasters_learnpress($atts, $content = null) {
		$new_atts = apply_filters('cmsmasters_learnpress_atts_filter', array( 
			'orderby' => 		'', 
			'order' => 			'', 
			'categories' => 	'', 
			'count' => 			'', 
			'columns' => 		'', 
			'classes' => 		'' 
		) );
		
		
		$shortcode_name = 'learnpress';
		
		$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
		
		
		if (language_school_locate_template($shortcode_path)) {
			$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
				'atts' => 		$atts, 
				'new_atts' => 	$new_atts, 
				'content' => 	$content 
			) );
			
			
			return $template_out;
		}
		
		
		extract(shortcode_atts($new_atts, $atts));
		
		
		$unique_id = uniqid('', true);
		$unique_id = strtr($unique_id, '.', '_');
		
		
		if ($columns == '4' || $columns == '5') {
			$course_thumb = 'cmsmasters-square-thumb';
		} else {
			$course_thumb = 'cmsmasters-project-thumb';
		}
		
		
		$out = '<div id="cmsmasters_learnpress_shortcode_' . $unique_id . '" class="cmsmasters_learnpress_shortcode' . 
		(($columns != '') ? ' cmsmasters_' . $columns : '') . 
		(($classes != '') ? ' ' . $classes : '') . 
		'">';
		
		
		$args = array( 
			'post_type' => 				'lp_course', 
			'orderby' => 				$orderby, 
			'order' => 					$order, 
			'posts_per_page' => 		$count 
		);
		
		if ($categories != '') {
			$cat_array = explode(",", $categories);
			
			$args['tax_query'] = array( 
				array( 
					'taxonomy' => 'course_category', 
					'field' => 'slug', 
					'terms' => $cat_array 
				)
			);
		}
		
		
		$query = new WP_Query($args);
		
		
		if ($query->have_posts()) : 
			while ($query->have_posts()) : $query->the_post();
		
			$course = LP_Global::course();
			
			$course_id = get_the_ID();
			
			$course_duration = '';
			
			$course_duration_label_tr = '';
			
			$course_duration_value = get_post_meta( $course_id, '_lp_duration', true );
			
			
			if ($course_duration_value) {
				$course_duration_label_value = learn_press_get_course_duration_support();
				
				$course_duration_value_arr = explode(' ', $course_duration_value);
				
				$course_duration_number = $course_duration_value_arr[0];
				
				$course_duration_label_key = $course_duration_value_arr[1];
				
				if ($course_duration_label_key == 'minute') {
					$course_duration_label_tr = esc_html__('Minute(s)', 'language-school');
				} else if ($course_duration_label_key == 'hour') {
					$course_duration_label_tr = esc_html__('Hour(s)', 'language-school');
				} else if ($course_duration_label_key == 'day') {
					$course_duration_label_tr = esc_html__('Day(s)', 'language-school');
				} else if ($course_duration_label_key == 'week') {
					$course_duration_label_tr = esc_html__('Week', 'language-school');
				}
				
				$course_duration = $course_duration_number . ' ' . $course_duration_label_tr;
			}
			
			
			$term_list = get_the_term_list( $course_id, 'course_category', '', ', ', '' );
			
			$out .= "<article id=\"lpr_course_post-" . $course_id . "\" class=\"lpr_course_post\">" . "\n" . 
				language_school_thumb_rollover($course_id, $course_thumb, false, true, false, false, false, false, false, false, false) . "\n" . 
				"<div class=\"lpr_course_inner\">" . "\n" . 
				"<header class=\"entry-header lpr_course_header\">
					<h6 class=\"entry-title lpr_course_title\"><a href=" . get_the_permalink( $course_id ) . ">" . get_the_title( $course_id ) . "</a></h6>
				</header>" . "\n";
				
				if ( class_exists( 'LP_Addon_Course_Review' ) ) {
					
					$course_rate = learn_press_get_course_rate( $course_id );
					
					$out .= "<div class=\"review-stars-rated\">
						<div class=\"review-stars empty\"></div>
						<div class=\"review-stars filled\"  style=\"width:" . $course_rate*20 . "%;\"></div>
					</div>";
				}
			
				
				if ($price_html = $course->get_price_html()) {
					$out .= "<span class=\"cmsmasters_course_price" . (($course->is_free()) ? ' cmsmasters_course_free' : '') . "\">" . $price_html; 
					
					if ( $course->get_origin_price() != $course->get_price() ) {
						$origin_price_html = $course->get_origin_price_html();
						
						$out .= "<span class=\"cmsmasters_course_origin_price\">" . $origin_price_html . "</span>";
					}
					
					$out .= "</span>";
				}
				
				
				$out .= "</div>" . "\n";
				
				if ($course_duration != '' || $term_list != '') {
					$out .= "<footer class=\"cmsmasters_course_footer\">" . "\n";
					
					if ($course_duration != '') {
						$out .= "<div class=\"cmsmasters_cource_duration\">" . esc_html($course_duration) . "</div>";
					}
					
					if ($term_list != '') {
						$out .= "<div class=\"entry-meta cmsmasters_cource_cat\">" . $term_list . "</div>";
					} 
					
					$out .= "</footer>" . "\n";
				}
				
			$out .= "</article>" . "\n";
		
			endwhile;
		endif;
		
		
		wp_reset_postdata();
		
		wp_reset_query();
		
		
		$out .= '</div>';
		
		
		return $out;
	}

	$cmsmasters_add_shcd('cmsmasters_learnpress', 'cmsmasters_learnpress');
}