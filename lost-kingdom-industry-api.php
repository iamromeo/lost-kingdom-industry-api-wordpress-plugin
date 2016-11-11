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

// Author's notes
// "lkapi" stands for "Lost Kingdom API"

function lkiapi_categories_list_shortcode_function( $array ) {
    return '
    <div ng-app="LostKingdomAPIApp" class="lkapi_woop">
    	This is the content of a the lkiapi_categories_list shortcode. 
    	<p>1 + 2 = {{1 + 2}}</p>
		<div ng-controller="TradegoodsCategoriesController as CategoriesList">
		      <ul class="unstyled">
		        <li ng-repeat="category in CategoriesList.categories">
		          {{ category.name }}
		        </li>
		      </ul>
		</div>
    </div>';
}

function lkiapi_scripts() {
	// Load main stylesheet.
	wp_register_style( 'lkiapi_style',  plugin_dir_url( __FILE__ ) . 'styles.css' );
	wp_enqueue_style( 'lkiapi_style' );
	// Load Angular
	wp_register_script( 'lkiapi_angular', '//ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js', array( ), '1.5.7', false );
	wp_enqueue_script('lkiapi_angular');
	// Load custom app script
	wp_register_script('lkiapi_js',  plugin_dir_url( __FILE__ ) . 'js/app.js', array('lkiapi_angular'), '0.1', true );
	wp_enqueue_script('lkiapi_js');
}


add_action( 
	'wp_enqueue_scripts', 
	'lkiapi_scripts' 
);

add_shortcode(
    'lkiapi_categories_list',
    'lkiapi_categories_list_shortcode_function'
);