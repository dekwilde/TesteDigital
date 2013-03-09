<?php
session_start();

if ( !isset( $_SESSION['is_admin'] ) ) {
    header( 'location: index.php' );
    die;
}
require( '../conecta.php' );


?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1">
	<title>ADMIN VESTIBULINHO LICEU A SABIN</title>
	
	 <script>
	    function confirma_deletar() {
	        return confirm( 'Tem certeza que deseja excluir?' );
	    }
	</script>
	<style type="text/css" media="screen">
		body {
			font-family: Arial, "MS Trebuchet", sans-serif;
			font-size: 11px;
		}
		table {
			font-size: 11px;
		}
		#center {
			width:900px;
			margin-left:auto;
			margin-right:auto;
		}
	</style>
	
	<script type="text/javascript"  src="ckeditor/ckeditor.js"></script>
		
</head>
<body id="index">
	<div id="center">
		<a href="logout.php" style="float:right">[ SAIR X ]</a>
		<h2>ADMINISTRATIVO VESTIBULINHO - LICEU ALBERT SABIN</h2>
		<div id="menu">
			<a href="home.php">Usu&aacute;rios</a>
			<a href="questions.php">Quest&otilde;es</a>
		</div>