<?php
 function frontend( $atts) {
	 echo $atts[foo];
            echo '<h1>frontend()<h1>';
}
add_shortcode( 'fend', 'frontend' );
?>