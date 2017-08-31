<?php 
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


/*Adding MetaBoxes and Custom Fields to Custom Post Type*/

function oo_add_products_metabox_details(){
    add_meta_box(
		'oo_product_details_metabox', 
		'Details', 
		'oo_product_details_meta_callback'	, 
		'oo_products', 'normal', 
		'high'
	);
}
add_action( 'add_meta_boxes', 'oo_add_products_metabox_details' );


function oo_product_details_meta_callback( $post ){
	wp_nonce_field ( basename ( __FILE__ ), 'oo_product_details_nonce' );
	
		
	$oo_product_content = get_post_meta($post->ID, 'oo_product_content', true);
	$editor = 'oo_product_content';
	$settings = array(
		'textarea_rows'	=> 8, 
		'media_buttons'	=> true,
	);
	
	$oo_sku = get_post_meta($post->ID, 'oo_sku', true);
	$oo_url = get_post_meta($post->ID, 'oo_url', true);	
	$oo_model_number = get_post_meta($post->ID, 'oo_model_number', true);
	$oo_finishes = get_post_meta($post->ID, 'oo_finishes', true);
	$oo_fixture_size = get_post_meta($post->ID, 'oo_fixture_size', true);
	$oo_quick_ship = get_post_meta($post->ID, 'oo_quick_ship', true);
	$oo_wattage = get_post_meta($post->ID, 'oo_wattage', true);
	$oo_voltage = get_post_meta($post->ID, 'oo_voltage', true);
	$oo_spec_sheet = get_post_meta($post->ID, 'oo_spec_sheet', true);
	$oo_featured = get_post_meta($post->ID, 'oo_featured', true);
	$oo_int_or_ext = get_post_meta($post->ID, 'oo_int_or_ext', true);


		
	
	
	

	
	
?>
	
<?php
//}




/*Related Products Meta*/

// function oo_add_related_products_metabox_details(){
//     add_meta_box(
// 		'oo_related_products_metabox', 
// 		'Related Products', 
// 		'oo_product_related_products_meta_callback'	, 
// 		'oo_products', 'normal', 
// 		'high'
// 	);
// }
// add_action( 'add_meta_boxes', 'oo_add_related_products_metabox_details' );


// function oo_product_related_products_meta_callback( $post ){
// 	wp_nonce_field ( basename ( __FILE__ ), 'oo_product_related_products_nonce' );
	
// 	$oo_related_products = get_post_meta($post->ID, 'oo_related_products', true);
?>
	<!-- <div class='wd-meta-main'>
		<div class='wd-main-row'>
		
			<div class='wd-main-row-th'>
				<label for='oo_related_products' class="wd-meta-title">Related Products</label>
			</div>
			<div class='wd-main-row-td'>
				<input type="text" name="oo_related_products" value="<?php //if ( ! empty ( $oo_related_products ) ) echo esc_attr ( $oo_related_products );  ?>" />
			</div>				
		
			
		</div>
	</div> -->
<?php
}











//Manufacturers added in the side bar
function oo_add_products_manufacturer_sidebar(){
    add_meta_box(
		'oo_products_manufacturer_sidebar_metabox', 
		'Product Manufacturer', 
		'oo_product_manufacturer_meta_callback'	, 
		'oo_products', 'side', 
		'core'
	);
}
add_action( 'add_meta_boxes', 'oo_add_products_manufacturer_sidebar' );


function oo_product_manufacturer_meta_callback( $post ){
	wp_nonce_field ( basename ( __FILE__ ), 'oo_product_manufacturer_nonce' );


	$oo_manufacturer = get_post_meta($post->ID, 'oo_manufacturer', true);
	
	//Specialized is a custom post type created that allows editing specialized categories. 
	$oo_product_spe = get_posts(['post_type' => 'oo_pr_manufacturers',
        'posts_per_page' => '-1'
    ]);
	
	//Sort the specialized categories such that they display in ascending order
	sort($oo_product_spe);
	
	//echo "<br />".$wd_product_specialized;
	$oo_product_selected_manufacturer = explode (",",$oo_manufacturer);
?>
	
<?php
}

/*Filters in the sidebar*/
//Manufacturers added in the side bar
function oo_add_products_filters_sidebar(){
    add_meta_box(
		'oo_products_filters_sidebar_metabox', 
		'Product Filters', 
		'oo_product_filters_meta_callback'	, 
		'oo_products', 'side', 
		'core'
	);
}
add_action( 'add_meta_boxes', 'oo_add_products_filters_sidebar' );


function oo_product_filters_meta_callback( $post ){
	wp_nonce_field ( basename ( __FILE__ ), 'oo_product_filters_nonce' );


	/*Filters Section*/
	$oo_product_cost_range = get_post_meta($post->ID, 'oo_product_cost_range', true);
	/*LED - SMD - Energy Saving*/
	$oo_product_led = get_post_meta($post->ID, 'oo_product_led', true);
	$oo_product_smd = get_post_meta($post->ID, 'oo_product_smd', true);
	$oo_product_energy_saver = get_post_meta($post->ID, 'oo_product_energy_saver', true);
	/*Shipping and Areas*/
	$oo_product_quickship = get_post_meta($post->ID, 'oo_product_quickship', true);
	
	

?>
	
<?php
}
/*Filters in the sidebar*/

//Product Options
function oo_add_products_metabox_options(){
    add_meta_box(
		'oo_product_options_metabox', 
		'Options', 
		'oo_product_options_meta_callback'	, 
		'oo_products', 'normal', 
		'high'
	);
}
add_action( 'add_meta_boxes', 'oo_add_products_metabox_options' );


function oo_product_options_meta_callback( $post ){
	wp_nonce_field ( basename ( __FILE__ ), 'oo_product_options_nonce' );

	
	$oo_product_status = get_post_meta($post->ID, 'oo_product_status', true);
}
?>