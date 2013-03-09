<?php
session_start();
require( '../conecta.php' );


$user_email = $_POST['email'];
$user_pass = $_POST['pass'];

$sql="SELECT * FROM admin";

$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  ); 

$status = "";
while ( $row = mysql_fetch_assoc( $rs ) ) {    
	$login_email = $row['email'];
	$login_pass  = $row['pass'];

	
	if ($user_email == $login_email && $user_pass == $login_pass) {
		$_SESSION['is_admin'] = 1;
		$_SESSION['admin_id'] = $row['id'];
        header( 'location: index.php' );	
		break;
	} else {
		header( 'location: login.php?status=error' );
	}
}
?>
