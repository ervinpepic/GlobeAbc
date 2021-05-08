<?php

if (isset($_POST['hdq_addon_styler_nonce'])) {
	$hdq_nonce = $_POST['hdq_addon_styler_nonce'];
	if (wp_verify_nonce($hdq_nonce, 'hdq_addon_styler_nonce') != false) {
		// user must have reset to default
		update_option("hdq_styler", "");
	}
}

// show results and settings tabs
wp_enqueue_style(
	'hdq_admin_style',
	plugin_dir_url(__FILE__) . './css/hdq_a_styler_admin_style.css',
	array(),
	HDQ_A_STYLER_PLUGIN_VERSION
);


wp_enqueue_script(
	'hdq_admin_script',
	plugins_url('./js/hdq_a_styler_admin.js', __FILE__),
	array('jquery'),
	HDQ_A_STYLER_PLUGIN_VERSION,
	true
);

wp_enqueue_style(
	'hdq_admin_style_main',
	plugin_dir_url(__FILE__) . '../../hd-quiz/includes/css/hdq_admin.css?v=' . HDQ_PLUGIN_VERSION
);

wp_enqueue_style(
	'hdq_quiz_style_main',
	plugin_dir_url(__FILE__) . '../../hd-quiz/includes/css/hdq_style.css?v=' . HDQ_PLUGIN_VERSION
);

wp_enqueue_script(
	'hdq_admin_script_main',
	plugins_url('../../hd-quiz/includes/js/hdq_admin.js?v=' . HDQ_PLUGIN_VERSION, __FILE__),
	array('jquery', 'jquery-ui-draggable'),
	HDQ_PLUGIN_VERSION,
	true
);

wp_enqueue_media();

$fields = get_option("hdq_styler");
if ($fields == "" || $fields == null) {
	$fields = array();
} else {
	$fields = hdq_sanitize_fields($fields);
}
?>


<div id="main">
	<div id="hdq_quizzes_page" class="content">
		<h1>HD Quiz - Quiz Styler</h1>
		<p>
			You can use this tool to help customize and style your quizzes. Please note that the quiz preview is an estimate and may not
			fully represent the final look of the quiz. This is because there are so many things on a site that can potentially overwrite
			the styles of HD Quiz such as your theme and even other plugins.
		</p>
		<p>
			<strong>If you have any issues with this plugin please
				<a href="https://harmonicdesign.ca/hd-quiz-styler-support-request/" target="_blank">contact me for support</a></strong>.
			There is probably a compatability issue with your theme that can be fixed with some custom CSS :)
		</p>

		<?php
		hdq_styler_get_default(); // try and get active theme default styles		
		?>

		<div id="hdq_styler_wrapper" style="display:none">
			<div style="display: grid; grid-template-columns: 1fr max-content max-content; grid-gap: 1em; margin-bottom: 1em">
				<div>
					<p>
						<strong>You can view a preview at the bottom of this page</strong>
					</p>
				</div>

				<form method="post">
					<?php wp_nonce_field('hdq_addon_styler_nonce', 'hdq_addon_styler_nonce'); ?>
					<button title="reset to default" class="hdq_button2" id="hdq_styler_reset">
						<span class="dashicons dashicons-trash"></span>
						RESET TO DEFAULT
					</button>
				</form>
				<div role="button" title="save styles" class="hdq_button hdq" id="hdq_styler_save">
					<span class="dashicons dashicons-sticky"></span>
					SAVE
				</div>
			</div>

			<div id="content_tabs">
				<div id="tab_nav_wrapper">
					<div id="hdq_logo">
						<span class="hdq_logo_tooltip"><img src="<?php echo plugins_url('../../hd-quiz/includes/images/hd-logo.png', __FILE__); ?>" />
							<span class="hdq_logo_tooltip_content">
								<span><strong>HD Quiz</strong> is developed by Harmonic Design. Check out the addons page to see how you can
									extend HD Quiz even further.</span>
							</span>
						</span>
					</div>
					<div id="tab_nav">
						<?php hdq_a_styler_print_tabs(); ?>
					</div>
				</div>
				<div id="tab_content">
					<?php hdq_a_styler_print_tab_content($fields); ?>
				</div>
			</div>

			<div id="hdq_a_styler_preview">
				<p>
					This is a preview on how the quiz will look on your site. Please note that this <em>may</em> not be 100% accurate depending
					on how your theme is coded or what other plugins you may have installed.
				</p>
				<p>
					<small>images randomly generated from <a href="https://unsplash.com" target="_blank">Unsplash.com</a></small>
				</p>

				<div class="hdq_quiz_wrapper">
					<div class="hdq_quiz">
						<div class="hdq_question" data-type="select_all_apply_text" id="hdq_question_408">
							<div class="hdq_question_featured_image">
								<img width="500" height="314" src="https://source.unsplash.com/random/600x400" class="hdq_featured_image" alt="" loading="lazy" />
							</div>
							<h3 class="hdq_question_heading"><span class="hdq_question_number">#1.</span> Example Question Title</h3>
							<div class="hdq_answers">
								<div class="hdq_row">
									<label class="hdq_label_answer" data-type="radio" data-id="hdq_question_408" for="hdq_option_0_408">
										<div class="hdq-options-check">
											<input type="checkbox" data-id="408" class="hdq_option hdq_check_input" data-type="radio_multi" value="0" name="hdq_option_0_408" id="hdq_option_0_408" />
											<span class="hdq_toggle" for="hdq_option_0_408"></span>
										</div>
										Happy
									</label>
								</div>
								<div class="hdq_row">
									<label class="hdq_label_answer" data-type="radio" data-id="hdq_question_408" for="hdq_option_1_408">
										<div class="hdq-options-check">
											<input type="checkbox" data-id="408" class="hdq_option hdq_check_input" data-type="radio_multi" value="1" name="hdq_option_1_408" id="hdq_option_1_408" />
											<span class="hdq_toggle" for="hdq_option_1_408"></span>
										</div>
										Sad
									</label>
								</div>
								<div class="hdq_row">
									<label class="hdq_label_answer" data-type="radio" data-id="hdq_question_408" for="hdq_option_2_408">
										<div class="hdq-options-check">
											<input type="checkbox" data-id="408" class="hdq_option hdq_check_input" data-type="radio_multi" value="1" name="hdq_option_2_408" id="hdq_option_2_408" />
											<span class="hdq_toggle" for="hdq_option_2_408"></span>
										</div>
										Angry
									</label>
								</div>
							</div>
						</div>
						<div class="hdq_question" data-type="multiple_choice_text" id="hdq_question_423">
							<h3 class="hdq_question_heading"><span class="hdq_question_number">#2.</span> Yet Another Question Title</h3>
							<div class="hdq_answers">
								<div class="hdq_row">
									<label class="hdq_label_answer" data-type="radio" data-id="hdq_question_423" for="hdq_option_0_423">
										<div class="hdq-options-check">
											<input type="checkbox" data-id="423" class="hdq_option hdq_check_input" data-type="radio" value="1" name="hdq_option_0_423" id="hdq_option_0_423" />
											<span class="hdq_toggle" for="hdq_option_0_423"></span>
										</div>
										a
									</label>
								</div>
								<div class="hdq_row">
									<label class="hdq_label_answer" data-type="radio" data-id="hdq_question_423" for="hdq_option_1_423">
										<div class="hdq-options-check">
											<input type="checkbox" data-id="423" class="hdq_option hdq_check_input" data-type="radio" value="0" name="hdq_option_1_423" id="hdq_option_1_423" />
											<span class="hdq_toggle" for="hdq_option_1_423"></span>
										</div>
										b
									</label>
								</div>
								<div class="hdq_row">
									<label class="hdq_label_answer" data-type="radio" data-id="hdq_question_423" for="hdq_option_2_423">
										<div class="hdq-options-check">
											<input type="checkbox" data-id="423" class="hdq_option hdq_check_input" data-type="radio" value="0" name="hdq_option_2_423" id="hdq_option_2_423" />
											<span class="hdq_toggle" for="hdq_option_2_423"></span>
										</div>
										c
									</label>
								</div>
								<div class="hdq_row">
									<label class="hdq_label_answer" data-type="radio" data-id="hdq_question_423" for="hdq_option_2_424">
										<div class="hdq-options-check">
											<input type="checkbox" data-id="423" class="hdq_option hdq_check_input" data-type="radio" value="0" name="hdq_option_2_424" id="hdq_option_2_424" />
											<span class="hdq_toggle" for="hdq_option_2_424"></span>
										</div>
										d
									</label>
								</div>
							</div>
						</div>
						<div class="hdq_question" data-type="multiple_choice_image" id="hdq_question_426">
							<h3 class="hdq_question_heading"><span class="hdq_question_number">#3.</span> Can You Choose The Correct Image?</h3>
							<div class="hdq_answers">
								<div class="hdq_question_answers_images">
									<div class="hdq_row hdq_row_image">
										<label role="button" class="hdq_label_answer" data-type="image" data-id="hdq_question_426" for="hdq_option_0_426">
											<img src="https://source.unsplash.com/random/400x400" alt="a" title="a" />
											<div>
												<div class="hdq-options-check">
													<input type="checkbox" data-id="426" class="hdq_option hdq_check_input" data-type="image" value="1" name="hdq_option_0_426" id="hdq_option_0_426" />
													<span class="hdq_toggle" for="hdq_option_0_426"></span>
												</div>
												Cat
											</div>
										</label>
									</div>
									<div class="hdq_row hdq_row_image">
										<label role="button" class="hdq_label_answer" data-type="image" data-id="hdq_question_426" for="hdq_option_1_426">
											<img src="https://source.unsplash.com/random/400x400" alt="b" title="b" />
											<div>
												<div class="hdq-options-check">
													<input type="checkbox" data-id="426" class="hdq_option hdq_check_input" data-type="image" value="0" name="hdq_option_1_426" id="hdq_option_1_426" />
													<span class="hdq_toggle" for="hdq_option_1_426"></span>
												</div>
												Dog
											</div>
										</label>
									</div>
									<div class="hdq_row hdq_row_image">
										<label role="button" class="hdq_label_answer" data-type="image" data-id="hdq_question_426" for="hdq_option_2_426">
											<img src="https://source.unsplash.com/random/400x400" alt="c" title="c" />
											<div>
												<div class="hdq-options-check">
													<input type="checkbox" data-id="426" class="hdq_option hdq_check_input" data-type="image" value="0" name="hdq_option_2_426" id="hdq_option_2_426" />
													<span class="hdq_toggle" for="hdq_option_2_426"></span>
												</div>
												Horse
											</div>
										</label>
									</div>
									<div class="hdq_row hdq_row_image">
										<label role="button" class="hdq_label_answer" data-type="image" data-id="hdq_question_426" for="hdq_option_2_427">
											<img src="https://source.unsplash.com/random/400x400" alt="d" title="d" />
											<div>
												<div class="hdq-options-check">
													<input type="checkbox" data-id="427" class="hdq_option hdq_check_input" data-type="image" value="0" name="hdq_option_2_427" id="hdq_option_2_427" />
													<span class="hdq_toggle" for="hdq_option_2_427"></span>
												</div>
												Shark
											</div>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="hdq_finish">
							<div class="hdq_finsh_button hdq_button" data-id="33">finish</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php hdq_addon_styler_print(null); ?>
<script>
	try {
		hdq_addon_styler_init();
	} catch (e) {}
</script>