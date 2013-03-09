<?php header("Content-Type: text/html; charset=utf-8",true); ?>
<?php require( 'header.php' ); ?>
<body>
	<?php require( 'template_header.php' ); ?>
	<div id="content" >
		<div id="recover">
		       <h1 class="header_top">Recuperar senha</h1>
		       <form  method="post" action="login_recover_send.php">
				Digite o email que voc&ecirc; cadastrou:<br/>
				<input name="email" id="email" type="text" size="35" />
				<input name="submit" type="submit" value=" enviar " /><br/>	
			</form>
		</div>
	</div>
	<div style="position:fixed; left:0px; bottom:0px; width:100%">
		<?php require( 'template_footer.php' ); ?>
	</div>
</body>
<?php require( 'footer.php' ); ?>

