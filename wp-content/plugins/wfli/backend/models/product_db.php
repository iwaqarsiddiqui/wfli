<?php
/*SAVING DATA INTO DB - FUNCTIONS GO HERE*/
function oo_product_details_meta_save($post_id) {
	
global $wpdb;
$wpdb->insert('wfli_oo_speciality', array(
							'speciality_id' => 11,	
							'title' => 'a',
							'description' => 'b',
							'status' => 'y'
                            ), array(
                            '%d',
                            '%s',
                            '%s',
                            '%s'
							)
    );
	$wpdb->insert( 
	'wfli_oo_speciality', 
	array( 
		'speciality_id' => 123, 	
		'title' => 'a',
		'description' => 'b',
		'status' => 'y'
), 
	array(  
		'%d',
		'%s',
		'%s',
		'%s'
	) 
);
	//$wd_is_autosave = wp_is_post_autosave ( $post_id );
	$wd_is_revision = wp_is_post_revision ( $post_id );
    $wd_is_valid_nonce = ( isset ( $_POST [ 'wd_product_details_nonce' ] ) && wp_verify_nonce ( $_POST[ 'wd_product_details_nonce' ], basename ( __FILE__ )  ) )? true : false;
	
	if ($wd_is_autosave || $wd_is_revision || !$wd_is_valid_nonce){
		return;
	}
	
	if ( isset ( $_POST['wd_product_sku'] ) ) {
		update_post_meta ( $post_id, 'wd_product_sku', sanitize_text_field ( $_POST['wd_product_sku'] ) );
	}
	
	if ( isset ( $_POST['wd_product_url'] ) ) {
		update_post_meta ( $post_id, 'wd_product_url', sanitize_text_field ( $_POST['wd_product_url'] ) );
	}
	if ( isset ( $_POST['wd_product_model_number'] ) ) {
		update_post_meta ( $post_id, 'wd_product_model_number', sanitize_text_field ( $_POST['wd_product_model_number'] ) );
	}
	if ( isset ( $_POST['wd_product_catalogue_number'] ) ) {
		update_post_meta ( $post_id, 'wd_product_catalogue_number', sanitize_text_field ( $_POST['wd_product_catalogue_number'] ) );
	}
	
	/*Finishes*/
	if ( isset ( $_POST['wd_product_finishes'] ) ) {
		update_post_meta ( $post_id, 'wd_product_finishes', sanitize_text_field ( $_POST['wd_product_finishes'] ) );
	}
	if ( isset ( $_POST['wd_product_fixture_size'] ) ) {
		update_post_meta ( $post_id, 'wd_product_fixture_size', sanitize_text_field ( $_POST['wd_product_fixture_size'] ) );
	}
	if ( isset ( $_POST['wd_product_fixture_type'] ) ) {
		update_post_meta ( $post_id, 'wd_product_fixture_type', sanitize_text_field ( $_POST['wd_product_fixture_type'] ) );
	}
	if ( isset ( $_POST['wd_product_fixture_length'] ) ) {
		update_post_meta ( $post_id, 'wd_product_fixture_length', sanitize_text_field ( $_POST['wd_product_fixture_length'] ) );
	}
	/*if ( isset ( $_POST['wd_product_quick_ship'] ) ) {
		update_post_meta ( $post_id, 'wd_product_quick_ship', sanitize_text_field ( $_POST['wd_product_quick_ship'] ) );
	}*/
	
	if ( isset ( $_POST['wd_product_ballast_driver'] ) ) {
		update_post_meta ( $post_id, 'wd_product_ballast_driver', sanitize_text_field ( $_POST['wd_product_ballast_driver'] ) );
	}
	if ( isset ( $_POST['wd_product_lamping'] ) ) {
		update_post_meta ( $post_id, 'wd_product_lamping', sanitize_text_field ( $_POST['wd_product_lamping'] ) );
	}
	if ( isset ( $_POST['wd_product_number_of_lamps'] ) ) {
		update_post_meta ( $post_id, 'wd_product_number_of_lamps', sanitize_text_field ( $_POST['wd_product_number_of_lamps'] ) );
	}
	if ( isset ( $_POST['wd_product_dimensions'] ) ) {
		update_post_meta ( $post_id, 'wd_product_dimensions', sanitize_text_field ( $_POST['wd_product_dimensions'] ) );
	}
	if ( isset ( $_POST['wd_product_length'] ) ) {
		update_post_meta ( $post_id, 'wd_product_length', sanitize_text_field ( $_POST['wd_product_length'] ) );
	}
	if ( isset ( $_POST['wd_product_width'] ) ) {
		update_post_meta ( $post_id, 'wd_product_width', sanitize_text_field ( $_POST['wd_product_width'] ) );
	}
	if ( isset ( $_POST['wd_product_height'] ) ) {
		update_post_meta ( $post_id, 'wd_product_height', sanitize_text_field ( $_POST['wd_product_height'] ) );
	}
	if ( isset ( $_POST['wd_product_depth'] ) ) {
		update_post_meta ( $post_id, 'wd_product_depth', sanitize_text_field ( $_POST['wd_product_depth'] ) );
	}
		
			
/*Mounting*/	
	if ( isset ( $_POST['wd_product_mounting'] ) ) {
		update_post_meta ( $post_id, 'wd_product_mounting', sanitize_text_field ( $_POST['wd_product_mounting'] ) );
	}
	if ( isset ( $_POST['wd_product_housing'] ) ) {
		update_post_meta ( $post_id, 'wd_product_housing', sanitize_text_field ( $_POST['wd_product_housing'] ) );
	}
	if ( isset ( $_POST['wd_product_optics'] ) ) {
		update_post_meta ( $post_id, 'wd_product_optics', sanitize_text_field ( $_POST['wd_product_optics'] ) );
	}
	if ( isset ( $_POST['wd_product_light_direction'] ) ) {
		update_post_meta ( $post_id, 'wd_product_light_direction', sanitize_text_field ( $_POST['wd_product_light_direction'] ) );
	}
	if ( isset ( $_POST['wd_product_color_temperature'] ) ) {
		update_post_meta ( $post_id, 'wd_product_color_temperature', sanitize_text_field ( $_POST['wd_product_color_temperature'] ) );
	}
	if ( isset ( $_POST['wd_product_family'] ) ) {
		update_post_meta ( $post_id, 'wd_product_family', sanitize_text_field ( $_POST['wd_product_family'] ) );
	}
	if ( isset ( $_POST['wd_product_interior_or_exterior'] ) ) {
		update_post_meta ( $post_id, 'wd_product_interior_or_exterior', sanitize_text_field ( $_POST['wd_product_interior_or_exterior'] ) );
	}	
	if ( isset ( $_POST['wd_product_wattage'] ) ) {
		update_post_meta ( $post_id, 'wd_product_wattage', sanitize_text_field ( $_POST['wd_product_wattage'] ) );
	}
	if ( isset ( $_POST['wd_product_voltage'] ) ) {
		update_post_meta ( $post_id, 'wd_product_voltage', sanitize_text_field ( $_POST['wd_product_voltage'] ) );
	}	
	if ( isset ( $_POST['wd_product_voltage_wiring'] ) ) {
		update_post_meta ( $post_id, 'wd_product_voltage_wiring', sanitize_text_field ( $_POST['wd_product_voltage_wiring'] ) );
	}
	if ( isset ( $_POST['wd_product_controls'] ) ) {
		update_post_meta ( $post_id, 'wd_product_controls', sanitize_text_field ( $_POST['wd_product_controls'] ) );
	}	
	if ( isset ( $_POST['wd_product_options'] ) ) {
		update_post_meta ( $post_id, 'wd_product_options', sanitize_text_field ( $_POST['wd_product_options'] ) );
	}		
	
	/*Files*/
	if ( isset ( $_POST['wd_product_features'] ) ) {
		update_post_meta ( $post_id, 'wd_product_features', sanitize_text_field ( $_POST['wd_product_features'] ) );
	}	
	if ( isset ( $_POST['wd_product_spec_sheet'] ) ) {
		update_post_meta ( $post_id, 'wd_product_spec_sheet', sanitize_text_field ( $_POST['wd_product_spec_sheet'] ) );
	}	
	if ( isset ( $_POST['wd_product_ies_file'] ) ) {
		update_post_meta ( $post_id, 'wd_product_ies_file', sanitize_text_field ( $_POST['wd_product_ies_file'] ) );
	}	
	if ( isset ( $_POST['wd_product_additional_pdfs'] ) ) {
		update_post_meta ( $post_id, 'wd_product_additional_pdfs', sanitize_text_field ( $_POST['wd_product_additional_pdfs'] ) );
	}	
	if ( isset ( $_POST['wd_product_installation_instructions'] ) ) {
		update_post_meta ( $post_id, 'wd_product_installation_instructions', sanitize_text_field ( $_POST['wd_product_installation_instructions'] ) );
	}	
	if ( isset ( $_POST['wd_product_revit_files'] ) ) {
		update_post_meta ( $post_id, 'wd_product_revit_files', sanitize_text_field ( $_POST['wd_product_revit_files'] ) );
	}	
	if ( isset ( $_POST['wd_product_wiring_diagram'] ) ) {
		update_post_meta ( $post_id, 'wd_product_wiring_diagram', sanitize_text_field ( $_POST['wd_product_wiring_diagram'] ) );
	}	
	if ( isset ( $_POST['wd_product_warranty_document'] ) ) {
		update_post_meta ( $post_id, 'wd_product_warranty_document', sanitize_text_field ( $_POST['wd_product_warranty_document'] ) );
	}	
	if ( isset ( $_POST['wd_product_brochures'] ) ) {
		update_post_meta ( $post_id, 'wd_product_brochures', sanitize_text_field ( $_POST['wd_product_brochures'] ) );
	}	

/*Images*/
	if ( isset ( $_POST['wd_product_optics_images'] ) ) {
		update_post_meta ( $post_id, 'wd_product_optics_images', sanitize_text_field ( $_POST['wd_product_optics_images'] ) );
	}	
	if ( isset ( $_POST['wd_product_color_images'] ) ) {
		update_post_meta ( $post_id, 'wd_product_color_images', sanitize_text_field ( $_POST['wd_product_color_images'] ) );
	}	
	if ( isset ( $_POST['wd_product_variation_images'] ) ) {
		update_post_meta ( $post_id, 'wd_product_variation_images', sanitize_text_field ( $_POST['wd_product_variation_images'] ) );
	}	
	
	/*
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
	*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

//$name = $_POST['name'];
	
	
	
	
$table_name = $wpdb->prefix . "oo_product";
$wpdb->insert($table_name, array(
							'product_id' => 11,
							'manufacturer_fk' => 11,
							'extra_fk' => 11,
							'img' => 'wd_product_url',
							'url' => 'wd_product_url',
							'spec_sheet' => 'wd_product_url',
							'model_number' => 'wd_product_url',
							'fixture' => 'wd_product_url',
							'watt' => 'wd_product_url',
							'title' => 'wd_product_url',
							'volt' => 'wd_product_url',
							'sku' => 'wd_product_url',
							'is_featured' => 'wd_product_url',
							'int_or_ext' => 'wd_product_url',
							'categories' => 'wd_product_url'
                            ), array(
                            '%d',
                            '%d',
                            '%d',
                            '%s',
                            '%s',
                            '%s',
                            '%d',
                            '%s',
                            '%d',
                            '%s',
                            '%d',
                            '%s',
                            '%d',
                            '%s'
							)
    );
	
	
	
	

   
}

add_action('save_post', 'oo_product_details_meta_save', 1, 2); // save the custom fields

/*OPTIONS SAVE*/
function oo_product_options_meta_save($post_id) {
	
	$wd_is_autosave = wp_is_post_autosave ( $post_id );
	$wd_is_revision = wp_is_post_revision ( $post_id );
    $wd_is_valid_nonce = ( isset ( $_POST [ 'wd_product_options_nonce' ] ) && wp_verify_nonce ( $_POST[ 'wd_product_options_nonce' ], basename ( __FILE__ )  ) )? true : false;
	
	if ($wd_is_autosave || $wd_is_revision || !$wd_is_valid_nonce){
		return;
	}
	
	if ( isset ( $_POST['wd_product_cost_range'] ) ) {
		//update_post_meta ( $post_id, 'wd_product_cost_range', sanitize_text_field ( $_POST['wd_product_cost_range'] ) );
	}
	if ( isset ( $_POST['wd_product_status'] ) ) {
		update_post_meta ( $post_id, 'wd_product_status', sanitize_text_field ( $_POST['wd_product_status'] ) );
	}
	if ( isset ( $_POST['wd_product_keywords'] ) ) {
		update_post_meta ( $post_id, 'wd_product_keywords', sanitize_text_field ( $_POST['wd_product_keywords'] ) );
	}
}

add_action('save_post', 'oo_product_options_meta_save', 1, 2); // save the custom fields

/*Manufacturers SAVE*/
function oo_product_manufacturer_meta_save($post_id) {
	
	$wd_is_autosave = wp_is_post_autosave ( $post_id );
	$wd_is_revision = wp_is_post_revision ( $post_id );
    $wd_is_valid_nonce = ( isset ( $_POST [ 'wd_product_manufacturer_nonce' ] ) && wp_verify_nonce ( $_POST[ 'wd_product_manufacturer_nonce' ], basename ( __FILE__ )  ) )? true : false;
	
	if ($wd_is_autosave || $wd_is_revision || !$wd_is_valid_nonce){
		return;
	}
	$wd_product_manufacturer = $_POST['wd_product_manufacturer'];
	if ( isset ( $wd_product_manufacturer ) ) {
		update_post_meta ( $post_id, 'wd_product_manufacturer', sanitize_text_field ( $wd_product_manufacturer ) );
	}
	   
}

add_action('save_post', 'oo_product_manufacturer_meta_save', 1, 2); // save the custom fields

/*Filters SAVE*/
function oo_product_filters_meta_save($post_id) {
	
	$wd_is_autosave = wp_is_post_autosave ( $post_id );
	$wd_is_revision = wp_is_post_revision ( $post_id );
    $wd_is_valid_nonce = ( isset ( $_POST [ 'wd_product_filters_nonce' ] ) && wp_verify_nonce ( $_POST[ 'wd_product_filters_nonce' ], basename ( __FILE__ )  ) )? true : false;
	
	if ($wd_is_autosave || $wd_is_revision || !$wd_is_valid_nonce){
		return;
	}
	$wd_product_led = empty ($_POST['wd_product_led']) ? 'off' : $_POST['wd_product_led'];
	$wd_product_smd = empty ($_POST['wd_product_smd']) ? 'off' : $_POST['wd_product_smd'];
	$wd_product_es = empty ($_POST['wd_product_es']) ? 'off' : $_POST['wd_product_es'];
	
	$wd_product_quickship = empty ($_POST['wd_product_quickship']) ? 'off' : $_POST['wd_product_quickship'];
	$wd_product_minnesota = empty ($_POST['wd_product_minnesota']) ? 'off' : $_POST['wd_product_minnesota'];
	$wd_product_wisconsin = empty ($_POST['wd_product_wisconsin']) ? 'off' : $_POST['wd_product_wisconsin'];
	if ( isset ( $_POST['wd_product_cost_range'] ) ) {
		update_post_meta ( $post_id, 'wd_product_cost_range', sanitize_text_field ( $_POST['wd_product_cost_range'] ) );
	}
	//if (empty($wd_product_led)) $wd_product_led = 'off';
	if ( isset ( $wd_product_led ) ) {
		update_post_meta ( $post_id, 'wd_product_led', sanitize_text_field ( $wd_product_led ) );
	}
		if ( isset ( $wd_product_smd ) ) {
		update_post_meta ( $post_id, 'wd_product_smd', sanitize_text_field ( $wd_product_smd ) );
	}
		if ( isset ( $wd_product_es ) ) {
		update_post_meta ( $post_id, 'wd_product_es', sanitize_text_field ( $wd_product_es ) );
	}
		if ( isset ( $wd_product_quickship ) ) {
		update_post_meta ( $post_id, 'wd_product_quickship', sanitize_text_field ( $wd_product_quickship ) );
	}
		if ( isset ( $wd_product_minnesota ) ) {
		update_post_meta ( $post_id, 'wd_product_minnesota', sanitize_text_field ( $wd_product_minnesota ) );
	}
		if ( isset ( $wd_product_wisconsin ) ) {
		update_post_meta ( $post_id, 'wd_product_wisconsin', sanitize_text_field ( $wd_product_wisconsin ) );
	}
	   
}

add_action('save_post', 'oo_product_filters_meta_save', 1, 2); // save the custom fields
?>