<?php


$to = $_POST['email'];

require( '../conecta.php' );

$sql ="SELECT * FROM admin WHERE email ='" . $to . "'";

$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  ); 

$row = mysql_fetch_assoc( $rs );

$senha = $row['pass'];

echo $senha;
/*      

require("email_header.php");

$message = "<table width='720' border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr><td><img src='$linktop' width='720' height='200'></td></tr>
  <tr>
    <td height='300' align='center' bgcolor='#FFF'>
    	<font color='#000' face='Arial'>
        	<p>Obrigado.</p>
        	<p>Sua senha foi recuperada!</p>
            <p>Email: <strong>$to</strong></p>
            <p>Senha: <strong>$senha</strong></p>
        </font>
    </td>
  </tr>
  <tr><td><img src='$linkbotton' width='720' height='50'></td></tr>
</table>
";

mail($to, $subject, $message, $headers);

echo" <script>alert('Um e-mail foi enviado para você. Obrigado.'); window.location.href='login.php' </script> ";


*/
?>
