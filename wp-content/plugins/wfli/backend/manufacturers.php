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

/*Adding MetaBoxes and Custom Fields to Custom Post Type*/

function oo_add_manufacturers_metabox_details(){
    add_meta_box(
		'wd_manufacturer_details_metabox', 
		'Details', 
		'oo_manufacturer_details_meta_callback'	, 
		'oo_manufacturers', 'normal', 
		'high'
	);
}
add_action( 'add_meta_boxes', 'oo_add_manufacturers_metabox_details' );


function oo_manufacturer_details_meta_callback( $post ){
	wp_nonce_field ( basename ( __FILE__ ), 'oo_manufacturer_details_nonce' );
	
		
	$oo_manufacturer_content = get_post_meta($post->ID, 'oo_manufacturer_content', true);
	$editor = 'oo_manufacturer_content';
	$settings = array(
		'textarea_rows'	=> 4, 
		'media_buttons'	=> false,
	);
	
	$oo_manufacturer_url = get_post_meta($post->ID, 'oo_manufacturer_url', true);
	
?>
	<div class='wd-meta-main'>
		<div class='wd-main-row'>
			<div class='wd-main-row-th'>
				<label for='manufacturer-description' class="wd-meta-title">Manufacturer Description</label>
			</div>
			<div class='wd-main-row-td'>
				<?php wp_editor($oo_manufacturer_content, $editor, $settings); ?>
			</div>
			<div class='wd-main-row-th'>
				<label for='manufacturer-url' class="wd-meta-title">Manufacturer URL</label>
			</div>
			<div class='wd-main-row-td'>
				<input type="text" name="oo_manufacturer_url" value="<?php if ( ! empty ( $oo_manufacturer_url ) ) echo esc_attr ( $oo_manufacturer_url );  ?>" />
			</div>				
		</div>
	</div>
<?php
}

//Specialized Categoies added in the side bar
function oo_add_manufacturers_specialized_sidebar(){
    add_meta_box(
		'oo_manufacturers_specialized_sidebar_metabox', 
		'Specialized Categories', 
		'oo_manufacturer_specialized_meta_callback'	, 
		'oo_manufacturers', 'side', 
		'core'
	);
}
add_action( 'add_meta_boxes', 'oo_add_manufacturers_specialized_sidebar' );


function oo_manufacturer_specialized_meta_callback( $post ){
	wp_nonce_field ( basename ( __FILE__ ), 'oo_manufacturer_specialized_nonce' );


	$oo_manufacturer_specialized = get_post_meta($post->ID, 'oo_manufacturer_specialized', true);
	
	//Specialized is a custom post type created that allows editing specialized categories. 
	$oo_manufacturer_speciality = get_posts(['post_type' => 'oo_manufacturer_speciality',
        'posts_per_page' => '-1'
    ]);
	
	//Sort the specialized categories such that they display in ascending order
	sort($oo_manufacturer_speciality);
	
	//echo "<br />".$wd_manufacturer_specialized;
	$oo_manufacturer_selected_specialized = explode (",",$oo_manufacturer_specialized);
?>
	<div class='wd-meta-main'>
		<div class='wd-main-row'>

			<div class='wd-main-row-td'>
				<?php 
					foreach ($oo_manufacturer_speciality as $specialized){
						$oo_selected='';
						if (in_array($specialized->ID, $oo_manufacturer_selected_specialized)){
							$oo_selected='checked';
						}
				?>
					<input type='checkbox' name="oo_manufacturer_specialized[]" value='<?php echo $specialized->ID; ?>' <?php echo $oo_selected; ?>><?php echo $specialized->post_title; ?><br />
				<?php		
					}
				?>
			</div>			
		</div>
	</div>
<?php
}


//Manufacturer Options
function oo_add_manufacturers_metabox_options(){
    add_meta_box(
		'oo_manufacturer_options_metabox', 
		'Options', 
		'oo_manufacturer_options_meta_callback'	, 
		'oo_manufacturers', 'normal', 
		'high'
	);
}
add_action( 'add_meta_boxes', 'oo_add_manufacturers_metabox_options' );


function oo_manufacturer_options_meta_callback( $post ){
	wp_nonce_field ( basename ( __FILE__ ), 'oo_manufacturer_options_nonce' );

	
	$oo_manufacturer_cost_range = get_post_meta($post->ID, 'oo_manufacturer_cost_range', true);
	$oo_manufacturer_status = get_post_meta($post->ID, 'wd_manufacturer_status', true);
	$oo_manufacturer_keywords = get_post_meta($post->ID, 'oo_manufacturer_keywords', true);

?>
	<div class='wd-meta-main'>
		<div class='wd-main-row'>

			<div class='wd-main-row-th'>
				<label for='manufacturer-cost-range' class="wd-meta-title">Cost Range</label>
			</div>
			<div class='wd-main-row-td'>
				<select class="wd_cmb2_select" name="oo_manufacturer_cost_range" id="oo_manufacturer_cost_range">	
					<option value="1" <?php echo $oo_manufacturer_cost_range==1 ? 'selected' : ''; ?>>Good</option>
					<option value="2" <?php echo $oo_manufacturer_cost_range==2 ? 'selected' : ''; ?>>Better</option>
					<option value="3" <?php echo $oo_manufacturer_cost_range==3 ? 'selected' : ''; ?>>Best</option>
				</select>
			</div>				
			<div class='wd-main-row-th'>
				<label for='manufacturer-status' class="wd-meta-title">Status</label>
			</div>
			<!--Tahir: I dont think we need this Status since the post can be published anyways-->
			<div class='wd-main-row-td'>
				<select class="wd_cmb2_select" name="oo_manufacturer_status" id="oo_manufacturer_status">	
					<option value="1" <?php echo ($oo_manufacturer_status==1) ? 'selected' : ''; ?>>Active</option>
					<option value="0" <?php echo ($oo_manufacturer_status==0) ? 'selected' : ''; ?>>Inactive</option>
				</select>
			</div>	
		</div>
	</div>
<?php
}


/*SAVING DATA INTO DB - FUNCTIONS GO HERE*/
function oo_manufacturer_details_meta_save($post_id) {
	
	$oo_is_autosave = wp_is_post_autosave ( $post_id );
	$oo_is_revision = wp_is_post_revision ( $post_id );
    $oo_is_valid_nonce = ( isset ( $_POST [ 'oo_manufacturer_details_nonce' ] ) && wp_verify_nonce ( $_POST[ 'oo_manufacturer_details_nonce' ], basename ( __FILE__ )  ) )? true : false;
	
	if ($oo_is_autosave || $oo_is_revision || !$oo_is_valid_nonce){
		return;
	}
	if ( isset ( $_POST['oo_manufacturer_url'] ) ) {
		update_post_meta ( $post_id, 'oo_manufacturer_url', sanitize_text_field ( $_POST['oo_manufacturer_url'] ) );
	}
	if ( isset ( $_POST['oo_manufacturer_content'] ) ) {
		update_post_meta ( $post_id, 'oo_manufacturer_content', sanitize_text_field ( $_POST['oo_manufacturer_content'] ) );
	}
}

add_action('save_post', 'oo_manufacturer_details_meta_save', 1, 2); // save the custom fields

/*OPTIONS SAVE*/
function oo_manufacturer_options_meta_save($post_id) {
	
	$oo_is_autosave = wp_is_post_autosave ( $post_id );
	$oo_is_revision = wp_is_post_revision ( $post_id );
    $oo_is_valid_nonce = ( isset ( $_POST [ 'oo_manufacturer_options_nonce' ] ) && wp_verify_nonce ( $_POST[ 'oo_manufacturer_options_nonce' ], basename ( __FILE__ )  ) )? true : false;
	
	if ($oo_is_autosave || $oo_is_revision || !$oo_is_valid_nonce){
		return;
	}
	
	if ( isset ( $_POST['oo_manufacturer_cost_range'] ) ) {
		update_post_meta ( $post_id, 'oo_manufacturer_cost_range', sanitize_text_field ( $_POST['oo_manufacturer_cost_range'] ) );
	}
	if ( isset ( $_POST['oo_manufacturer_status'] ) ) {
		update_post_meta ( $post_id, 'oo_manufacturer_status', sanitize_text_field ( $_POST['oo_manufacturer_status'] ) );
	}
  
}

add_action('save_post', 'oo_manufacturer_options_meta_save', 1, 2); // save the custom fields

/*SPECIALIZED SAVE*/
function oo_manufacturer_specialized_meta_save($post_id) {
	
	$oo_is_autosave = wp_is_post_autosave ( $post_id );
	$oo_is_revision = wp_is_post_revision ( $post_id );
    $oo_is_valid_nonce = ( isset ( $_POST [ 'oo_manufacturer_specialized_nonce' ] ) && wp_verify_nonce ( $_POST[ 'oo_manufacturer_specialized_nonce' ], basename ( __FILE__ )  ) )? true : false;
	if ($oo_is_autosave || $oo_is_revision || !$oo_is_valid_nonce){
		return;
	}
	$selected_specialized_categories = '';
	if ( isset ( $_POST['oo_manufacturer_specialized'] ) ) {
		$selected_specialized_categories = implode(",",$_POST['oo_manufacturer_specialized']);
	}	
	//if ( isset ( $selected_specialized_categories ) ) {
		update_post_meta ( $post_id, 'oo_manufacturer_specialized', sanitize_text_field ( $selected_specialized_categories ) );
	//}
	   
}

add_action('save_post', 'oo_manufacturer_specialized_meta_save', 1, 2); // save the custom fields
