<?php 
	session_start();
	if ( !isset( $_SESSION['is_logado'] ) ) {
		header( 'location: login.php' );
		die;
	}
	require( 'conecta.php' );

	$user_id = $_SESSION['user_id'];
	
	
	$sql="SELECT * FROM user WHERE id=$user_id";
	$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );

	$row = mysql_fetch_assoc( $rs );

	$pontos = $row["acertos"];

?>

<?php require( 'header.php' ); ?>
<body>
	<?php require( 'template_header.php' ); ?>
	<div id="content">	
		<div id="user" style="text-align:center;">
			<p>Sua pontua&ccedil;&atilde;o foi:</p>
			<h1><?php echo $pontos; ?></h1>
			<p>DE 20 QUEST&Otilde;ES TOTAIS.</p>
			<p>Aguarde, em breve entraremos em contato informando sua coloca&ccedil;&atilde;o. Obrigado!</p><br><br>
			<a href="user.php" class='bt_user' style="float:none; margin-left:auto; margin-right:auto;">HOME</a>
		</div>
	</div>
	<div style="position:fixed; left:0px; bottom:0px; width:100%">
		<?php require( 'template_footer.php' ); ?>
	</div>
</body>
<?php require( 'footer.php' ); ?>