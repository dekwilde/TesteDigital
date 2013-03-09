<?php
session_start();

if ( !isset( $_SESSION['is_admin'] ) ) {
    header( 'location: login.php' );
    die;
} else {
	$admin_id = $_SESSION['admin_id'];
}
?>
