<?php
namespace CpPressRobotic\Filters;

use CpPress\Application\WP\Hook\Filter;
use CpPress\CpPress;

class ThemeFilter extends Filter{
	
	private static $instance = null;
	
	public static function add(){
		if(is_null(self::$instance)){
			self::$instance = new static(CpPress::$App);
		}
	}
	
}