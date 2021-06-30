<?php
/**
 * Template for displaying profile header.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined('ABSPATH') || exit;

$profile = LP_Profile::instance();
$user = $profile->get_user();

if (!isset($user)) {
	return;
}
$bio = $user->get_description();
$user_id = get_current_user_id();
$user_bio_description = get_user_meta($user_id);

$image_id = $user_bio_description['teacher_certificate'][0];
$certificate_image = wp_get_attachment_image_src($image_id, 'thumbnail', $icon = false);

$student_awards_iamge_id = $user_bio_description['awards'][0];
$award_image = wp_get_attachment_image_src($student_awards_iamge_id, 'thumbnail', $icon = false);
$who_is_user = wp_get_current_user(); // getting & setting the current user
$roles = (array) $who_is_user->roles; // obtaining the role
foreach ($roles as $role) {
	?>
<style type="text/css">
    #cmsmasters_row_60d8af66839f67_40405525 .cmsmasters_row_outer_parent {
    padding-top: 0px;
}

#cmsmasters_row_60d8af66839f67_40405525 .cmsmasters_row_outer_parent {
    padding-bottom: 50px;
}


#cmsmasters_heading_60d8af6683a953_41933755 {
    text-align:left;
    margin-top:20px;
    margin-bottom:20px;
}

#cmsmasters_heading_60d8af6683a953_41933755 .cmsmasters_heading {
    text-align:left;
}

#cmsmasters_heading_60d8af6683a953_41933755 .cmsmasters_heading, #cmsmasters_heading_60d8af6683a953_41933755 .cmsmasters_heading a {
    font-weight:normal;
    font-style:normal;
}

#cmsmasters_heading_60d8af6683a953_41933755 .cmsmasters_heading_divider {
}


#cmsmasters_row_60d8af6683ad19_89751109 .cmsmasters_row_outer_parent {
    padding-top: 0px;
}

#cmsmasters_row_60d8af6683ad19_89751109 .cmsmasters_row_outer_parent {
    padding-bottom: 50px;
}


#cmsmasters_button_60d8af6683b4e9_90357716 {
    text-align:center;
}

#cmsmasters_button_60d8af6683b4e9_90357716 .cmsmasters_button:before {
    margin-right:.5em;
    margin-left:0;
    vertical-align:baseline;
}

#cmsmasters_button_60d8af6683b4e9_90357716 .cmsmasters_button {
    font-weight:normal;
    font-style:normal;
    border-style:solid;
}
#cmsmasters_button_60d8af6683b4e9_90357716 .cmsmasters_button:hover {
}

#cmsmasters_button_60d8af6683bc70_65120735 {
    text-align:center;
}

#cmsmasters_button_60d8af6683bc70_65120735 .cmsmasters_button:before {
    margin-right:.5em;
    margin-left:0;
    vertical-align:baseline;
}

#cmsmasters_button_60d8af6683bc70_65120735 .cmsmasters_button {
    font-weight:normal;
    font-style:normal;
    border-style:solid;
}
#cmsmasters_button_60d8af6683bc70_65120735 .cmsmasters_button:hover {
}

#cmsmasters_button_60d8af6683c340_61348357 {
    text-align:center;
}

#cmsmasters_button_60d8af6683c340_61348357 .cmsmasters_button:before {
    margin-right:.5em;
    margin-left:0;
    vertical-align:baseline;
}

#cmsmasters_button_60d8af6683c340_61348357 .cmsmasters_button {
    font-weight:normal;
    font-style:normal;
    border-style:solid;
}
#cmsmasters_button_60d8af6683c340_61348357 .cmsmasters_button:hover {
}

#cmsmasters_button_60d8af6683ca27_96714680 {
    text-align:center;
}

#cmsmasters_button_60d8af6683ca27_96714680 .cmsmasters_button:before {
    margin-right:.5em;
    margin-left:0;
    vertical-align:baseline;
}

#cmsmasters_button_60d8af6683ca27_96714680 .cmsmasters_button {
    font-weight:normal;
    font-style:normal;
    border-style:solid;
    background-color:#d43c18;
    color:#ffffff;
}
#cmsmasters_button_60d8af6683ca27_96714680 .cmsmasters_button:hover {
    border-color:#5173a6;
}

#cmsmasters_row_60d8af6683cdd2_87897295 .cmsmasters_row_outer_parent {
    padding-top: 0px;
}

#cmsmasters_row_60d8af6683cdd2_87897295 .cmsmasters_row_outer_parent {
    padding-bottom: 50px;
}

.cmsmasters_profile #post-3958.profile .pl_subtitle {color:#5173a6;}.cmsmasters_profile #post-3958.profile:before {background-color:#5173a6;}

#cmsmasters_fb_60d8af66847bf5_16382051 {
    padding-top:0px;
    padding-bottom:0px;
}

#cmsmasters_fb_60d8af66847bf5_16382051 .featured_block_inner {
    width: 100%;
    padding: ;
    text-align: left;
    margin:0 auto;
}

#cmsmasters_fb_60d8af66847bf5_16382051 .featured_block_text {
    text-align: left;
}



#cmsmasters_fb_60d8af66848177_50415572 {
    padding-top:0px;
    padding-bottom:0px;
}

#cmsmasters_fb_60d8af66848177_50415572 .featured_block_inner {
    width: 100%;
    padding: ;
    text-align: left;
    margin:0 auto;
}

#cmsmasters_fb_60d8af66848177_50415572 .featured_block_text {
    text-align: left;
}
</style>

<div class="cmsmasters_row cmsmasters_color_scheme_default cmsmasters_row_top_default cmsmasters_row_bot_default cmsmasters_row_boxed" id="cmsmasters_row_60d8af66839f67_40405525">
    <div class="cmsmasters_row_outer_parent">
        <div class="cmsmasters_row_outer">
            <div class="cmsmasters_row_inner">
                <div class="cmsmasters_row_margin">
                    <div class="cmsmasters_column one_first">
                        <div class="cmsmasters_heading_wrap cmsmasters_heading_align_left" id="cmsmasters_heading_60d8af6683a953_41933755">
                            <h1 class="cmsmasters_heading">
                                My account
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cmsmasters_row cmsmasters_color_scheme_default cmsmasters_row_top_default cmsmasters_row_bot_default cmsmasters_row_boxed" id="cmsmasters_row_60d8af6683ad19_89751109">
    <div class="cmsmasters_row_outer_parent">
        <div class="cmsmasters_row_outer">
            <div class="cmsmasters_row_inner">
                <div class="cmsmasters_row_margin">
                    <div class="cmsmasters_column one_fourth">
                        <div class="button_wrap" id="cmsmasters_button_60d8af6683b4e9_90357716">
                            <a class="cmsmasters_button" href="#"> <i class="fas fa-inbox"></i> 
                                <span>
                                    Inbox
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="cmsmasters_column one_fourth">
                        <div class="button_wrap" id="cmsmasters_button_60d8af6683bc70_65120735">
                            <?php if ($role == 'lp_teacher') {?>
                            <a class="cmsmasters_button" href="https://globeabc.com/teacher-booking-system/"> <i class="far fa-calendar-alt"></i> 
                                <span>
                                    Booking
                                </span>
                            </a>
                            <?php } else if ($role == 'student') {?>
                            <a class="cmsmasters_button" href="https://globeabc.com/student-booking-system/"> <i class="far fa-calendar-alt"></i> 
                                <span>
                                    Booking
                                </span>
                            </a>
                        <?php }?>
                        </div>
                    </div>
                    <div class="cmsmasters_column one_fourth">
                        <div class="button_wrap" id="cmsmasters_button_60d8af6683c340_61348357">
                            <a class="cmsmasters_button" href="https://globeabc.com/lp-profile/<?php echo $who_is_user->user_login; ?>/settings/basic-information"> <i class="fas fa-cog"></i> 
                                <span>
                                    Settings
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="cmsmasters_column one_fourth">
                        <div class="button_wrap" id="cmsmasters_button_60d8af6683ca27_96714680">
                            <a class="cmsmasters_button"
                            href="<?php echo wp_logout_url(); ?>"> <i class="fas fa-sign-out-alt"></i>
                                <span>
                                    Logout
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cmsmasters_row cmsmasters_color_scheme_default cmsmasters_row_top_default cmsmasters_row_bot_default cmsmasters_row_boxed" id="cmsmasters_row_60d8af6683cdd2_87897295">
    <div class="cmsmasters_row_outer_parent">
        <div class="cmsmasters_row_outer">
            <div class="cmsmasters_row_inner">
                <div class="cmsmasters_row_margin">
                    <div class="cmsmasters_column one_half">
                        <div class="cmsmasters_profile horizontal" id="60d8af6683d553_48276768">
                            <!-- Start Horizontal Profile  -->
                            <article class="one_first post-3958 profile type-profile status-publish has-post-thumbnail hentry pl-categs-teacher pl-categs-top-consultants" id="post-3958">
                                <div class="pl_img">
                                    <figure>
                                        <?php if (get_avatar($who_is_user->id)) {?>
                                        <a href="#">
                                            <?php echo get_avatar($who_is_user->id, 320) ?>
                                        </a>
                                    <?php } else {
		?> <img src="https://image.freepik.com/free-vector/illustration-user-avatar-icon_53876-5907.jpg">
                                    <?php }?>
                                    </figure>
                                </div>
                                <div class="pl_content">
                                    <h3 class="entry-title">
                                        <a>
                                            <?php echo $user->get_display_name(); ?>
                                        </a>
                                    </h3>
                                    <div class="entry-content">
                                        <?php if ($bio): ?>
                                        <?php echo wpautop($bio); ?>
                                        <?php endif;?>
                                    </div>
                                </div>
                                <div class="cl">
                                </div>
                            </article>
                            <!-- Finish Horizontal Profile  -->
                        </div>
                    </div>
                    <div class="cmsmasters_column one_half">
                        <div class="cmsmasters_featured_block" id="cmsmasters_fb_60d8af66847bf5_16382051">
                            <div class="featured_block_inner">
                                <div class="featured_block_text">
                                <?php if ($role == 'lp_teacher') {
		?>
                                    <p><strong>
                                        Classes Taught
                                    </strong></p>
                                    <p>
                                       <?php if ($user_bio_description['classes_taught'][0]) {
			echo $user_bio_description['classes_taught'][0];
		} else {
			echo "No classes yet."
			;
		}
		?>

                                    </p>
                                <?php } else if ($role == 'student') {
		?>
                                    <p><strong>
                                        Classes Atendeed
                                    </strong></p>
                                    <p>
                                        <?php if ($user_bio_description['session_attended'][0]) {
			echo $user_bio_description['session_attended'][0];} else {
			echo "No classes anteed yet";
		}
		?>
                                    </p>
                                <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="cmsmasters_featured_block" id="cmsmasters_fb_60d8af66848177_50415572">
                            <div class="featured_block_inner">
                                <div class="featured_block_text">
                                    <?php if ($role == 'lp_teacher') {?>
                                    <p><strong>
                                        Certificates
                                    </strong></p>
                                <?php } else if ($role == 'student') {?>
                                    <p><strong>
                                        Awards
                                    </strong></p>
                                <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="aligncenter">
                            <div class="cmsmasters_img cmsmasters_image_c">
                                <?php if ($role == 'lp_teacher') {
		if ($user_bio_description['teacher_certificate'][0]) {?><img src="<?php echo $certificate_image[0] ?>">
                                <?php }} else if ($role == 'student') {
		if ($user_bio_description['awards'][0]) {?>
                            <img src="<?php echo $award_image[0] ?>">
                        <?php }}?>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }?>
