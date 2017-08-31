<?php
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
<div class='wd-meta-main'>
	<div class='wd-main-row'>
		<div class='wd-main-row-th'>
			<label for='product-description' class="wd-meta-title">Product Short Description</label>
		</div>
		<div class='wd-main-row-td'>
			<?php wp_editor($oo_product_content, $editor, $settings); ?>
		</div>		
		<div class='wd-main-row-th'>
			<label for='oo_sku' class="wd-meta-title">Product SKU</label>
		</div>
		<div class='wd-main-row-td'>
			<input type="text" name="oo_sku" value="<?php if ( ! empty ( $oo_sku ) ) echo esc_attr ( $oo_sku );  ?>" />
		</div>				
		<div class='wd-main-row-th'>
			<label for='oo_url' class="wd-meta-title">Product URL</label>
		</div>
		<div class='wd-main-row-td'>
			<input type="text" name="oo_url" value="<?php if ( ! empty ( $oo_url ) ) echo esc_attr ( $oo_url );  ?>" />
		</div>			
		
		<div class='wd-main-row-th'>
			<label for='oo_model_number' class="wd-meta-title">Product Model Number</label>
		</div>
		<div class='wd-main-row-td'>
			<input type="text" name="oo_model_number" value="<?php if ( ! empty ( $oo_model_number ) ) echo esc_attr ( $oo_model_number );  ?>" />
		</div>				

		<div class='wd-main-row-th'>
			<label for='oo_finishes' class="wd-meta-title">Finishes</label>
		</div>
		<div class='wd-main-row-td'>
			<input type="text" name="" value="<?php if ( ! empty ( $oo_finishes ) ) echo esc_attr ( $oo_finishes );  ?>" />
		</div>				

		<div class='wd-main-row-th'>
			<label for='oo_fixture_size' class="wd-meta-title">Fixture Size</label>
		</div>
		<div class='wd-main-row-td'>
			<input type="text" name="oo_fixture_size" value="<?php if ( ! empty ( $oo_fixture_size ) ) echo esc_attr ( $oo_fixture_size );  ?>" />
		</div>
		<div class='wd-main-row-th'>
			<label for='oo_quick_ship' class="wd-meta-title">Quick Ship</label>
		</div>
		<div class='wd-main-row-td'>
			<select class="wd_cmb2_select" name="oo_quick_ship" id="oo_quick_ship">	
				<option value="1" <?php echo ($oo_quick_ship==1) ? 'selected' : ''; ?>>Yes</option>
				<option value="0" <?php echo ($oo_quick_ship==0) ? 'selected' : ''; ?>>No</option>
			</select>
		</div>		
		<div class='wd-main-row-th'>
			<label for='oo_int_or_ext' class="wd-meta-title">Interior or Exterior</label>
		</div>
		<div class='wd-main-row-td'>
			<select name="oo_int_or_ext">
				<option value="1" selected="<?php echo ($oo_int_or_ext==1) ? 'selected' : ''; ?>">Interior</option>
				<option value="2" selected="<?php echo ($oo_int_or_ext==2) ? 'selected' : ''; ?>">Exterior</option>
			</select>
		</div>					
		<div class='wd-main-row-th'>
			<label for='oo_wattage' class="wd-meta-title">Wattage</label>
		</div>
		<div class='wd-main-row-td'>
			<input type="text" name="oo_wattage" value="<?php if ( ! empty ( $oo_wattage ) ) echo esc_attr ( $oo_wattage );  ?>" />
		</div>			
		
		<div class='wd-main-row-th'>
			<label for='oo_voltage' class="wd-meta-title">Voltage</label>
		</div>
		<div class='wd-main-row-td'>
			<input type="text" name="oo_voltage" value="<?php if ( ! empty ( $oo_voltage ) ) echo esc_attr ( $oo_voltage );  ?>" />
		</div>		
					
		<div class='wd-main-row-th'>
			<label for='oo_featured' class="wd-meta-title">Featured</label>
		</div>
		<div class='wd-main-row-td'>
			<select class="wd_cmb2_select" name="oo_featured" id="oo_featured">	
				<option value="1" <?php echo ($oo_featured==1) ? 'selected' : ''; ?>>Yes</option>
				<option value="0" <?php echo ($oo_featured==0) ? 'selected' : ''; ?>>No</option>
			</select>
		<div class='wd-main-row-th'>
			<label for='oo_spec_sheet' class="wd-meta-title">Spec Sheet</label>
		</div>
		<div class='wd-main-row-td'>
			<input type="text" name="oo_spec_sheet" value="<?php if ( ! empty ( $oo_spec_sheet ) ) echo esc_attr ( $oo_spec_sheet );  ?>" />
		</div>					
	</div>
</div>
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
<div class='wd-meta-main'>
	<div class='wd-main-row'>
			<div class='wd-main-row-td'>
			Cost Range: <select class="wd_cmb2_select" name="oo_product_cost_range" id="oo_product_cost_range">	
				<option value="1" <?php echo $oo_product_cost_range==1 ? 'selected' : ''; ?>>Good</option>
				<option value="2" <?php echo $oo_product_cost_range==2 ? 'selected' : ''; ?>>Better</option>
				<option value="3" <?php echo $oo_product_cost_range==3 ? 'selected' : ''; ?>>Best</option>
			</select>
		</div>	
	</div>
	<div class='wd-main-row'>
		<div class='wd-main-row-td'>
		LED Only: <input type="checkbox" name="oo_product_led" <?php echo ($oo_product_led=='on')? 'checked' : '' ?> >
		</div>			
	</div>
	<div class='wd-main-row'>
		<div class='wd-main-row-td'>
		SMD Only: <input type="checkbox" name="oo_product_smd" <?php echo ($oo_product_smd=='on')? 'checked' : '' ?> >
		</div>			
	</div>		
	<div class='wd-main-row'>
		<div class='wd-main-row-td'>
		Energy Saver Only: <input type="checkbox" name="oo_product_energy_saver" <?php echo ($oo_product_energy_saver=='on')? 'checked' : '' ?> >
		</div>			
	</div>
	<hr />
	<div class='wd-main-row'>
		<div class='wd-main-row-td'>
		Quick Ship Only: <input type="checkbox" name="oo_product_quickship" <?php echo ($oo_product_quickship=='on')? 'checked' : '' ?> >
		</div>			
	</div>	
</div>
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
?>
	<div class='wd-meta-main'>
		<div class='wd-main-row'>
			<div class='wd-main-row-th'>
				<label for='product-status' class="wd-meta-title">Status</label>
			</div>
			<div class='wd-main-row-td'>
				<select class="wd_cmb2_select" name="oo_product_status" id="oo_product_status">	
					<option value="1" <?php echo ($oo_product_status==1) ? 'selected' : ''; ?>>Active</option>
					<option value="0" <?php echo ($oo_product_status==0) ? 'selected' : ''; ?>>Inactive</option>
				</select>
			</div>
		</div>
	</div>
<?php
}
?>