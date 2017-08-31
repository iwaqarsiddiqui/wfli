<?php
/*Add custom taxonomies for products*/

//This function creates a custom post type of the name wdlrproducts
function oo_product_categories() {
		$singular = 'Product Category';
		$plural = 'Product Categories';
		// Labels
		$labels = array(
			'name' 							=> 	$plural,
			'singular_name' 				=> 	$singular,
			'menu_name' 					=> 	$plural,
			'add_new' 						=> 	'Add New',
			'add_new_item' 					=> 	'Add New ' . $singular,	
			'edit'							=> 	'Edit',
			'edit_item' 					=> 	'Edit '. $singular,
			'new_item' 						=> 	'New ' . $singular,
			'new_item_name'					=>	'New ' . $singular . ' name',
			'view_item' 					=> 	'View ' . $singular,
			'search_items' 					=> 	'Search ' . $plural,
			'not_found' 					=>  'No ' . $plural . ' found',
			'not_found_in_trash'			=> 	'No ' . $plural . ' in Trash',
			'parent_item_colon' 			=> 	'',
			'separate_items_with_commas'	=>	'Separate ' . $plural . ' with commas  ',
			'choose_from_most_user'			=>	'Choose from most used '. $plural,
			'add_or_remove_items'			=>	'Add or remove '. $plural
		);
		
		$args = array(
			'hierarchical'			=> 	true,
			'labels'				=> 	$labels,
			'show_ui'				=> 	true,
			'show_admin_column'		=> 	true,
			'update_count_callback'	=>	'_update_post_term_count',
			'query_car'				=>	true,
			'rewrite'				=> array( 'slug' => 'oo_categories')
		);
		
		// Register taxonomy
		register_taxonomy('oo_categories', 'oo_products', $args);
}
add_action( 'init', 'oo_product_categories');

//This function creates a custom post type of the name wdlrproducts
function oo_product_speciality() {
		$singular = 'Speciality';
		$plural = 'Specialities';
		// Labels
		$labels = array(
			'name' 							=> 	$plural,
			'singular_name' 				=> 	$singular,
			'menu_name' 					=> 	$plural,
			'add_new' 						=> 	'Add New',
			'add_new_item' 					=> 	'Add New ' . $singular,	
			'edit'							=> 	'Edit',
			'edit_item' 					=> 	'Edit '. $singular,
			'new_item' 						=> 	'New ' . $singular,
			'new_item_name'					=>	'New ' . $singular . ' name',
			'view_item' 					=> 	'View ' . $singular,
			'search_items' 					=> 	'Search ' . $plural,
			'not_found' 					=>  'No ' . $plural . ' found',
			'not_found_in_trash'			=> 	'No ' . $plural . ' in Trash',
			'parent_item_colon' 			=> 	'',
			'separate_items_with_commas'	=>	'Separate ' . $plural . ' with commas  ',
			'choose_from_most_user'			=>	'Choose from most used '. $plural,
			'add_or_remove_items'			=>	'Add or remove '. $plural
		);
		
		$args = array(
			'hierarchical'			=> 	true,
			'labels'				=> 	$labels,
			'show_ui'				=> 	true,
			'show_admin_column'		=> 	true,
			'update_count_callback'	=>	'_update_post_term_count',
			'query_car'				=>	true,
			'rewrite'				=> array( 'slug' => 'oo_speciality')
		);
		
		// Register taxonomy
		register_taxonomy('oo_speciality', 'oo_products', $args);
}
add_action( 'init', 'oo_product_speciality');
//This function creates a custom post type of the name wdlrproducts
function oo_product_project() {
		$singular = 'Project';
		$plural = 'Projects';
		// Labels
		$labels = array(
			'name' 							=> 	$plural,
			'singular_name' 				=> 	$singular,
			'menu_name' 					=> 	$plural,
			'add_new' 						=> 	'Add New',
			'add_new_item' 					=> 	'Add New ' . $singular,	
			'edit'							=> 	'Edit',
			'edit_item' 					=> 	'Edit '. $singular,
			'new_item' 						=> 	'New ' . $singular,
			'new_item_name'					=>	'New ' . $singular . ' name',
			'view_item' 					=> 	'View ' . $singular,
			'search_items' 					=> 	'Search ' . $plural,
			'not_found' 					=>  'No ' . $plural . ' found',
			'not_found_in_trash'			=> 	'No ' . $plural . ' in Trash',
			'parent_item_colon' 			=> 	'',
			'separate_items_with_commas'	=>	'Separate ' . $plural . ' with commas  ',
			'choose_from_most_user'			=>	'Choose from most used '. $plural,
			'add_or_remove_items'			=>	'Add or remove '. $plural
		);
		
		$args = array(
			'hierarchical'			=> 	true,
			'labels'				=> 	$labels,
			'show_ui'				=> 	true,
			'show_admin_column'		=> 	true,
			'update_count_callback'	=>	'_update_post_term_count',
			'query_car'				=>	true,
			'rewrite'				=> array( 'slug' => 'oo_project')
		);
		
		// Register taxonomy
		register_taxonomy('oo_project', 'oo_products', $args);
}
add_action( 'init', 'oo_product_project');
//This function creates a custom post type of the name wdlrproducts
function oo_product_wishlist() {
		$singular = 'Wishlist';
		$plural = 'Wishlists';
		// Labels
		$labels = array(
			'name' 							=> 	$plural,
			'singular_name' 				=> 	$singular,
			'menu_name' 					=> 	$plural,
			'add_new' 						=> 	'Add New',
			'add_new_item' 					=> 	'Add New ' . $singular,	
			'edit'							=> 	'Edit',
			'edit_item' 					=> 	'Edit '. $singular,
			'new_item' 						=> 	'New ' . $singular,
			'new_item_name'					=>	'New ' . $singular . ' name',
			'view_item' 					=> 	'View ' . $singular,
			'search_items' 					=> 	'Search ' . $plural,
			'not_found' 					=>  'No ' . $plural . ' found',
			'not_found_in_trash'			=> 	'No ' . $plural . ' in Trash',
			'parent_item_colon' 			=> 	'',
			'separate_items_with_commas'	=>	'Separate ' . $plural . ' with commas  ',
			'choose_from_most_user'			=>	'Choose from most used '. $plural,
			'add_or_remove_items'			=>	'Add or remove '. $plural
		);
		
		$args = array(
			'hierarchical'			=> 	true,
			'labels'				=> 	$labels,
			'show_ui'				=> 	true,
			'show_admin_column'		=> 	true,
			'update_count_callback'	=>	'_update_post_term_count',
			'query_car'				=>	true,
			'rewrite'				=> array( 'slug' => 'oo_wishlist')
		);
		
		// Register taxonomy
		register_taxonomy('oo_wishlist', 'oo_products', $args);
}
add_action( 'init', 'oo_product_wishlist');
?>