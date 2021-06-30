/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version		1.1.3
 * 
 * Visual Content Composer Schortcodes Extend
 * Created by CMSMasters
 * 
 */


/**
 * Blog Extend
 */

var blog_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_blog.fields) {
	if (id === 'layout_mode') {
		cmsmastersShortcodes.cmsmasters_blog.fields[id]['choises']['puzzle'] = composer_shortcodes_extend.blog_field_layout_mode_puzzle;
		
		
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else {
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_blog.fields = blog_new_fields;


// Posts Slider
var cmsmasters_posts_slider_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_posts_slider.fields) {
	if (id === 'amount') { // Delete Field
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'columns') { // Delete Field Attribute
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['depend'];  
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else {
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_posts_slider.fields = cmsmasters_posts_slider_new_fields;


/**
 * Quotes Extend
 */

var quotes_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_quotes.fields) {
	if (id === 'mode') {
		quotes_new_fields[id] = cmsmastersShortcodes.cmsmasters_quotes.fields[id];
		
		
		quotes_new_fields['type'] = { 
			type : 		'radio', 
			title : 	composer_shortcodes_extend.quotes_field_slider_type_title, 
			descr : 	composer_shortcodes_extend.quotes_field_slider_type_descr, 
			def : 		'box', 
			required : 	true, 
			width : 	'half', 
			choises : { 
						'box' : 	composer_shortcodes_extend.quotes_field_type_choice_box, 
						'center' : 	composer_shortcodes_extend.quotes_field_type_choice_center 
			}, 
			depend : 	'mode:slider' 
		};
	} else {
		quotes_new_fields[id] = cmsmastersShortcodes.cmsmasters_quotes.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_quotes.fields = quotes_new_fields;


/**
 * Timetable Extend
 */

if (cmsmasters_composer_timetable() === 'true') {
	var timetable_new_fields = {};


	for (var id in cmsmastersShortcodes.cmsmasters_timetable.fields) {
		if (id === 'box_bg_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.box_bg_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'box_hover_bg_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.box_hover_bg_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'box_txt_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.box_txt_color;
			
			timetable_new_fields['box_bd_color'] = { 
				type : 		'rgba', 
				title : 	composer_shortcodes_extend.timetable_field_box_bd_color_title, 
				descr : 	'', 
				def : 		composer_shortcodes_extend.box_bd_color, 
				required : 	false, 
				width : 	'half' 
			};
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'box_hover_txt_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.box_hover_txt_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'box_hours_txt_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.box_hours_txt_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'box_hours_hover_txt_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.box_hours_hover_txt_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'row1_bg_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.row1_bg_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'row1_txt_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.row1_txt_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'row2_bg_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.row2_bg_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'row2_txt_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.row2_txt_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'booking_text_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.booking_text_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'booking_bg_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.booking_bg_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'booking_hover_text_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.booking_hover_text_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'booking_hover_bg_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.booking_hover_bg_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'booked_text_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.booked_text_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'booked_bg_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.booked_bg_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'unavailable_text_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.unavailable_text_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'unavailable_bg_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.unavailable_bg_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'available_slots_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.available_slots_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else {
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		}
	}


	cmsmastersShortcodes.cmsmasters_timetable.fields = timetable_new_fields;
}


/**
 * Quote Item Extend
 */

var quote_new_fields = {};


for (var id in cmsmastersMultipleShortcodes.cmsmasters_quote.fields) {
	if (id === 'subtitle') {
		quote_new_fields[id] = cmsmastersMultipleShortcodes.cmsmasters_quote.fields[id];
		
		
		quote_new_fields['color'] = { 
			type : 		'rgba', 
			title : 	composer_shortcodes_extend.quotes_field_item_color_title, 
			descr : 	composer_shortcodes_extend.quotes_field_item_color_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'half'
		};
	} else {
		quote_new_fields[id] = cmsmastersMultipleShortcodes.cmsmasters_quote.fields[id];
	}
}


cmsmastersMultipleShortcodes.cmsmasters_quote.fields = quote_new_fields;



/**
 * LearnPress
 */

if (cmsmasters_composer_learnpress() === 'true') {
	var cmsmastersShortcodes_new_shortcode = {};


	for (var id in cmsmastersShortcodes) {
		if (id === 'cmsmasters_divider') {
			cmsmastersShortcodes_new_shortcode['cmsmasters_learnpress'] = { 
				title : 	composer_shortcodes_extend.learnpress_title, 
				icon : 		'admin-icon-sitemap', 
				pair : 		false, 
				content : 	false, 
				visual : 	false, 
				multiple : 	false, 
				def : 		'', 
				fields : { 
					// Order By
					orderby : { 
						type : 		'select', 
						title : 	cmsmasters_shortcodes.orderby_title, 
						descr : 	composer_shortcodes_extend.course_field_orderby_descr, 
						def : 		'date', 
						required : 	true, 
						width : 	'half', 
						choises : { 
									'date' : 		cmsmasters_shortcodes.choice_date, 
									'name' : 		cmsmasters_shortcodes.name, 
									'id' : 			cmsmasters_shortcodes.choice_id, 
									'menu_order' : 	cmsmasters_shortcodes.choice_menu
						} 
					}, 
					// Order
					order : { 
						type : 		'radio', 
						title : 	cmsmasters_shortcodes.order_title, 
						descr : 	cmsmasters_shortcodes.order_descr, 
						def : 		'DESC', 
						required : 	true, 
						width : 	'half', 
						choises : { 
									'ASC' : 	cmsmasters_shortcodes.choice_asc, 
									'DESC' : 	cmsmasters_shortcodes.choice_desc
						} 
					}, 
					// Categories
					categories : { 
						type : 		'select_multiple', 
						title : 	cmsmasters_shortcodes.categories, 
						descr : 	composer_shortcodes_extend.course_field_categories_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + composer_shortcodes_extend.course_field_categories_descr_note + "</span>", 
						def : 		'', 
						required : 	false, 
						width : 	'half', 
						choises : 	cmsmasters_composer_lpr_course_categories() 
					}, 
					// Courses Number
					count : { 
						type : 		'input', 
						title : 	composer_shortcodes_extend.course_field_postsnumber_title, 
						descr : 	composer_shortcodes_extend.course_field_postsnumber_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + composer_shortcodes_extend.course_field_postsnumber_descr_note + "</span>", 
						def : 		'12', 
						required : 	false, 
						width : 	'number', 
						min : 		'1' 
					}, 
					// Columns Count
					columns : { 
						type : 		'select', 
						title : 	cmsmasters_shortcodes.columns_count, 
						descr : 	composer_shortcodes_extend.course_field_col_count_descr, 
						def : 		'4', 
						required : 	false, 
						width : 	'half', 
						choises : { 
									'1' : 	'1', 
									'2' : 	'2', 
									'3' : 	'3', 
									'4' : 	'4', 
									'5' : 	'5' 
						} 
					}, 
					// Additional Classes
					classes : { 
						type : 		'input', 
						title : 	cmsmasters_shortcodes.classes_title, 
						descr : 	cmsmasters_shortcodes.classes_descr, 
						def : 		'', 
						required : 	false, 
						width : 	'half' 
					}, 
				} 
			};
			
			
			cmsmastersShortcodes_new_shortcode[id] = cmsmastersShortcodes[id];
		} else {
			cmsmastersShortcodes_new_shortcode[id] = cmsmastersShortcodes[id];
		}
	}
	
	cmsmastersShortcodes = cmsmastersShortcodes_new_shortcode;
}
