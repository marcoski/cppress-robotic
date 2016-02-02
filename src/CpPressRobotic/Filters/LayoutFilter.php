<?php
namespace CpPressRobotic\Filters;

use CpPress\Application\WP\Hook\Filter;
use CpPress\CpPress;

class LayoutFilter extends Filter{
	
	private static $instance = null;
	
	public static function add(){
		if(is_null(self::$instance)){
			self::$instance = new static(CpPress::$App);
		}
		
		self::$instance->register('body_class', function($classes){
			if(($key = array_search('single', $classes)) !== false){
				unset($classes[$key]);
			}
			
			return $classes;
		});
		
		self::$instance->register('cppress_layout_grid_container_open', function($tag, $section){
			return self::$instance->gridContainer($tag, $section, true);
		}, 10, 2);
		
		self::$instance->register('cppress_layout_grid_container_close', function($tag, $section){
			return self::$instance->gridContainer($tag, $section, false);
		}, 10, 2);
		
		self::$instance->register('cppress_layout_section_tag', function($tag, $section){
			return self::$instance->sectionTag($tag, $section);
		}, 10, 2);
		
		self::$instance->register('cppress_layout_section_classes', function($classes, $post, $section){
			return self::$instance->sectionClasses($classes, $post, $section);
		}, 10, 3);
		
		self::$instance->register('cppress_layout_cell_classes', function($classes, $post, $cell, $section){
			return self::$instance->cellClasses($classes, $post, $cell, $section);
		}, 10, 4);
		
		self::$instance->register('cppress_layout_before_grid', function($before, $grid, $gAttrs, $section){
			return self::$instance->beforeGrid($before, $grid, $gAttrs, $section);
		}, 10, 4);
							
		self::$instance->register('cppress_layout_after_grid', function($after, $grid, $gAttrs, $section){
			return self::$instance->afterGrid($after, $grid, $gAttrs, $section);
		}, 10, 4);
		
		self::$instance->register('cppress_layout_section_attrs', function($attrs, $section){
			return self::$instance->sectionAttrs($attrs, $section);
		}, 10, 2);
		
		self::$instance->register('cppress_layout_widget_before', function($before, $cell, $section){
			return self::$instance->widgetBefore($before, $section);
		}, 9, 3);
		
		self::$instance->register('cppress_layout_widget_after', function($after, $cell, $section){
			return self::$instance->widgetAfter($after, $section);
		}, 9, 3);
		
		self::$instance->register('the_content_more_link', function($more, $link){
			return self::$instance->more($more, $link);
		}, 10, 2);
		
		self::$instance->execAll();
	}
	
	public function gridContainer($tag, $section, $isOpen){
		if($section == 'newssingle' ||
				$section == 'project' ||
				$section == 'logo'){
			return '';
		}
		
		return $tag;
	}
	
	public function sectionTag($tag, $section){
		if($section['slug'] == 'footer' || $section['slug'] == 'aside'){
			$tag = 'aside';
		}
		return $tag;
	}
	
	public function sectionClasses($classes, $post, $section){
		if($section['slug'] == 'carousel'){
			$classes[] = 'wrap-home-header';
		}
		if($section['slug'] == 'news'){
			$classes[] = 'wrap-home-features';
		}
		return $classes;
	}
	
	public function cellClasses($classes, $post, $cell, $section){
		if($section == 'carousel'){
			$classes = array('lcd');
		}
		return $classes;
	}
	
	public function beforeGrid($before, $grid, $gAttrs, $section){
		if($section == 'news'){
			$before = '<section class="home-features">';
		}
	
		return $before;
	}
	
	public function afterGrid($after, $grid, $gAttrs, $section){
		if($section == 'news'){
			$after = '</section>';
		}
		return $after;
	}
	
	public function sectionAttrs($attrs, $section){
		if($section['slug'] == 'footer' || $section['slug'] == 'aside'){
			$attrs['id'] = 'last-widgets';
		}
		return $attrs;
	}
	
	public function widgetBefore($before, $section){
		if($section == 'footer'){
			return '<section class="footer-widget">';
		}
		return $before;
	}
	
	public function widgetAfter($after, $section){
		if($section == 'footer'){
			return '</section>';
		}
		return $after;
	}
	
	public function more($more, $link){
		return '<a href="' . get_permalink() . '" > >> Read more</a>';
	}
	
}