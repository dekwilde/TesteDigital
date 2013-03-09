<?php
	session_start();

	if ( !isset( $_SESSION['is_admin'] ) ) {
	    header( 'location: index.php' );
	    die;
	}

	require( '../conecta.php' );


	
	$mode 	= $_GET["mode"];
	$id 	= $_GET["id"];
	
	$categoria 	= $_POST['categoria']; 
    $pergunta 	= $_POST['pergunta'];
	$alt1 		= $_POST['alt1'];
	$alt2 		= $_POST['alt2'];
	$alt3 		= $_POST['alt3'];
	$alt4 		= $_POST['alt4'];
	$alt5 		= $_POST['alt5'];
	$resp 		= $_POST['resp'];
	
	

	if($mode == "new") {	
		
		$sql = "INSERT INTO questions (


										tipo,
										pergunta,
										alt1,
										alt2,
										alt3,									
										alt4,
	                                    alt5,
										resposta
							) VALUES (
										'$categoria',
										'$pergunta',	
										'$alt1',	
										'$alt2',	
										'$alt3',									
	                                    '$alt4',
										'$alt5',
	                                    '$resp'
	                              );";
	}
	
	if($mode == "edit") {
		$sql = "UPDATE questions SET


									tipo= 		'$categoria',
									pergunta= 	'$pergunta',	
									alt1= 		'$alt1',
									alt2= 		'$alt2',
									alt3= 		'$alt3',							
									alt4= 		'$alt4',
									alt5= 		'$alt5',
									resposta= 	'$resp'

								WHERE id='$id'";
	}


	mysql_query( $sql, $conn ) or die( "Nao foi possível adicionar a  base de dados! Erro: " . mysql_error() );
	echo "<script> alert('enviado com sucesso'); window.location='questions.php';</script>";




?>


