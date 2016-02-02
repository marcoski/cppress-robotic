<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CPPressRobotic
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<section class="comments">
	<h2 class="section-title"><?php _e('Comments'); ?></h2>
</section>
<section class="comment-form">
	<h2 class="section-title"><?php _e('Leave a Comment'); ?></h2>
	<?php comment_form(); ?>
</section>
