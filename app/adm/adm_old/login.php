<?php

session_start();
$usuario =  isset( $_POST['usuario'] ) ? $_POST['usuario'] : '' ;
$senha =  isset( $_POST['senha'] ) ? $_POST['senha'] : '' ;
$acao =  isset( $_POST['acao'] ) ? $_POST['acao'] : '' ;

$mensagem = '';

if ( $acao == 'entrar' ) {
    
    if ( $usuario == 'admin' && $senha = 'root' ) {
        $_SESSION['is_logado'] = 1;
        header( 'location: index.php' );
        die;
    } else {
        $mensagem = 'Usuario ou senha inválidos!';
    }
    
}

?>
<html>
<head>

	<title>Sistema administrativo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
    
</head>

<body>
<div style="margin-left:auto; margin-right:auto; width:400px; margin-top:10%;">
                <fieldset style="-moz-border-radius:10px; -webkit-border-radius:10px; border-radius: 10px;">
                  <legend style="font-size:10px; text-align:right">SISTEMA ADMINISTRATIVO</legend>
                          <form  action='' method='post' style="width:350px; text-align: center;">

								<div>
                              		<label style="width:30%; margin-right:5%; text-align:right; float:left;">Usu&aacute;rio:</label>
                              		<input style="width:60%;" name="usuario" type="text" class="form" id="usuario" value="" border="0" />
								</div>
								<div>
                              		<label style="width:30%; margin-right:5%; text-align:right; float:left;">Senha:</label>
                              		<input style="width:60%;" name="senha" type="password" class="form" id="senha" value="" border="0" />
								</div>
                              	<input type="submit" name="acao" value="Entrar" id="acao" />
								<a href="#">esqueceu sua senha?</a>

                          </form>
                
                </fieldset>

                <div style="text-align:center; font-family:'Arial', Gadget, sans-serif; font-size:12px; color:#F00;">
                <?php 
					if($mensagem) {
                 		echo $mensagem;
            		}
				?>
                </div>

</div>

</body>
</html>