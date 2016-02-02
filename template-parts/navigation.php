<?php 

use CpPressRobotic\Walker\RoboticNavMenuWalker;
use CpPressRobotic\Filters\NavMenuFilter;

$menu_args = array(
		'theme_location' => 'primary',
		'container'       => "",
		'container_class' => "",
		'container_id'    => "",
		'menu_class'      => null,
		'menu_id'         => null,
		'echo'            => true,
		'before'          => "",
		'after'           => "",
		'link_before'     => "",
		'link_after'      => "",
		'items_wrap'      => apply_filters("cppress_theme_menu_items_wrap",'<ul class="nav navbar-nav navbar-nav-robotic navbar-right">%3$s</ul>'),
		'walker'          => new RoboticNavMenuWalker()
);

NavMenuFilter::add();

?>
<nav class="navbar navbar-robotic navbar-static-top">
  <div class="container">
      <header class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <? get_template_part('template-parts/navheader'); ?>
      </header> <!-- navbar-header -->

      <div class="navbar-collapse collapse">
      	<?php wp_nav_menu($menu_args); ?>
      </div>
	</div>
</nav>