<?php 
	session_start();
	require( 'conecta.php' );
	

	$id = $_SESSION['user_id']; // get session start. . .
	
	$minutes=	$_POST["minutes"];
	$hours = 	$_POST["hours"];

	$sql = "UPDATE user SET
								minutes = 	'" . $minutes . "',
								hours= 		'" . $hours . "'
						
						WHERE id='" . $id . "'";	

	mysql_query( $sql, $conn ) or die( "Nao foi possível adicionar a  base de dados! Erro: " . mysql_error() );													
?>
