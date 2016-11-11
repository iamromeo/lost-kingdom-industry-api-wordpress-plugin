<?php
/**
* Plugin Name: Lost Kingdom Industry API
* Plugin URI: http://www.lostkingdom.net
* Description: This plugin fetches and diplays information from the Lost Kingdom API
* Version: 1.0
* Author: Dimitris Romeo Havlidis
* Author URI: http://www.iamromeo.com
* License: MIT
*/



function lkiapi_categories_list_shortcode_function( $array ) {

    return "This is the content of a the lkiapi_categories_list shortcode.";
}

function lkiapi_scripts() {
	// Load main stylesheet.
	wp_enqueue_style( 'lkiapi_style', get_stylesheet_uri() );
	// Load Angular
	wp_enqueue_script( 'lkiapi_angular', '//ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js', array( ), '', true );
	// Load custom app script
	wp_enqueue_script( 'lkiapi_js', get_template_directory_uri() . '/js/app.js', array(), '', true );
}


add_action( 
	'wp_enqueue_scripts', 
	'lkiapi_scripts' 
);

add_shortcode(
    'lkiapi_categories_list',
    'lkiapi_categories_list_shortcode_function'
);