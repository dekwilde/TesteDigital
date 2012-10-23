<?php
	session_start();
	session_unset();
	session_destroy();
	session_write_close();
	$_SESSION['is_logado'] = null;
	$_SESSION['user_id'] = null;
	header( 'location: login.php' );
?>