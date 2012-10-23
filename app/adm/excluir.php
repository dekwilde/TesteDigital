<?php

session_start();
if ( !isset( $_SESSION['is_admin'] ) ) {
    header( 'location: index.php' );
    die;
}


require( '../conecta.php' );




$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
$db = isset( $_GET['db'] ) ? $_GET['db'] : '';

    
$sql = "DELETE FROM " . $db . " WHERE id = '" . $id . "'";
        
mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  ); 

echo "excluido com sucesso. <a href='javascript:history.back()'> VOLTAR</a>";
die;

