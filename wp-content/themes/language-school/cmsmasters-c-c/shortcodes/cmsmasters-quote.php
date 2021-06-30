<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version 	1.2.2
 * 
 * Content Composer Quote Shortcode
 * Created by CMSMasters
 * 
 */


extract(shortcode_atts($new_atts, $atts));


$this->quotes_atts['quote_counter']++;


if ($content == null || $content == "<br />\n") {
	$this->quotes_atts['quote_content'] = esc_html__('Enter quote text here', 'language-school');
} else {
	$this->quotes_atts['quote_content'] = $content;
}


$this->quotes_atts['quote_image'] = 	$image;
$this->quotes_atts['quote_name'] = 		$name;
$this->quotes_atts['quote_subtitle'] = 	$subtitle;
$this->quotes_atts['quote_color'] = 	$color;
$this->quotes_atts['quote_link'] = 		$link;
$this->quotes_atts['quote_website'] = 	$website;


$quote_out = '';


$quote_out = '<div class="cmsmasters_quote' . 
	(($classes != '') ? ' ' . $classes : '') . 
'">' . "\n" . 
	cmsmasters_composer_ob_load_template('framework/post-type/quote/' . $this->quotes_atts['quote_mode'] . (($this->quotes_atts['quote_mode'] != 'grid') ? '-' . $this->quotes_atts['quote_type'] : '') . '.php', $this->quotes_atts) . 
'</div>' . "\n";


if ($this->quotes_atts['quote_mode'] == 'grid' && (($this->quotes_atts['quote_counter'] % $this->quotes_atts['column_count']) == 0)) {
	$quote_out .= '</div><div class="quotes_list">' . "\n";
}


echo language_school_return_content($quote_out);