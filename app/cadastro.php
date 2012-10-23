<?php
	session_start();
	$mode = $_GET["mode"];
	if ($mode == "edit") {
		if ( !isset( $_SESSION['is_logado'] ) ) {
			header( 'location: login.php' );
			die;
		}
		$user_id = $_SESSION['user_id'];
		
		
		require( 'conecta.php' );


		$sql="SELECT * FROM user WHERE id='" . $user_id . "'";
		$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
		$row = mysql_fetch_assoc( $rs );	
		
		$nome = $row['nome'];
		$email = $row['email'];
		$pass = $row['pass'];
		
		$rg = $row['rg'];
		$escola = $row['escola'];
		$rua = $row['rua'];
		$numero_casa = $row['numero_casa'];
		$bairro = $row['bairro'];
		$cidade = $row['cidade'];
		$estado = $row['estado'];
		$cep = $row['cep'];
		$pai = $row['pai'];
		$mae = $row['mae'];
		$responsavel = $row['responsavel'];
		$fone = $row['fone'];
		
		$horario = $row['horario'];
		$amigo = $row['amigo'];
		
		
	}
?>
<?php require( 'header.php' ); ?>
<body>
	<?php require( 'template_header.php' ); ?>
	
		<div id="content">						
			<div id="cadastro">
				<a class="btclose" style="position:relative;" href="<?php if($mode){ echo "user.php"; } else { echo "login.php"; }; ?>"  >[ HOME ]</a>
				<h2>Cadastro</h2>
				<form name="cadastro_form" id="cadastro_form" action="cadastro_submit.php?mode=<?php echo $mode;  ?>" method="post" accept-charset="iso-8859-1" onSubmit="return onSubmitForm();">
					<p>
					<label>Nome completo*:</label>
					<input type="text" name="nome" value="<?php echo $nome;  ?>" style="width:80%; float:right" tabindex="1" >
					</p>


					
					<p>
					<label><strong>Email*:</strong></label>
					<input type="text" name="email" value="<?php echo $email;  ?>" style="width:68%; float:right" tabindex="2" >
					<span>Coloque o seu email de contato. Este ser&aacute; o seu login para realiza&ccedil;&atilde;o da prova e o meio pelo qual receber&aacute; a sua pontua&ccedil;&atilde;o. Caso n&atilde;o receba o email verifique na caixa de spam.</span>
					</p>



					<p>
					<label><strong>Confirme seu email*:</strong></label>
					<input type="text" name="confirm_email" value="<?php echo $email;  ?>" style="width:68%; float:right" tabindex="2" >
					</p>



					<p>
					<strong>Senha*:</strong><br>
					<input type="password" name="pass" value="<?php echo $pass;  ?>" tabindex="2" >
					</p>

					
					<p>
					<strong>Confirmar Senha*:</strong><br>
					<input type="password" name="confirm_pass" value="<?php echo $pass;  ?>" tabindex="2">
					</p>


					
					<p>
					RG:
					<input type="text" name="rg" value="<?php echo $rg;  ?>" style="width:20%;" tabindex="2">
					<span>Ex: 000000000. Sem pontua&ccedil;&atilde;o, somente n&uacute;meros. Caso ainda n&atilde;o tenha, n&atilde;o &eacute; necess&aacute;rio preencher.</span>
					</p>


					
					<p>
					<label>Escola de origem*:</label>
					<input type="text" name="escola" value="<?php echo $escola;  ?>" style="width:99%; float:right" tabindex="2">
					<span>Coloque o nome completo da escola onde voc&ecirc; estuda atualmente.</span>
					</p>



					<p>

						<div style="width:100%; float:left; margin-top:20px; margin-right:20px">
							<label style="float:left; margin-right:10px">CEP*:</label>
							<input type="text" name="cep" value="<?php echo $cep;  ?>" style="width:20%;" tabindex="2" autocomplete="off" ><font id="loading_cep" style="color:#ED1B34;">Carregando CEP...</font>
							<span>Ex: 00000000. Sem pontua&ccedil;&atilde;o, somente n&uacute;meros.</span>
						</div>					
						<div style="width:30%; float:left; margin-right:20px">
							<label>Bairro*:</label>
							<input type="text" name="bairro" value="<?php echo $bairro;  ?>" style="width:100%; float:left" tabindex="2">
						</div>
						<div style="width:30%; float:left; margin-right:20px">
							<label>Cidade*:</label>
							<input type="text" name="cidade" value="<?php echo $cidade;  ?>" style="width:100%; float:left" tabindex="2">
						</div>
						<div style="width:20%; float:left; margin-right:20px">
							<label>Estado*:</label>
							<input type="text" name="estado" value="<?php echo $estado;  ?>" style="width:100%; float:left" tabindex="2">
						</div>
						<div style="width:60%; float:left; margin-right:20px">
							<label>Endere&ccedil;o*:</label>
							<input type="text" name="rua" value="<?php echo $rua;  ?>" style="width:100%; float:left" tabindex="2">
							<span>Coloque o seu endere&ccedil;o. Ex: Logradouro</span>
						</div>
						<div style="width:10%; float:left; margin-right:20px">
							<label>N&uacute;mero*:</label>
							<input type="text" name="numero_casa" value="<?php echo $numero_casa;  ?>" style="width:100%; float:left" tabindex="2">
							<span>N&uacute;mero e complemento</span>
						</div>
						
										
					</p>







									
					
					<p>
					<label>Nome do Pai:</label>
					<input type="text" name="pai" value="<?php echo $pai;  ?>" style="width:80%; float:right " tabindex="2" >
					</p>

					
					<p>
					<label>Nome do M&atilde;e:</label>
					<input type="text" name="mae" value="<?php echo $mae;  ?>" style="width:80%; float:right " tabindex="2" >
					</p>



					<p>
					<label>Email respons&aacute;vel:</label>
					<input type="text" name="responsavel" value="<?php echo $responsavel;  ?>" style="width:75%; float:right " tabindex="2" >
					<span>Coloque o email do seu pai ou da sua m&atilde;e.</span>
					</p>


					
					
					<p>
					Tel.*:
					<input type="text" name="fone" value="<?php echo $fone;  ?>" style="width:20%;" tabindex="2">
					<span>Coloque um n&uacute;mero de contato com DDD. Ex: DDXXXXXXXX.</span>
					
					</p>					



					<p>
						<label>Escolha o per&iacute;odo para realizar a prova presencial*:</label><br>
						<div id="hora1" style="float:left; width:100%">
							<input type="radio" name="horario" value="manha" style="margin:5px" tabindex="2" <?php if($horario == "manha"){ echo "checked"; }; ?>>
							- Manh&atilde;: das 9h30 &agrave;s 12h.
						</div>
						
						<div id="hora2" style="float:left; width:100%; margin-bottom:10px;">
							<input type="radio" name="horario" value="tarde" style="margin:5px" tabindex="2" <?php if($horario == "tarde"){ echo "checked"; }; ?>>
							- Tarde: das 14h &agrave;s 16h30
						</div>
						<span>O local para a realiza&ccedil;&atilde;o da prova presencial ser&aacute; na unidade do Liceu Albert Sabin, no endere&ccedil;o: Rua Jos&eacute; Curvelo da Silva Jr., 110 - Jd. Calif&oacute;rnia - Ribeir&atilde;o Preto.</span>
						
					</p>


					<p>
						<label>Indique um amigo:</label>
						<input type="text" name="amigo" value="<?php echo $amigo;  ?>" style="width:99%; float:left" tabindex="2">
						<span>Coloque um email de um amigo(a) que voc&ecirc; gostaria de indicar.</span>
					</p>

					<p>		
					<label>Regulamento:</label>
					<iframe id="regulamento" src="media/regulamento.htm" width="100%" height="261" frameborder="1" marginheight="20" marginwidth="20" scrolling="yes"></iframe>
					</p>
					
					
					<p id="aceito">
					<input type="checkbox" name="aceito" value="true"tabindex="2" <?php if($user_id){ echo "checked"; }; ?>> Li e aceito os termos do regulamento.
					</p>
					
					
					<p style="color:#ED1B34; font-size:12px">
					*Campos Obrig&aacute;t&oacute;rios.
					</p>
					
					<p><input type="submit" value="ENVIAR &rarr;"></p>
				</form>
			</div>
		</div>

	<?php require( 'template_footer.php' ); ?>
</body>
<script type="text/javascript">


function onSubmitForm() {
    
	var str_result = "";
	var formDOMObj = document.cadastro_form;
    
	$(formDOMObj.nome).css("border", "2px solid #ccc");
	$(formDOMObj.email).css("border", "2px solid #ccc");
	$(formDOMObj.confirm_email).css("border", "2px solid #ccc");
	$(formDOMObj.escola).css("border", "2px solid #ccc");
	$(formDOMObj.rua).css("border", "2px solid #ccc");
	$(formDOMObj.bairro).css("border", "2px solid #ccc");
	$(formDOMObj.cidade).css("border", "2px solid #ccc");
	$(formDOMObj.estado).css("border", "2px solid #ccc");	
	$(formDOMObj.cep).css("border", "2px solid #ccc");
	$(formDOMObj.fone).css("border", "2px solid #ccc");
	$(formDOMObj.pass).css("border", "2px solid #ccc");
	$(formDOMObj.confirm_pass).css("border", "2px solid #ccc");
	
	$("#hora1").css("border", "2px solid #fff");
	$("#hora2").css("border", "2px solid #fff");
	$("#aceito").css("border", "2px solid #FFF");
	
	if (formDOMObj.nome.value == "") {
        str_result = str_result + "Por favor, preencha o campo de Nome.";
		$(formDOMObj.nome).css("border", "2px solid #ED1B34");
		alert(str_result);        
		return false;
	}
	if (formDOMObj.email.value == "") {
		str_result = str_result + "Por favor, preencha o campo de Email.";
		$(formDOMObj.email).css("border", "2px solid #ED1B34");
		alert(str_result);        
		return false;
	}
	if (formDOMObj.confirm_email.value != formDOMObj.email.value) {
		str_result = str_result + "Email n&atilde;o confere.";	
		$(formDOMObj.confirm_email).css("border", "2px solid #ED1B34");
		$(formDOMObj.email).css("border", "2px solid #ED1B34");
		alert(str_result);    
    	return false;
	}
	
	if (formDOMObj.pass.value == "") {
		str_result = str_result + "Por favor, preencha o campo de senha.";
		$(formDOMObj.pass).css("border", "2px solid #ED1B34");
		alert(str_result);        
		return false;
	}
	
	if (formDOMObj.pass.value != formDOMObj.confirm_pass.value) {
		str_result = str_result + "A senha de confirma&ccedil;&atilde;o est&aacute; diferente da senha. Por favor, digite novamente.";	
		$(formDOMObj.pass).css("border", "2px solid #ED1B34");
		$(formDOMObj.confirm_pass).css("border", "2px solid #ED1B34");
		alert(str_result);    
    	return false;
	}
	
	
	if (formDOMObj.escola.value == "") {
		str_result = str_result + "Por favor, preencha o campo de escola.";
		$(formDOMObj.escola).css("border", "2px solid #ED1B34");
		alert(str_result);        
		return false;
	}
	if (formDOMObj.rua.value == "" || formDOMObj.bairro.value == "" || formDOMObj.cidade.value == "" || formDOMObj.estado.value == "") {
		str_result = str_result + "Por favor, preencha todos campos do seu endere&ccedil;o corretamente.";
		$(formDOMObj.rua).css("border", "2px solid #ED1B34");
		$(formDOMObj.bairro).css("border", "2px solid #ED1B34");
		$(formDOMObj.cidade).css("border", "2px solid #ED1B34");
		$(formDOMObj.estado).css("border", "2px solid #ED1B34");
		alert(str_result);        
		return false;
	}
	if (formDOMObj.cep.value == "") {
		str_result = str_result + "Por favor, preencha o campo de CEP.";
		$(formDOMObj.cep).css("border", "2px solid #ED1B34");
		alert(str_result);        
		return false;
	}	
	if (formDOMObj.fone.value == "") {
		str_result = str_result + "Coloque o telefone do seu respons&aacute;vel.";
		$(formDOMObj.fone).css("border", "2px solid #ED1B34");
		alert(str_result);        
		return false;
	}

	if (!$("input[name='horario']:checked").val()) {
		str_result = str_result + "Por favor, voc&ecirc; precisa selecionar um horário para realizar a prova presencial.";
		$("#hora1").css("border", "2px solid #ED1B34");
		$("#hora2").css("border", "2px solid #ED1B34");
		alert(str_result);        
		return false;

	}
	
		
	if (!$("input[name='aceito']:checked").val()) {
		str_result = str_result + "Por favor, voc&ecirc; precisa aceitar as regras do regulamento. Leia com calma e aten&ccedil;&atilde;o antes de prosseguir.";
		$("#aceito").css("border", "2px solid #ED1B34");
		alert(str_result);        
		return false;

	}
	return true;
}
</script>

<?php require( 'footer.php' ); ?>
