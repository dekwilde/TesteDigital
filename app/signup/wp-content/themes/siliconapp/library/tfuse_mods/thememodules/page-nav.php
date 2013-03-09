<?php 

function default_menu() {
	return '';
}

wp_nav_menu( array('depth' => 1, 'container_class' => '', 'menu_class' => 'main_menu', 'menu_id' => '', 'fallback_cb' => 'default_menu', 'theme_location' => 'primary' ) );

/* Add last_item class to last li in wp_nav_menu lists*/
function add_last_item_class($strHTML) {
	echo $strHTML;
}

?>