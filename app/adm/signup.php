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
						<br><br><br><br><br><br>
						<p style="margin:15px; margin-bottom:0px">Digite um email válido. Enviaremos um email para confirmar o cadastro, ele será usado para entrar no sistema.</p>
						<p style="margin:15px; margin-bottom:0px">Senha deve conter letras e números, de 6 a 8 digitos</p>
						<br><br><br><br><br><br>
						<p style="margin:15px; margin-bottom:0px">Teste o sistema, caso queira fazer uma atualização do seu plano posteriormente, você poderá fazer isso no seu painel de controle.</p>
					</div>
				</div>
				
				
				<div id="content" class="form-elements">
					<form name="signup_form" id="signup_form" action="signup-submit.php" method="post" accept-charset="utf-8" onsubmit="return checkSubmit()" >
						<h1>Cadastro</h1>
						<p>Cadastre-se para poder gerar provas</p>
						<div class="hr"></div>
						<div class="fixed form-elements-inputs">
							<div class="col-240">
								<h4>Nome</h4>
								<h4>Email</h4>
								<h4>Confirmar email</h4>
								<h4>Senha</h4>
							</div>
							<div class="col-400">
								<input name="nome" type="text" placeholder="Nome" />
								<input name="email" class="normal" type="email" placeholder="Email" />
								<input name="email-confirm" class="normal" type="email" placeholder="Email" />
								<input name="pass" class="small" type="password" placeholder="senha" />
								<input name="pass-confirm" class="small" type="password" placeholder="confirmar senha" />
								<span class="input-text">Confirme a senha</span>
														
								<table class="normal-table m-bot-30" cellspacing='0'> 
									<thead> 
										<tr> 
											<th class="first">Serviços e Ferramentas</th> 
											<th style="color:#000">Grátis</th> 
											<th style="color:#000">Standard</th> 
										</tr> 
									</thead> 
									<tbody> 
										<tr> 
											<td>Gecko</td> 
											<td>Firefox 1.5</td> 
											<td>Win 98+ / OSX.2+</td> 

										</tr> 
										<tr> 
											<td>Categorias de questões</td> 
											<td>até 3</td> 
											<td>ilimitado</td> 

										</tr> 
										<tr> 
											<td>Questões por prova</td> 
											<td>até 10</td> 
											<td>ilimitado</td> 

										</tr> 
										<tr> 
											<td>Usuários por prova</td> 
											<td>até 5</td> 
											<td>ilimitado</td> 
										</tr> 
										<tr> 
											<td>Número de Provas</td> 
											<td>1 única</td> 
											<td>ilimitado</td> 
										</tr> 
										<tr> 
											<td>Valor</td> 
											<td>R$ 0,00</td> 
											<td>R$ 5,00 /mês<br>ou R$ 50,00 /ano</td> 
 
										</tr> 
										<tr> 
											<td></td> 
											<td><input type="radio" name="plano" value="free" /></td> 
											<td><input type="radio" name="plano" value="standard" /></td> 
 
										</tr> 
									</tbody> 
								</table>
							
							
								<input type="checkbox" style="float:left; width:30px" />
								<h4>Concordo com o Termos do <a href="#">Regulamento</a></h4>
							
								<div class="notice-one">Hi there! I’m just a warning.
									<span></span>
								</div>
							
								<a href="javascript:;" class="button-orange arrow" onClick="document.forms['signup_form'].submit();">cadastrar<span></span></a>
							

							
							</div>
						</div>
					</form>
				</div><!-- end content -->
			</div>
		</div> 
	</body>	
</html>
	
	