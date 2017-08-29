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
 include 'database.php';
 register_activation_hook( __FILE__, 'jal_install' );
 include 'action_page.php';
 include 'frontend.php';
 function new_link_display() {
	 new_link_displayb();
	echo "Echo html code for the page1";
	echo '
	<form name="submit" action="" method="post">
	  Id:<br>
	  <input type="text" name="id">
	  <br>
	  Name:<br>
	  <input type="text" name="Name">
	  <br><br>
	  <input type="submit" name="submit">
	</form>';
			
	
}

 function new_link_display2() {
            echo "Echo html code for the page2";
}
add_action('admin_menu', 'my_menu_pages');
function my_menu_pages(){
    add_menu_page('My Page Title', 'My Menu Title', 'manage_options', 'my-menu', 'new_link_display' );
    add_submenu_page('my-menu', 'Submenu Page Title', 'Whatever You Want', 'manage_options', 'my-menu' );
    add_submenu_page('my-menu', 'Submenu Page Title2', 'Whatever You Want2', 'manage_options', 'my-menu2' );
}
?>