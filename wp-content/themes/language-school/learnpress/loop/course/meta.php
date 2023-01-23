<?php
/**
 * Template for displaying meta data in course loop.
 *
 * @author ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

global $post;
?>

<div class="course-excerpt">
	<?php 
		if (has_excerpt()) {
			echo wp_trim_words( $post->post_excerpt, 25 );
		} else {
			echo wp_trim_words( $post->post_content, 25 );
		}
	?>
</div>
