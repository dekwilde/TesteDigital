<?php
	require("login-start.php");
	require( '../conecta.php' );
	$mode 	= $_GET["mode"];
	$id 	= $_SESSION["prova_id"];
	
		
	$nome 			= $_POST['nome']; 
    $permalink 		= $_POST['permalink'];
	$tempo_h 		= $_POST['tempo_h'];  
	$tempo_m 		= $_POST['tempo_m'];  
	$inicio 		= $_POST['inicio'];
	$inicio_h 		= $_POST['inicio_h'];
	$inicio_m 		= $_POST['inicio_m'];
	
	$termino 		= $_POST['termino'];
	$termino_h 		= $_POST['termino_h'];
	$termino_m 		= $_POST['termino_m'];    	
	
	$header_img 	= $_POST['header_img'];
	$header_cor 	= $_POST['header_cor'];
	$header_align 	= $_POST['header_align'];
	$footer_img 	= $_POST['footer_img'];
	$footer_cor 	= $_POST['footer_cor'];
	$footer_align 	= $_POST['footer_align'];
	$logo 			= $_POST['logo'];
	$regulamento 	= $_POST['regulamento'];
	$faq 			= $_POST['faq'];
	$home_img		= $_POST['home_img'];
	$home_txt		= $_POST['home_txt'];
	$txt_desc		= $_POST['txt_desc'];
	
	

	if($mode == "new") {	
		
		$sql = "INSERT INTO prova_id (

                                admin_id,
								nome, 
							    permalink,
								tempo_h, 
								tempo_m, 
								inicio,
								inicio_h,
								inicio_m,

								termino,
								termino_h,
								termino_m,    	

								header_img,
								header_cor,
								header_align,
								footer_img,
								footer_cor,
								footer_align,
								logo,
								regulamento,
								faq,
								home_img,
								home_txt,
								txt_desc 
							) VALUES (
								'$admin_id',
								'$nome', 
							    '$permalink',
								'$tempo_h', 
								'$tempo_m', 
								'$inicio',
								'$inicio_h',
								'$inicio_m',

								'$termino',
								'$termino_h',
								'$termino_m',    	

								'$header_img',
								'$header_cor',
								'$header_align',
								'$footer_img',
								'$footer_cor',
								'$footer_align',
								'$logo',
								'$regulamento',
								'$faq',
								'$home_img',
								'$home_txt',
								'$txt_desc'
	                              );";
	}
	
	if($mode == "edit") {
		$sql = "UPDATE prova_id SET
			nome 			= '$nome', 
		    permalink 		= '$permalink',
			tempo_h 		= '$tempo_h',  
			tempo_m 		= '$tempo_m',  
			inicio 			= '$inicio',
			inicio_h 		= '$inicio_h',
			inicio_m 		= '$inicio_m',

			termino 		= '$termino',
			termino_h 		= '$termino_h',
			termino_m 		= '$termino_m',    	

			header_img 		= '$header_img',
			header_cor 		= '$header_cor',
			header_align 	= '$align',
			footer_img 		= '$footer_img',
			footer_cor 		= '$footer_cor',
			footer_align 	= '$footer_align',
			logo 			= '$logo',
			regulamento 	= '$regulamento',
			faq 			= '$faq',
			home_img		= '$home_img',
			home_txt		= '$home_txt',
			txt_desc		= '$txt_desc'

			WHERE id=$id AND admin_id=$admin_id";
	}


	mysql_query( $sql, $conn ) or die( "Nao foi possível adicionar a  base de dados! Erro: " . mysql_error() );
	echo "<script> alert('enviado com sucesso'); window.location='prova-list.php';</script>";




?>


