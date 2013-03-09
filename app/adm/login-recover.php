<?php
	require("header.php");
?>
  
	<body>
	 
		<div id="layout">
   	
			<div class="login">
 							
				<div id="content" style="width:300px">
					<img src="_content/white-logo.png"  style="float:left; width:160px; margin-right:10px;">
					<a href="#" class="button-green">CADASTRA-SE<br><b style="font-size:24px">GRÁTIS</b></a><br> 
					<div class="hr" style="width:300px; margin-top:20px"></div>
					
					<h3>Recuperar senha</h3>
					
					<form class="form-elements-inputs" name="recover" id="recover" action="login-recover-submit.php" method="post" accept-charset="utf-8">
							<h4>Email</h4>
							<input class="normal" name="email" type="email" placeholder="Email"  /><br>
							<a href="#" class="button-blue arrow" style="float:right" href="javascript:;" onClick="document.forms['recover'].submit();">ENVIAR<span></span></a> 
					</form>	 
					
					<div class="notice-one" style="float:left; width:280px; margin-top:20px">Hi there! I’m just a warning.
						<span></span>
					</div>
   				

				   
				</div>
				
			</div>
		</div>
	</body>
	
</html>
	