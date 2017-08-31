<?php
/*SAVING DATA INTO DB - FUNCTIONS GO HERE*/
function oo_product_details_meta_save($post_id) {
	
	$oo_is_autosave = wp_is_post_autosave ( $post_id );
	$oo_is_revision = wp_is_post_revision ( $post_id );
    $oo_is_valid_nonce = ( isset ( $_POST [ 'oo_product_details_nonce' ] ) && wp_verify_nonce ( $_POST[ 'oo_product_details_nonce' ], basename ( __FILE__ )  ) )? true : false;
	
	if ($oo_is_autosave || $wd_is_revision || !$oo_is_valid_nonce){
		return;
	}
	
	if ( isset ( $_POST['oo_sku'] ) ) {
		update_post_meta ( $post_id, 'oo_sku', sanitize_text_field ( $_POST['oo_sku'] ) );
	}
	
	if ( isset ( $_POST['oo_url'] ) ) {
		update_post_meta ( $post_id, 'oo_url', sanitize_text_field ( $_POST['oo_url'] ) );
	}
	if ( isset ( $_POST['oo_model_number'] ) ) {
		update_post_meta ( $post_id, 'oo_model_number', sanitize_text_field ( $_POST['oo_model_number'] ) );
	}
	if ( isset ( $_POST['oo_finishes'] ) ) {
		update_post_meta ( $post_id, 'oo_finishes', sanitize_text_field ( $_POST['oo_finishes'] ) );
	}
	
	/*Finishes*/
	if ( isset ( $_POST['oo_fixture_size'] ) ) {
		update_post_meta ( $post_id, 'oo_fixture_size', sanitize_text_field ( $_POST['oo_fixture_size'] ) );
	}
	if ( isset ( $_POST['oo_quick_ship'] ) ) {
		update_post_meta ( $post_id, 'oo_quick_ship', sanitize_text_field ( $_POST['oo_quick_ship'] ) );
	}
	if ( isset ( $_POST['oo_int_or_ext'] ) ) {
		update_post_meta ( $post_id, 'oo_int_or_ext', sanitize_text_field ( $_POST['oo_int_or_ext'] ) );
	}
	if ( isset ( $_POST['oo_wattage'] ) ) {
		update_post_meta ( $post_id, 'oo_wattage', sanitize_text_field ( $_POST['oo_wattage'] ) );
	}
	if ( isset ( $_POST['oo_voltage'] ) ) {
		update_post_meta ( $post_id, 'oo_voltage', sanitize_text_field ( $_POST['oo_voltage'] ) );
	}
	if ( isset ( $_POST['oo_featured'] ) ) {
		update_post_meta ( $post_id, 'oo_featured', sanitize_text_field ( $_POST['oo_featured'] ) );
	}
	if ( isset ( $_POST['oo_spec_sheet'] ) ) {
		update_post_meta ( $post_id, 'oo_spec_sheet', sanitize_text_field ( $_POST['oo_spec_sheet'] ) );
	}
	
	   
}

add_action('save_post', 'oo_product_details_meta_save', 1, 2); // save the custom fields

/*OPTIONS SAVE*/
function oo_product_options_meta_save($post_id) {
	
	$oo_is_autosave = wp_is_post_autosave ( $post_id );
	$oo_is_revision = wp_is_post_revision ( $post_id );
    $oo_is_valid_nonce = ( isset ( $_POST [ 'oo_product_options_nonce' ] ) && wp_verify_nonce ( $_POST[ 'oo_product_options_nonce' ], basename ( __FILE__ )  ) )? true : false;
	
	if ($wd_is_autosave || $wd_is_revision || !$wd_is_valid_nonce){
		return;
	}
	
	
	if ( isset ( $_POST['wd_product_status'] ) ) {
		update_post_meta ( $post_id, 'wd_product_status', sanitize_text_field ( $_POST['wd_product_status'] ) );
	}
	
	/*
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
	*/
   
}

add_action('save_post', 'oo_product_options_meta_save', 1, 2); // save the custom fields

/*Manufacturers SAVE*/
function oo_product_manufacturer_meta_save($post_id) {
	
	$wd_is_autosave = wp_is_post_autosave ( $post_id );
	$wd_is_revision = wp_is_post_revision ( $post_id );
    $wd_is_valid_nonce = ( isset ( $_POST [ 'oo_product_manufacturer_nonce' ] ) && wp_verify_nonce ( $_POST[ 'oo_product_manufacturer_nonce' ], basename ( __FILE__ )  ) )? true : false;
	
	if ($wd_is_autosave || $wd_is_revision || !$wd_is_valid_nonce){
		return;
	}
	$oo_product_manufacturer = $_POST['oo_product_manufacturer'];
	if ( isset ( $oo_product_manufacturer ) ) {
		update_post_meta ( $post_id, 'oo_product_manufacturer', sanitize_text_field ( $oo_product_manufacturer ) );
	}
	   
}

add_action('save_post', 'oo_product_manufacturer_meta_save', 1, 2); // save the custom fields

/*Filters SAVE*/
function oo_product_filters_meta_save($post_id) {
	
	$oo_is_autosave = wp_is_post_autosave ( $post_id );
	$oo_is_revision = wp_is_post_revision ( $post_id );
    $oo_is_valid_nonce = ( isset ( $_POST [ 'oo_product_filters_nonce' ] ) && wp_verify_nonce ( $_POST[ 'oo_product_filters_nonce' ], basename ( __FILE__ )  ) )? true : false;
	
	if ($wd_is_autosave || $wd_is_revision || !$wd_is_valid_nonce){
		return;
	}
	$wd_product_led = empty ($_POST['oo_product_led']) ? 'off' : $_POST['oo_product_led'];
	$wd_product_smd = empty ($_POST['oo_product_smd']) ? 'off' : $_POST['oo_product_smd'];
	$wd_product_es = empty ($_POST['oo_product_energy_saver']) ? 'off' : $_POST['oo_product_energy_saver'];
	$wd_product_quickship = empty ($_POST['oo_product_quickship']) ? 'off' : $_POST['oo_product_quickship'];
	if ( isset ( $_POST['oo_product_cost_range'] ) ) {
		update_post_meta ( $post_id, 'oo_product_cost_range', sanitize_text_field ( $_POST['oo_product_cost_range'] ) );
	}
	//if (empty($wd_product_led)) $wd_product_led = 'off';
	if ( isset ( $wd_product_led ) ) {
		update_post_meta ( $post_id, 'oo_product_led', sanitize_text_field ( $wd_product_led ) );
	}
		if ( isset ( $wd_product_smd ) ) {
		update_post_meta ( $post_id, 'oo_product_smd', sanitize_text_field ( $wd_product_smd ) );
	}
		if ( isset ( $wd_product_es ) ) {
		update_post_meta ( $post_id, 'oo_product_energy_saver', sanitize_text_field ( $wd_product_es ) );
	}
		if ( isset ( $wd_product_quickship ) ) {
		update_post_meta ( $post_id, 'oo_product_quickship', sanitize_text_field ( $wd_product_quickship ) );
	}

	   
}

add_action('save_post', 'oo_product_filters_meta_save', 1, 2); // save the custom fields
?>