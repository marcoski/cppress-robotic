<?php
use CpPress\CpPress;
use CpPress\Application\WP\Admin\PostMeta;
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CPPressRobotic
 */
$app = CpPress::$App;

$container = $app->getContainer();
$filter = $container->query('FrontEndFilter');

get_header(); ?>
<div class="container">
	<header class="section-title">
	<h1><?php _e('Blog'); ?></h1>
	<?php
	$app::main('Breadcrumb', 'show', $app->getContainer(), array($post));
	?>
  </header>
  <div class="row">
  	<div class="col-md-8">
  	<section class="single">
  	<?php 
			while( have_posts() ): the_post();
				the_title('<h1>', '</h1>');
		?>
		<div class="single-info">
			<span class="date"><i class="icon-time"></i> <?php the_time(get_option('date_format')); ?></span> | 
			<span class="author"><i class="icon-user"></i> <?php the_author(); ?></span>
			<span class="num-comments pull-right"><i class="icon-comments"></i> <a href="#"><?php comments_number('0 Comments', '1 Comment', '% Comments')?></a></span>
		</div>
		<?php	
			if(has_post_thumbnail()){
				the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive img-feature'));
			}
			the_content(); 
			
		?>	
		<?php endwhile; ?>
  	</section>
  	<?php 
			if ( comments_open() || get_comments_number() ) {
				//comments_template();
			}
			?>
  	</div>
  	<div class="col-md-4">
  		<aside class="sidebar">
  			<?php dynamic_sidebar('blog-sidebar'); ?>
  		</aside>
  	</div>
  </div>
	
</div>
<?php
get_footer();
