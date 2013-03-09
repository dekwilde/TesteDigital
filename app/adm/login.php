<?php
	require("header.php");
	$status = $_GET["status"];
?>
  
	<body>
	 
		<div id="layout">
   	
			<div class="login">
 							
				<div id="content" style="width:300px">
					<form name="login" id="login" action="login-check.php" method="post" accept-charset="utf-8" onsubmit="return checkSubmit()">						
						<img src="_content/white-logo.png"  style="float:left; width:160px; margin-right:10px;">
						<a href="#" class="button-green">CADASTRA-SE<br><b style="font-size:24px">GRÁTIS</b></a><br> 
						<div class="hr" style="width:300px; margin-top:20px"></div>
						<h1 style="text-align:center; color:#bababa">Acesse sua conta</h1>
						<div class="fixed form-elements-inputs">
							<div class="col-240" style="text-align:right; width:100px;">
								<h4>Email</h4>
							</div>
							<div class="col-400" style="width:200px">
								<input class="small" name="email" type="email" placeholder="Email"  /><br> 
							</div>
						</div>	 
						<div class="fixed form-elements-inputs"> 
							<div class="col-240" style="text-align:right; width:100px;">
								<h4>Senha</h4>
							</div>
							<div class="col-400" style="width:200px">
								<input class="small" name="pass" type="password" placeholder="Senha" /><br> 
								<a href="javascript:;" class="button-blue arrow" onClick="document.forms['login'].submit();">ENTRAR<span></span></a>
								<p><a href="#">Esqueci minha senha</a></p>
							</div>
						</div>
					
						<?php
							if($status == "error") {
						?>
						<div class="notice-one" style="float:left; width:280px;">Dados incorretos. Tente novamente
							<span></span>
						</div>
						<?php
							}
						?>
					</form>
   				

				   
				</div>
				
			</div>
		</div>
	 
	</body>
	
</html>
	