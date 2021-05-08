<?php 
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.7
 * 
 * Template Functions for Portfolio & Project
 * Created by CMSMasters
 * 
 */


/* Get Projects Heading Function */
function language_school_project_heading($cmsmasters_id, $tag = 'h1', $show = true, $link_redirect = false, $link_url = false) { 
	$out = '<header class="cmsmasters_project_header entry-header">' . 
		'<' . esc_html($tag) . ' class="cmsmasters_project_title entry-title">' . 
			'<a href="' . (($link_redirect == 'true' && $link_url != '') ? esc_url($link_url) : esc_url(get_permalink())) . '">' . cmsmasters_title($cmsmasters_id, false) . '</a>' . 
		'</' . esc_html($tag) . '>' . 
	'</header>';
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Projects Heading Without Link Function */
function language_school_project_title_nolink($cmsmasters_id, $tag = 'h1', $show = true) { 
	$out = '<' . esc_html($tag) . ' class="cmsmasters_project_title entry-title">' . 
		cmsmasters_title($cmsmasters_id, false) . 
	'</' . esc_html($tag) . '>';
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Projects Content/Excerpt Function */
function language_school_project_exc_cont($show = true) {
	$out = cmsmasters_divpdel('<div class="cmsmasters_project_content entry-content">' . "\n" . 
		wpautop(theme_excerpt(20, false)) . 
	'</div>' . "\n");
	
	
	if ($show) {
		echo language_school_return_content($out);
	} else {
		return $out;
	}
}



/* Check Projects Content/Excerpt Not Empty Function */
function language_school_project_check_exc_cont() {
	$exc = language_school_project_exc_cont(false);
	
	$no_tags_exc = strip_tags($exc);
	
	$trim_exc = trim($no_tags_exc);
	
	
	if ($trim_exc != '') {
		return true;
	} else {
		return false;
	}
}



/* Get Projects Category Function */
function language_school_get_project_category($cmsmasters_id, $taxonomy, $template_type = 'page', $show = true) {
	$out = '';
	
	
	if (get_the_terms($cmsmasters_id, $taxonomy)) {
		if ($template_type == 'page') {
			$out = '<span class="cmsmasters_project_category">' . 
				language_school_get_the_category_list($cmsmasters_id, $taxonomy, ', ') . 
			'</span>';
		} elseif ($template_type == 'post') {
			$cmsmasters_option = language_school_get_global_options();
			
			
			if ($cmsmasters_option['language-school' . '_portfolio_project_cat']) {
				$out .= '<div class="project_details_item">' . 
					'<div class="project_details_item_title">' . esc_html__('Categories', 'language-school') . ':' . '</div>' . 
					'<div class="project_details_item_desc">' . 
						'<span class="cmsmasters_project_category">' . 
							language_school_get_the_category_list($cmsmasters_id, $taxonomy, ', ') . 
						'</span>' . 
					'</div>' . 
				'</div>';
			}
		} elseif ($template_type == 'related') {
			$out = '<span class="related_posts_item_cat">' . 
				language_school_get_the_category_list($cmsmasters_id, $taxonomy, ', ') . 
			'</span>';
		}
	}
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Projects Like Function */
function cmsmasters_get_project_like($template_type = 'page', $show = true) {
	if ($template_type == 'page') {
		$out = cmsmastersLike(false);
	} elseif ($template_type == 'post') {
		$cmsmasters_option = language_school_get_global_options();
		
		
		$out = '';
		
		
		if ($cmsmasters_option['language-school' . '_portfolio_project_like']) {
			$out .= '<div class="project_details_item">' . 
				'<div class="project_details_item_title">' . esc_html__('Like', 'language-school') . ':' . '</div>' . 
				'<div class="project_details_item_desc details_item_desc_like">' . 
					cmsmastersLike(false) . 
				'</div>' . 
			'</div>';
		}
	}
	
	
	if ($show) {
		echo language_school_return_content($out);
	} else {
		return $out;
	}
}



/* Get Projects Comments Function */
function language_school_get_project_comments($template_type = 'page', $show = true) {
	if (comments_open()) {
		if ($template_type == 'page') {
			$out = '<a class="cmsmasters_post_comments cmsmasters_theme_icon_comment" href="' . esc_url(get_comments_link()) . '" title="' . esc_attr__('Comment on', 'language-school') . ' ' . esc_attr(get_the_title()) . '">' . 
				'<span>' . esc_html(get_comments_number()) . '</span>' . 
			'</a>';
		} elseif ($template_type == 'post') {
			$cmsmasters_option = language_school_get_global_options();
			
			
			$out = '';
			
			
			if ($cmsmasters_option['language-school' . '_portfolio_project_comment']) {
				$out .= '<div class="project_details_item">' . 
					'<div class="project_details_item_title">' . esc_html__('Comments', 'language-school') . ':' . '</div>' . 
					'<div class="project_details_item_desc details_item_desc_comments">' . 
						'<a class="cmsmasters_post_comments cmsmasters_theme_icon_comment" href="' . esc_url(get_comments_link()) . '" title="' . esc_attr__('Comment on', 'language-school') . ' ' . esc_attr(get_the_title()) . '">' . 
							'<span>' . esc_html(get_comments_number()) . '</span>' . 
						'</a>' . 
					'</div>' . 
				'</div>';
			}
		}
		
		
		if ($show) {
			echo language_school_return_content($out);
		} else {
			return $out;
		}
	}
}



/* Get Projects Date Function */
function language_school_get_project_date($template_type = 'page', $show = true) {
	if ($template_type == 'page') {
		$out = '<abbr class="published cmsmasters_project_date" title="' . esc_attr(get_the_date()) . '">' . 
			esc_html(get_the_date()) . 
		'</abbr>' . 
		'<abbr class="dn date updated" title="' . esc_attr(get_the_modified_date()) . '">' . 
			esc_html(get_the_modified_date()) . 
		'</abbr>';
	} elseif ($template_type == 'post') {
		$cmsmasters_option = language_school_get_global_options();
		
		$out = '';
		
		if ($cmsmasters_option['language-school' . '_portfolio_project_date']) {
			$out .= '<div class="project_details_item">' . 
				'<div class="project_details_item_title">' . esc_html__('Date', 'language-school') . ':' . '</div>' . 
				'<div class="project_details_item_desc">' . 
					'<abbr class="published cmsmasters_project_date" title="' . esc_attr(get_the_date()) . '">' . 
						esc_html(get_the_date()) . 
					'</abbr>' . 
					'<abbr class="dn date updated" title="' . esc_attr(get_the_modified_date()) . '">' . 
						esc_html(get_the_modified_date()) . 
					'</abbr>' . 
				'</div>' . 
			'</div>';
		}
	}
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Projects Author Function */
function language_school_get_project_author($template_type = 'page', $show = true) {
	if ($template_type == 'page') {
		$out = '<span class="cmsmasters_project_author">' . 
			esc_html__('By', 'language-school') . ' ' . 
			'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr__('Projects by', 'language-school') . ' ' . esc_attr(get_the_author_meta('display_name')) . '" class="vcard author"><span class="fn" rel="author">' . esc_html(get_the_author_meta('display_name')) . '</span></a>' . 
		'</span>';
	} elseif ($template_type == 'post') {
		$cmsmasters_option = language_school_get_global_options();
		
		$out = '';
		
		if ($cmsmasters_option['language-school' . '_portfolio_project_author']) {
			$out .= '<div class="project_details_item">' . 
				'<div class="project_details_item_title">' . esc_html__('Author', 'language-school') . ':' . '</div>' . 
				'<div class="project_details_item_desc vcard author">' . 
					'<span class="cmsmasters_project_author fn" title="' . esc_attr__('Projects by', 'language-school') . ' ' . esc_attr(get_the_author_meta('display_name')) . '" rel="author">' . esc_html(get_the_author_meta('display_name')) . '</span>' . 
				'</div>' . 
			'</div>';
		}
	}
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Projects Tags Function */
function language_school_get_project_tags($cmsmasters_id, $taxonomy, $template_type = 'page', $show = true) {
	if (get_the_terms($cmsmasters_id, $taxonomy)) {
		if ($template_type == 'page') {
			$out = '<span class="cmsmasters_project_tags">' . 
				get_the_term_list($cmsmasters_id, $taxonomy, '', ', ', '') . 
			'</span>';
		} elseif ($template_type == 'post') {
			$cmsmasters_option = language_school_get_global_options();
			$out = '';
			
			if ($cmsmasters_option['language-school' . '_portfolio_project_tag']) {
				$out = '<div class="project_details_item">' . 
					'<div class="project_details_item_title">' . esc_html__('Tags', 'language-school') . ':' . '</div>' . 
					'<div class="project_details_item_desc">' . 
						'<span class="cmsmasters_project_tags">' . 
							get_the_term_list($cmsmasters_id, $taxonomy, '', ', ', '') . 
						'</span>' . 
					'</div>' . 
				'</div>';
			}
		}
		
		
		if ($show) {
			echo wp_kses_post($out);
		} else {
			return wp_kses_post($out);
		}
	}
}



/* Get Projects Features Function */
function language_school_get_project_features($features_position = 'features', $features = '', $features_title = false, $tag = 'h2', $show = true) {
	if (
		(
			!empty($features[0][0]) && 
			!empty($features[0][1])
		) || (
			!empty($features[1][0]) && 
			!empty($features[1][1])
		)
	) {
		$out = '';
		
		if ($features_position == 'features') {
			$out .= '<div class="project_features entry-meta">' . 
				($features_title ? '<' . esc_html($tag) . ' class="project_features_title">' . esc_html($features_title) . '</' . esc_html($tag) . '>' : '');
		}
		
		
		foreach ($features as $feature) {
			if ($feature[0] != '' && $feature[1] != '') {
				$feature_lists = explode("\n", $feature[1]);
				
				$out .= '<div class="project_' . esc_attr($features_position) . '_item">' . 
					'<div class="project_' . esc_attr($features_position) . '_item_title">' . esc_html($feature[0]) . '</div>' . 
					'<div class="project_' . esc_attr($features_position) . '_item_desc">';
				
						foreach ($feature_lists as $feature_list) {
							$out .= trim($feature_list);
						}
				
					$out .= '</div>' . 
				'</div>';
			}
		}
		
		
		if ($features_position == 'features') {
			$out .= '</div>';
		}
		
		if ($show) {
			echo language_school_return_content($out);
		} else {
			return $out;
		}
	}
}



/* Get Projects Link Function */
function language_school_project_link($link_text, $link_url, $link_target, $show = true) {
	$cmsmasters_option = language_school_get_global_options();
	$out = '';
	
	if ( 
		$cmsmasters_option['language-school' . '_portfolio_project_link'] && 
		$link_text != '' && 
		$link_url != '' 
	) {
		$out = '<div class="project_details_item">' . 
			'<div class="project_details_item_title">' . esc_html__('Project Link', 'language-school') . ':' . '</div>' . 
			'<div class="project_details_item_desc">' . 
				'<span class="cmsmasters_project_tags">' . 
					'<a href="' . esc_url($link_url) . '" title="' . esc_attr($link_text) . '"' . (($link_target == 'true') ? ' target="_blank"' : '') . '>' . esc_html($link_text) . '</a>' . 
				'</span>' . 
			'</div>' . 
		'</div>';
	}
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}

