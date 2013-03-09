<?php
	require( 'header.php' );
	

	$user_id = $_GET["id"];
	
	$_SESSION['user_id'] = $user_id;
	$_SESSION['is_logado'] = 1;
	
	
	header( 'location: ../cadastro.php?mode=edit' );


	require( 'footer.php' );
?>