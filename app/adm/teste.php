<?php
	require("../conecta.php"); 

$nome = "Baboseiras";                                                        

$sql ="SELECT id FROM category WHERE nome = '$nome'";
$rs = mysql_query( $sql, $conn ) or die( "Nao foi possível adicionar a  base de dados! Erro: " . mysql_error() );    
$row = mysql_fetch_assoc($rs);
$category_id = $row["id"];
echo $category_id;
?>