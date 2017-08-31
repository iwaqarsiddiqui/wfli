<?php
/*
Plugin Name: Luminaire Selector
Plugin URI:  http://www.pluginurl.dev
Description: Site Plugin to hold funcions used on Your Site.
Version:     1
Author:      Muhammad Yamin
Author URI:  http://mitchcanter.com
Text Domain: mitch-demo
*/

/**
 * Initialize and run setup options on after_theme_setup hook *
 */
 
	register_activation_hook( __FILE__, 'jal_install' );
	include 'backend/sql/database.php';
	include 'backend/backend.php';
	//include 'backend/function.php';
	//include 'backend/views/product.php';
	//include 'backend/sql_insert.php';
?>