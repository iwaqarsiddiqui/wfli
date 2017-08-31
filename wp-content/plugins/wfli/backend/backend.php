<?php
/*
Plugin Name: Luminaire Selector
Plugin URI:  http://www.oogloo.com
Description: Luminaire Selector plugin for WFLI.
Version:     1.0
Author:      Oogloo
Author URI:  http://www.oogloo.com
Text Domain: WFLI
*/

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

//This function creates a custom post type of the name oo_products
function oo_products_post_type() {
		$singular = 'Product';
		$plural = 'Products';
		// Labels
		$labels = array(
			'name' 				=> $plural,
			'singular_name' 	=> $singular,
			'menu_name' 		=> $plural,
			'add_new' 			=> 'Add New',
			'add_new_item' 		=> 'Add New ' . $singular,	
			'edit'				=> 'Edit',
			'edit_item' 		=> 'Edit '. $singular,
			'new_item' 			=> 'New ' . $singular,
			'view_item' 		=> 'View ' . $singular,
			'search_items' 		=> 'Search ' . $plural,
			'not_found' 		=>  'No ' . $plural . ' found',
			'not_found_in_trash'=> 'No ' . $plural . ' in Trash',
			'parent_item_colon' => ''
		);
		
		$args = array(
			'labels'			=> $labels,
			'public'			=> true,
			'rewrite'			=> true,
			'has_archive'		=> false,
			'menu_position'		=> 110,	
			'menu_icon'			=> 'dashicons-editor-kitchensink',
			'capability_type'	=> 'page',
			'supports'			=> array( 'title', 'editor', 'content', 'thumbnail')
		);
		
		// Register post type
		register_post_type('oo_products' , $args);
}

add_action( 'init', 'oo_products_post_type');

/*Adding Texonomies to the Custom Post Type*/
include 'texonomies.php';

/*Adding Add Product Form*/
include 'views/product.php';

/*Adding Databse Handling File*/
include 'models/product_db.php';












//This function creates a custom post type of the name oo_manufacturers
function oo_manufacturers_post_type() {
		$singular = 'Manufacturer';
		$plural = 'Manufacturers';
		// Labels
		$labels = array(
			'name' 				=> $plural,
			'singular_name' 	=> $singular,
			'menu_name' 		=> $plural,
			'add_new' 			=> 'Add New',
			'add_new_item' 		=> 'Add New ' . $singular,	
			'edit'				=> 'Edit',
			'edit_item' 		=> 'Edit '. $singular,
			'new_item' 			=> 'New ' . $singular,
			'view_item' 		=> 'View ' . $singular,
			'search_items' 		=> 'Search ' . $plural,
			'not_found' 		=>  'No ' . $plural . ' found',
			'not_found_in_trash'=> 'No ' . $plural . ' in Trash',
			'parent'			=> 'Parent Cartoon Series',
			'parent_item_colon' => ''
		);
		
		$args = array(
			'labels'			=> $labels,
			'public'			=> true,
			'rewrite'			=> true,
			'has_archive'		=> false,
			'menu_position'		=> 100,
			'menu_icon'			=> 'dashicons-editor-kitchensink',
			'capability_type'	=> 'page',
			'supports'			=> array( 'title', 'content', 'thumbnail')
		);
		
		// Register post type
		register_post_type('oo_manufacturers' , $args);
}

add_action( 'init', 'oo_manufacturers_post_type');
?>