<?php 
	session_start();
	require( 'conecta.php' );

	$question 	= 	$_POST["question"];
	$user_id 	= 	$_SESSION['user_id'];
	

	$sql = "UPDATE prova SET
							  status = 'true'
			
						WHERE user_id='$user_id' AND question_id='$question'";	

	mysql_query( $sql, $conn ) or die( "Nao foi possível adicionar a  base de dados! Erro: " . mysql_error() );													
?>
