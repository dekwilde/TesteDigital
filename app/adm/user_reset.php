<?php
	require( 'header.php' );
	

	$user_id = $_GET["id"];


	$sql = "UPDATE user SET
								acertos = null,
								minutes = null,
								hours = null

						WHERE id='" . $user_id . "'";	

	mysql_query( $sql, $conn ) or die( "Nao foi possível adicionar a  base de dados! Erro: " . mysql_error() );
    


	echo "	<script type='text/javascript'> 
				alert('Efetuado com sucesso'); 

				window.location='home.php'; 
			</script>";

	require( 'footer.php' );
?>