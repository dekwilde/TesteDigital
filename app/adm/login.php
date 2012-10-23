<?php

session_start();

$login =  isset( $_POST['login'] ) ? $_POST['login'] : '' ;
$senha =  isset( $_POST['senha'] ) ? $_POST['senha'] : '' ;


    
if ( $login == 'root' && $senha = 'prova@100' ) {
    $_SESSION['is_admin'] = 1;
    header( 'location: home.php' );
    die;
} else {
	header( 'location: index.php' );
    die( "Usuário inválido" );
}


?>
