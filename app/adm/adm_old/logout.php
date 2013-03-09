<?php
	session_start();
	session_unset();
	session_destroy();
	session_write_close();
	$_SESSION['is_admin'] = null;
	header( 'location: index.php' );
?>