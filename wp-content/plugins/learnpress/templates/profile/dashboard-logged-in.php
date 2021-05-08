<?php
/**
 * Template for displaying message in profile dashboard if user is logged in.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/profile/dashboard-logged-in.php.
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

if ( ! $profile->is_current_user() ) {
	return;
}

$user = $profile->get_user();
$current_username = wp_get_current_user();
$profile_username = $current_username->user_login;
$user_id = get_current_user_id();
$user_image_url = get_avatar_url($user_id);
$profile_pic_no_avatar = get_avatar($user_id, 96, '');

// Make sure you have the correct ID here

$user_bio_description = get_user_meta($user_id);

$image_id = $user_bio_description['teacher_certificate'][0];
$certificate_image = wp_get_attachment_image_src($image_id, 'thumbnail', $icon = false);

$who_is_user = wp_get_current_user(); // getting & setting the current user
$roles = (array) $who_is_user->roles; // obtaining the role
foreach ($roles as $role) {
    if ($role == 'lp_teacher') {
        ?>




<style type="text/css">
#cmsmasters_row_6057ce87666687_37926487 .cmsmasters_row_outer_parent {
    padding-top: 60px;
}

#cmsmasters_row_6057ce87666687_37926487 .cmsmasters_row_outer_parent {
    padding-bottom: 70px;
}


#cmsmasters_heading_6057ce87666fc5_99085228 {
    text-align: left;
    margin-top: 0px;
    margin-bottom: 20px;
}

#cmsmasters_heading_6057ce87666fc5_99085228 .cmsmasters_heading {
    text-align: left;
}

#cmsmasters_heading_6057ce87666fc5_99085228 .cmsmasters_heading,
#cmsmasters_heading_6057ce87666fc5_99085228 .cmsmasters_heading a {
    font-weight: normal;
    font-style: normal;
}

#cmsmasters_heading_6057ce87666fc5_99085228 .cmsmasters_heading_divider {}


#cmsmasters_row_6057ce87667295_08263362 .cmsmasters_row_outer_parent {
    padding-top: 0px;
}

#cmsmasters_row_6057ce87667295_08263362 .cmsmasters_row_outer_parent {
    padding-bottom: 50px;
}


#cmsmasters_button_6057ce87667930_50788723 {
    text-align: center;
}

#cmsmasters_button_6057ce87667930_50788723 .cmsmasters_button:before {
    margin-right: .5em;
    margin-left: 0;
    vertical-align: baseline;
}

#cmsmasters_button_6057ce87667930_50788723 .cmsmasters_button {
    font-weight: normal;
}

#cmsmasters_button_6057ce87667930_50788723 .cmsmasters_button:hover {}

#cmsmasters_button_6057ce87667e99_42756229 {
    text-align: center;
}

#cmsmasters_button_6057ce87667e99_42756229 .cmsmasters_button:before {
    margin-right: .5em;
    margin-left: 0;
    vertical-align: baseline;
}

#cmsmasters_button_6057ce87667e99_42756229 .cmsmasters_button {
    font-weight: normal;
}

#cmsmasters_button_6057ce87667e99_42756229 .cmsmasters_button:hover {}

#cmsmasters_button_6057ce876683d0_61043938 {
    text-align: center;
}

#cmsmasters_button_6057ce876683d0_61043938 .cmsmasters_button:before {
    margin-right: .5em;
    margin-left: 0;
    vertical-align: baseline;
}

#cmsmasters_button_6057ce876683d0_61043938 .cmsmasters_button {
    font-weight: normal;
}

#cmsmasters_button_6057ce876683d0_61043938 .cmsmasters_button:hover {}

#cmsmasters_button_6057ce876688a5_75344587 {
    text-align: center;
}

#cmsmasters_button_6057ce876688a5_75344587 .cmsmasters_button:before {
    margin-right: .5em;
    margin-left: 0;
    vertical-align: baseline;
}

#cmsmasters_button_6057ce876688a5_75344587 .cmsmasters_button {
    font-weight: normal;
}

#cmsmasters_button_6057ce876688a5_75344587 .cmsmasters_button:hover {}

#cmsmasters_row_6057ce87668ad4_06121557 .cmsmasters_row_outer_parent {
    padding-top: 0px;
}

#cmsmasters_row_6057ce87668ad4_06121557 .cmsmasters_row_outer_parent {
    padding-bottom: 50px;
}


#cmsmasters_divider_6057ce87669132_81386529 {
    border-bottom-width: 1px;
    border-bottom-style: solid;
    padding-top: 50px;
    margin-bottom: 50px;
}

#cmsmasters_row_6057ce87669310_27228399 .cmsmasters_row_outer_parent {
    padding-top: 60px;
}

#cmsmasters_row_6057ce87669310_27228399 .cmsmasters_row_outer_parent {
    padding-bottom: 50px;
}


#cmsmasters_heading_6057ce87669a35_04253573 {
    text-align: left;
    margin-top: 0px;
    margin-bottom: 20px;
}

#cmsmasters_heading_6057ce87669a35_04253573 .cmsmasters_heading {
    text-align: left;
}

#cmsmasters_heading_6057ce87669a35_04253573 .cmsmasters_heading,
#cmsmasters_heading_6057ce87669a35_04253573 .cmsmasters_heading a {
    font-weight: normal;
    font-style: normal;
}

#cmsmasters_heading_6057ce87669a35_04253573 .cmsmasters_heading_divider {}

.cmsmasters_profile #post-5922.profile .pl_subtitle {
    color: #f6c25d;
}

.cmsmasters_profile #post-5922.profile:before {
    background-color: #f6c25d;
}

#cmsmasters_heading_6057ce87679412_13187283 {
    text-align: left;
    margin-top: 0px;
    margin-bottom: 20px;
}

#cmsmasters_heading_6057ce87679412_13187283 .cmsmasters_heading {
    text-align: left;
}

#cmsmasters_heading_6057ce87679412_13187283 .cmsmasters_heading,
#cmsmasters_heading_6057ce87679412_13187283 .cmsmasters_heading a {
    font-weight: normal;
    font-style: normal;
}

#cmsmasters_heading_6057ce87679412_13187283 .cmsmasters_heading_divider {}



#cmsmasters_fb_6057ce87679690_40231905 {
    padding-top: 0px;
    padding-bottom: 0px;
}

#cmsmasters_fb_6057ce87679690_40231905 .featured_block_inner {
    width: 100%;
    padding: ;
    text-align: left;
    margin: 0 auto;
}

#cmsmasters_fb_6057ce87679690_40231905 .featured_block_text {
    text-align: left;
}


#cmsmasters_divider_6057ce87679a94_86805610 {
    border-bottom-width: 1px;
    border-bottom-style: solid;
    padding-top: 50px;
    margin-bottom: 50px;
}

#cmsmasters_heading_6057ce87679cb4_55177572 {
    text-align: left;
    margin-top: 0px;
    margin-bottom: 20px;
}

#cmsmasters_heading_6057ce87679cb4_55177572 .cmsmasters_heading {
    text-align: left;
}

#cmsmasters_heading_6057ce87679cb4_55177572 .cmsmasters_heading,
#cmsmasters_heading_6057ce87679cb4_55177572 .cmsmasters_heading a {
    font-weight: normal;
    font-style: normal;
}

#cmsmasters_heading_6057ce87679cb4_55177572 .cmsmasters_heading_divider {}



#cmsmasters_fb_6057ce87679eb9_49482610 {
    padding-top: 0px;
    padding-bottom: 0px;
}

#cmsmasters_fb_6057ce87679eb9_49482610 .featured_block_inner {
    width: 100%;
    padding: ;
    text-align: left;
    margin: 0 auto;
}

#cmsmasters_fb_6057ce87679eb9_49482610 .featured_block_text {
    text-align: left;
}

.razmak {
    margin-bottom: 150px;
    margin-top: 70px;
}

.cmsmasters_button-boja {
    background-color: #fe5969;
    color: #ffffff;
    font-weight: bold;
}

.cmsmasters_button-boja:hover {
    background-color: #ffffff;
    color: #fe5969;
    font-weight: bold;
}
</style>


</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="cmsmasters_row_outer">
    <div class="cmsmasters_row_inner">
        <div class="cmsmasters_row_margin">
            <div class="msmasters_column one_first">
                <h1 class="cmsmasters_heading razmak">Teacher Profile</h1>
            </div>
        </div>
    </div>
</div>

<div id="cmsmasters_row_6057ce87667295_08263362"
    class="cmsmasters_row cmsmasters_color_scheme_default cmsmasters_row_top_default cmsmasters_row_bot_default cmsmasters_row_boxed">
    <div class="cmsmasters_row_outer_parent">
        <div class="cmsmasters_row_outer">
            <div class="cmsmasters_row_inner">
                <div class="cmsmasters_row_margin">
                    <div class="cmsmasters_column one_fourth">


                        <div id="cmsmasters_button_6057ce87667930_50788723" class="button_wrap"><a
                                href="https://globeabc.com/lp-profile/<?php echo $profile_username ?>/settings/basic-information/"
                                class="cmsmasters_button"><span>Settings</span></a></div>
                    </div>
                    <div class="cmsmasters_column one_fourth">

                        <div id="cmsmasters_button_6057ce87667e99_42756229" class="button_wrap"><a href="#"
                                class="cmsmasters_button"><span>Inbox</span></a></div>
                    </div>
                    <div class="cmsmasters_column one_fourth">

                        <div id="cmsmasters_button_6057ce876683d0_61043938" class="button_wrap"><a href="#"
                                class="cmsmasters_button"><span>Blog</span></a></div>
                    </div>
                    <div class="cmsmasters_column one_fourth">

                        <div id="cmsmasters_button_6057ce876688a5_75344587" class="button_wrap"><a
                                href="https://globeabc.com/teacher-booking-system/"
                                class="cmsmasters_button"><span>Booking</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="cmsmasters_row_6057ce87667295_08263362"
    class="cmsmasters_row cmsmasters_color_scheme_default cmsmasters_row_top_default cmsmasters_row_bot_default cmsmasters_row_boxed">
    <div class="cmsmasters_row_outer_parent">
        <div class="cmsmasters_row_outer">
            <div class="cmsmasters_row_inner">
                <div class="cmsmasters_row_margin">
                    <div class="cmsmasters_column one_fourth">
                    </div>
                    <div class="cmsmasters_column one_fourth">
                    </div>
                    <div class="cmsmasters_column one_fourth">
                    </div>
                    <div class="cmsmasters_column one_fourth">
                        <hr>
                        <div id="cmsmasters_button_6057ce876688a5_75344587" class="button_wrap">
                            <a href="<?php echo $profile->logout_url() ?>"
                                class="cmsmasters_button cmsmasters_button-boja">
                                <span>Logout</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="cmsmasters_row_6057ce87668ad4_06121557"
    class="cmsmasters_row cmsmasters_color_scheme_default cmsmasters_row_top_default cmsmasters_row_bot_default cmsmasters_row_boxed">
    <div class="cmsmasters_row_outer_parent">
        <div class="cmsmasters_row_outer">
            <div class="cmsmasters_row_inner">
                <div class="cmsmasters_row_margin">
                    <div class="cmsmasters_column one_first">

                        <div id="cmsmasters_divider_6057ce87669132_81386529"
                            class="cmsmasters_divider cmsmasters_divider_width_long cmsmasters_divider_pos_center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="cmsmasters_row_6057ce87669310_27228399"
    class="cmsmasters_row cmsmasters_color_scheme_default cmsmasters_row_top_default cmsmasters_row_bot_default cmsmasters_row_boxed">
    <div class="cmsmasters_row_outer_parent">
        <div class="cmsmasters_row_outer">
            <div class="cmsmasters_row_inner">
                <div class="cmsmasters_row_margin">
                    <div class="cmsmasters_column one_half">

                        <div id="cmsmasters_heading_6057ce87669a35_04253573"
                            class="cmsmasters_heading_wrap cmsmasters_heading_align_left">
                            <h1 class="cmsmasters_heading">Teacher details</h1>
                        </div>
                        <div id="6057ce87669c31_57971682" class="cmsmasters_profile vertical">

                            <!-- Start Vertical Profile  -->

                            <article id="post-5922"
                                class="post-5922 profile type-profile status-publish has-post-thumbnail hentry pl-categs-software-engineer">
                                <div class="pl_img">
                                    <figure>
                                        <?php echo $profile_pic_no_avatar ?>
                                    </figure>
                                </div>
                                <div class="pl_content">
                                    <h2 class="entry-title">
                                        <?php echo $user->get_display_name(); ?>
                                    </h2>
                                    <div class="pl_social">
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <?php echo $user_bio_description['description'][0]; ?></div>
                                <div class="cl"></div>
                            </article>
                            <!-- Finish Vertical Profile  -->

                        </div>
                    </div>
                    <div class="cmsmasters_column one_half">

                        <div id="cmsmasters_heading_6057ce87679412_13187283"
                            class="cmsmasters_heading_wrap cmsmasters_heading_align_left">
                            <h1 class="cmsmasters_heading">Classes Taught</h1>
                        </div>
                        <div id="cmsmasters_fb_6057ce87679690_40231905" class="cmsmasters_featured_block">
                            <div class="featured_block_inner">
                                <div class="featured_block_text">
                                    <?php if ($user_bio_description['classes_taught'][0]) {?>
                                    <p><?php echo $user_bio_description['classes_taught'][0]; ?> classes taught</p>
                                    <?php } else echo "<p>0 classes taught</p>"?>
                                </div>
                            </div>
                        </div>

                        <div id="cmsmasters_divider_6057ce87679a94_86805610"
                            class="cmsmasters_divider cmsmasters_divider_width_long cmsmasters_divider_pos_center">
                        </div>

                        <div id="cmsmasters_heading_6057ce87679cb4_55177572"
                            class="cmsmasters_heading_wrap cmsmasters_heading_align_left">
                            <h1 class="cmsmasters_heading">Certificates</h1>
                        </div>
                        <div id="cmsmasters_fb_6057ce87679eb9_49482610" class="cmsmasters_featured_block">
                            <div class="featured_block_inner">
                                <div class="featured_block_text">
                                    <?php if ($certificate_image[0]) {?>
                                    <img src="<?php echo $certificate_image[0] ?>" alt="Certificate Image">
                                    <?php } else echo "<p>No certificate uploaded yet</p>"?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--  Finish Content  -->

</div>
</div>
</div>
<!--  Finish Middle  -->

</div>
<!--  Finish Main  -->
<?php
    } else if ($role == 'student') {
        ?>
        <style type="text/css">
#cmsmasters_row_6057ce87666687_37926487 .cmsmasters_row_outer_parent {
    padding-top: 60px;
}

#cmsmasters_row_6057ce87666687_37926487 .cmsmasters_row_outer_parent {
    padding-bottom: 70px;
}


#cmsmasters_heading_6057ce87666fc5_99085228 {
    text-align: left;
    margin-top: 0px;
    margin-bottom: 20px;
}

#cmsmasters_heading_6057ce87666fc5_99085228 .cmsmasters_heading {
    text-align: left;
}

#cmsmasters_heading_6057ce87666fc5_99085228 .cmsmasters_heading,
#cmsmasters_heading_6057ce87666fc5_99085228 .cmsmasters_heading a {
    font-weight: normal;
    font-style: normal;
}

#cmsmasters_heading_6057ce87666fc5_99085228 .cmsmasters_heading_divider {}


#cmsmasters_row_6057ce87667295_08263362 .cmsmasters_row_outer_parent {
    padding-top: 0px;
}

#cmsmasters_row_6057ce87667295_08263362 .cmsmasters_row_outer_parent {
    padding-bottom: 50px;
}


#cmsmasters_button_6057ce87667930_50788723 {
    text-align: center;
}

#cmsmasters_button_6057ce87667930_50788723 .cmsmasters_button:before {
    margin-right: .5em;
    margin-left: 0;
    vertical-align: baseline;
}

#cmsmasters_button_6057ce87667930_50788723 .cmsmasters_button {
    font-weight: normal;
}

#cmsmasters_button_6057ce87667930_50788723 .cmsmasters_button:hover {}

#cmsmasters_button_6057ce87667e99_42756229 {
    text-align: center;
}

#cmsmasters_button_6057ce87667e99_42756229 .cmsmasters_button:before {
    margin-right: .5em;
    margin-left: 0;
    vertical-align: baseline;
}

#cmsmasters_button_6057ce87667e99_42756229 .cmsmasters_button {
    font-weight: normal;
}

#cmsmasters_button_6057ce87667e99_42756229 .cmsmasters_button:hover {}

#cmsmasters_button_6057ce876683d0_61043938 {
    text-align: center;
}

#cmsmasters_button_6057ce876683d0_61043938 .cmsmasters_button:before {
    margin-right: .5em;
    margin-left: 0;
    vertical-align: baseline;
}

#cmsmasters_button_6057ce876683d0_61043938 .cmsmasters_button {
    font-weight: normal;
}

#cmsmasters_button_6057ce876683d0_61043938 .cmsmasters_button:hover {}

#cmsmasters_button_6057ce876688a5_75344587 {
    text-align: center;
}

#cmsmasters_button_6057ce876688a5_75344587 .cmsmasters_button:before {
    margin-right: .5em;
    margin-left: 0;
    vertical-align: baseline;
}

#cmsmasters_button_6057ce876688a5_75344587 .cmsmasters_button {
    font-weight: normal;
}

#cmsmasters_button_6057ce876688a5_75344587 .cmsmasters_button:hover {}

#cmsmasters_row_6057ce87668ad4_06121557 .cmsmasters_row_outer_parent {
    padding-top: 0px;
}

#cmsmasters_row_6057ce87668ad4_06121557 .cmsmasters_row_outer_parent {
    padding-bottom: 50px;
}


#cmsmasters_divider_6057ce87669132_81386529 {
    border-bottom-width: 1px;
    border-bottom-style: solid;
    padding-top: 50px;
    margin-bottom: 50px;
}

#cmsmasters_row_6057ce87669310_27228399 .cmsmasters_row_outer_parent {
    padding-top: 60px;
}

#cmsmasters_row_6057ce87669310_27228399 .cmsmasters_row_outer_parent {
    padding-bottom: 50px;
}


#cmsmasters_heading_6057ce87669a35_04253573 {
    text-align: left;
    margin-top: 0px;
    margin-bottom: 20px;
}

#cmsmasters_heading_6057ce87669a35_04253573 .cmsmasters_heading {
    text-align: left;
}

#cmsmasters_heading_6057ce87669a35_04253573 .cmsmasters_heading,
#cmsmasters_heading_6057ce87669a35_04253573 .cmsmasters_heading a {
    font-weight: normal;
    font-style: normal;
}

#cmsmasters_heading_6057ce87669a35_04253573 .cmsmasters_heading_divider {}

.cmsmasters_profile #post-5922.profile .pl_subtitle {
    color: #f6c25d;
}

.cmsmasters_profile #post-5922.profile:before {
    background-color: #f6c25d;
}

#cmsmasters_heading_6057ce87679412_13187283 {
    text-align: left;
    margin-top: 0px;
    margin-bottom: 20px;
}

#cmsmasters_heading_6057ce87679412_13187283 .cmsmasters_heading {
    text-align: left;
}

#cmsmasters_heading_6057ce87679412_13187283 .cmsmasters_heading,
#cmsmasters_heading_6057ce87679412_13187283 .cmsmasters_heading a {
    font-weight: normal;
    font-style: normal;
}

#cmsmasters_heading_6057ce87679412_13187283 .cmsmasters_heading_divider {}



#cmsmasters_fb_6057ce87679690_40231905 {
    padding-top: 0px;
    padding-bottom: 0px;
}

#cmsmasters_fb_6057ce87679690_40231905 .featured_block_inner {
    width: 100%;
    padding: ;
    text-align: left;
    margin: 0 auto;
}

#cmsmasters_fb_6057ce87679690_40231905 .featured_block_text {
    text-align: left;
}


#cmsmasters_divider_6057ce87679a94_86805610 {
    border-bottom-width: 1px;
    border-bottom-style: solid;
    padding-top: 50px;
    margin-bottom: 50px;
}

#cmsmasters_heading_6057ce87679cb4_55177572 {
    text-align: left;
    margin-top: 0px;
    margin-bottom: 20px;
}

#cmsmasters_heading_6057ce87679cb4_55177572 .cmsmasters_heading {
    text-align: left;
}

#cmsmasters_heading_6057ce87679cb4_55177572 .cmsmasters_heading,
#cmsmasters_heading_6057ce87679cb4_55177572 .cmsmasters_heading a {
    font-weight: normal;
    font-style: normal;
}

#cmsmasters_heading_6057ce87679cb4_55177572 .cmsmasters_heading_divider {}



#cmsmasters_fb_6057ce87679eb9_49482610 {
    padding-top: 0px;
    padding-bottom: 0px;
}

#cmsmasters_fb_6057ce87679eb9_49482610 .featured_block_inner {
    width: 100%;
    padding: ;
    text-align: left;
    margin: 0 auto;
}

#cmsmasters_fb_6057ce87679eb9_49482610 .featured_block_text {
    text-align: left;
}

.razmak {
    margin-bottom: 150px;
    margin-top: 70px;
}

.cmsmasters_button-boja {
    background-color: #fe5969;
    color: #ffffff;
    font-weight: bold;
}

.cmsmasters_button-boja:hover {
    background-color: #ffffff;
    color: #fe5969;
    font-weight: bold;
}
</style>


</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="cmsmasters_row_outer">
    <div class="cmsmasters_row_inner">
        <div class="cmsmasters_row_margin">
            <div class="msmasters_column one_first">
                <h1 class="cmsmasters_heading razmak">Student Profile</h1>
            </div>
        </div>
    </div>
</div>

<div id="cmsmasters_row_6057ce87667295_08263362"
    class="cmsmasters_row cmsmasters_color_scheme_default cmsmasters_row_top_default cmsmasters_row_bot_default cmsmasters_row_boxed">
    <div class="cmsmasters_row_outer_parent">
        <div class="cmsmasters_row_outer">
            <div class="cmsmasters_row_inner">
                <div class="cmsmasters_row_margin">
                    <div class="cmsmasters_column one_fourth">


                        <div id="cmsmasters_button_6057ce87667930_50788723" class="button_wrap"><a
                                href="https://globeabc.com/lp-profile/<?php echo $profile_username ?>/settings/basic-information/"
                                class="cmsmasters_button"><span>Settings</span></a></div>
                    </div>
                    <div class="cmsmasters_column one_fourth">

                        <div id="cmsmasters_button_6057ce87667e99_42756229" class="button_wrap"><a href="#"
                                class="cmsmasters_button"><span>Inbox</span></a></div>
                    </div>
                    <div class="cmsmasters_column one_fourth">

                        <div id="cmsmasters_button_6057ce876683d0_61043938" class="button_wrap"><a href="https://globeabc.com/lp-profile/<?php echo $profile_username ?>/courses/purchased/"
                                class="cmsmasters_button"><span>Courses</span></a></div>
                    </div>
                    <div class="cmsmasters_column one_fourth">

                        <div id="cmsmasters_button_6057ce876688a5_75344587" class="button_wrap"><a
                                href="https://globeabc.com/student-booking-system/"
                                class="cmsmasters_button"><span>Booking</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="cmsmasters_row_6057ce87667295_08263362"
    class="cmsmasters_row cmsmasters_color_scheme_default cmsmasters_row_top_default cmsmasters_row_bot_default cmsmasters_row_boxed">
    <div class="cmsmasters_row_outer_parent">
        <div class="cmsmasters_row_outer">
            <div class="cmsmasters_row_inner">
                <div class="cmsmasters_row_margin">
                    <div class="cmsmasters_column one_fourth">
                    </div>
                    <div class="cmsmasters_column one_fourth">
                    </div>
                    <div class="cmsmasters_column one_fourth">
                    </div>
                    <div class="cmsmasters_column one_fourth">
                        <hr>
                        <div id="cmsmasters_button_6057ce876688a5_75344587" class="button_wrap">
                            <a href="<?php echo $profile->logout_url() ?>"
                                class="cmsmasters_button cmsmasters_button-boja">
                                <span>Logout</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="cmsmasters_row_6057ce87668ad4_06121557"
    class="cmsmasters_row cmsmasters_color_scheme_default cmsmasters_row_top_default cmsmasters_row_bot_default cmsmasters_row_boxed">
    <div class="cmsmasters_row_outer_parent">
        <div class="cmsmasters_row_outer">
            <div class="cmsmasters_row_inner">
                <div class="cmsmasters_row_margin">
                    <div class="cmsmasters_column one_first">

                        <div id="cmsmasters_divider_6057ce87669132_81386529"
                            class="cmsmasters_divider cmsmasters_divider_width_long cmsmasters_divider_pos_center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="cmsmasters_row_6057ce87669310_27228399"
    class="cmsmasters_row cmsmasters_color_scheme_default cmsmasters_row_top_default cmsmasters_row_bot_default cmsmasters_row_boxed">
    <div class="cmsmasters_row_outer_parent">
        <div class="cmsmasters_row_outer">
            <div class="cmsmasters_row_inner">
                <div class="cmsmasters_row_margin">
                    <div class="cmsmasters_column one_half">

                        <div id="cmsmasters_heading_6057ce87669a35_04253573"
                            class="cmsmasters_heading_wrap cmsmasters_heading_align_left">
                            <h1 class="cmsmasters_heading">Student details</h1>
                        </div>
                        <div id="6057ce87669c31_57971682" class="cmsmasters_profile vertical">

                            <!-- Start Vertical Profile  -->

                            <article id="post-5922"
                                class="post-5922 profile type-profile status-publish has-post-thumbnail hentry pl-categs-software-engineer">
                                <div class="pl_img">
                                    <figure>
                                        <?php echo $profile_pic_no_avatar ?>
                                    </figure>
                                </div>
                                <div class="pl_content">
                                    <h2 class="entry-title">
                                        <?php echo $user->get_display_name(); ?>
                                    </h2>
                                    <div class="pl_social">
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <?php echo $user_bio_description['description'][0]; ?></div>
                                <div class="cl"></div>
                            </article>
                            <!-- Finish Vertical Profile  -->

                        </div>
                    </div>
                    <div class="cmsmasters_column one_half">

                        <div id="cmsmasters_heading_6057ce87679412_13187283"
                            class="cmsmasters_heading_wrap cmsmasters_heading_align_left">
                            <h1 class="cmsmasters_heading">Session attended</h1>
                        </div>
                        <div id="cmsmasters_fb_6057ce87679690_40231905" class="cmsmasters_featured_block">
                            <div class="featured_block_inner">
                                <div class="featured_block_text">
                                    <?php if ($user_bio_description['classes_taught'][0]) {?>
                                    <p><?php echo $user_bio_description['classes_taught'][0]; ?> session attended</p>
                                    <?php } else echo "<p>0 session attended</p>"?>
                                </div>
                            </div>
                        </div>

                        <div id="cmsmasters_divider_6057ce87679a94_86805610"
                            class="cmsmasters_divider cmsmasters_divider_width_long cmsmasters_divider_pos_center">
                        </div>

                        <div id="cmsmasters_heading_6057ce87679cb4_55177572"
                            class="cmsmasters_heading_wrap cmsmasters_heading_align_left">
                            <h1 class="cmsmasters_heading">Certificates</h1>
                        </div>
                        <div id="cmsmasters_fb_6057ce87679eb9_49482610" class="cmsmasters_featured_block">
                            <div class="featured_block_inner">
                                <div class="featured_block_text">
                                    <?php if ($certificate_image[0]) {?>
                                    <img src="<?php echo $certificate_image[0] ?>" alt="Certificate Image">
                                    <?php } else echo "<p>No certificate uploaded yet</p>"?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--  Finish Content  -->

</div>
</div>
</div>
<!--  Finish Middle  -->

</div>
        <?php
    }
} 

?>