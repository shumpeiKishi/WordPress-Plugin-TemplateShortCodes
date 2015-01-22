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

	function template_part($args) {
		ob_start();
		get_template_part("template/template", $args['name']);
		return ob_get_clean();
	}
}
$templatePartShortCodes = new TemplatePartShortCodes();
?>