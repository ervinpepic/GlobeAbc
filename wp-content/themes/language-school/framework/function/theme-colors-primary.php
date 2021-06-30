<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version 	1.1.7
 * 
 * Theme Primary Color Schemes Rules
 * Created by CMSMasters
 * 
 */


function language_school_theme_colors_primary() {
	$cmsmasters_option = language_school_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version 	1.1.7
 * 
 * Theme Primary Color Schemes Rules
 * Created by CMSMasters
 * 
 */

";
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} Color Scheme Rules ******************/
	/* Start Main Content Font Color */
	" . (($scheme == 'default') ? "body," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme}," : '') . "
	{$rule}#page .mu_register .error,
	{$rule}.cmsmasters_profile .profile .pl_img .pl_noimg:before,
	{$rule}.footer_inner .cmsmasters_social_icon,
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list .cmsmasters_tabs_list_item > a,
	{$rule}textarea,
	{$rule}select,
	{$rule}option,
	{$rule}.cmsmasters_wrap_pagination .page-numbers, 
	{$rule}.cmsmasters_post_comments span,
	{$rule}.cmsmastersLike span {
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_color']) . "
	}
	
	{$rule}input::-webkit-input-placeholder {
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_color']) . "
	}
	
	{$rule}input:-moz-placeholder {
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}a,
	{$rule}h1 a:hover,
	{$rule}h2 a:hover,
	{$rule}h3 a:hover,
	{$rule}h4 a:hover,
	{$rule}h5 a:hover,
	{$rule}h6 a:hover,
	{$rule}.cmsmasters_post_read_more:hover,
	{$rule}.cmsmasters_post_comments:hover:before,
	{$rule}.comment-respond .comment-reply-title a,
	{$rule}.post.cmsmasters_puzzle_type .cmsmasters_post_cont:hover .cmsmasters_post_title a,
	{$rule}.cmsmasters_profile .profile .pl_subtitle,
	{$rule}.cmsmasters_profile .profile .pl_social_list a:hover,
	{$rule}.profile_social_icons_list li a:hover,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_inner:before,
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=\"checkbox\"] + span.wpcf7-list-item-label:after, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=\"checkbox\"] + label:after,
	{$rule}.twr_icon,
	{$rule}.widget_nav_menu li.current_page_item > a,
	{$rule}.widget_nav_menu li a:hover,
	{$rule}.cmsmasters_lpr_cont a:hover,
	{$rule}.widget_rss li a.rsswidget,
	{$rule}.contact_widget_name:before, 
	{$rule}.contact_widget_email:before, 
	{$rule}.contact_widget_url:before, 
	{$rule}.contact_widget_phone:before, 
	{$rule}.adress_wrap:before,
	{$rule}.widget_custom_twitter_entries .tweet_list li .tweet_time:before,
	{$rule}.widget_custom_booking_entries .button, 
	{$rule}.widget_custom_booking_entries input[type=submit], 
	{$rule}.widget_custom_booking_entries input[type=button], 
	{$rule}.widget_custom_booking_entries button,
	{$rule}.cmsmasters_dropcap.type1,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_heading_left .icon_box_heading:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon:before,
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner:before, 
	{$rule}.bypostauthor > .comment-body .alignleft:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a:hover,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a:hover,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a:hover,
	{$rule}.share_posts a:hover, 
	{$rule}.cmsmasters_wrap_pagination a.page-numbers:hover, 
	{$rule}.cmsmasters_wrap_pagination .page-numbers.current {
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
	}
	
	" . (($scheme == 'default') ? "#slide_top," : '') . "
	" . (($scheme == 'default') ? "mark," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme} mark," : '') . "
	{$rule}.cmsmasters-form-builder .check_parent input[type=\"radio\"] + label:after, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=\"radio\"] + span.wpcf7-list-item-label:after,
	{$rule}.cmsmasters_dropcap.type2,
	{$rule}table thead th,
	{$rule}.cmsmasters_content_slider .owl-buttons > div:hover,
	{$rule}.post.cmsmasters_default_type.format-gallery .owl-buttons > div:hover,
	{$rule}.post.cmsmasters_masonry_type.format-gallery .owl-buttons > div:hover,
	{$rule}.post.cmsmasters_timeline_type.format-gallery .owl-buttons > div:hover,
	{$rule}.cmsmasters_prev_arrow:hover, 
	{$rule}.cmsmasters_next_arrow:hover,
	{$rule}.post_nav > span a:hover + span, 
	{$rule}.cmsmasters_wrap_pagination .page-numbers:before, 
	{$rule}.cmsmasters_profile .profile:before, 
	{$rule}.cmsmasters_clients_slider .owl-pagination .owl-page.active,
	{$rule}.cmsmasters_clients_slider .owl-pagination .owl-page:hover,
	{$rule}.cmsmasters_quotes_slider.cmsmasters_quotes_slider_type_box .wrap_quote_title,
	{$rule}.cmsmasters_quotes_slider .owl-pagination .owl-page:hover,
	{$rule}.cmsmasters_quotes_slider .owl-pagination .owl-page.active,
	{$rule}.cmsmasters_quotes_slider.cmsmasters_quotes_slider_type_center .quote_image,
	{$rule}.quote_grid .cmsmasters_quote .cmsmasters_quote_inner:before,
	{$rule}.widget_nav_menu li > a:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_item .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_item:hover .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.post_nav > span a:hover + span, 
	{$rule}.cmsmasters_prev_arrow:hover, 
	{$rule}.cmsmasters_next_arrow:hover,
	{$rule}.about_author_avatar,
	{$rule}.cmsmasters_comment_item_avatar,
	{$rule}.portfolio.opened-article .project .cmsmasters_project_title,
	{$rule}.profiles.opened-article .profile .cmsmasters_profile_title,
	{$rule}.profiles.opened-article .profile .profile_sidebar,
	{$rule}.cmsmasters_clients_slider .owl-pagination .owl-page.active,
	{$rule}.cmsmasters_clients_slider .owl-pagination .owl-page:hover,
	{$rule}.cmsmasters_quotes_slider .owl-pagination .owl-page:hover,
	{$rule}.cmsmasters_quotes_slider .owl-pagination .owl-page.active,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_border .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:after,
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]):focus,
	{$rule}textarea:focus,
	{$rule}select:focus {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]):focus,
	{$rule}textarea:focus,
	{$rule}select:focus {
		-webkit-box-shadow:inset 0 0 0 1px " . $cmsmasters_option['language-school' . '_' . $scheme . '_link'] . ";
		box-shadow:inset 0 0 0 1px " . $cmsmasters_option['language-school' . '_' . $scheme . '_link'] . ";
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}a:hover,
	{$rule}.post.cmsmasters_default_type .cmsmasters_post_date .cmsmasters_mon,
	{$rule}.post.cmsmasters_timeline_type .cmsmasters_post_date .cmsmasters_mon,
	{$rule}.blog.opened-article .post .cmsmasters_post_date .cmsmasters_mon,
	{$rule}ul li:before,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a,
	{$rule}.cmsmasters_single_slider .cmsmasters_single_slider_item_date,
	{$rule}.post.cmsmasters_masonry_type .cmsmasters_post_date,
	{$rule}.post.cmsmasters_puzzle_type .cmsmasters_post_date,
	{$rule}.cmsmasters_archive_item_date,
	{$rule}.cmsmasters_archive_item_type,
	{$rule}.cmsmasters_post_comments:before,
	{$rule}.cmsmastersLike:before,
	{$rule}.post_comments .cmsmasters_comment_item_date,
	{$rule}.comment-respond .comment-reply-title a:hover,
	{$rule}.profile_social_icons_list li a,
	{$rule}.cmsmasters_posts_slider .cmsmasters_post_date,
	{$rule}.cmsmasters_quotes_slider.cmsmasters_quotes_slider_type_center .quote_content:before,
	{$rule}.cmsmasters_quotes_slider.cmsmasters_quotes_slider_type_center .quote_subtitle,
	{$rule}.cmsmasters_twitter .published,
	{$rule}#wp-calendar caption:before,
	{$rule}.cmsmasters_tabs.lpr .published,
	{$rule}.tweet_time,
	{$rule}.rss-date,
	{$rule}.footer_inner .cmsmasters_social_icon:hover,
	{$rule}a.cmsmasters_cat_color:hover,
	{$rule}.footer_nav > li.current-menu-item > a, 
	{$rule}.footer_nav > li.current-menu-ancestor > a, 
	{$rule}.cmsmasters_social_icon,
	{$rule}.subpage_nav > span {
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_hover']) . "
	}
	
	" . (($scheme == 'default') ? "#slide_top:hover" : '') . " {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}h1,
	{$rule}h2,
	{$rule}h3,
	{$rule}h4,
	{$rule}h5,
	{$rule}h6,
	{$rule}h1 a,
	{$rule}h2 a,
	{$rule}h3 a,
	{$rule}h4 a,
	{$rule}h5 a,
	{$rule}h6 a,
	{$rule}.post.cmsmasters_default_type .cmsmasters_post_date .cmsmasters_day,
	{$rule}.post.cmsmasters_timeline_type .cmsmasters_post_date .cmsmasters_day,
	{$rule}.blog.opened-article .post .cmsmasters_post_date .cmsmasters_day,
	{$rule}table tfoot td,
	{$rule}.cmsmasters_post_read_more,
	{$rule}.cmsmasters_prev_arrow, 
	{$rule}.cmsmasters_next_arrow,
	{$rule}.cmsmasters_button, 
	{$rule}.button, 
	{$rule}input[type=submit], 
	{$rule}input[type=button], 
	{$rule}button,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li.current a,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a:hover,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but:before,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but:hover,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but.current,
	{$rule}.post_nav > span a, 
	{$rule}.post_nav > span a:hover, 
	{$rule}.portfolio.opened-article .project .project_features_item_title, 
	{$rule}.portfolio.opened-article .project .project_details_item_title,
	{$rule}.profiles.opened-article .profile .profile_features_item_title, 
	{$rule}.profiles.opened-article .profile .profile_details_item_title,
	{$rule}.cmsmasters_stats .cmsmasters_stat_wrap .cmsmasters_stat_title,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_border .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	{$rule}.notice_close,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list .cmsmasters_tabs_list_item > a:hover,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab > a,
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_wrap .cmsmasters_toggle_title > a,
	{$rule}.cmsmasters_twitter_item_content,
	{$rule}#wp-calendar caption,
	{$rule}#wp-calendar thead th,
	{$rule}.widget_nav_menu li a,
	{$rule}.img_placeholder_small,
	{$rule}.cmsmasters_lpr_cont a,
	{$rule}.widget_rss li a.rsswidget,
	{$rule}.widget_rss li cite,
	{$rule}fieldset legend,
	{$rule}blockquote,
	{$rule}blockquote footer,
	{$rule}table caption,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat_title,
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap,
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > ul li a:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > ul li a:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li a:before, 
	{$rule}.search_bar_wrap .search_button button {
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_wrap .cmsmasters_toggle_title > .cmsmasters_toggle_plus > span,
	{$rule}form .formError .formErrorContent {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.cmsmasters_hover_slider .cmsmasters_hover_slider_thumbs > li a:before,
	{$rule}.cmsmasters_content_slider .owl-buttons > div,
	{$rule}.post.cmsmasters_default_type.format-gallery .owl-buttons > div,
	{$rule}.post.cmsmasters_masonry_type.format-gallery .owl-buttons > div,
	{$rule}.post.cmsmasters_timeline_type.format-gallery .owl-buttons > div {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_' . $scheme . '_heading']) . ", 0.4);
	}
	
	{$rule}.post.cmsmasters_puzzle_type .preloader:after {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_' . $scheme . '_heading']) . ", 0.5);
	}
	
	{$rule}.cmsmasters_profile .pl_img a:before,
	{$rule}.portfolio.puzzle .project .project_outer:hover .cmsmasters_img_rollover,
	{$rule}.cmsmasters_img_rollover_wrap:hover .cmsmasters_img_rollover {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['language-school' . '_' . $scheme . '_heading']) . ", 0.85);
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.custom_subscribe .mailpoet_submit,
	{$rule}input[type=submit].wysija-submit-field,
	{$rule}table thead th,
	{$rule}.cmsmasters_prev_arrow:hover, 
	{$rule}.cmsmasters_next_arrow:hover,
	{$rule}.post_nav > span a:hover + span, 
	{$rule}.cmsmasters_img_rollover_wrap .cmsmasters_img_rollover .cmsmasters_open_post_link:before,
	{$rule}.portfolio.puzzle .project .cmsmasters_img_rollover:before,
	{$rule}.portfolio.puzzle .project .cmsmasters_project_title a,
	{$rule}.portfolio.puzzle .project .cmsmasters_project_category,
	{$rule}.portfolio.puzzle .project .cmsmasters_project_category a,
	{$rule}.portfolio.puzzle .project .cmsmasters_project_footer,
	{$rule}.portfolio.puzzle .project .cmsmasters_project_footer a,
	{$rule}.portfolio.puzzle .project .cmsmasters_project_footer a:before,
	{$rule}.portfolio.puzzle .project .cmsmasters_project_footer span,
	{$rule}.cmsmasters_img_rollover_wrap .cmsmasters_img_rollover .cmsmasters_image_link span:before,
	{$rule}.cmsmasters_profile .profile .pl_img a:after,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .cmsmasters_price_wrap .cmsmasters_price,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .cmsmasters_price_wrap .cmsmasters_currency,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .cmsmasters_price_wrap .cmsmasters_coins,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .cmsmasters_price_wrap .cmsmasters_period,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .cmsmasters_button,
	{$rule}.cmsmasters_quotes_slider.cmsmasters_quotes_slider_type_box .quote_title,
	{$rule}.cmsmasters_quotes_slider.cmsmasters_quotes_slider_type_box .quote_subtitle,
	{$rule}.cmsmasters_quotes_slider.cmsmasters_quotes_slider_type_box .wrap_quote_title,
	{$rule}.cmsmasters_quotes_slider.cmsmasters_quotes_slider_type_box .wrap_quote_title a,
	{$rule}.quote_grid .cmsmasters_quote .cmsmasters_quote_inner:before,
	{$rule}mark,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item .cmsmasters_button:hover,
	{$rule}.cmsmasters_content_slider .owl-buttons > div > span,
	{$rule}.post.cmsmasters_default_type.format-gallery .owl-buttons > div > span,
	{$rule}.post.cmsmasters_masonry_type.format-gallery .owl-buttons > div > span,
	{$rule}.post.cmsmasters_timeline_type.format-gallery .owl-buttons > div > span,
	{$rule}form .formError .formErrorContent,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top:before,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner {
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}#wp-calendar thead th,
	" . (($scheme == 'default') ? "body," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme}," : '') . "
	{$rule}input[type=submit].wysija-submit-field:hover,
	{$rule}.custom_subscribe .mailpoet_submit:hover,
	{$rule}.cmsmasters_boxed,
	{$rule}table,
	{$rule}.cmsmasters_prev_arrow, 
	{$rule}.cmsmasters_next_arrow, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li.current a,
	{$rule}.cmsmasters_single_slider .cmsmasters_single_slider_item_outer, 
	{$rule}.post.cmsmasters_timeline_type .cmsmasters_post_cont_inner, 
	{$rule}.post.cmsmasters_puzzle_type .cmsmasters_post_cont, 
	{$rule}.post.cmsmasters_puzzle_type .cmsmasters_post_footer, 
	{$rule}.cmsmasters_wrap_pagination .page-numbers.current, 
	{$rule}.cmsmasters_wrap_pagination a.page-numbers:hover, 
	{$rule}.post.cmsmasters_masonry_type .cmsmasters_post_cont, 
	{$rule}.portfolio .project .project_outer, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but:before, 
	{$rule}.cmsmasters_profile .profile,
	{$rule}.notice_close,
	{$rule}.cmsmasters_posts_slider .cmsmasters_slider_post_cont,
	{$rule}.cmsmasters_posts_slider .project .slider_project_outer,
	{$rule}.cmsmasters_quotes_slider .owl-pagination .owl-page,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab > a,
	{$rule}.cmsmasters_toggles.toggles_mode_accordion .cmsmasters_toggle_wrap:hover,
	{$rule}.cmsmasters_toggles.toggles_mode_accordion .cmsmasters_toggle_wrap.current_toggle,
	{$rule}.cmsmasters_toggles.toggles_mode_toggle .cmsmasters_toggle_wrap.current_toggle,
	{$rule}.widget_custom_popular_projects_entries .popular_pj_item, 
	{$rule}.widget_custom_latest_projects_entries .latest_pj_item,
	{$rule}.img_placeholder_small:hover,
	{$rule}.widget_custom_twitter_entries .tweet_list li,
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=\"checkbox\"] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=\"checkbox\"] + label:before, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=\"radio\"] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=\"radio\"] + label:before,
	{$rule}.bottom_bg,
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]):focus,
	{$rule}textarea:focus,
	{$rule}select:focus,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .cmsmasters_button:hover,
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner,
	{$rule}.post.cmsmasters_default_type .cmsmasters_post_date,
	{$rule}.post.cmsmasters_timeline_type .cmsmasters_post_date,
	{$rule}.blog.opened-article .post .cmsmasters_post_date {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_tabs.tabs_mode_tab .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab > a,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li.current a {
		" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.post.cmsmasters_puzzle_type .puzzle_post_content_wrapper:before {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	@media only screen and (max-width: 768px) {
		{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
		}
	}
	
	@media only screen and (max-width: 600px) {
		{$rule}html #page .blog.columns.puzzle .post:nth-child(even) .puzzle_post_content_wrapper:before {
			border-bottom-color:" . $cmsmasters_option['language-school' . '_' . $scheme . '_bg'] . " !important;
		}
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	" . (($scheme == 'default') ? "#slide_top," : '') . "
	{$rule}.cmsmasters_dropcap.type2,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon_wrap {
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}fieldset,
	{$rule}fieldset legend,
	{$rule}#page .mu_register .error,
	{$rule}.post.cmsmasters_default_type .cmsmasters_post_date .cmsmasters_mon,
	{$rule}.post.cmsmasters_timeline_type .cmsmasters_post_date .cmsmasters_mon,
	{$rule}.blog.opened-article .post .cmsmasters_post_date .cmsmasters_mon,
	{$rule}.post.cmsmasters_puzzle_type .preloader[class^=\"cmsmasters_theme_icon_\"], 
	{$rule}.post.cmsmasters_puzzle_type .preloader[class*=\" cmsmasters_theme_icon_\"],
	{$rule}.cmsmasters_icon_list_items .cmsmasters_icon_list_item .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item .cmsmasters_price_wrap,
	{$rule}.img_placeholder,
	{$rule}.cmsmasters_quotes_slider.cmsmasters_quotes_slider_type_box .quote_content,
	{$rule}.quote_grid .quotes_list .cmsmasters_quote,
	{$rule}.cmsmasters_toggles.toggles_mode_accordion .cmsmasters_toggle_wrap,
	{$rule}.img_placeholder_small,
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	{$rule}textarea,
	{$rule}select,
	{$rule}option,
	{$rule}.cmsmasters_featured_block,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap:before,
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter,
	{$rule}.gallery-item .gallery-icon,
	{$rule}.gallery-item .gallery-caption,
	{$rule}.cmsmasters_img.with_caption, 
	{$rule}.wp-caption, 
	{$rule}.owl-pagination .owl-page, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers, 
	{$rule}.cmsmasters_footer_default .footer_copyright_wrap {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.cmsmasters_quotes_slider.cmsmasters_quotes_slider_type_box .quote_content:after {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.cmsmasters_profile .pl_social_list a,
	{$rule}.share_posts a,
	{$rule}blockquote:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsmasters_icon_list_items.cmsmasters_icon_list_type_block .cmsmasters_icon_list_item:before,
	{$rule}.post.cmsmasters_timeline_type:before,
	{$rule}.blog.timeline:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}table tr th, 
	{$rule}table tr td, 
	{$rule}.custom_subscribe .parsley-errors-list,
	{$rule}.custom_subscribe .mailpoet_validate_success,
	{$rule}.custom_subscribe .mailpoet_validate_error,
	{$rule}#page .mu_register .error,
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_info,
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	{$rule}textarea,
	{$rule}select,
	{$rule}option,
	{$rule}hr,
	{$rule}.cmsmasters_divider,
	{$rule}.cmsmasters_widget_divider,
	{$rule}.cmsmasters_img.with_caption,
	{$rule}.cmsmasters_icon_wrap .cmsmasters_simple_icon, 
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_icon_list_type_block .cmsmasters_icon_list_item,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_icon:after,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon:after,  
	{$rule}.footer_border, 
	{$rule}.post.cmsmasters_default_type .cmsmasters_post_date .published,
	{$rule}.post.cmsmasters_timeline_type .cmsmasters_post_date .published,
	{$rule}.post.cmsmasters_default_type .cmsmasters_post_date .cmsmasters_mon, 
	{$rule}.post.cmsmasters_timeline_type .cmsmasters_post_date .cmsmasters_mon, 
	{$rule}.blog.opened-article .post .cmsmasters_post_date .published, 
	{$rule}.blog.opened-article .post .cmsmasters_post_date .cmsmasters_mon, 
	{$rule}.pingslist .pingback, 
	{$rule}.post.cmsmasters_default_type .cmsmasters_post_cont_info,
	{$rule}.blog.opened-article .post .cmsmasters_post_cont_info,
	{$rule}.cmsmasters_prev_arrow, 
	{$rule}.cmsmasters_next_arrow,
	{$rule}.cmsmasters_button, 
	{$rule}.button, 
	{$rule}input[type=submit], 
	{$rule}input[type=button], 
	{$rule}button,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but:before,
	{$rule}.post_nav,
	{$rule}.cmsmasters_single_slider .cmsmasters_single_slider_item_date,
	{$rule}.cmsmasters_single_slider .cmsmasters_single_slider_item_inner,
	{$rule}.cmsmasters_img_wrap .img_placeholder,
	{$rule}.post.cmsmasters_masonry_type .cmsmasters_post_date,
	{$rule}.post.cmsmasters_masonry_type .cmsmasters_post_cont_inner,
	{$rule}.post.cmsmasters_timeline_type .cmsmasters_post_cont_inner,
	{$rule}.post.cmsmasters_puzzle_type .preloader[class^=\"cmsmasters_theme_icon_\"], 
	{$rule}.post.cmsmasters_puzzle_type .preloader[class*=\" cmsmasters_theme_icon_\"],
	{$rule}.portfolio.grid .project .project_outer, 
	{$rule}.portfolio.opened-article .project .project_features_item, 
	{$rule}.portfolio.opened-article .project .project_details_item,
	{$rule}.cmsmasters_profile .profile,
	{$rule}.profiles.opened-article .profile .profile_features_item, 
	{$rule}.profiles.opened-article .profile .profile_details_item,
	{$rule}.cmsmasters_clients_slider .owl-pagination .owl-page,
	{$rule}.cmsmasters_profile .profile .pl_img .pl_noimg,
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_container_wrap,
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner,
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=\"checkbox\"] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=\"checkbox\"] + label:before, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=\"radio\"] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=\"radio\"] + label:before,
	{$rule}.notice_close,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item .cmsmasters_pricing_item_inner,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item .cmsmasters_price_wrap,
	{$rule}.cmsmasters_posts_slider .cmsmasters_post_date,
	{$rule}.cmsmasters_posts_slider .cmsmasters_slider_post_cont_wrap,
	{$rule}.img_placeholder,
	{$rule}.cmsmasters_posts_slider .project .slider_project_inner,
	{$rule}.cmsmasters_quotes_slider.cmsmasters_quotes_slider_type_box .quote_content,
	{$rule}.cmsmasters_quotes_slider.cmsmasters_quotes_slider_type_box .quote_content:before,
	{$rule}.cmsmasters_quotes_slider .owl-pagination .owl-page,
	{$rule}.quote_grid .quotes_list .cmsmasters_quote,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list,
	{$rule}.cmsmasters_toggles.toggles_mode_accordion .cmsmasters_toggle_wrap,
	{$rule}.cmsmasters_toggles.toggles_mode_toggle .cmsmasters_toggle_wrap.current_toggle,
	{$rule}.widget ul li,
	{$rule}.widget_custom_popular_projects_entries .pj_ddn, 
	{$rule}.widget_custom_latest_projects_entries .pj_ddn,
	{$rule}.img_placeholder_small,
	{$rule}.cmsmasters_archive_type .cmsmasters_archive_item_info,
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsmasters_tabs.tabs_mode_tab .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab > a,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li.current a {
		" . cmsmasters_color_css('border-left-color', $cmsmasters_option['language-school' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsmasters_tabs.tabs_mode_tab .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab > a,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li.current a {
		" . cmsmasters_color_css('border-right-color', $cmsmasters_option['language-school' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsmasters_tabs.tabs_mode_tour .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab > a {
		" . cmsmasters_color_css('border-top-color', $cmsmasters_option['language-school' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsmasters_tabs.tabs_mode_tour .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab > a {
		" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['language-school' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.portfolio.small_gap .project .project_outer,
	{$rule}.post.cmsmasters_puzzle_type .cmsmasters_post_cont {
		-webkit-box-shadow:0 0 0 1px " . $cmsmasters_option['language-school' . '_' . $scheme . '_border'] . ";
		box-shadow:0 0 0 1px " . $cmsmasters_option['language-school' . '_' . $scheme . '_border'] . ";
	}
	
	@media only screen and (max-width: 768px) {
		{$rule}.cmsmasters_tabs.tabs_mode_tour .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab > a,
		{$rule}.cmsmasters_tabs.tabs_mode_tab .cmsmasters_tabs_list .cmsmasters_tabs_list_item > a,
		{$rule}.cmsmasters_tabs.tabs_mode_tab .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab > a,
		{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li.current a,
		{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a {
			" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_border']) . "
		}
		
		{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li.current a {
			" . cmsmasters_color_css('border-top-color', $cmsmasters_option['language-school' . '_' . $scheme . '_border']) . "
		}
	}
	/* Finish Borders Color */
	
	
	/* Start Secondary Color */
	{$rule}input[type=submit].wysija-submit-field:hover,
	{$rule}.custom_subscribe .mailpoet_submit:hover,
	{$rule}.color_2,
	{$rule}.cmsmasters_wrap_more_items.cmsmasters_loading:before,
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button,
	{$rule}.cmsmasters_paypal_donations > form:hover + .button,
	{$rule}#wp-calendar #today,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .cmsmasters_button:hover,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item .cmsmasters_button,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item .cmsmasters_price_wrap .cmsmasters_currency, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item .cmsmasters_price_wrap .cmsmasters_price, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item .cmsmasters_price_wrap .cmsmasters_coins,
	{$rule}.notice_close:hover,
	{$rule}.cmsmasters_img_rollover_wrap .cmsmasters_img_rollover .cmsmasters_open_post_link:hover:before,
	{$rule}.cmsmasters_img_rollover_wrap .cmsmasters_img_rollover .cmsmasters_image_link:hover span:before,
	{$rule}.cmsmasters_req,
	{$rule}.cmsmastersLike:hover:before,
	{$rule}.cmsmastersLike.active:before,
	{$rule}.cmsmasters_button:hover, 
	{$rule}.button:hover, 
	{$rule}input[type=submit]:hover, 
	{$rule}input[type=button]:hover, 
	{$rule}button:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_secondary']) . "
	}
	
	{$rule}#page .mu_register .error:before,
	{$rule}input[type=submit].wysija-submit-field,
	{$rule}.custom_subscribe .mailpoet_submit,
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_wrap.current_toggle:before,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab:before,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .cmsmasters_button,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .cmsmasters_price_wrap,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item .cmsmasters_button:hover,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item .cmsmasters_pricing_item_inner:before, 
	{$rule}.owl-pagination .owl-page:hover, 
	{$rule}.owl-pagination .owl-page.active {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_secondary']) . "
	}
	
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li.current a,
	{$rule}.blog.opened-article .post .cmsmasters_post_date,
	{$rule}.post.cmsmasters_default_type .cmsmasters_post_date,
	{$rule}.post.cmsmasters_timeline_type .cmsmasters_post_date {
		" . cmsmasters_color_css('border-top-color', $cmsmasters_option['language-school' . '_' . $scheme . '_secondary']) . "
	}
	
	{$rule}input[type=submit].wysija-submit-field,
	{$rule}.custom_subscribe .mailpoet_submit,
	{$rule}.bottom_inner .widget .widgettitle,
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button,
	{$rule}.cmsmasters_paypal_donations > form:hover + .button,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item .cmsmasters_button,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .cmsmasters_price_wrap,
	{$rule}.cmsmasters_button:hover, 
	{$rule}.button:hover, 
	{$rule}input[type=submit]:hover, 
	{$rule}input[type=button]:hover, 
	{$rule}button:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_secondary']) . "
	}
	
	@media only screen and (max-width: 768px) {
		{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a:before {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_secondary']) . "
		}
	}
	/* Finish Secondary Color */
	
	
	/* Start Custom Rules */
	{$rule}.widget_custom_booking_entries input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	{$rule}.widget_custom_booking_entries select,
	{$rule}.widget_custom_booking_entries textarea {
		background-color:rgba(255, 255, 255, .1);
		border-color:rgba(255, 255, 255, .2);
		color:#ffffff;
	}
	
	{$rule}.widget_custom_booking_entries input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]):focus,
	{$rule}.widget_custom_booking_entries select:focus,
	{$rule}.widget_custom_booking_entries textarea:focus {
		background-color:rgba(255, 255, 255, .2);
		border-color:rgba(255, 255, 255, .3);
		-webkit-box-shadow:inset 0 0 0 1px rgba(255, 255, 255, .3);
		box-shadow:inset 0 0 0 1px rgba(255, 255, 255, .3);
	}
	
	{$rule}.widget_custom_booking_entries .select_arrow:after,
	{$rule}.widget_custom_booking_entries span.wpcf7-not-valid-tip,
	{$rule}.booking_title,
	{$rule}.widget_custom_booking_entries a,
	{$rule}.widget_custom_booking_entries li,
	{$rule}.widget_custom_booking_entries {
		color:#ffffff;
	}
	
	{$rule}.widget_custom_booking_entries input::-webkit-input-placeholder {
		color:#ffffff;
	}
	
	{$rule}.widget_custom_booking_entries input:-moz-placeholder {
		color:#ffffff;
	}
	
	{$rule}.widget_custom_booking_entries .button, 
	{$rule}.widget_custom_booking_entries input[type=submit], 
	{$rule}.widget_custom_booking_entries input[type=button], 
	{$rule}.widget_custom_booking_entries button {
		background:#ffffff;
		border-color:#ffffff;
	}
	
	{$rule}.widget_custom_booking_entries .button:hover, 
	{$rule}.widget_custom_booking_entries input[type=submit]:hover, 
	{$rule}.widget_custom_booking_entries input[type=button]:hover, 
	{$rule}.widget_custom_booking_entries button:hover {
		background:none;
		border-color:#ffffff;
		color:#ffffff;
	}
	
	{$rule}.widget_custom_booking_entries .widget_content li {
		border-top-color:rgba(255, 255, 255, .2);
	}
	
	{$rule}.widget_custom_booking_entries div.wpcf7-mail-sent-ok {
		border-color:#ffffff;
	}
	
	{$rule}::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . ";
	}
	
	{$rule}::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	";
	
	
	if ($scheme != 'default') {
		$custom_css .= "
		.cmsmasters_color_scheme_{$scheme}.cmsmasters_row_top_zigzag:before, 
		.cmsmasters_color_scheme_{$scheme}.cmsmasters_row_bot_zigzag:after {
			background-image: -webkit-linear-gradient(135deg, " . $cmsmasters_option['language-school' . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-webkit-linear-gradient(45deg, " . $cmsmasters_option['language-school' . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: -moz-linear-gradient(135deg, " . $cmsmasters_option['language-school' . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-moz-linear-gradient(45deg, " . $cmsmasters_option['language-school' . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: -ms-linear-gradient(135deg, " . $cmsmasters_option['language-school' . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-ms-linear-gradient(45deg, " . $cmsmasters_option['language-school' . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: -o-linear-gradient(135deg, " . $cmsmasters_option['language-school' . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-o-linear-gradient(45deg, " . $cmsmasters_option['language-school' . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: linear-gradient(315deg, " . $cmsmasters_option['language-school' . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					linear-gradient(45deg, " . $cmsmasters_option['language-school' . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
		}
		";
	}
	
	
	$custom_css .= "
	/* Finish Custom Rules */

/***************** Finish {$title} Color Scheme Rules ******************/


/***************** Start {$title} Button Color Scheme Rules ******************/
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_hover:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_hor, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert:hover, 
	{$rule}.cmsmasters_button.cm.sms_but_bg_expand_hor:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_left, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_right, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_top, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_bottom, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_expand_vert, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_expand_hor, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_expand_diag {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_hor:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_shadow {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_shadow:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_shadow {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_light_bg, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_dark_bg:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_light_bg:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_light_bg, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_divider {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider:after {
		" . cmsmasters_color_css('border-right-color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_inverse {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover:before, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_inverse:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover:after, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_inverse:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_right {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_right:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_slide_left, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_slide_right {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_right, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_top, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_right:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_top:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_left, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_right, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_top, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['language-school' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['language-school' . '_' . $scheme . '_bg']) . "
	}

/***************** Finish {$title} Button Color Scheme Rules ******************/


";
	}
	
	
	return apply_filters('language_school_theme_colors_primary_filter', $custom_css);
}

