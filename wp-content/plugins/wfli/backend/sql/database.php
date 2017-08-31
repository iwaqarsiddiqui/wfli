<?php
function jal_install() {
	global $wpdb;
	global $jal_db_version;
	$charset_collate = $wpdb->get_charset_collate();
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	$oo_categories = $wpdb->prefix . 'oo_categories';

	$sql = "CREATE TABLE $oo_categories (
	category_id int(15) NOT NULL,
	name varchar(50) DEFAULT NULL,
	slug char(50) DEFAULT NULL,
	description varchar(150) DEFAULT NULL,
	PRIMARY KEY (category_id)
	) $charset_collate;";

	dbDelta( $sql );

	$oo_speciality = $wpdb->prefix . 'oo_speciality';

	$sql = "CREATE TABLE $oo_speciality (
	speciality_id int(15) NOT NULL,
	title varchar(15) DEFAULT NULL,
	description varchar(150) DEFAULT NULL,
	status binary(1) DEFAULT NULL,
	PRIMARY KEY (speciality_id)
	) $charset_collate;";

	dbDelta( $sql );

	$oo_manufacturer = $wpdb->prefix . 'oo_manufacturer';

	$sql = "CREATE TABLE $oo_manufacturer (
	manufacturer_id int(15) NOT NULL,
	speciality_fk int(15) DEFAULT NULL,
	name varchar(15) DEFAULT NULL,
	images varchar(150) DEFAULT NULL,
	weblinks varchar(150) DEFAULT NULL,
	description varchar(50) DEFAULT NULL,
	cost_range int(15) DEFAULT NULL,
	status binary(1) DEFAULT NULL,
	PRIMARY KEY (manufacturer_id),
	FOREIGN KEY (speciality_fk) REFERENCES $oo_speciality(speciality_id)
	) $charset_collate;";

	dbDelta( $sql );

	$oo_pr_extras = $wpdb->prefix . 'oo_pr_extras';

	$sql = "CREATE TABLE $oo_pr_extras (
	extra_id int(15) NOT NULL,
	quick_ship binary(15) DEFAULT NULL,
	count_wishlist int(10) DEFAULT NULL,
	count_project int(10) DEFAULT NULL,
	count_product int(10) DEFAULT NULL,
	PRIMARY KEY (extra_id)
	) $charset_collate;";

	dbDelta( $sql );

	$oo_product = $wpdb->prefix . 'oo_product';

	$sql = "CREATE TABLE $oo_product (
	product_id int(10) NOT NULL,
	manufacturer_fk int(15) DEFAULT NULL,
	extra_fk int(15) DEFAULT NULL,
	img varchar(150) DEFAULT NULL,
	url varchar(150) DEFAULT NULL,
	spec_sheet varchar(150) DEFAULT NULL,
	model_number int(15) DEFAULT NULL,
	fixture varchar(15) DEFAULT NULL,
	watt int(10) DEFAULT NULL,
	title varchar(50) DEFAULT NULL,
	volt int(10) DEFAULT NULL,
	sku varchar(20) NOT NULL,
	is_featured binary(20) DEFAULT NULL,
	int_or_ext binary(20) DEFAULT NULL,
	categories char(15) DEFAULT NULL,
	PRIMARY KEY (product_id),
	FOREIGN KEY (manufacturer_fk) REFERENCES $oo_manufacturer(manufacturer_id),
	FOREIGN KEY (extra_fk) REFERENCES $oo_pr_extras(extra_id)
	)$charset_collate;";

	dbDelta( $sql );

	$oo_project = $wpdb->prefix . 'oo_project';

	$sql = "CREATE TABLE $oo_project (
	project_id int(15) NOT NULL,
	product_fk int(15) DEFAULT NULL,
	manufacturer varchar(20) DEFAULT NULL,
	project_name varchar(15) DEFAULT NULL,
	quantity int(5) DEFAULT NULL,
	comment varchar(150) DEFAULT NULL,
	PRIMARY KEY (project_id),
	FOREIGN KEY (product_fk) REFERENCES $oo_product(product_id)
	) $charset_collate;";

	dbDelta( $sql );

	$oo_wishlist = $wpdb->prefix . 'oo_wishlist';

	$sql = "CREATE TABLE $oo_wishlist (
	wishlist_id int(15) NOT NULL,
	product_fk int(15) DEFAULT NULL,
	manufacturer varchar(20) DEFAULT NULL,
	PRIMARY KEY (wishlist_id),
	FOREIGN KEY (product_fk) REFERENCES $oo_product(product_id)
	)$charset_collate;";

	dbDelta( $sql );

	add_option( 'jal_db_version', $jal_db_version );
}
?>