<?php
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);
require( 'conecta.php' );



$nome = $_POST["nome"];
$email = $_POST["email"];
$escola = $_POST["escola"];
$rua = $_POST["rua"];
$numero_casa = $_POST["numero_casa"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cep = $_POST["cep"];
$rg = $_POST["rg"];
$pai = $_POST["pai"];
$mae = $_POST["mae"];
$responsavel = $_POST["responsavel"];
$fone = $_POST["fone"];
$horario = $_POST["horario"];
$amigo = $_POST["amigo"];
$pass = $_POST["pass"];

$sign_day = time(); // buscar o dia e hora atual


$mode = $_GET["mode"];


if($mode == "edit") {
	// colocar update aqui

	if ( !isset( $_SESSION['is_logado'] ) ) {
		header( 'location: login.php' );
		die;
	}
	$user_id = $_SESSION['user_id'];
	
	
	$sql = "UPDATE user SET
								nome = 			'" . $nome . "',
								email = 		'" . $email . "',
								escola = 		'" . $escola . "',
								rua = 			'" . $rua . "',
								numero_casa = 	'" . $numero_casa . "',
							 	bairro= 		'" . $bairro . "',
								cidade = 		'" . $cidade . "',
								estado = 		'" . $estado . "',
								cep = 			'" . $cep . "',
								rg = 			'" . $rg . "',
								pai = 			'" . $pai . "',
								mae = 			'" . $mae . "',
								responsavel = 	'" . $responsavel . "',
								fone = 			'" . $fone . "',
								horario = 		'" . $horario . "',
								amigo = 		'" . $amigo . "',
								pass = 			'" . $pass . "'

						WHERE id='" . $user_id . "'";	

	mysql_query( $sql, $conn ) or die( "Nao foi possível adicionar a  base de dados! Erro: " . mysql_error() );
	
	
	echo "<script type='text/javascript'> alert('Cadastro atualizado com sucesso.');  window.location='user.php'; </script>";
	
} else {
	
	//CHECK double email
	$check = "";
	$sql="SELECT * FROM user";
	$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  ); 
	while ( $row = mysql_fetch_assoc( $rs ) ) {

		$base_email = $row['email'];
		if ($base_email == $email) {
			echo "<script type='text/javascript'> alert('Email j&aacute; existe na base de dados. Por favor, escolha outro email ou tente recuperar seu cadastro no setor de login. Obrigado.'); history.back(); </script>";
			$check = false;
			break;
		} else {
			$check = true;
		}
	}
	
	
	if ($check == true) {
	
		$sql = "INSERT INTO user (
		                                nome,
										email,
										escola,
										rua,
										numero_casa,
										bairro,
										cidade,
										estado,
										cep,
										rg,
										pai,
										mae,
										responsavel,
										fone,
										horario,
										amigo,
										pass,
										sign_day
		                          ) VALUES (
		                                '" . $nome .  "',
										'" . $email .  "',
										'" . $escola .  "',
										'" . $rua .  "',
										'" . $numero_casa .  "',
										'" . $bairro .  "',
										'" . $cidade .  "',
										'" . $estado .  "',
										'" . $cep ."',
										'" . $rg .  "',
										'" . $pai .  "',
										'" . $mae .  "',
										'" . $responsavel .  "',
										'" . $fone .  "',
										'" . $horario .  "',
										'" . $amigo .  "',
										'" . $pass .  "',
										'" . $sign_day .  "'
		                          );";

		mysql_query( $sql, $conn ) or die( "Nao foi possível adicionar a  base de dados! Erro: " . mysql_error() );



		// envia email
		require("email_header.php");

		$txt_horario = "";
		if ($horario == "manha") {
			$txt_horario = "Manhã: das 9h30 às 12h.";
		}
		if ($horario == "tarde") {
			$txt_horario = "Tarde: das 14h às 16h30.";
		}

		$message = "<table width='720' border='0' align='center' cellpadding='0' cellspacing='0'>
		  <tr><td><img src='$linktop' width='720' height='200'></td></tr>
		  <tr>
		    <td height='300' align='center' bgcolor='#FFFFFF'>
				<font color='#000000' face='Arial' >
					<div style='padding:5%; width:90%; float:left; background-color:#CCC;'>
						<p style='color:#555555'>Obrigado.</p>
			        	<p style='color:#555555'>Seu cadastro foi confirmado.</p> 
						<p style='color:#555555'>Seu dados de acesso são:</p>
			            <p>Email: <strong>$email</strong></p>
			            <p>Senha: <strong>$pass</strong></p>
					</div>

					<div style='padding:5%; width:90%; float:left; background-color:#ddd;'>
						<h3 style='margin:0px; padding:0px; color:#888888'>PROVAS ON-LINE</h3>
						<strong style='color:#555555'>30 ou 31 de Agosto /<br>01 ou 02 de Setembro</strong>
						<h5 style='margin:0px; padding:0px;'>escolha uma das datas</h5>
						<br>
						<br>
						<h3 style='margin:0px; padding:0px; color:#888888'>PROVA PRESENCIAL</h3>
						<strong style='color:#555555'>15 de Setembro</strong>
						<h4 style='margin:0px; padding:0px; color:#555555'>Horário da sua prova presencial:</h4>
						<strong>$txt_horario</strong><br>
					</div>

					<div style='padding:5%; width:90%; float:left; background-color:#fff; font-size:11px'>
						<span style='color:#555555'>O local para a realização da prova presencial<br> 
						será na unidade do Liceu Albert Sabin, no endereço:<br>
						<h4 style='margin:0px; padding:0px; color:#000'>Rua José Curvelo da Silva Jr., 110 - Jd. Califórnia - Ribeirão Preto.</h4><br>
						Telefone de contato:<br> 
						<h4 style='margin:0px; padding:0px; color:#000'>16 3602-8200</h4>
						</span>
					</div>
				</font>
		    </td>
		  </tr>
		  <tr><td><img src='$linkbotton' width='720' height='50'></td></tr>
		</table>
		";

		mail($email, $subject, $message, $headers);

		$sql="SELECT * FROM user WHERE email='$email'";
		$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );	
		$row = mysql_fetch_assoc($rs);
		$user_id = $row['id'];
		$_SESSION['is_logado'] = 1;
		$_SESSION['user_id'] = $user_id;



		echo "	<script type='text/javascript'> 
					window.open('http://www.liceuasabin.net/vestibulinho/post.php', 'sharer','toolbar=0,status=0,width=800,height=450'); 

					alert('Cadastro efetuado com sucesso'); 

					window.location='user.php'; 
				</script>";

	}

}




