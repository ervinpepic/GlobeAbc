<?php
/**
 * Template for displaying general statistic in user profile overview.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.1
 */


defined( 'ABSPATH' ) || exit;

if ( empty( $statistic ) ) {
	return;
}

$user = LP_Profile::instance()->get_user();
?>