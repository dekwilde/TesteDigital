<?php
/* Load the tfuse class. */
require_once( TEMPLATEPATH . '/library/tfuse.php' );

/* Initialize the tfuse framework. */
$tfuse = new tfuse();
$tfuse->init();

define( 'PREFIX', $tfuse->prefix );

if ( isset($_GET['color']) ) $style = $_GET['color'];
else $style = '';

$styles_directory = get_template_directory()."/styles/";
$styles_directory_uri = get_template_directory_uri()."/styles/";  

if( is_file( $styles_directory . $style .'.css' ) ) { 
	setcookie(PREFIX . '_style_demo', $style.".css", time()+3600, '/');
}

add_theme_support( 'post-thumbnails' );

// Disable Admin Bar for all users
add_filter('show_admin_bar', '__return_false');
?>