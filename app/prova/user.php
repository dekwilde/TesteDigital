<?php
	session_start();
	if ( !isset( $_SESSION['is_logado'] ) ) {
		header( 'location: login.php' );
		die;
	}
	$user_id = $_SESSION['user_id'];
?>
<?php require( 'header.php' ); ?>
<?php require( 'conecta.php' ); ?>

<?php
	$sql="SELECT * FROM user WHERE id='" . $user_id . "'";
	$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
	$row = mysql_fetch_assoc( $rs );	
	$nome = $row['nome'];
	$email = $row['email'];
	$login = $row['login'];
	$acertos = $row['acertos'];
?>
<body>
	<?php require( 'template_header.php' ); ?>

	<div id="content">
		
		<div id="user">
			
			<div id="user_header">
				<h4 style="float:left; width:460px">Bem-vindo, <?php $utf8_nome = utf8_encode($nome); echo $utf8_nome ?></h4>
				<a class="btclose" style="position:relative;" onClick="return logOut();" href="logout.php">[ X SAIR ]</a>
				<a class="btclose" style="position:relative; margin-right:20px;" href="cadastro.php?mode=edit">[ EDITAR CADASTRO ]</a>
				
			</div>
			<div id="user_info_menu" style="float:right; width:200px">

				<h3 style="margin:0px; padding:0px; color:#555">PROVAS ON-LINE</h3>
				<strong style="color:#555">30 ou 31 de Agosto /<br>01 ou 02 de Setembro</strong>
				<font style='margin-bottom:10px; padding:0px; width:100%; float:left'>escolha uma das datas</font>

				<h3 style="margin:0px; padding:0px; color:#555">PROVA PRESENCIAL</h3>
				<strong style="color:#555">15 de Setembro</strong>

				<br>
				<h3>Menu de Informa&ccedil;&otilde;es:</h3>
				<ul id="menu_user">
					<li><a href="media/suporte.htm" target="_blank" id="bt_user_menu">Suporte e D&uacute;vidas Frequentes</a></li>
					<li><a href="media/regulamento.htm" target="_blank" id="bt_user_menu">Regulamento</a></li>
					<li><a href="https://maps.google.com.br/maps?q=Organiza%C3%A7%C3%A3o+Educacional+Albert+Sabin+%2F+Bar%C3%A3o+de+Mau%C3%A1+unidade+Independ%C3%AAncia&hl=pt-BR&ie=UTF8&cid=5712916166128097638&gl=BR&t=h&z=16&iwloc=A" target="_blank">Local da prova presencial</a></li>
				</ul>
			</div>
			
			<div id="user_info" style="float:left; width:460px">
			<?php
			
			// Condição e regras de período de realização da prova
			require( 'timer_cadastro.php' );
			if(isset($acertos)) {
				echo "<p>Voc&ecirc; j&aacute; finalizou a prova.</p> 
					<a href='prova_nota.php' class='bt_user'>Visualizar pontua&ccedil;&atilde;o</a>";
			} else {
				if ($user_able == true) {
						if(isset($login)) {
							echo "<div id='bt_change'><a href='prova.php' class='bt_user' onclick='doLoading(this);' >Continuar prova</a></div>";
						} else {
							echo "<div id='bt_change'><a href='prova.php' class='bt_user' onclick='doLoading(this);'>Iniciar prova</a></div>";
						}
				} else {
					if ($difference_start>0) {
						echo "<p>Sua inscri&ccedil;&atilde;o foi realizada com sucesso.<br> 
						Caso n&atilde;o receba o email de confirma&ccedil;&atilde;o verifique na caixa de spam.<br>
						A prova ainda n&atilde;o come&ccedil;ou. Fique atento aos dias corretos para a realiza&ccedil;&atilde;o das provas on-line e presencial.<br><br><strong>Faltam: $days_start dia(s) e $hours_start hora(s)</strong><br>para dar in&iacute;cio ao per&iacute;odo de realiza&ccedil;&atilde;o da prova ON-LINE</p>";
					}
					if ($difference_init<0) {
						echo "<p>Voc&ecirc; se inscreveu no per&iacute;odo de realiza&ccedil;&atilde;o da prova ON-LINE, por isso voc&ecirc; n&atilde;o pode mais realiza-la, mas voc&ecirc; ainda pode fazer a prova presencial, informe-se corretamente sobre a data e o local.</p>";
					}
					if ($difference_end<0) {
						echo "<p>Voc&ecirc; n&atilde;o pode mais fazer a prova ON-LINE, per&iacute;odo de realiza&ccedil;&atilde;o da prova expirado.</p>";
					}
				}
			}
			?>
			</div>
		
			<a href="https://apps.facebook.com/liceuasabin/" target="_blank" style="margin-top:20px; margin-bottom:20px; float:left"><img src="media/banner_dicas.jpg" border="0" ></a>
			
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=170465813083733";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-like" data-href="https://www.facebook.com/liceuasabin" data-send="true" data-width="450" data-show-faces="true"></div>	
			
			
			
		</div>
	</div>

	<div style="position:fixed; left:0px; bottom:0px; width:100%">
		<?php require( 'template_footer.php' ); ?>
	</div>
</body>
<?php require( 'footer.php' ); ?>
