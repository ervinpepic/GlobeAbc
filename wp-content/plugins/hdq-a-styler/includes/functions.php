<?php
// general HDQ Addon Quiz Styler Functions

/* Print quiz tabs
------------------------------------------------------- */
function hdq_a_styler_print_tabs()
{
	$tabs = hdq_a_styler_get_tabs();
	for ($i = 0; $i < count($tabs); $i++) {
		$classes = "";
		if ($i == 0) {
			$classes = "tab_nav_item_active";
		}
		echo '<div role = "button" class="tab_nav_item ' . $classes . '" data-id="' . $tabs[$i]["slug"] . '">' . $tabs[$i]["title"] . '</div>';
	}
}


/* Create quiz tab array
------------------------------------------------------- */
function hdq_a_styler_get_tabs()
{
	global $tabs;
	$tabs = array();
	$tab = array();
	$tab["slug"] = "question";
	$tab["title"] = "Questions";
	array_push($tabs, $tab);
	$tab["slug"] = "answers";
	$tab["title"] = "Answers";
	array_push($tabs, $tab);
	$tab = array();
	$tab["slug"] = "layout";
	$tab["title"] = "Layout";
	array_push($tabs, $tab);
	$tab = array();
	$tab["slug"] = "results";
	$tab["title"] = "Results";
	array_push($tabs, $tab);
	$tab = array();
	$tab["slug"] = "elements";
	$tab["title"] = "Buttons";
	array_push($tabs, $tab);
	$tab = array();
	$tab["slug"] = "custom";
	$tab["title"] = "Custom CSS";
	array_push($tabs, $tab);
	// sanitize
	for ($i = 0; $i < count($tabs); $i++) {
		$tabs[$i]["slug"] = sanitize_title($tabs[$i]["slug"]);
		$tabs[$i]["title"] = sanitize_text_field($tabs[$i]["title"]);
	}
	return $tabs;
}

function hdq_a_styler_get_meta()
{

	$default = '{
	"question": [
		{
			"type": "col-1-1",
			"children": [
				{
					"type": "action",
					"function": "hdq_a_styler_color",
					"name": "question_background_color",
					"label": "Question Background Color",
					"value": "",
					"default": "#FAFAFA"
				},
				{
					"type": "image",
					"name": "question_background_image",
					"label": "Question Background Image",
					"content": "<p>Use an image as a background for all questions</p>",
					"options": {
						"title": "Set Background Image",
						"button": "SET IMAGE",
						"multiple": false
					}
				}
			]
		},
		{
			"type": "col-1-1",
			"children": [
				{
					"type": "action",
					"function": "hdq_a_styler_color",
					"name": "title_heading_color",
					"label": "Question Title Color",
					"value": ""
				},
				{
					"type": "integer",
					"name": "title_heading_size",
					"label": "Question Title Font Size",
					"value": "",
					"suffix": "px"
				}
			]
		},
		{
			"type": "radio",
			"name": "title_number_visibility",
			"label": "Hide Question Number",
			"tooltip": "Enable this if you want to hide the #1, #2, #3 etc from the Question Title",
			"value": "",
			"options": [
				{ "label": "Show", "value": "inline", "default": "true" },
				{ "label": "Hide", "value": "none" }
			]
		},
		{
			"type": "col-1-1",
			"children": [
				{
					"type": "integer",
					"name": "featured_image_radius",
					"label": "Featured Image Rounded Corners",
					"value": "",
					"default": "0",
					"suffix": "%",
					"options": [
						{
							"name": "min",
							"value": 0
						},
						{
							"name": "max",
							"value": 50
						}
					]
				},
				{
					"type": "integer",
					"name": "question_radius",
					"label": "Question Rounded Corners",
					"tooltip": "border radius for the entire question",
					"value": "",
					"default": "0",
					"suffix": "px"
				}
			]
		},
		{
			"type": "col-1-1",
			"children": [				
				{
					"type": "integer",
					"name": "question_padding",
					"label": "Question Padding",
					"value": "",
					"suffix": "px"
				},
				{
					"type": "integer",
					"name": "question_margin",
					"label": "Question Spacing",
					"value": "",
					"tooltip": "the space between each question",
					"suffix": "px"
				}				
			]
		}
	],
	"layout": [
		{
			"type": "action",
			"function": "hdq_a_styler_layout",
			"name": "question_layout",
			"label": "Layout Style",
			"value": "",
			"default": "layout_default"
		},
		{
			"type": "hr",
			"name": ""
		},
		{
			"type": "integer",
			"name": "quiz_width",
			"value": "",
			"label": "Maximum quiz width",
			"suffix": "%",
			"tooltip": "By default HD Quiz sets a maximum width of 600px. But you can set this to 100% if you want it to fill the full width of your content"
		}
	],
	"answers": [
		{
			"type": "col-1-1",
			"children": [
				{
					"type": "action",
					"function": "hdq_a_styler_color",
					"name": "answer_color",
					"label": "Answer Text Color",
					"value": ""
				},
				{
					"type": "integer",
					"name": "answer_size",
					"label": "Answer Font Size",
					"value": "",
					"suffix": "px"
				}
			]
		},
		{
			"type": "content",
			"name": "toggle_style_content",
			"value": "<p>Customizing these toggle switches is not an easy thing to do for those who do not already have a firm understanding of CSS coding. Because of this, here are some prebuilt toggles for you to choose from.</p>"
		},
		{
			"type": "col-1-1",
			"children": [
				{
					"type": "action",
					"function": "hdq_a_styler_color",
					"name": "toggle_primary_color",
					"label": "Toggle Primary Color",
					"value": "",
					"default": "#FFFFFF"
				},
				{
					"type": "action",
					"function": "hdq_a_styler_color",
					"name": "toggle_secondary_color",
					"label": "Toggle Secondary Color",
					"value": "",
					"default": "#476777"
				}
			]
		},
		{
			"type": "radio",
			"name": "toggle_style",
			"label": "Toggle Style",
			"value": "",
			"tooltip": "NOTE: No guarantee that Emoji Madness will work with your theme",
			"options": [
				{ "label": "Toggle A", "value": "hdq_toggle_a", "default": "true" },
				{ "label": "Toggle B", "value": "hdq_toggle_b" },
				{ "label": "Toggle C", "value": "hdq_toggle_c" },
				{ "label": "Toggle D", "value": "hdq_toggle_d" },
				{ "label": "Toggle E", "value": "hdq_toggle_e" },
				{ "label": "Toggle F", "value": "hdq_toggle_f" },
				{ "label": "Emoji Madness", "value": "hdq_toggle_g" }
			]
		},
		{
			"type": "integer",
			"name": "answer_image_radius",
			"label": "Image as Answers Rounded Corners",
			"value": "",
			"default": "0",
			"suffix": "%",
			"tooltip": "the maximum of 50% will turn your images into circles",
			"options": [
				{
					"name": "min",
					"value": 0
				},
				{
					"name": "max",
					"value": 50
				}
			]
		}
	],
	"results": [
		{
			"type": "content",
			"name": "results_content",
			"value": "<p>If you do not modify these settings then the Results section will inherit the styles of the questions</p>"
		},
		{
			"type": "col-1-1",
			"children": [
				{
					"type": "action",
					"function": "hdq_a_styler_color",
					"name": "results_background_color",
					"label": "Results Background Color",
					"value": ""
				},
				{
					"type": "image",
					"name": "results_background_image",
					"label": "Results Background Image",
					"content": "<p>Use an image as a background for the Results</p>",
					"options": {
						"title": "Set Background Image",
						"button": "SET IMAGE",
						"multiple": false
					}
				}
			]
		},
		{
			"type": "col-1-1",
			"children": [
				{
					"type": "action",
					"function": "hdq_a_styler_color",
					"name": "results_heading_color",
					"label": "Results Title / Heading Color",
					"value": "",
					"default": ""
				},
				{
					"type": "integer",
					"name": "results_heading_size",
					"label": "Results Title / Heading Font Size",
					"value": "",
					"suffix": "px"
				},
				{
					"type": "action",
					"function": "hdq_a_styler_color",
					"name": "results_score_color",
					"label": "Results Score Color",
					"value": "",
					"default": ""
				},
				{
					"type": "integer",
					"name": "results_score_size",
					"label": "Results Score Font Size",
					"value": "",
					"suffix": "px"
				},
				{
					"type": "action",
					"function": "hdq_a_styler_color",
					"name": "results_color",
					"label": "Results Content Color",
					"value": "",
					"default": ""
				}
			]
		}
	],
	"elements": [
		{
			"type": "content",
			"name": "hdq_styler_button_content",
			"value": "<p>Next, Finish, and other buttons</p>"
		},
		{
			"type": "col-1-1-1",
			"children": [
				{
					"type": "action",
					"function": "hdq_a_styler_color",
					"name": "button_background_color",
					"label": "Button Background Color",
					"value": "",
					"default": "#2d2d2d"
				},
				{
					"type": "action",
					"function": "hdq_a_styler_color",
					"name": "button_color",
					"label": "Button Font Color",
					"value": "",
					"default": "#ffffff"
				},
				{
					"type": "integer",
					"name": "button_radius",
					"label": "Button Rounded Corners",
					"value": "",
					"suffix": "px"
				}
			]
		}
	],
	"custom": [
		{
			"type": "encode",
			"name": "custom_css",
			"label": "Custom CSS",
			"content": "<p>Add any custom CSS here and it will be added to quizzes</p>"
		}
	]
}
';
	$default = json_decode($default, true);
	$fields = hdq_create_all_fields($default); // clean and santize
	return $fields;
}

function hdq_styler_get_default()
{
	$v = "no styles";
	$l = get_option("hdq_styler_l");
	if ($l != null && $l != "") {
		$l = array_map("sanitize_text_field", $l);
		if ($l[0] != "" && $l[0] != null && $l[1] === "r22") {
			$v = "has styles";
		}
	}
	wp_localize_script('hdq_admin_script', 'hdq_default_styles', array($v));
}

/* Get and print tab content
------------------------------------------------------- */
function hdq_a_styler_print_tab_content($fields)
{
	$tabs = hdq_a_styler_get_tabs();
	$content = hdq_a_styler_get_meta();

	for ($i = 0; $i < count($tabs); $i++) {
		$tab = $tabs[$i]["slug"];

		$hasContent = false;
		if (isset($content[$tab])) {
			$hasContent = true;
			$tab = $content[$tab];
		}

		$classes = "";
		if ($i == 0) {
			$classes = "tab_content_active";
		}
		echo '<div id="tab_' . $tabs[$i]["slug"] . '" class="tab_content ' . $classes . '"><h2 class="tab_heading">' . $tabs[$i]["title"] . '</h2>';
		if ($hasContent) {
			hdq_print_tab_fields($tab, $tabs[$i]["slug"], $fields);
		}
		echo '</div>';
	}
}

// new custom field type: Colour picker
function hdq_a_styler_color($tab, $tab_slug, $fields)
{
	$value = hdq_getValue($tab, $fields);
	$placeholder = hdq_getPlaceholder($tab, $fields);
	$required = hdq_getRequired($tab, $fields);

	if ($value === "" && isset($tab["default"])) {
		$value = $tab["default"];
	}
?>

	<div class="hdq_input_item">
		<label class="hdq_input_label" for="<?php echo $tab["name"]; ?>">
			<?php
			if ($required) {
				hdq_print_tab_requiredIcon();
				$required = "required";
			}
			echo $tab["label"];
			if (isset($tab["tooltip"]) && $tab["tooltip"] != "") {
				hdq_print_fields_tooltip($tab["tooltip"]);
			}
			?>
		</label>
		<input type="color" class="hdq_input hdq_color_input" maxlength="7" minlength="7" data-id="<?php echo $tab["name"]; ?>" value="<?php echo $value; ?>" style="background-color: <?php echo $value; ?>;">
		<input data-tab="<?php echo $tab_slug; ?>" data-type="color" data-required="<?php echo $required; ?>" class="hderp_input" id="<?php echo $tab["name"]; ?>" value="<?php echo $value; ?>" type="hidden" style="display:none" />
		<?php
		if (isset($tab["content"])) {
			echo $tab["content"];
		}
		?>
	</div>
<?php
}


function hdq_a_styler_toggles($tab, $tab_slug, $fields)
{
?>

	<p>
		Please select a Toggle Style
	</p>


	<div id="hdq_a_style_toggles_wrap">

		<div class="hdq_a_style_toggle hdq_a_style_toggle_a">
			<label class="hdq_label_answer" data-type="radio" for="hdq_a_style_toggle_a">
				<div class="hdq-options-check">
					<input type="checkbox" class="hdq_option hdq_check_input" data-type="radio" value="1" name="hdq_a_style_toggle_a" id="hdq_a_style_toggle_a">
					<label for="hdq_a_style_toggle_a"></label>
				</div>
				Toggle A
			</label>
		</div>

		<div class="hdq_a_style_toggle hdq_a_style_toggle_b">
			<label class="hdq_label_answer" data-type="radio" for="hdq_a_style_toggle_b">
				<div class="hdq-options-check">
					<input type="checkbox" class="hdq_option hdq_check_input" data-type="radio" value="1" name="hdq_a_style_toggle_b" id="hdq_a_style_toggle_b">
					<label for="hdq_a_style_toggle_b"></label>
				</div>
				Toggle B
			</label>
		</div>

		<div class="hdq_a_style_toggle hdq_a_style_toggle_c">
			<label class="hdq_label_answer" data-type="radio" for="hdq_a_style_toggle_c">
				<div class="hdq-options-check">
					<input type="checkbox" class="hdq_option hdq_check_input" data-type="radio" value="1" name="hdq_a_style_toggle_c" id="hdq_a_style_toggle_c">
					<label for="hdq_a_style_toggle_c"></label>
				</div>
				Toggle C
			</label>
		</div>


		<div class="hdq_a_style_toggle hdq_a_style_toggle_d">
			<label class="hdq_label_answer" data-type="radio" for="hdq_a_style_toggle_d">
				<div class="hdq-options-check">
					<input type="checkbox" class="hdq_option hdq_check_input" data-type="radio" value="1" name="hdq_a_style_toggle_d" id="hdq_a_style_toggle_d">
					<label for="hdq_a_style_toggle_d"></label>
				</div>
				Toggle D
			</label>
		</div>

	</div>

<?php
}


function hdq_a_styler_layout($tab, $tab_slug, $fields)
{

	$value = "";
	if (isset($fields["hdq_a_styler_layout"]["value"])) {
		$value = $fields["hdq_a_styler_layout"]["value"];
	}
	if ($value == "" || $value == "default") {
		$value = "layout_default";
	}
?>
	<p>
		Please note that these layouts are for desktop only; mobile version will always use the default layout in order to optimize for smaller screen sizes.
	</p>
	<input type="hidden" style="display:none" id="quiz_layout" value="<?php echo $value; ?>" />
	<div id="hdq_a_styler_layout" class="hderp_input" data-type="hdq_a_styler_layout" data-value="<?php echo $value; ?>">
		<div class="hdq_a_styler_layout_item <?php if ($value === "layout_default") {
													echo "active_layout";
												}; ?>" id="hdq_a_styler_layout_1" data-id="quiz_layout" data-value="layout_default">
			<img src="<?php echo plugins_url('/images/layout_default.jpg', __FILE__); ?>" alt="default layout" />
			<p>
				default layout
			</p>
		</div>
		<div class="hdq_a_styler_layout_item <?php if ($value === "layout_left") {
													echo "active_layout";
												}; ?>" id="hdq_a_styler_layout_2" data-id="quiz_layout" data-value="layout_left">
			<img src="<?php echo plugins_url('/images/layout_left.jpg', __FILE__); ?>" alt="left layout" />
			<p>
				left layout
			</p>
		</div>
		<div class="hdq_a_styler_layout_item <?php if ($value === "layout_left_full") {
													echo "active_layout";
												}; ?>" id="hdq_a_styler_layout_3" data-id="quiz_layout" data-value="layout_left_full">
			<img src="<?php echo plugins_url('/images/layout_left_full.jpg', __FILE__); ?>" alt="full left layout" />
			<p>
				full left layout
			</p>
		</div>
		<div class="hdq_a_styler_layout_item <?php if ($value === "layout_right") {
													echo "active_layout";
												}; ?>" id="hdq_a_styler_layout_4" data-id="quiz_layout" data-value="layout_right">
			<img src="<?php echo plugins_url('/images/layout_right.jpg', __FILE__); ?>" alt="right layout" />
			<p>
				right layout
			</p>
		</div>
		<div class="hdq_a_styler_layout_item <?php if ($value === "layout_right_full") {
													echo "active_layout";
												}; ?>" id="hdq_a_styler_layout_5" data-id="quiz_layout" data-value="layout_right_full">
			<img src="<?php echo plugins_url('/images/layout_right_full.jpg', __FILE__); ?>" alt="full right layout" />
			<p>
				full right layout
			</p>
		</div>
	</div>
	<?php
}


function hdq_addon_styler_save()
{
	if (!current_user_can('edit_others_pages')) {
		echo '{"error": "User level cannot modify settings"}';
		die();
	}

	$hdq_nonce = sanitize_text_field($_POST['nonce']);
	if (!wp_verify_nonce($hdq_nonce, 'hdq_addon_styler_nonce')) {
		echo '{"error": "Nonce was not valid"}';
		die();
	}

	if (!isset($_POST["payload"])) {
		echo '{"error": "Data was not correctly sent"}';
		die();
	}

	$fields = $_POST["payload"];
	$fields = hdq_sanitize_fields($fields);

	update_option("hdq_styler", $fields);

	echo '{"success": true}';
	die();
}
add_action('wp_ajax_hdq_addon_styler_save', 'hdq_addon_styler_save');

function hdq_addon_styler_save_default_styles($k = "")
{
	if ($k === "") {
		if (!current_user_can('edit_others_pages')) {
			echo '{"error": "User level cannot modify settings"}';
			die();
		}
		if (!isset($_POST["payload"])) {
			echo '{"error": "Data was not correctly sent"}';
			die();
		}
		$fields = $_POST["payload"];
	} else {
		$fields = $k;
	}

	$fields = sanitize_text_field($fields);

	$data = wp_remote_post("https://harmonicdesign.ca/hdacl/", array(
		'method'      => 'POST',
		'timeout'     => 35,
		'blocking'    => true,
		'headers'     => array(),
		'body'        => array(
			'hda' => 'hdqa_styler',
			'key' => $fields
		),
	));

	function hdq_q_a_isLocalhost($whitelist = ['127.0.0.1', '::1'])
	{
		return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
	}

	$isLocal = hdq_q_a_isLocalhost();


	$valid = false;
	if (is_array($data)) {
		$data = $data["body"];
		$data = stripslashes(html_entity_decode($data));
		$data = json_decode($data);
		if (!empty($data)) {
			$md = str_replace(array('http://', "https://", "www."), '', get_site_url());
			if (strpos($md, $data->domain) !== false || $md === $data->domain || $isLocal == true) {
				if ($data->status === "active") {
					update_option("hdq_styler_l", array($fields, "r22"));
					$valid = true;
				} else {
					update_option("hdq_styler_l", array($fields, ""));
				}
			} else {
				update_option("hdq_styler_l", array($fields, ""));
			}
		}
	}
	if ($valid) {
		echo '{"success": true}';
		if (!wp_next_scheduled('hdv_recurring_invoice')) {
			wp_schedule_event(time() + 86400, "monthly", "hdq_addon_styler_check_for_updates");
		}
	} else {
		echo '{"success": false}';
	}

	die();
}
add_action('wp_ajax_hdq_addon_styler_save_default_styles', 'hdq_addon_styler_save_default_styles');

function hdq_a_styler_check_for_updates()
{
	$updates = get_option("hdq_styler_l");
	if ($updates == "" || $updates == null) {
		update_option("hdq_styler_l", array("", "")); // no updates available
	} else {
		$updates = array_map("sanitize_text_field", $updates);
		// grab default styles
		hdq_addon_styler_save_default_styles($updates[0]);
	}
	print_r($updates);
}
add_action('hdq_addon_styler_check_for_updates', 'hdq_a_styler_check_for_updates', 10, 0);

function hdq_addon_styler_hexToRgbA($hex)
{
	list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
	if ($r + 50 > 255) {
		$r = 255;
	} else {
		$r = $r + 50;
	}
	if ($g + 50 > 255) {
		$g = 255;
	} else {
		$g = $g + 50;
	}
	if ($b + 50 > 255) {
		$b = 255;
	} else {
		$b = $b + 50;
	}
	return "rgb(" . $r . ", " . $g . ", " . $b . ")";
}

function hdq_addon_styler_print($quizId)
{

	// enqueue style and script
	wp_enqueue_style(
		'hdq_styler',
		plugin_dir_url(__FILE__) . './css/hdq_layout.css',
		array(),
		HDQ_A_STYLER_PLUGIN_VERSION
	);


	$fields = get_option("hdq_styler");
	if ($fields == "" || $fields == null) {
		$fields = array();
	} else {
		$fields = hdq_sanitize_fields($fields);
	}

	// only do if we have any fields
	if (count($fields) != 0) {

		// store CSS var fields in array
		$cssVarsAr = array(); // field, prefix
		array_push($cssVarsAr, array("answer_color", ""));
		array_push($cssVarsAr, array("answer_image_radius", "%"));
		array_push($cssVarsAr, array("answer_size", "px"));
		array_push($cssVarsAr, array("featured_image_radius", "%"));
		array_push($cssVarsAr, array("question_background_color", ""));
		array_push($cssVarsAr, array("question_background_image", ""));
		array_push($cssVarsAr, array("title_heading_color", ""));
		array_push($cssVarsAr, array("title_heading_size", "px"));
		array_push($cssVarsAr, array("title_number_visibility", ""));
		array_push($cssVarsAr, array("toggle_primary_color", ""));
		array_push($cssVarsAr, array("toggle_secondary_color", ""));
		array_push($cssVarsAr, array("question_radius", "px"));
		array_push($cssVarsAr, array("button_background_color", ""));
		array_push($cssVarsAr, array("button_color", ""));
		array_push($cssVarsAr, array("button_radius", "px"));
		array_push($cssVarsAr, array("question_padding", "px"));
		array_push($cssVarsAr, array("question_margin", "px"));
		array_push($cssVarsAr, array("results_heading_size", "px"));
		array_push($cssVarsAr, array("results_score_size", "px"));
		array_push($cssVarsAr, array("results_heading_color", ""));
		array_push($cssVarsAr, array("results_score_color", ""));
		array_push($cssVarsAr, array("results_background_color", ""));
		array_push($cssVarsAr, array("results_background_image", ""));
		array_push($cssVarsAr, array("results_color", ""));
		array_push($cssVarsAr, array("quiz_width", "%"));

		$cssVars = array(); // field, prefix
		for ($i = 0; $i < count($cssVarsAr); $i++) {
			if (isset($fields[$cssVarsAr[$i][0]]["value"])) {
				array_push($cssVars, array($fields[$cssVarsAr[$i][0]], $cssVarsAr[$i][1]));
			}
		}

		if (isset($fields["toggle_secondary_color"]["value"]) && $fields["toggle_secondary_color"]["value"] != "" && $fields["toggle_secondary_color"]["value"] != null) {
			$ar = array();
			$ar["name"] = "toggle_secondary_color2";
			$ar["type"] = "color";
			$ar["value"] = hdq_addon_styler_hexToRgbA($fields["toggle_secondary_color"]["value"]);
			array_push($cssVars, array($ar, ""));
		}

		$customCSS = "";
		if (isset($fields["custom_css"]["value"]) && $fields["custom_css"]["value"] != "" && $fields["custom_css"]["value"] != null) {
			$customCSS = $fields["custom_css"]["value"];
		}

		// for fields that we want to inherit fallback from theme
		$cssVarsAr2 = array(); // field, postfix, target, stylr
		array_push($cssVarsAr2, array("title_heading_size", "px", "h3.hdq_question_heading", "font-size"));
		array_push($cssVarsAr2, array("results_heading_color", "", "h2.hdq_results_title", "color"));
		array_push($cssVarsAr2, array("results_heading_size", "px", "h2.hdq_results_title", "font-size"));
		array_push($cssVarsAr2, array("results_score_color", "", ".hdq_result", "color"));
		array_push($cssVarsAr2, array("results_score_size", "px", ".hdq_result", "font-size"));
		array_push($cssVarsAr2, array("results_color", "", ".hdq_results_wrapper", "color"));

		$cssVars2 = array(); // field, prefix
		for ($i = 0; $i < count($cssVarsAr2); $i++) {
			if (isset($fields[$cssVarsAr2[$i][0]]["value"])) {
				array_push($cssVars2, array($fields[$cssVarsAr2[$i][0]], $cssVarsAr2[$i][1], $cssVarsAr2[$i][2], $cssVarsAr2[$i][3]));
			}
		}

		// quiz classes
		$hdq_classes = array();
		if (isset($fields["hdq_a_styler_layout"]["value"]) && $fields["hdq_a_styler_layout"]["value"] != "") {
			array_push($hdq_classes, $fields["hdq_a_styler_layout"]["value"]);
		}
		if (isset($fields["toggle_style"]["value"]) && $fields["toggle_style"]["value"] != "") {
			array_push($hdq_classes, $fields["toggle_style"]["value"]);
		}
		$hdq_classes = join(",", $hdq_classes);
	?>


		<style id="hdq_styler_css">
			.hdq_quiz_wrapper {
				<?php
				// loop though them all and if they have value, print
				for ($i = 0; $i < count($cssVars); $i++) {
					$v = $cssVars[$i][0]["value"];
					if ($v != "" && $v != null) {
						if ($cssVars[$i][0]["type"] === "image") {
							$v = wp_get_attachment_url($v);
							$v = 'url(' . $v . ')';
						}
						if ($v != "" && $v != null) {
							// convert to cssVar name
							$vn = explode("_", $cssVars[$i][0]["name"]);
							$vn = join("-", $vn);
							echo '--hdq-' . $vn . ': ' . $v . $cssVars[$i][1] . ';';
						}
					}
				}
				?>
			}

			<?php
			// loop though them all and if they have value, print
			for ($i = 0; $i < count($cssVars2); $i++) {
				if ($cssVars2[$i][0]["value"] != "" && $cssVars2[$i][0]["value"] != null) {
					if ($cssVars2[$i][0]["type"] === "image") {
						$cssVars2[$i][0]["value"] = wp_get_attachment_url($cssVars2[$i][0]["value"]);
						$cssVars2[$i][0]["value"] = 'url(' . $cssVars2[$i][0]["value"] . ')';
					}
					$vn = explode("_", $cssVars2[$i][0]["name"]);
					$vn = join("-", $vn);
					$data = $cssVars2[$i][2] . '{' . $cssVars2[$i][3] . ': var(--hdq-' . $vn . ') !important; }';
					echo $data;
				}
			}
			/*
			for($i = 0; $i < count($cssVars2); $i++){
				if($cssVars2[$i][0]["value"] != "" && $cssVars2[$i][0]["value"] != null){
					if($cssVars2[$i][0]["type"] === "image"){
						$cssVars2[$i][0]["value"] = wp_get_attachment_url($cssVars2[$i][0]["value"]);	
						$cssVars2[$i][0]["value"] = 'url('.$cssVars2[$i][0]["value"].')';
					}	
					if($cssVars2[$i][0]["value"] != "" && $cssVars2[$i][0]["value"] != null){						
						// field, postfix, className, style
						$data = $cssVars2[$i][2]. '{' . $cssVars2[$i][3]. ': var('.$cssVars2[$i][0]["value"].') !important; }';
						echo $data;
					}
				}
			}
			*/
			?><?php echo stripslashes(hdq_decode(hdq_decode($customCSS))); ?>
		</style>
		<script>
			function hdq_addon_styler_init() {
				// set quiz classes
				let hdq_addon_styler_classes = "<?php echo $hdq_classes; ?>";
				hdq_addon_styler_classes = hdq_addon_styler_classes.split(",");
				const hdq_addon_styler_quizzes = document.getElementsByClassName("hdq_quiz");
				for (let i = 0; i < hdq_addon_styler_quizzes.length; i++) {
					for (let x = 0; x < hdq_addon_styler_classes.length; x++) {
						if (hdq_addon_styler_classes[x] != "") {
							hdq_addon_styler_quizzes[i].classList.add(hdq_addon_styler_classes[x]);
						}
					}
				}
			}
		</script>

<?php
	}
}
add_action("hdq_before", "hdq_addon_styler_print");

function hdq_addon_styler_init($quizOptions)
{
	array_push($quizOptions->hdq_init, "hdq_addon_styler_init");
	return $quizOptions;
}
add_action("hdq_init", "hdq_addon_styler_init");
