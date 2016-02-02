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

$subTitle = PostMeta::find($post->ID, 'cp-press-page-subtitle');
get_header(); ?>
<div class="container">
	<header class="section-title">
	<?php
	if($subTitle != ''){ 
		the_title('<h1>' . $subTitle . ' - ', '</h1>'); 
	}else{
		the_title('<h1>', '</h1>');
	}
	$app::main('Breadcrumb', 'show', $app->getContainer(), array($post));
	?>
  </header>
	<?php 
		while( have_posts() ){ the_post(); }
		the_content();
	?>
</div>
<?php
get_footer();
