<?php require( 'header.php' ); ?>
<body>
<div id="login" style="height:1300px">
	<div id="entrar">
		<a href="cadastro.php" id="bt_inscreva"><img src="media/bt_inscreva.png"></a>
		<form action="login_check.php" method="post" accept-charset="utf-8" style="margin-top:30px">
			<h4>J&aacute; sou cadastrado:</h4>
			<p>
			Email:
			<input type="text" name="email_user" value="" >
			</p>
			<p>
			Senha:
			<input type="password" name="pass_user" value="" >
			</p>	
			<p><input type="submit" value="ENTRAR"></p>
		</form>
		<a href="login_recover.php">Esqueci minha senha</a>
	</div>
</div>
</body>

<?php require( 'footer.php' ); ?>

