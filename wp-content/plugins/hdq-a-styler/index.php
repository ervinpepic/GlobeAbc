<?php
/*
 * Plugin Name: HD Quiz - Quiz Styler
 * Description: PRO Addon for HD Quiz to save quiz results 
 * Plugin URI: https://harmonicdesign.ca/addons/quiz-styler/
 * Author: Harmonic Design
 * Author URI: https://harmonicdesign.ca
 * Version: 0.1
 * LICENSE:
    ### Single license:
    - You are licensed to use this plugin with one single website for yourself or for one client (a “single website”) only.
    - You can't sell this plugin even if you rebuild it.
    - Installing this plugin on your own website for testing purposes is allowed before transferring the license to your customer.
    - The use of this plugin is one time only and every customer needs a new license.
    - The maximum number of sites allowed is one (1). Further use requires the purchasing of a new license.
    - If you use this plugin for a customer, you should use their name and email when purchasing the license.

*/

if (!defined('ABSPATH')) {
    die('Invalid request.');
}

if (!defined('HDQ_A_STYLER_PLUGIN_VERSION')) {
    define('HDQ_A_STYLER_PLUGIN_VERSION', '0.1');
}

/* Automatically deactivate if HD Quiz is not active
------------------------------------------------------- */
function hdq_a_styler_check_hd_quiz_active()
{
    if (function_exists('is_plugin_active')) {
        if (!is_plugin_active("hd-quiz/index.php") || HDQ_PLUGIN_VERSION < "1.8.2") {
            deactivate_plugins(plugin_basename(__FILE__));
        }
    }
}
add_action('admin_init', 'hdq_a_styler_check_hd_quiz_active', 999);

/* Include the basic required files
------------------------------------------------------- */
require dirname(__FILE__) . '/includes/functions.php'; // general functions


/* Create HD Quiz Styler Settings page
------------------------------------------------------- */
function hdq_a_styler_create_settings_page()
{
    function hdq_a_styler_register_settings_page()
    {
        add_submenu_page('hdq_quizzes', 'Styler', 'Styler', 'publish_posts', 'hdq_styler', 'hdq_a_styler_register_quizzes_page_callback');
    }
    add_action('admin_menu', 'hdq_a_styler_register_settings_page', 11);
}
add_action('init', 'hdq_a_styler_create_settings_page');

function hdq_a_styler_register_quizzes_page_callback()
{
    require dirname(__FILE__) . '/includes/styler-options.php';
}
