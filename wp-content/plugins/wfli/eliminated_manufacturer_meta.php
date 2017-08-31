
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
<div class='wd-meta-main'>
	<div class='wd-main-row'>

		<div class='wd-main-row-td'>
			<select class="wd_cmb2_select" name="oo_product_manufacturer" id="oo_product_manufacturer">	
		<option value="00">Select Manufacturers</option>
			<?php 
				foreach ($oo_product_spe as $manufacturer){
					$oo_selected='';
					if (in_array($manufacturer->ID, $oo_product_selected_manufacturer)){
						$oo_selected='selected';
					}
			?>
				<option value="<?php echo $manufacturer->ID; ?>" <?php echo $oo_selected; ?>><?php echo $manufacturer->post_title; ?></option>
			
			<?php		
				}
			?>
			</select>
		</div>			
	</div>
</div>
<?php
}