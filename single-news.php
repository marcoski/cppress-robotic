<?php
use CpPress\CpPress;
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CPPressRobotic
 */

get_header();
?>

<div class="container">
	<header class="section-title">
		<h1>News</h1>
		<?php 
			$app = CpPress::$App;
			$app::main('Breadcrumb', 'show', $app->getContainer(), array($post));
		?>
  </header>
	<div class="row">
		<div class="col-md-12">
			<section class="single">
			<?php 
				if( have_posts() ){
					while( have_posts() ){ 
						the_post();
						the_title('<h1>', '</h1>');
			?>
						<div class="single-info">
                  <span class="date"><i class="icon-time"></i> <?php the_time( get_option('date_format')); ?></span> |
                  <span class="author"><i class="icon-user"></i> <?php the_author();?></span>
              </div>
				<?php
						if(has_post_thumbnail()){
							the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive img-feature'));
						}
						
						the_content();
					}
				}
			?>
			</section> <!-- single -->
		</div> <!-- col-md-8 -->
	</div>
</div>

<?php
get_footer();
?>