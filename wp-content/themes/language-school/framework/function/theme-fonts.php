<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version 	1.1.8
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


function language_school_theme_fonts() {
	$cmsmasters_option = language_school_get_global_options();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version 	1.1.8
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


/***************** Start Theme Font Styles ******************/

	/* Start Content Font */
	body {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_content_font_google_font']) . $cmsmasters_option['language-school' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_content_font_font_style'] . ";
	}
	
	.cmsmasters_archive_item_type,
	.cmsmasters_archive_type .cmsmasters_archive_item_info *,
	.pj_ddn .cmsmasters_project_category,
	.pj_ddn .cmsmasters_project_category a,
	.cmsmasters_quote .wrap_quote_title,
	.cmsmasters_quote .quote_link,
	.cmsmasters_posts_slider .project .cmsmasters_slider_project_category,
	.cmsmasters_posts_slider .project .cmsmasters_slider_project_category a,
	.cmsmasters_posts_slider .cmsmasters_post_cont_info,
	.cmsmasters_posts_slider .cmsmasters_post_cont_info a,
	.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat_counter_wrap,
	.portfolio .project_outer .cmsmasters_project_category,
	.portfolio .project_outer .cmsmasters_project_category a,
	.post.cmsmasters_puzzle_type .cmsmasters_post_comments span, 
	.post.cmsmasters_puzzle_type .cmsmastersLike span,
	.cmsmasters_post_user_name,
	.cmsmasters_post_user_name a,
	.cmsmasters_post_category,
	.cmsmasters_post_category a,
	.cmsmasters_post_tags,
	.cmsmasters_post_tags a,
	.post_comments .comment-reply-link, 
	.post_comments .commentlist .comment-edit-link,
	.pingslist .pingback .comment-body .comment-edit-link,
	.related_posts_item_cat,
	.related_posts_item_cat a {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_content_font_font_size'] - 1) . "px;
	}
	
	.cmsmasters_quote .wrap_quote_title,
	.cmsmasters_quote .quote_link {
		line-height:" . ((int) $cmsmasters_option['language-school' . '_content_font_font_size'] - 1) . "px;
	}
	
	.header_top, 
	.header_top a,
	.top_line_nav > li > a,
	.top_line_nav ul li a,
	.footer_nav > li > a {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_content_font_font_size'] - 2) . "px;
	}
	
	.header_top .header_top_left [class^='cmsmasters-icon-']:before, 
	.header_top .header_top_left [class*=' cmsmasters-icon-']:before {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_content_font_font_size'] + 3) . "px;
		line-height:" . $cmsmasters_option['language-school' . '_content_font_line_height'] . "px;
	}
	
	.cmsmasters_archive_item_type {
		text-transform:uppercase;
	}
	
	.cmsmasters_icon_list_items li:before {
		font-size:" . $cmsmasters_option['language-school' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_content_font_line_height'] . "px;
	}
	/* Finish Content Font */


	/* Start Link Font */
	a,
	.subpage_nav > strong,
	.subpage_nav > span,
	.subpage_nav > a {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_link_font_google_font']) . $cmsmasters_option['language-school' . '_link_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_link_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_link_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_link_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_link_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_link_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_link_font_text_decoration'] . ";
	}
	
	a:hover {
		text-decoration:" . $cmsmasters_option['language-school' . '_link_hover_decoration'] . ";
	}
	/* Finish Link Font */


	/* Start Navigation Title Font */
	.navigation > li > a,
	.navigation .menu-item-mega-container > ul > li > a .nav_title {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_nav_title_font_google_font']) . $cmsmasters_option['language-school' . '_nav_title_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_nav_title_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_nav_title_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_nav_title_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_nav_title_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_nav_title_font_text_transform'] . ";
	}
	
	.header_mid_but {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_nav_title_font_google_font']) . $cmsmasters_option['language-school' . '_nav_title_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_nav_title_font_font_size'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_nav_title_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_nav_title_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_nav_title_font_text_transform'] . ";
	}
	/* Finish Navigation Title Font */


	/* Start Navigation Dropdown Font */
	.navigation li > a .nav_tag,
	.navigation li > a .nav_subtitle,
	.navigation ul li a {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_nav_dropdown_font_google_font']) . $cmsmasters_option['language-school' . '_nav_dropdown_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_nav_dropdown_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_nav_dropdown_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_nav_dropdown_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_nav_dropdown_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_nav_dropdown_font_text_transform'] . ";
	}
	
	.navigation li > a .nav_subtitle,
	.navigation li > a .nav_tag {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_nav_dropdown_font_font_size'] - 1) . "px;
	}
	
	.navigation li > a .nav_subtitle {
		line-height:" . ((int) $cmsmasters_option['language-school' . '_nav_dropdown_font_font_size'] - 1) . "px;
	}
	
	@media only screen and (max-width: 1024px) {
		.navigation > li > a, 
		.navigation .menu-item-mega-container > ul > li > a .nav_title {
			font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_nav_dropdown_font_google_font']) . $cmsmasters_option['language-school' . '_nav_dropdown_font_system_font'] . ";
			font-size:" . ((int) $cmsmasters_option['language-school' . '_nav_dropdown_font_font_size'] + 1) . "px;
			line-height:" . $cmsmasters_option['language-school' . '_nav_dropdown_font_line_height'] . "px;
			font-weight:" . $cmsmasters_option['language-school' . '_nav_dropdown_font_font_weight'] . ";
			font-style:" . $cmsmasters_option['language-school' . '_nav_dropdown_font_font_style'] . ";
			text-transform:" . $cmsmasters_option['language-school' . '_nav_dropdown_font_text_transform'] . ";
		}
	}
	/* Finish Navigation Dropdown Font */


	/* Start H1 Font */
	h1,
	h1 a,
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap, 
	.portfolio.opened-article .project .cmsmasters_project_title,
	.blog.opened-article .cmsmasters_post_title,
	.post.cmsmasters_default_type .cmsmasters_post_title,
	.post.cmsmasters_default_type .cmsmasters_post_title a,
	.logo .title {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h1_font_google_font']) . $cmsmasters_option['language-school' . '_h1_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h1_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h1_font_text_decoration'] . ";
	}
	
	.post.cmsmasters_default_type .cmsmasters_post_date .cmsmasters_day,
	.post.cmsmasters_timeline_type .cmsmasters_post_date .cmsmasters_day,
	.blog.opened-article .post .cmsmasters_post_date .cmsmasters_day,
	.cmsmasters_icon_list_items.cmsmasters_icon_list_icon_type_number .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	.cmsmasters_icon_box.box_icon_type_number:before,
	.cmsmasters_icon_box.cmsmasters_icon_heading_left.box_icon_type_number .icon_box_heading:before {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h1_font_google_font']) . $cmsmasters_option['language-school' . '_h1_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['language-school' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h1_font_font_style'] . ";
	}
	
	.cmsmasters_dropcap.type1 {
		font-size:36px; /* static */
	}
	
	.cmsmasters_dropcap.type2 {
		font-size:20px; /* static */
	}
	
	.headline_outer .headline_inner .headline_icon:before {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_h1_font_font_size'] + 4) . "px;
		line-height:" . ((int) $cmsmasters_option['language-school' . '_h1_font_line_height'] + 10) . "px;
	}
	
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap, 
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner:before {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_h1_font_font_size'] + 8) . "px;
		line-height:" . ((int) $cmsmasters_option['language-school' . '_h1_font_line_height'] + 14) . "px;
	}
	
	.headline_outer .headline_inner.align_center .headline_icon:before {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_h1_font_line_height'] + 14) . "px;
		line-height:" . ((int) $cmsmasters_option['language-school' . '_h1_font_line_height'] + 20) . "px;
	}
	
	.headline_outer .headline_inner.align_left .headline_icon {
		padding-left:" . ((int) $cmsmasters_option['language-school' . '_h1_font_line_height'] + 10) . "px;
	}
	
	.headline_outer .headline_inner.align_right .headline_icon {
		padding-right:" . ((int) $cmsmasters_option['language-school' . '_h1_font_line_height'] + 10) . "px;
	}
	
	.headline_outer .headline_inner.align_center .headline_icon {
		padding-top:" . ((int) $cmsmasters_option['language-school' . '_h1_font_line_height'] + 30) . "px;
	}
	/* Finish H1 Font */


	/* Start H2 Font */
	h2,
	h2 a,
	.booking_title,
	.pricing_title,
	.cmsmasters_pricing_table .cmsmasters_price_wrap,
	.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap, 
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h2_font_google_font']) . $cmsmasters_option['language-school' . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h2_font_text_decoration'] . ";
	}
	
	.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner:before {
		font-size:" . $cmsmasters_option['language-school' . '_h2_font_font_size'] . "px;
	}
	
	.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner:before {
		line-height:" . $cmsmasters_option['language-school' . '_h2_font_line_height'] . "px;
	}
	
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_units {
		font-size:16px; /* static */
		line-height:34px; /* static */
	}
	
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter {
		font-size:30px; /* static */
		line-height:40px; /* static */
	}
	
	.cmsmasters_pricing_table .cmsmasters_currency,
	.cmsmasters_pricing_table .cmsmasters_coins {
		line-height:30px; /* static */
	}
	
	.cmsmasters_pricing_table .cmsmasters_price {
		font-size:72px; /* static */
		line-height:80px; /* static */
	}
	
	.cmsmasters_counters.counters_type_horizontal .cmsmasters_counter_wrap .cmsmasters_counter.counter_has_icon .cmsmasters_counter_inner {
		padding-" . ((is_rtl()) ? 'right' : 'left') . ":" . ((int) $cmsmasters_option['language-school' . '_h2_font_line_height'] + 14) . "px;
	}
	/* Finish H2 Font */


	/* Start H3 Font */
	h3,
	h3 a {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h3_font_google_font']) . $cmsmasters_option['language-school' . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h3_font_text_decoration'] . ";
	}
	
	.cmsmasters_dropcap {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h3_font_google_font']) . $cmsmasters_option['language-school' . '_h3_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['language-school' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h3_font_text_decoration'] . ";
	}
	
	.bypostauthor > .comment-body .alignleft:before {
		font-size:" . $cmsmasters_option['language-school' . '_h3_font_font_size'] . "px;
	}
	
	.bypostauthor > .comment-body .alignleft:before {
		line-height:" . $cmsmasters_option['language-school' . '_h3_font_line_height'] . "px;
	}
	
	.bypostauthor > .comment-body .alignleft:before {
		width:" . $cmsmasters_option['language-school' . '_h3_font_line_height'] . "px;
	}
	
	.bypostauthor > .comment-body .alignleft:before {
		height:" . $cmsmasters_option['language-school' . '_h3_font_line_height'] . "px;
	}
	/* Finish H3 Font */


	/* Start H4 Font */
	h4, 
	h4 a, 
	.bottom_inner .widget .widgettitle,
	.bottom_inner .widget .widgettitle a,
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h4_font_google_font']) . $cmsmasters_option['language-school' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h4_font_text_decoration'] . ";
	}
	
	.about_author .about_author_cont_title, 
	.about_author .about_author_cont_title a, 
	.post_comments .cmsmasters_comment_item_title, 
	.post_comments .cmsmasters_comment_item_title a {
		text-transform:none;
	}
	/* Finish H4 Font */


	/* Start H5 Font */
	h5,
	h5 a,  
	.cmsmasters_twitter_item_content,
	.cmsmasters_twitter_item_content a,
	.share_posts a {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h5_font_google_font']) . $cmsmasters_option['language-school' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h5_font_text_decoration'] . ";
	}
	/* Finish H5 Font */


	/* Start H6 Font */
	h6,
	h6 a, 
	.widgettitle,
	.widgettitle a,
	.post.cmsmasters_default_type .cmsmasters_post_read_more,
	.post_nav > span a,
	.comment-respond .comment-reply-title,
	.cmsmasters_single_slider_no_items,
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title, 
	.cmsmasters_stats .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	.cmsmasters_pricing_table .cmsmasters_period,
	.cmsmasters_tabs .cmsmasters_tabs_list .cmsmasters_tabs_list_item > a,
	.cmsmasters_toggles .cmsmasters_toggle_wrap .cmsmasters_toggle_title > a,
	.cmsmasters_lpr_cont a,
	.widget_rss li a.rsswidget,
	table thead th,
	table tfoot td {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h6_font_google_font']) . $cmsmasters_option['language-school' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h6_font_text_decoration'] . ";
	}
	
	.blog.opened-article .post .cmsmasters_post_date .cmsmasters_mon,
	.post.cmsmasters_default_type .cmsmasters_post_date .cmsmasters_mon,
	.post.cmsmasters_timeline_type .cmsmasters_post_date .cmsmasters_mon {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h6_font_google_font']) . $cmsmasters_option['language-school' . '_h6_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['language-school' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h6_font_text_decoration'] . ";
	}
	
	.widgettitle,
	.widgettitle a,
	.profile_details_title,
	.profile_features_title,
	.profile_social_icons_title,
	.cmsmasters_single_slider_title,
	.comment-respond .comment-reply-title,
	.post_comments_title,
	.cmsmasters_pings_list h6,
	.about_author_title {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_h6_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['language-school' . '_h6_font_line_height'] + 2) . "px;
	}
	
	.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_inner:before {
		line-height:" . ((int) $cmsmasters_option['language-school' . '_h6_font_line_height'] + 2) . "px;
	}
	
	.cmsmasters_tabs.tabs_mode_tab.lpr .cmsmasters_tabs_list .cmsmasters_tabs_list_item > a {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_h6_font_font_size'] - 1) . "px;
	}
	
	/* Finish H6 Font */


	/* Start Button Font */
	.cmsmasters_button, 
	.button, 
	input[type=submit], 
	input[type=button], 
	button, 
	.tt_booking a.tt_btn,
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li, 
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_button_font_google_font']) . $cmsmasters_option['language-school' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_button_font_text_transform'] . ";
	}
	
	.gform_wrapper .gform_footer input.button, 
	.gform_wrapper .gform_footer input[type=submit] {
		font-size:" . $cmsmasters_option['language-school' . '_button_font_font_size'] . "px !important;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg, 
	.cmsmasters_button.cmsmasters_but_icon_divider, 
	.cmsmasters_button.cmsmasters_but_icon_inverse {
		padding-left:" . ((int) $cmsmasters_option['language-school' . '_button_font_line_height'] + 20) . "px;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_divider:before, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:before, 
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_divider:after, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:after {
		width:" . $cmsmasters_option['language-school' . '_button_font_line_height'] . "px;
	}
	/* Finish Button Font */


	/* Start Small Text Font */
	small,
	.tweet_time,
	.rss-date,
	.cmsmasters_twitter .published,
	.comment-respond .comment-reply-title a,
	.post_comments .cmsmasters_comment_item_date, 
	.cmsmasters_single_slider .cmsmasters_single_slider_item_date,
	.post.cmsmasters_masonry_type .cmsmasters_post_date,
	.cmsmasters_archive_type .cmsmasters_archive_item_date,
	.post.cmsmasters_puzzle_type .cmsmasters_post_date,
	.cmsmasters_posts_slider .cmsmasters_post_date,
	.cmsmasters_post_comments span,
	.cmsmastersLike span,
	.headline_outer, 
	.headline_outer a, 
	.cmsmasters_breadcrumbs_inner, 
	form .formError .formErrorContent {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_small_font_google_font']) . $cmsmasters_option['language-school' . '_small_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_small_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_small_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_small_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_small_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_small_font_text_transform'] . ";
	}
	
	.rss-date,
	.cmsmasters_tabs.lpr .published,
	.cmsmasters_twitter .published {
		font-size:10px;
		text-transform:uppercase;
	}
	
	.tweet_time,
	.cmsmasters_posts_slider .cmsmasters_post_date,
	.post.cmsmasters_masonry_type .cmsmasters_post_date,
	.cmsmasters_archive_type .cmsmasters_archive_item_date,
	.post.cmsmasters_puzzle_type .cmsmasters_post_date,
	.post_comments .cmsmasters_comment_item_date, 
	.cmsmasters_single_slider .cmsmasters_single_slider_item_date {
		text-transform:uppercase;
	}
	
	.gform_wrapper .description, 
	.gform_wrapper .gfield_description, 
	.gform_wrapper .gsection_description, 
	.gform_wrapper .instruction {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_small_font_google_font']) . $cmsmasters_option['language-school' . '_small_font_system_font'] . " !important;
		font-size:" . $cmsmasters_option['language-school' . '_small_font_font_size'] . "px !important;
		line-height:" . $cmsmasters_option['language-school' . '_small_font_line_height'] . "px !important;
	}
	/* Finish Small Text Font */


	/* Start Text Fields Font */
	input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	textarea,
	select,
	option {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_input_font_google_font']) . $cmsmasters_option['language-school' . '_input_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_input_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_input_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_input_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_input_font_font_style'] . ";
	}
	
	.header_mid .search_wrap .search_bar_wrap .search_field input {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_input_font_font_size'] - 2) . "px;
	}
	
	.gform_wrapper input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.gform_wrapper textarea, 
	.gform_wrapper select {
		font-size:" . $cmsmasters_option['language-school' . '_input_font_font_size'] . "px !important;
	}
	/* Finish Text Fields Font */


	/* Start Blockquote Font */
	blockquote {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_quote_font_google_font']) . $cmsmasters_option['language-school' . '_quote_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_quote_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_quote_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_quote_font_font_style'] . ";
	}
	/* Finish Blockquote Font */

/***************** Finish Theme Font Styles ******************/


";


if (CMSMASTERS_EVENTS_CALENDAR) {

	$custom_css .= "
/***************** Start Events Font Styles ******************/

	/* Start Content Font */
	.tribe-this-week-widget-header-date,
	ul.tribe-related-events > li .tribe-related-event-info,
	.tribe-events-tooltip .tribe-events-event-body .description {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_content_font_font_size'] - 1) . "px;
	}
	/* Finish Content Font */
	
	
	/* Start H1 Font */
	.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-colon,
	.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-number {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h1_font_google_font']) . $cmsmasters_option['language-school' . '_h1_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h1_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h1_font_text_decoration'] . ";
	}
	
	.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-colon,
	.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-number {
		font-size:36px;
	}
	/* Finish H1 Font */
	
	/* Start H4 Font */
	.widget.tribe-events-countdown-widget .tribe-countdown-text,
	.widget.tribe-events-countdown-widget .tribe-countdown-text a,
	#tribe-events-content.tribe-events-list .type-tribe_events .cmsmasters_events_list_event_wrap .cmsmasters_events_list_event_header .tribe-events-event-cost,
	#tribe-events-content.tribe-events-list .tribe-events-list-separator-month {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h4_font_google_font']) . $cmsmasters_option['language-school' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h4_font_text_decoration'] . ";
	}
	/* Finish H4 Font */
	
	
	/* Start H6 Font */h6,
	.widget.tribe-this-week-events-widget .tribe-events-page-title,
	.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name a,
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div > span,
	.tribe-events-related-events-title,
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-header .tribe-grid-content-wrap .column > span,
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-header .tribe-grid-content-wrap .column a,
	#tribe-events-content.tribe-events-list .type-tribe_events .cmsmasters_events_list_event_wrap .tribe-events-list-event-description .tribe-events-read-more, 
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child > .entry-title,
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child > .entry-title a,
	.cmsmasters_event_date .cmsmasters_event_month,
	.tribe-events-tooltip .entry-title,
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-event-\"] .tribe-events-month-event-title,
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-event-\"] .tribe-events-month-event-title a,
	#tribe-events-content.tribe-events-month table.tribe-events-calendar thead th, 
	#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner ul.tribe-bar-views-list li.tribe-bar-views-option a {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h6_font_google_font']) . $cmsmasters_option['language-school' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h6_font_text_decoration'] . ";
	}
	
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child > .entry-title,
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child > .entry-title a,
	.tribe-events-tooltip .entry-title,
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-event-\"] .tribe-events-month-event-title,
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-event-\"] .tribe-events-month-event-title a {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_h6_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['language-school' . '_h6_font_line_height'] - 2) . "px;
	}
	
	.widget.tribe-this-week-events-widget .tribe-events-page-title,
	.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name a,
	.tribe-events-related-events-title {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_h6_font_font_size'] + 2) . "px;
	}
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	#tribe-events-bar #tribe-bar-views ul.tribe-bar-views-list li {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_button_font_google_font']) . $cmsmasters_option['language-school' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_button_font_text_transform'] . ";
	}
	/* Finish Button Font */
	
	
	/* Start Small Text Font */
	.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-number .tribe-countdown-under,
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar tbody,
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar tbody a,
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-grid-wrapper .tribe-grid-body .tribe-week-grid-hours div,
	#tribe-events-content .tribe-events-abbr {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_small_font_google_font']) . $cmsmasters_option['language-school' . '_small_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_small_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_small_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_small_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_small_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_small_font_text_transform'] . ";
	}
	
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-grid-wrapper .tribe-grid-body .tribe-week-grid-hours div {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_small_font_font_size'] - 1) . "px;
	}
	
	.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-number .tribe-countdown-under,
	#tribe-events-content .tribe-events-abbr {
		text-transform:uppercase;
	}
	/* Finish Small Text Font */

/***************** Finish Events Font Styles ******************/


";

}


if (CMSMASTERS_TIMETABLE) {

	$custom_css .= "
/***************** Start Timetable Font Styles ******************/

	/* Start Content Font */
	table.tt_timetable th,
	table.tt_timetable .event, 
	table.tt_timetable .event a, 
	table.tt_timetable .event .hours, 
	ul.tt_upcoming_events li .tt_upcoming_events_event_container * {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_content_font_google_font']) . $cmsmasters_option['language-school' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_content_font_font_style'] . ";
	}
	
	ul.tt_upcoming_events li .tt_upcoming_events_event_container * {
		text-transform: none;
	}
	
	table.tt_timetable .event .after_hour_text,
	table.tt_timetable .event, 
	ul.tt_upcoming_events li .tt_upcoming_events_event_container * {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_content_font_font_size'] - 1) . "px;
	}
	
	table.tt_timetable .event a, 
	table.tt_timetable .event .event_header {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_content_font_font_size'] + 1) . "px;
	}
	/* Finish Content Font */

	
	/* Start H3 Font */
	.event_layout_4 table.tt_timetable .event .hours {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h3_font_google_font']) . $cmsmasters_option['language-school' . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h3_font_text_decoration'] . ";
	}
	/* Finish H3 Font */
	
	
	/* Start H5 Font */
	.tt_tabs_navigation li a {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h5_font_google_font']) . $cmsmasters_option['language-school' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h5_font_text_decoration'] . ";
	}
	/* Finish H5 Font */


	/* Start H6 Font */
	ul.tt_upcoming_events li .tt_upcoming_events_event_container,
	table.tt_timetable .event .event_header {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h6_font_google_font']) . $cmsmasters_option['language-school' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h6_font_text_decoration'] . ";
	}
	/* Finish H6 Font */


	/* Start Button Font */
	.ui-tabs .tt_tabs_navigation.ui-widget-header li a,
	.tabs_box_navigation .tabs_box_navigation_selected,
	table.tt_timetable .event .event_hour_booking_wrapper .event_hour_booking,
	.tt_timetable.small .event_hour_booking,
	#tt_booking_popup_message a.tt_btn {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_button_font_google_font']) . $cmsmasters_option['language-school' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_button_font_text_transform'] . ";
	}
	
	.ui-tabs .tt_tabs_navigation.ui-widget-header li a,
	.tabs_box_navigation .tabs_box_navigation_selected {
		line-height:20px;
	}
	/* Finish Button Font */
	

/***************** Finish Timetable Font Styles ******************/


";

}


if (CMSMASTERS_LEARNPRESS) {

	$custom_css .= "
/***************** Start LearnPress Font Styles ******************/

	/* Start Content Font */
	.learn-press-question-options > li.answer-option > label p.single-lines,
	.review-form .review-fields > li > label,
	.review-form .review-fields > li > label .required,
	.learn-press-tabs.ui-widget,
	#review .review-fields > li > label .required,
	#review .review-fields > li > label {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_content_font_google_font']) . $cmsmasters_option['language-school' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_content_font_font_style'] . ";
	}
	
	.learn-press-courses li.course .course-info *,
	.cmsmasters_learnpress_shortcode .lpr_course_post .cmsmasters_course_footer,
	.cmsmasters_learnpress_shortcode .lpr_course_post .cmsmasters_course_footer a {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_content_font_font_size'] - 1) . "px;
	}
	
	.cmsmasters_learnpress_shortcode .lpr_course_post .cmsmasters_course_origin_price {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_content_font_font_size'] - 2) . "px;
	}
	
	.lp-label  {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_content_font_google_font']) . $cmsmasters_option['language-school' . '_content_font_system_font'] . ";
		font-size:11px;
		line-height:20px;
		font-weight:bold;
		font-style:" . $cmsmasters_option['language-school' . '_content_font_font_style'] . ";
		text-transform:none;
	}
	/* Finish Content Font */


	/* Start H1 Font */
	.counter-block .counter .number,
	.cmsmasters_course_title {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h1_font_google_font']) . $cmsmasters_option['language-school' . '_h1_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h1_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h1_font_text_decoration'] . ";
	}
	
	.counter-block .counter .number {
		font-size:" . ((int) $cmsmasters_option['language-school' . '_h1_font_font_size'] + 8) . "px;
		line-height:" . ((int) $cmsmasters_option['language-school' . '_h1_font_line_height'] + 14) . "px;
	}
	/* Finish H1 Font */


	/* Start H2 Font */
	#quiz-countdown,
	.students-list-title,
	.learn-press-content-item-title.content-item-quiz-title h4,
	.lp-course-progress-heading,
	.course-description-heading,
	#user_courses > h3,
	.course-review-head,
	.course-content > h3,
	.single-quiz .quiz-questions > h3,
	.course-curriculum-title {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h2_font_google_font']) . $cmsmasters_option['language-school' . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h2_font_text_decoration'] . ";
	}
	/* Finish H2 Font */
	
	
	/* Start H5 Font */
	#page .course-reviews-list li .review-title {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h5_font_google_font']) . $cmsmasters_option['language-school' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h5_font_text_decoration'] . ";
	}
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	#lp-navigation .nav-link .course-item-title,
	.widget_lp-widget-recent-courses .course-title, 
	.widget_lp-widget-popular-courses .course-title, 
	.widget_lp-widget-featured-courses .course-title,
	.learn-press-courses li.course h3,
	.course-students-list .students .name,
	.single-lp_course .learn-press-course-results-progress .number, 
	.single-lp_course .learn-press-course-results-progress .percentage-sign,
	.quiz-history thead th,
	.order_details thead tr th,
	.table-orders thead tr th,
	.learn-press-cart-table thead tr th,
	.learn-press-checkout-review-order-table tr th,
	ul.learn-press-nav-tabs .course-nav a,
	.single-quiz .quiz-question-nav .lp-question-wrap > h4,
	.quiz-result .quiz-result-summary .quiz-result-field > label,
	.curriculum-sections .section-content .course-lesson, 
	.curriculum-sections .section-content .course-lesson a, 
	.curriculum-sections .section-content .course-quiz,
	.curriculum-sections .section-content .course-quiz a,
	.user-basic-info .user-nicename {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h6_font_google_font']) . $cmsmasters_option['language-school' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h6_font_text_decoration'] . ";
	}
	
	#learn-press-course-curriculum .course-item.course-lesson:before, 
	#learn-press-course-curriculum .course-item.course-quiz:before {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_h6_font_google_font']) . $cmsmasters_option['language-school' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_h6_font_font_size'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['language-school' . '_h6_font_text_decoration'] . ";
	}
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	#course-item-content-header .form-button.lp-button-back button,
	.learnpress-page .lp-button {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_button_font_google_font']) . $cmsmasters_option['language-school' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_button_font_text_transform'] . ";
	}
	/* Finish Button Font */
	
	
	/* Srart Small Font */
	.quiz-countdown-label {
		font-family:" . language_school_get_google_font($cmsmasters_option['language-school' . '_small_font_google_font']) . $cmsmasters_option['language-school' . '_small_font_system_font'] . ";
		font-size:" . $cmsmasters_option['language-school' . '_small_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['language-school' . '_small_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['language-school' . '_small_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['language-school' . '_small_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['language-school' . '_small_font_text_transform'] . ";
	}
	/* Finish Small Font */
	

/***************** Finish LearPress Font Styles ******************/


";

}

	return apply_filters('language_school_theme_fonts_filter', $custom_css);
}

