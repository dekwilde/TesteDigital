<?php
	require( '../conecta.php' );

	
	$nome 		= $_POST['nome']; 
    $email 		= $_POST['email'];
	$pass 		= $_POST['pass'];
	$plano 		= $_POST['plano'];
	
	if($nome == null || $email == null || $pass == null) {
		?>
			<script type="text/javascript" charset="utf-8">
				history.back();
			</script>
		<?php
		die;
	}
	
		
	$sql = "INSERT INTO admin (

										nome,
										email,
										pass,
										plano
							) VALUES (
										'$nome',
										'$email',	
										'$pass',	
										'$plano'
	                              );";



	mysql_query( $sql, $conn ) or die( "Nao foi possível adicionar a  base de dados! Erro: " . mysql_error() );
	echo "<script> alert('Efetuado com sucesso');</script>";
?>
<?php
	require("header.php");
?>
	<body>	 
		<div id="layout">
			<div id="header-wrapper" style="background-position: 0px -50px; background-repeat: repeat-x;">
				<div id="header" style="height:100px">					
					<div id="launcher-wrapper" class="fixed">
						<div class="logo">
							<a href="index.html"><img src="_content/blank-logo.png" alt="" /></a>
						</div>
						
						<div class="launcher" style="margin-top:40px">
							<h1>Cadastro de Administrador</h1>
						</div>
					</div>
				</div>
			</div>
			
			<div class="page fixed">
				<div id="sidebar">
					<div id="navigation">
						<p style="margin:15px; margin-bottom:0px"></p>
					</div>
				</div>
				
				<div id="content" class="form-elements">
						<h1>Confirmado</h1>
						<p>
							Seu cadastro foi efetuado com sucesso.<br>
							Um email foi enviado para você como lembrete com seus dados de acesso. Verifique sua caixa de spam caso não tenha recebido.
						</p>
						
						<?php if($plano == "standard") {
						?>
							<h3>
								Para finalizar o seu cadastro no plano Standard, você deve efetuar o login no sistema e seguir os passos descritos no seu perfil de conta.<br>
								Ou entre em contato por skype com a equipe de vendas, skype: TesteDigital<br>
								Obrigado.
							</h3>
						<?php	
						} else { ?>
							<h3>
								Para completar o seu cadastro, basta efetuar o login no sistema e e preencher todos os campos no perfil.<br>
								Você já pode usar o sistema.<br>
								Obrigado.
							</h3>
						<?php
						}?>
						<div class="hr"></div>
						<a href="login.php" class="button-green arrow" >ENTRAR<span></span></a>
						
				
				</div><!-- end content -->
			</div>
		</div> 
	</body>	
</html>



