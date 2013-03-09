<?php
	require("login-start.php");
	require( '../conecta.php' );
	$category_id 	= $_GET["id"];
	$prova_id 		= $_SESSION["prova_id"]; 	
		
	$quantia 	   	= $_POST['quantia']; 
    $shuf	 		= $_POST['shuf'];



	$sql = "UPDATE prova_category SET
	    shuf 		= $shuf,
		quantia 	= $quantia 


		WHERE category_id = $category_id AND prova_id = $prova_id";

	mysql_query( $sql, $conn ) or die( "Nao foi possível adicionar a  base de dados! Erro: " . mysql_error() );
	echo "<script> alert('enviado com sucesso'); history.back(); </script>";




?>


