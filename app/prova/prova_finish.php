<?php 
	header("Content-Type: text/html; charset=utf-8",true);
	session_start();
	if ( !isset( $_SESSION['is_logado'] ) ) {
		header( 'location: login.php' );
		die;
	}


	require( 'conecta.php' );
	$user_id = $_SESSION['user_id'];
	
	
	// CHECK IF USER HAVE FINISH FROM ANOTHER BROWSER
	$sql="SELECT * FROM user WHERE id=$user_id";
	$rs = mysql_query( $sql, $conn ) or die( 'Selecionar usuario: ' . mysql_error());
	$row = mysql_fetch_assoc( $rs );
	$pontos = $row["acertos"];
	$to= $row["email"];
	
	if (isset($pontos)) {
		echo "<script type='text/javascript'> alert('Você já finalizou sua prova anteriormente.'); window.location.href = 'prova_nota.php'; </script>";
		die;
	}
	
	

	$sql="SELECT * FROM prova WHERE user_id=$user_id";
	$rs = mysql_query( $sql, $conn ) or die( 'Selecionar questoes: ' . mysql_error()  );

	$pontos = 0;
	while($row = mysql_fetch_assoc( $rs )) {
		$user_question = $row["question_id"];
		$user_resp = $row["resp"];
		//echo "resposta user $user_resp <br>";
		
		
		$sql2="SELECT * FROM questions WHERE id=$user_question";
		$rs2 = mysql_query( $sql2, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
		$row2 = mysql_fetch_assoc( $rs2 );
		$correct_resp = $row2["resposta"];
		
		//echo "resposta certa $correct_resp <br><br>";
		
		
		if ($user_resp == $correct_resp) {
			$pontos = $pontos + 1;
		}
	}
	
	//echo "$pontos";
	
	
	$sql = "UPDATE user SET
				acertos = '$pontos'
			WHERE id='$user_id'";	

	mysql_query( $sql, $conn ) or die( "Nao foi possível adicionar a  base de dados! Erro: " . mysql_error() );



	session_unset();
	session_destroy();
	session_write_close();
	$_SESSION['is_logado'] = null;
	$_SESSION['user_id'] = null;
	
	
	
	
	
	
	// envia email
	require("email_header.php");

	$message = "<table width='720' border='0' align='center' cellpadding='0' cellspacing='0'>
	  <tr><td><img src='$linktop' width='720' height='200'></td></tr>
	  <tr>
	    <td height='300' align='center' bgcolor='#FFF'>
	    	<font color='#000' face='Arial'>
				<div style='padding:5%; width:90%; float:left; background-color:#CCC;'>        	
					<p>Sua prova foi concluída.</p>
				</div>
				<div style='padding:5%; width:90%; float:left; background-color:#ddd;'>
					<p>Sua pontuação foi:</p>
					<h1>$pontos</h1>
					<p>DE 20 QUESTÕES TOTAIS.</p>
				</div>
				<div style='padding:5%; width:90%; float:left; background-color:#fff; font-size:11px'>
					<p>Aguarde, em breve entraremos em contato informando sua colocação. Obrigado!</p>
				</div>
	        </font>
	    </td>
	  </tr>
	  <tr><td><img src='$linkbotton' width='720' height='50'></td></tr>
	</table>
	";

	mail($to, $subject, $message, $headers);
	
		
	
	echo "<script type='text/javascript'> alert('Sua prova foi finalizada.');</script>";
?>

<?php require( 'header.php' ); ?>
<body>
	<?php require( 'template_header.php' ); ?>
	<div id="content">	
		<div id="user" style="text-align:center">
			<p>Voc&ecirc; pode fazer seu login novamente e verificar quantos pontos voc&ecirc; fez na prova. Em breve entraremos em contato para informar sua coloca&ccedil;&atilde;o.</p><br>
			<p><strong>Boa sorte!</strong></p><br><br>
			<a href="login.php" class='bt_user' style="float:none; margin-left:auto; margin-right:auto;">in&iacute;cio</a>
		</div>
	</div>
	<div style="position:fixed; left:0px; bottom:0px; width:100%">
		<?php require( 'template_footer.php' ); ?>
	</div>
</body>


<?php require( 'footer.php' ); ?>