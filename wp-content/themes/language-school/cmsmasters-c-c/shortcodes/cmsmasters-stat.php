<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version 	1.1.7
 * 
 * Content Composer Single Progress Bar Shortcode
 * Created by CMSMasters
 * 
 */


extract(shortcode_atts($new_atts, $atts));
	
	
$unique_id = uniqid('', true);
$unique_id = strtr($unique_id, '.', '_');


if ($this->stats_atts['stats_mode'] == 'bars') {
	$this->stats_atts['style_stats'] .= "\n" . '.cmsmasters_stats.shortcode_animated #cmsmasters_stat_' . $unique_id . '.cmsmasters_stat { ' . 
		"\n\t" . (($this->stats_atts['stats_type'] == 'horizontal') ? 'width' : 'height') . ':' . $progress . '%; ' . 
	"\n" . '} ' . "\n\n";
	
	if ($this->stats_atts['stats_type'] == 'horizontal' && $color != '') {
		$this->stats_atts['style_stats'] .= '.stats_type_horizontal #cmsmasters_stat_' . $unique_id . ' .cmsmasters_stat_inner:before { ' . 
			"\n\t" . cmsmasters_color_css('color', $color) . 
		"\n" . '} ' . "\n";
	}
	
	if ($color != '') {
		$this->stats_atts['style_stats'] .= '#cmsmasters_stat_' . $unique_id . ' .cmsmasters_stat_inner { ' . 
			"\n\t" . cmsmasters_color_css('background-color', $color) . 
		"\n" . '} ' . "\n";
	}
}


$out = '<div class="cmsmasters_stat_wrap' . (($this->stats_atts['stats_mode'] == 'circles' || ($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical')) ? $this->stats_atts['stats_count'] : '') . '">' . "\n";
	
	$out .= (($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical') ? '<div class="cmsmasters_stat_container_wrap">' . "\n" : '');
	
	if ($this->stats_atts['stats_type'] == 'vertical') {
		$out .= '<span class="cmsmasters_stat_counter_wrap">' . "\n" . 
			'<span class="cmsmasters_stat_counter">' .  $progress . '</span>' . 
			'<span class="cmsmasters_stat_units">%</span>' . "\n" . 
		'</span>' . "\n";
	}
	
	$out .= (($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical') ? '<div class="cmsmasters_stat_container">' . "\n" : '') . 
		'<div id="cmsmasters_stat_' . $unique_id . '" class="cmsmasters_stat' . 
		(($classes != '') ? ' ' . $classes : '') . 
		(($content == '' && $icon == '') ? ' stat_only_number' : '') . 
		(($content != '' && $icon != '') ? ' stat_has_titleicon' : '') . '"' . 
		' data-percent="' . (($this->stats_atts['stats_mode'] == 'circles') ? ($progress / 2) : $progress) . '"' . 
		(($this->stats_atts['stats_mode'] == 'circles' && $color != '') ? ' data-bar-color="' . $color . '"' : '') . 
		'>' . "\n" . 
			'<div class="cmsmasters_stat_inner' . 
			(($icon != '') ? ' ' . $icon : '') . 
			'">' . "\n" . 
				(($content != '' && $this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'horizontal') ? '<span class="cmsmasters_stat_title">' . $content . '</span>' . "\n" : '');
				
				if ($this->stats_atts['stats_type'] != 'vertical') {
					$out .= '<span class="cmsmasters_stat_counter_wrap">' . "\n" . 
						'<span class="cmsmasters_stat_counter">' . $progress . '</span>' . 
						'<span class="cmsmasters_stat_units">%</span>' . "\n" . 
					'</span>' . "\n";
				}
				
			$out .= '</div>' . "\n" . 
		'</div>' . "\n" . 
	(($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical') ? '</div></div>' . "\n" : '') . 
	((($content != '' && $this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical') || ($content != '' && $this->stats_atts['stats_mode'] == 'circles')) ? '<span class="cmsmasters_stat_title">' . $content . '</span>' . "\n" : '') . 
	(($subtitle != '') ? '<span class="cmsmasters_stat_subtitle">' . $subtitle . '</span>' . "\n" : '') . 
'</div>';

echo language_school_return_content($out);