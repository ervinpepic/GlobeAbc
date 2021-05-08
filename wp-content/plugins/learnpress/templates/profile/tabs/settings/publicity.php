<?php
/**
 * Template for displaying change password form in profile page.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/settings/tabs/change-password.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$profile = LP_Profile::instance();

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
             href="https://globeabc.com/lp-profile/<?php echo $profile_username ?>" class="cmsmasters_button"><span>Back
                to dashboard</span></a></div>
</div>
<?php
}
}
?>

<form method="post" name="profile-publicity" enctype="multipart/form-data" class="learn-press-form">

    <?php
	/**
	 * @since 3.0.0
	 */
	do_action( 'learn-press/before-profile-publicity-fields', $profile ); ?>

    <ul class="form-fields">

        <?php
		/**
		 * @since 3.0.0
		 */
		do_action( 'learn-press/begin-profile-publicity-fields', $profile );
		?>

        <li class="form-field">
            <label for="my-dashboard"><?php _e( 'My dashboard', 'learnpress' ); ?></label>
            <div class="form-field-input">
                <input type="checkbox" id="my-dashboard" name="publicity[my-dashboard]" value="yes"
                    <?php checked( $profile->get_publicity( 'my-dashboard' ), 'yes' ); ?> />
                <p class="description">
                    <?php _e( 'Public user profile content, if this option is turn off then other sections in profile also become invisible.', 'learnpress' ); ?>
                </p>
            </div>
        </li>

        <?php if ( LP()->settings()->get( 'profile_publicity.courses' ) === 'yes' ) { ?>
        <li class="form-field">
            <label for="my-courses"><?php _e( 'My courses', 'learnpress' ); ?></label>
            <div class="form-field-input">
                <input type="checkbox" name="publicity[courses]" value="yes" id="my-courses"
                    <?php checked( $profile->get_publicity( 'courses' ), 'yes' ); ?> />
                <p class="description"><?php _e( 'Public your profile courses', 'learnpress' ); ?></p>
            </div>
        </li>
        <?php } ?>

        <?php if ( LP()->settings()->get( 'profile_publicity.quizzes' ) === 'yes' ) { ?>
        <li class="form-field">
            <label for="my-quizzes"><?php _e( 'My quizzes', 'learnpress' ); ?></label>
            <div class="form-field-input">
                <input name="publicity[quizzes]" value="yes" type="checkbox" id="my-quizzes"
                    <?php checked( $profile->get_publicity( 'quizzes' ), 'yes' ); ?> />
                <p class="description"><?php _e( 'Public your profile quizzes', 'learnpress' ); ?></p>
            </div>
        </li>
        <?php } ?>

        <?php
		/**
		 * @since 3.0.0
		 */
		do_action( 'learn-press/end-profile-publicity-fields', $profile );

		?>

    </ul>
    <input type="hidden" name="save-profile-publicity"
        value="<?php echo wp_create_nonce( 'learn-press-save-profile-publicity' ); ?>" />
    <?php
	/**
	 * @since 3.0.0
	 */
	do_action( 'learn-press/after-profile-publicity-fields', $profile );
	?>

    <button type="submit" name="submit" id="submit"><?php _e( 'Save changes', 'learnpress' ); ?></button>

</form>