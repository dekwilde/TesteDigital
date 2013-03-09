<?php
session_start();
require( 'conecta.php' );


$user_email = $_POST['email_user'];
$user_pass = $_POST['pass_user'];

$sql="SELECT * FROM user";

$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  ); 

$status = "";
while ( $row = mysql_fetch_assoc( $rs ) ) {
    $user_id = $row['id'];
	$login_email = $row['email'];
	$login_pass  = $row['pass'];

	
	if ($user_email == $login_email && $user_pass == $login_pass) {
		$_SESSION['is_logado'] = 1;
		$_SESSION['user_id'] = $user_id;
        header( 'location: user.php' );
		//$status = "login correto";	
		break;
	} else {
		$status = "<script type='text/javascript'> alert('Email ou senha incorretos. Tente novamente.'); history.back(); </script>";
	}
}
echo $status;

?>
