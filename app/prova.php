<?php
	session_start();
	if ( !isset( $_SESSION['is_logado'] ) ) {
		header( 'location: login.php' );
		die;
	}
?>
<?php require( 'header.php' ); ?>
<?php
	$user_id = $_SESSION['user_id'];
	
	
	require( 'conecta.php' );


	$sql="SELECT * FROM user WHERE id='" . $user_id . "'";
	$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
	$row = mysql_fetch_assoc( $rs );	
	$nome = $row['nome'];
	$email = $row['email'];
	$sign_day = $row['sign_day'];
	$login = $row['login'];
	$acertos = $row['acertos'];
	
	
	// check conditions
	if(isset($acertos)) {
		echo "<script type='text/javascript'> alert('Voc&ecirc; j&aacute; finalizou a prova.'); window.location.href ='user.php'; </script>";
		break;
		die;		
	}
	
	
	
	// check date
	require( 'timer_cadastro.php' );
	if ($user_able == false) {
		echo "<script type='text/javascript'> window.location.href ='user.php'; </script>";
		break;
		die;	
	}

		
		
		
		

	require( 'timer_setup.php' );
	require( 'prova_setup.php' );
	require( 'prova_questions.php' );	
?>
<style type="text/css" media="screen">
	body {
		background-color: #000;
	}
	a:link, a:active, a:visited, a:hover {
		color:#000;
	}
</style>

<body onLoad="openFullScreen();">
	<div id="fullscreen">
		<?php require( 'template_header.php' ); ?>
		<div id="menu_prova">
			<div id="menu_info">
				<a href="media/suporte.htm" class="btinfo" id="bt_prova_suporte" target="_blank" >SUPORTE</a>
				<a href="media/regulamento.htm" class="btinfo" id="bt_prova_regulamento" >REGULAMENTO</a>
			</div>
			<a class="btclose" onClick="return logOut();" href="user.php" title='Voc&ecirc; pode sair da prova para continuar mais tarde, mas tome cuidado para n&atilde;o perder o per&iacute;odo de realiza&ccedil;&atilde;o e finalizar sua prova a tempo.'>[ X SAIR ]</a>
			<div id="menu_center">
				<div id="infos">
					<h5><span style="font-weight: normal;">Nome do Aluno:</span><br><?php echo $nome ?></h5>
					<h3><span style="font-weight: normal;">Tempo da prova 1h:</span><br><div id="timer_prova"></div></h3>
				</div>
				<div id="bt_change"><a href="prova_finish.php" class="bt_finalizar" onClick="return finishProva();" title='Voc&ecirc; pode concluir sua prova sem ter respondido todas as quest&otilde;es, por isso tome cuidado! Verifique se voc&ecirc; respondeu todas as quest&otilde;es.'>FINALIZAR PROVA</a></div>
			</div>
		</div>

		<h4 style="width:100%; text-align:center; float:left;">PROVA ONLINE</h4>
		
		
		


		
		
		<div id="center" class="big_center">	
			<div id="content_prova" style="height:630px;">
				<div id="prova" class="jcarousel-skin-tango">
					<ul>
						<?php
							$sql="SELECT * FROM prova WHERE user_id = $user_id ORDER BY tipo, question_id ASC";
							$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
							$num_id = 0;
							while($row = mysql_fetch_assoc( $rs )) {
								$num_id += 1;
								$q_id = $row['question_id'];
								$q_resp = $row['resp'];
								
								$sql_id="SELECT * FROM questions WHERE id = $q_id";
								$rs_id = mysql_query( $sql_id, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
								$row_id = mysql_fetch_assoc( $rs_id );
						?>
						<li id="<?php echo $q_id; ?>">
							
							<h3>
								Quest&atilde;o de 
									<?php 

										$los_tipo = $row_id['tipo'];
										$sql_los="SELECT * FROM los_questions WHERE nome = '$los_tipo'";
										$rs_los = mysql_query( $sql_los, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
										$row_los = mysql_fetch_assoc( $rs_los );
										echo $row_los['titulo']; 
							
									?>
							</h3>	
							<div id="pergunta"><?php echo $row_id['pergunta']; ?></div>
							<div id="alternativas">
								<input type="radio" name="resposta<?php echo $num_id; ?>" value="alt1" onChange="colorAnswer(<?php echo $num_id; ?>); setAnswer('alt1', <?php echo $q_id ?>, <?php echo $user_id ?> );" <?php if($q_resp == "alt1") { echo " checked "; } ?> <?php if($login>1 && isset($q_resp)) { echo " disabled "; } ?> />
								<label><?php echo $row_id['alt1']; ?></label><br>
								<input type="radio" name="resposta<?php echo $num_id; ?>" value="alt2" onChange="colorAnswer(<?php echo $num_id; ?>); setAnswer('alt2', <?php echo $q_id ?>, <?php echo $user_id ?> );" <?php if($q_resp == "alt2") { echo " checked "; } ?> <?php if($login>1 && isset($q_resp)) { echo " disabled "; } ?> >
								<label><?php echo $row_id['alt2']; ?></label><br>
								<input type="radio" name="resposta<?php echo $num_id; ?>" value="alt3" onChange="colorAnswer(<?php echo $num_id; ?>); setAnswer('alt3', <?php echo $q_id ?>, <?php echo $user_id ?> );" <?php if($q_resp == "alt3") { echo " checked "; } ?><?php if($login>1 && isset($q_resp)) { echo " disabled "; } ?> >
								<label><?php echo $row_id['alt3']; ?></label><br>
								<input type="radio" name="resposta<?php echo $num_id; ?>" value="alt4" onChange="colorAnswer(<?php echo $num_id; ?>); setAnswer('alt4', <?php echo $q_id ?>, <?php echo $user_id ?> );" <?php if($q_resp == "alt4") { echo " checked "; } ?> <?php if($login>1 && isset($q_resp)) { echo " disabled "; } ?> >
								<label><?php echo $row_id['alt4']; ?></label><br>
								<input type="radio" name="resposta<?php echo $num_id; ?>" value="alt5" onChange="colorAnswer(<?php echo $num_id; ?>); setAnswer('alt5', <?php echo $q_id ?>, <?php echo $user_id ?> );" <?php if($q_resp == "alt5") { echo " checked "; } ?> <?php if($login>1 && isset($q_resp)) { echo " disabled "; } ?> >
								<label><?php echo $row_id['alt5']; ?></label>
							</div>
						</li>
						<?php } ?>
					</ul>	
				</div>
		
			</div>
		</div>

		<div class="jcarousel-control" style="width:<?php echo $num_id*28 ?>px; 	margin-left:-<?php echo $num_id*28/2 ?>px;" onClick="closeNavegator();">
			<?php
				$sql="SELECT * FROM prova WHERE user_id = $user_id ORDER BY tipo, question_id ASC";
				$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
				$num_id = 0;	
				while($row = mysql_fetch_assoc( $rs )) {
					$num_id += 1;
					$q_resp = $row["resp"];
					$q_status = $row["status"];
			?>
				<a href="javascript:void(0);" id="menu_question<?php echo $num_id; ?>"
				<?php 
					if($q_resp != null) { 
						echo "style='background-image: url(img/bt_navegator_answer.png);' class='q_answer' title='respondida'";
					}
					if($q_status != null) { 
						echo "style='background-image: url(img/bt_navegator_visited.png);' title='visualizada'";
					} else {
						echo "title='n&atilde;o visualizada'";
					}
				?>
				>
				<?php echo $num_id; ?></a>
			<?php } ?>
	    </div>
		<div id="navegator" onClick="closeNavegator();">Voc&ecirc; pode visualizar tods as quest&otilde;es</div>
	

		<?php require( 'template_footer.php' ); ?>
	</div>
</body>

<?php require( 'footer.php' ); ?>