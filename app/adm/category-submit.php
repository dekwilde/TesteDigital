<?php
	require("login-start.php");
	require("../conecta.php"); 	
?>
<?php
	$mode = $_GET["mode"];
	$id = $_GET["id"];
?>
<?php
	
	$parent 		= $_POST['parent']; 
    $nome 			= $_POST['nome'];
	$permalink 		= $_POST['permalink'];
	$quantia 		= $_POST['quantia'];
	$shuf 			= $_POST['shuf'];
	$category_id 	= $_POST['category_id'];
	
	$prova_id 	= $_SESSION["prova_id"];
	       


    if (!isset($category_id)) {
		
		// check if the category exist

		$sql="SELECT * FROM category WHERE nome='$nome'";

		$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  ); 

		$row = mysql_fetch_assoc( $rs );    
	   	$nome_base = $row['nome'];

		if ($nome_base == $nome) {
			$error_txt = "Esta categoria já existe. ";
			if ($mode== "edit") {
			 	$error_txt .= "Você pode selecionar ela na lista pré cadastrada. ";
			}
			
			echo "<script> alert('$error_txt'); history.back(); </script>";  
			break;
		} else {
			$sql = "INSERT INTO category (

												parent,
												nome,
												permalink
									) VALUES (
												'$parent',
												'$nome',	
												'$permalink'
			                              );";


			mysql_query( $sql, $conn );
		} 

	}

	
	if($mode == "edit") {  
			

    	if (!isset($category_id)) { 
			$sql ="SELECT id FROM category WHERE nome = '$nome' AND permalink = '$permalink'";
			$rs = mysql_query( $sql, $conn ) or die( "Nao foi possível adicionar a  base de dados! Erro: " . mysql_error() );    
			$row = mysql_fetch_assoc($rs);
			$category_id = $row["id"]; 
		}                              
		$sql = "INSERT INTO prova_category (
											prova_id,
											category_id,
											quantia,
											shuf								
									  ) VALUES (
											'$prova_id',
											'$category_id',	
											'$quantia',
											'$shuf'
		                              );";

		mysql_query( $sql, $conn ) or die( "Nao foi possível adicionar a  base de dados! Erro: " . mysql_error() );
 		

	}
	
	
	echo "<script> alert('Efetuado com sucesso');</script>";
	
	if($mode == "edit") {
	  	echo "<script>window.location.href='prova-category-list.php?mode=$mode'</script>";  
	}  else {
		echo "<script>window.location.href='category-list.php'</script>";
	}
	
?>
<?php
	require("header.php");
?>




