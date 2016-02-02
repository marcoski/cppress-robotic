<?php
namespace CpPressRobotic\Filters;

use CpPress\Application\WP\Hook\Filter;
use CpPress\CpPress;

class NavMenuFilter extends Filter{
	
	private static $instance = null;
	
	public static function add(){
		if(is_null(self::$instance)){
			self::$instance = new static(CpPress::$App);
		}
		self::$instance->register('nav_menu_link_attributes', function($atts, $item, $args){
			return self::$instance->menuLinkAttributes($atts, $item, $args);
		},10, 3);
		
		self::$instance->register('cppress_widget_menu_items_wrap', function($wrap, $title){
			return self::$instance->wMenuItemsWrap($wrap, $title);
		}, 10, 2);
		
		self::$instance->register('cppress_widget_menu_link_before', function($before, $title){
			return self::$instance->wMenuBefore($before, $title);
		}, 10, 2);
		
		self::$instance->execAll();
	}
	
	public function menuLinkAttributes($atts, $item, $args) {
		if(in_array('menu-item-has-children', $item->classes)){
			$atts['class'] = 'dropdown-toggle';
			$atts['data-toggle'] = 'dropdown';
		}
    // Manipulate attributes
    return $atts;
	}
	
	public function wMenuItemsWrap($wrap, $title){
		if(strtolower($title) == 'sitemap'){
			return '<ul id="%1$s" class="footer-sitemap two_cols">%3$s</ul>';
		}
		return $wrap;
	}
	
	public function wMenuBefore($before, $title){
		if(strtolower($title) == 'sitemap'){
			return '<i class="icon-angle-right"></i>';
		}
		return $before;
	}
	
}