<?php 
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.7
 * 
 * Template Functions for Shortcodes
 * Created by CMSMasters
 * 
 */


/* Get Quote Hightlight Function */
function cmsmasters_quote_color($cmsmasters_id, $layout_type = 'grid', $quote_color = '', $show = true) {
	
	if ($quote_color !='') {
		$out = '<style type="text/css">';
			if ($layout_type == 'grid') {
				$out .= '.quote_grid #cmsmasters_quote_' . $cmsmasters_id . '.cmsmasters_quote_inner:before {' . 
					'background-color:' . $quote_color . ';' .  
				'}';
			} elseif ($layout_type == 'center') {
				$out .= '#cmsmasters_quote_' . $cmsmasters_id . ' .quote_image {' . 
					'background-color:' . $quote_color . ';' .  
				'}';
			} elseif ($layout_type == 'box') {
				$out .= '#cmsmasters_quote_' . $cmsmasters_id . ' .wrap_quote_title {' . 
					'background-color:' . $quote_color . ';' .  
				'}';
			}
		$out .= '</style>';
		
		if ($show) {
			echo language_school_return_content($out);
		} else {
			return $out;
		}
	}
}


/**
 * Posts Slider Functions
 */

/* Get Posts Slider Heading Function */
function language_school_slider_post_heading($cmsmasters_id, $type = 'post', $tag = 'h1', $show = true, $link_redirect = false, $link_url = false) { 
	if ($type == 'post') {
		$out = '<header class="cmsmasters_slider_post_header entry-header">' . 
			'<' . esc_html($tag) . ' class="cmsmasters_slider_post_title entry-title">' . 
				'<a href="' . esc_url(get_permalink()) . '">' . cmsmasters_title($cmsmasters_id, false) . '</a>' . 
			'</' . esc_html($tag) . '>' . 
		'</header>';
	} elseif ($type == 'project') {
		$out = '<header class="cmsmasters_slider_project_header entry-header">' . 
			'<' . esc_html($tag) . ' class="cmsmasters_slider_project_title entry-title">' . 
				'<a href="' . (($link_redirect == 'true' && $link_url != '') ? esc_url($link_url) : esc_url(get_permalink())) . '">' . cmsmasters_title($cmsmasters_id, false) . '</a>' . 
			'</' . esc_html($tag) . '>' . 
		'</header>';
	}
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Posts Slider Content/Excerpt Function */
function language_school_slider_post_exc_cont($type = 'post', $show = true) {
	if ($type == 'post') {
		$out = cmsmasters_divpdel('<div class="cmsmasters_slider_post_content entry-content">' . "\n" . 
			wpautop(theme_excerpt(15, false)) . 
		'</div>' . "\n");
	} elseif ($type == 'project') {
		$out = cmsmasters_divpdel('<div class="cmsmasters_slider_project_content entry-content">' . "\n" . 
			wpautop(theme_excerpt(15, false)) . 
		'</div>' . "\n");
	}
	
	
	if ($show) {
		echo language_school_return_content($out);
	} else {
		return $out;
	}
}



/* Check Posts Slider Content/Excerpt Not Empty Function */
function language_school_slider_post_check_exc_cont($type = 'post') {
	$exc = language_school_slider_post_exc_cont($type, false);
	
	$no_tags_exc = strip_tags($exc);
	
	$trim_exc = trim($no_tags_exc);
	
	
	if ($trim_exc != '') {
		return true;
	} else {
		return false;
	}
}



/* Get Posts Slider Date Function */
function language_school_get_slider_post_date($type = 'post', $show = true) {
	if ($type == 'post') {
		$out = '<span class="cmsmasters_post_date">' . 
			'<abbr class="published" title="' . esc_attr(get_the_date()) . '">' . 
				esc_html(get_the_date()) . 
			'</abbr>' . 
			'<abbr class="dn date updated" title="' . esc_attr(get_the_modified_date()) . '">' . 
				esc_html(get_the_modified_date()) . 
			'</abbr>' . 
		'</span>';
	} elseif ($type == 'project') {
		$out = '<abbr class="published cmsmasters_slider_project_date" title="' . esc_attr(get_the_date()) . '">' . 
			esc_html(get_the_date()) . 
		'</abbr>' . 
		'<abbr class="dn date updated" title="' . esc_attr(get_the_modified_date()) . '">' . 
			esc_html(get_the_modified_date()) . 
		'</abbr>';
	}
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Posts Slider Author Function */
function language_school_get_slider_post_author($type = 'post', $show = true) {
	if ($type == 'post') {
		$out = '<span class="cmsmasters_slider_post_user_name">' . 
			esc_html__('by', 'language-school') . ' ' . 
			'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr__('Posts by', 'language-school') . ' ' . esc_attr(get_the_author_meta('display_name')) . '" class="vcard author"><span class="fn" rel="author">' . esc_html(get_the_author_meta('display_name')) . '</span></a>' . 
		'</span>';
	} elseif ($type == 'project') {
		$out = '<span class="cmsmasters_slider_project_user_name">' . 
			esc_html__('by', 'language-school') . ' ' . 
			'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr__('Posts by', 'language-school') . ' ' . esc_attr(get_the_author_meta('display_name')) . '" class="vcard author"><span class="fn" rel="author">' . esc_html(get_the_author_meta('display_name')) . '</span></a>' . 
		'</span>';
	}
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Posts Slider Category Function */
function language_school_get_slider_post_category($cmsmasters_id, $taxonomy, $type = 'post', $show = true) {
	$out = '';
	
	
	if (get_the_terms($cmsmasters_id, $taxonomy)) {
		if ($type == 'post') {
			$out = '<span class="cmsmasters_slider_post_category">' . 
				esc_html__('in ', 'language-school') . 
				language_school_get_the_category_list($cmsmasters_id, $taxonomy, ', ') . 
			'</span>';
		} elseif ($type == 'project') {
			$out = '<span class="cmsmasters_slider_project_category">' . 
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



/* Get Posts Slider Like Function */
function language_school_slider_post_like($type = 'post', $show = true) {
	if ($type == 'post') {
		$out = cmsmastersLike(false);
	} elseif ($type == 'project') {
		$out = cmsmastersLike(false);
	}
	
	
	if ($show) {
		echo language_school_return_content($out);
	} else {
		return $out;
	}
}



/* Get Posts Slider Comments Function */
function language_school_get_slider_post_comments($type = 'post', $show = true) {
	$out = '';
	if (comments_open()) {
		if ($type == 'post') {
			$out = '<a class="cmsmasters_post_comments cmsmasters_theme_icon_comment" href="' . esc_url(get_comments_link()) . '" title="' . esc_attr__('Comment on', 'language-school') . ' ' . esc_attr(get_the_title()) . '">' . 
				'<span>' . esc_html(get_comments_number()) . '</span>' . 
			'</a>';
		} elseif ($type == 'project') {
			$out = '<a class="cmsmasters_post_comments cmsmasters_theme_icon_comment" href="' . esc_url(get_comments_link()) . '" title="' . esc_attr__('Comment on', 'language-school') . ' ' . esc_attr(get_the_title()) . '">' . 
				'<span>' . esc_html(get_comments_number()) . '</span>' . 
			'</a>';
		}
		
		
		if ($show) {
			echo language_school_return_content($out);
		} else {
			return $out;
		}
	}
}



/* Get Posts Slider More Button/Link Function */
function language_school_slider_post_more($cmsmasters_id, $show = true) {
	$cmsmasters_post_read_more = get_post_meta($cmsmasters_id, 'cmsmasters_post_read_more', true);
	
	
	if ($cmsmasters_post_read_more == '') {
		$cmsmasters_post_read_more = esc_attr__('Continue reading', 'language-school');
	}
	
	
	$out = '<a class="cmsmasters_post_read_more" href="' . esc_url(get_permalink($cmsmasters_id)) . '">' . esc_html($cmsmasters_post_read_more) . '</a>';
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}

