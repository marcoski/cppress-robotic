<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CPPressRobotic
 */

?>
	<?php get_template_part('template-parts/footer-widgets'); ?>
	 <footer id="footer">
	      <div class="container">
	          <p>
	            &copy; 2016 <a href="www.toyproject.net">Toyproject.net</a> All rights reserved.
	            Developed by <a href="http://www.commonhelp.it" target="_new">Commonhelp.it</a>
	          </p>
	      </div>
	  </footer>
	  <?php wp_footer(); ?>
		<script>
    	jQuery('#carousel-home').carousel();
  	</script>
</body>
</html>
