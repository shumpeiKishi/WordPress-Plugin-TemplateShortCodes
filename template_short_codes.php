<?php 
/*
Plugin Name: TemplateShortCodes
Plugin URI: http://shumpeikishi.com/
Description: This plugin allows users to output template files of your theme from WordPress backend. Create "template" folder in your theme and save template with name like "template-*whatever_you_name*". Thenm, add short code [template_part name="your_template_name"]"].
Author: Shumpei Kishi 
Version: 0.0
Author URI: http://shumpeikishi.com
License: CC0
*/
class TemplatePartShortCodes {
	function __construct () {
		add_shortcode( 'template_part', array($this, 'template_part'));
	}
	function page_title() {
		return get_the_title();
	}
	function featured_image_url() {
		global $post;
		if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
			$thumbnail_id = get_post_thumbnail_id($post->ID);
			$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'full');
			return $thumbnail_url[0];
		} else {
			return;
		}
	}

	function template_part($args) {
		ob_start();
		get_template_part("template/template", $args['name']);
		return ob_get_clean();
	}
}
$templatePartShortCodes = new TemplatePartShortCodes();
?>