<?php
/**
 * @package 	WordPress
 * @subpackage 	Language School
 * @version 	1.2.0
 * 
 * Website Header Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = language_school_get_global_options();


?><!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8)]><!-->
<html <?php language_attributes(); ?> class="cmsmasters_html">
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="format-detection" content="telephone=no" />
<meta name="google-site-verification" content="RoEYzJrTLIaNK-46hZB4Esu3MFWdUYq0BkC_TWvw1nY" />
<meta name="msvalidate.01" content="FAB159ACE15115C0DB4B5A02DCB75754" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php esc_url(bloginfo('pingback_url')); ?>" />
<link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="194x194" href="/favicons/favicon-194x194.png">
<link rel="icon" type="image/png" sizes="192x192" href="/favicons/android-chrome-192x192.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
<link rel="manifest" href="/favicons/site.webmanifest">
<link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#0a86a9">
<link rel="shortcut icon" href="/favicons/favicon.ico">
<meta name="msapplication-TileColor" content="#2b5797">
<meta name="msapplication-config" content="/favicons/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	
<!--  Start Page  -->
<div id="page" class="<?php language_school_get_page_classes($cmsmasters_option); ?>hfeed site">
<?php do_action('cmsmasters_before_page', $cmsmasters_option); ?>

<!--  Start Main  -->
<div id="main">
	
<!--  Start Header  -->
<header id="header">
	<?php 
	language_school_header_top($cmsmasters_option);
	
	
	language_school_header_mid($cmsmasters_option);
	
	
	language_school_header_bot($cmsmasters_option);
	?>
</header>
<!--  Finish Header  -->

	
<!--  Start Middle  -->
<div id="middle"<?php echo (is_404()) ? ' class="error_page"' : ''; ?>>
<?php 
if (!is_404() && !is_home()) {
	language_school_page_heading();
} else {
	echo "<div class=\"headline\">
		<div class=\"headline_outer cmsmasters_headline_disabled\"></div>
	</div>";
}


list($cmsmasters_layout, $cmsmasters_page_scheme) = language_school_theme_page_layout_scheme();


echo '<div class="middle_inner' . (($cmsmasters_page_scheme != 'default') ? ' cmsmasters_color_scheme_' . $cmsmasters_page_scheme : '') . '">' . "\n" . 
	'<div class="content_wrap ' . $cmsmasters_layout . 
	((is_singular('project')) ? ' project_page' : '') . 
	((is_singular('profile')) ? ' profile_page' : '') . 
	'">' . "\n\n";
