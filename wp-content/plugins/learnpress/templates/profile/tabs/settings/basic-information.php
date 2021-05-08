<?php
/**
 * Template for displaying editing basic information form of user in profile page.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/settings/tabs/basic-information.php.
 *
 * @author  ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$profile = LP_Profile::instance();

if ( ! isset( $section ) ) {
	$section = 'basic-information';
}

$user = $profile->get_user();
$current_username = wp_get_current_user();
$profile_username = $current_username->user_login; // getting & setting the current user
$who_is_user = wp_get_current_user();
$roles = (array) $who_is_user->roles;
// obtaining the role
foreach ($roles as $role) {
	if ($role == 'lp_teacher') {
		?>

<div class="cmsmasters_column one_fourth">
</div>
<div class="cmsmasters_column one_fourth">
</div>
<div class="cmsmasters_column one_fourth">
</div>
<div class="cmsmasters_column one_fourth">
    <div id="cmsmasters_button_6057ce87667930_50788723" class="button_wrap"><a
            href="https://globeabc.com/lp-profile/<?php echo $profile_username ?>" class="cmsmasters_button"><span>Back</span></a></div>
</div>
<?php
}
}
?>

<form method="post" id="learn-press-profile-basic-information" name="profile-basic-information"
    enctype="multipart/form-data" class="learn-press-form">

    <?php
	/**
	 * @since 3.0.0
	 */
	do_action( 'learn-press/before-profile-basic-information-fields', $profile );

	?>
    <ul class="form-fields">

        <?php
		/**
		 * @since 3.0.0
		 */
		do_action( 'learn-press/begin-profile-basic-information-fields', $profile );

		// @deprecated
		do_action( 'learn_press_before_' . $section . '_edit_fields' );
		?>

        <li class="form-field">
            <label for="description"><?php _e( 'About Me', 'learnpress' ); ?></label>
            <div class="form-field-input">
                <textarea name="description" id="description" rows="5"
                    cols="30"><?php esc_html_e( $user->get_data( 'description' ) ); ?></textarea>
                <p class="description">
                    <?php _e( 'Please write something about yourself. E.g. hobbies, favorite food, sports, movies etc. We will use this info and try to match you with students who have the same interests as you. The goal is to ensure an interesting session for the student as well as for you.', 'learnpress' ); ?>
                </p>
            </div>
        </li>
        <li class="form-field">
            <label for="first_name"><?php _e( 'First Name', 'learnpress' ); ?></label>
            <div class="form-field-input">
                <input type="text" name="first_name" id="first_name"
                    value="<?php echo esc_attr( $user->get_data( 'first_name' ) ); ?>" class="regular-text">
            </div>
        </li>
        <li class="form-field">
            <label for="last_name"><?php _e( 'Last Name', 'learnpress' ); ?></label>
            <div class="form-field-input">
                <input type="text" name="last_name" id="last_name"
                    value="<?php echo esc_attr( $user->get_data( 'last_name' ) ); ?>" class="regular-text">
            </div>
        </li>
        <li class="form-field">
            <label for="nickname"><?php _e( 'Username', 'learnpress' ); ?></label>
            <div class="form-field-input">
                <input type="text" name="nickname" id="nickname"
                    value="<?php echo esc_attr( $user->get_data( 'nickname' ) ) ?>" class="regular-text" />
            </div>
        </li>
        <li class="form-field">
            <label for="display_name"><?php _e( 'Display name as', 'learnpress' ); ?></label>
            <div class="form-field-input">
                <?php learn_press_profile_list_display_names(); ?>
            </div>
        </li>

        <?php
		// @deprecated
		do_action( 'learn_press_after_' . $section . '_edit_fields' );

		/**
		 * @since 3.0.0
		 */
		do_action( 'learn-press/end-profile-basic-information-fields', $profile );

		?>
    </ul>

    <?php
	/**
	 * @since 3.0.0
	 */
	do_action( 'learn-press/after-profile-basic-information-fields', $profile );
	?>

    <p>
        <input type="hidden" name="save-profile-basic-information"
            value="<?php echo wp_create_nonce( 'learn-press-save-profile-basic-information' ); ?>" />
    </p>

    <button type="submit" name="submit"><?php _e( 'Save changes', 'learnpress' ); ?></button>

</form>