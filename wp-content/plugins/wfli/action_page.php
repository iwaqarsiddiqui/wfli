<?php
 function new_link_displayb() {
	 global $wpdb;
echo "buzzinga";
	if ( isset( $_POST['submit'] ) ){
		echo "hello";
		$wpdb->insert( 'oo_baba', array(
			'id' => $_POST['id'], 
			'Name' => $_POST['Name']));
	}
 }
?>