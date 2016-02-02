<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package CPPressRobotic
 */
get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="error-404">
				<h1><?php _e('Error 404'); ?></h1>
				<h2><?php _e('Page not found'); ?></h2>
			</div>
		</div>
	</div> <!-- row -->
</div>
	

<?php
get_footer();
