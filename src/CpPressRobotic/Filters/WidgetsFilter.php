<?php
namespace CpPressRobotic\Filters;

use CpPress\Application\WP\Hook\Filter;
use CpPress\CpPress;

class WidgetsFilter extends Filter{
	
	private static $instance = null;
	
	public static function add(){
		if(is_null(self::$instance)){
			self::$instance = new static(CpPress::$App);
		}
		
		self::$instance->register('cppress_widget_slider_id', function($id, $slide){
			return self::$instance->sliderId($id, $slide);
		}, 10, 2);
		
		self::$instance->register('cppress_widget_news_classes', function($classes, $post, $instance){
			return self::$instance->newsClasses($classes, $post, $instance);
		}, 10, 3);
		
		self::$instance->register('cppress_widget_icon', function($icon, $post){
			return self::$instance->icon($icon, $post);
		}, 10, 2);
		
		self::$instance->register('cppress_widget_the_title', function($the_title, $title){
			return self::$instance->theTitle($the_title, $title);
		}, 9, 2);
		
		self::$instance->register('cppress_widget_portfolio_thumb_classes', function($classes){
			$classes[] = 'cs-style-3';
			return $classes;
		}, 10, 1);
		
		self::$instance->register('cppress_widget_portfolio_item_link', function($link, $title){
			return self::$instance->portfolioItemLink($link, $title);
		}, 10, 2);
		
		self::$instance->register('cppress_widget_socialbutton_icon_classes', function($classes, $title, $network){
			$classes[] = 'icon-' . $network['icon'];
			return $classes;
		}, 10, 3);
		
		self::$instance->register('cppress_widget_socialbutton_container_classes', function($classes, $title){
			if(strtolower($title) == 'social media'){
				$classes[] = 'footer-social';
			}
			return $classes;
		}, 10, 2);
		
		self::$instance->register('cppress_widget_post_title_before', function($before, $post, $title){
			return self::$instance->postTitleWrap($before, $post, $title, true);
		}, 10, 3);
		
		self::$instance->register('cppress_widget_post_title_after', function($after, $post, $title){
			return self::$instance->postTitleWrap($after, $post, $title, false);
		}, 10, 3);
		
		self::$instance->register('cppress_widget_post_content_before', function($before, $post, $title, $thumb){
			return self::$instance->postContentWrap($before, $post, $title, true, $thumb);
		}, 10, 4);
		
		self::$instance->register('cppress_widget_post_content_after', function($after, $post, $title, $thumb){
			return self::$instance->postContentWrap($after, $post, $title, false, $thumb);
		}, 10, 4);
		
		self::$instance->register('cppress_widget_loop_item_classes', function($classes, $title){
			if(strtolower($title) == 'news'){
				$classes[] = 'news-margin';
			}
			return $classes;
		}, 10, 2);
		
		self::$instance->execAll();
	}
	
	public function sliderId($id, $slide){
		return 'carousel-home';
	}
	
	public function newsClasses($classes, $post, $instance){
		if($instance['wtitle'] != 'News'){
			$classes[] = 'home-features-item';
		}
		return $classes;
	}
	
	public function icon($icon, $post){
		$icon = preg_replace("/[a-z]*-([a-z]*)/", "icon-$1", $icon);
		return $icon;
	}
	
	public function theTitle($the_title, $title){
		return '<div class="section-title">' . $the_title . '</div>';
	}
	
	public function portfolioItemLink($link, $title){
		return preg_replace("/(<a href=\"[\S]*\") class=\"(btn)\"(>[\S\s]*<\/a>)/", '$1 class="$2 btn-robotic-inverse" $3', $link);
	}
	
	public function postTitleWrap($content, $post, $title, $isBefore){
		if(strtolower($title) == 'news' ||
				strtolower($title) == 'blog'){
			return '';
		}
		return $content;
	}
	
	public function postContentWrap($content, $post, $title, $isBefore, $thumb){
		if((strtolower($title) == 'news' && $thumb !== '')){
			if($isBefore){
				return '<div class="col-lg-6">' . $thumb .'</div><div class="col-lg-6">';
			}else{
				return '</div>';
			}
		}
		
		if(strtolower($title) == 'blog'){
			if($isBefore){
				return '<div class="col-lg-6">' . $thumb .'</div><div class="col-lg-6">';
			}else{
				return '</div>';
			}
		}
		
		return $content;
	}
	
	
	
}