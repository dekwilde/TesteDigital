<?php
	require("login-start.php");
	require("../conecta.php");
	require("header.php");
	$side_menu = "prova";
	require("header-user.php");	
?>
<?php
	$mode = $_GET["mode"];
	$id = $_GET["id"];
?>
<?php	
	
	if (isset($id)) {
		$sql ="SELECT * FROM prova_id WHERE id=$id AND admin_id=$admin_id";
		$rs = mysql_query( $sql, $conn );		
		$row = mysql_fetch_assoc( $rs );
		
		$_SESSION["prova_id"] = $id;
				   
		$nome 			= $row['nome'];		
		$_SESSION["prova_nome"] = $nome;
				
	    $permalink 		= $row['permalink'];
		
		$tempo_h 		= $row['tempo_h'];  
		$tempo_m 		= $row['tempo_m'];  
		
		$inicio 		= $row['inicio'];
		$inicio_h 		= $row['inicio_h'];
		$inicio_m 		= $row['inicio_m']; 
		
		$termino 		= $row['termino'];
		$termino_h 		= $row['termino_h'];
		$termino_m 		= $row['termino_m'];    	
		
		$header_img 	= $row['header_img'];
		$header_cor 	= $row['header_cor'];
		$header_align 	= $row['align'];
		$footer_img 	= $row['footer_img'];
		$footer_cor 	= $row['footer_cor'];
		$footer_align 	= $row['footer_align'];
		$logo 			= $row['logo'];
		$regulamento 	= $row['regulamento'];
		$faq 			= $row['faq'];
		$home_img		= $row['home_img'];
		$home_txt		= $row['home_txt'];
		$txt_desc		= $row['txt_desc'];   
		
	}
	
?>
<div id="content" class="form-elements">
	<ul class="breadcrumb">
		<li class="home"><a href="index.php" ></a></li>
		<li><a href="prova-list.php" >Prova: <?php echo $_SESSION["prova_nome"]; ?></a></li>
		<li class="last">
			<a href="provas-form.php?mode=<?php echo $mode; ?>&id=<?php echo $id; ?>" >
				<?php 
					if($mode == "new") { echo "Criar Nova"; };
					if($mode == "edit") { echo "Editar"; }; 
				?>
			</a>
		</li>
	</ul>
	

		     
	<a href="question-list.php?mode=<?php echo  $mode; ?>" class="button-blue">Quest&otilde;es</a>
	<a href="category-list.php?mode=<?php echo  $mode; ?>" class="button-green">Categorias</a>
	                                                                                            
	<div class="hr"></div>
	<form name="prova_form" action="prova-submit.php?mode=<?php echo $mode; ?>" method="post" accept-charset="utf-8">

		
		<p style="float:left; margin-right:5px">
			Nome<br>
			<input class="normal" type="text" name="nome" value="<?php echo $nome;  ?>" placeholder="Nome" />
		</p>
		<p>
			Permalink<br>
			<input class="normal" type="text" name="permalink" value="<?php echo $permalink;  ?>" placeholder="Permalink" />
		</p>
		<div class="hr"></div>
		<h2>Calendário</h2>
		<table class="normal-table m-bot-30" cellspacing='0'> 
				<thead> 
					<tr> 
						<th class="first">Duração da Prova</th> 
						<th>Início</th> 
						<th>Término</th>  
					</tr> 
				</thead> 
				<tbody> 
					<tr> 
						<td>
					   		Horas
							<select name="tempo_h">
								<option value="0">00</option>
								<option value="1">01</option>
								<option value="2">02</option> 	
							</select><br>            
							Minutos
							<select name="tempo_m">
								<option value="10">00</option>
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="30">30</option> 	
							</select>
						</td> 
						<td>
							<p style="float:left; margin-right:10px">
								Data<br>
								<input class="micro" type="text" name="inicio" value="<?php echo $inicio;  ?>" placeholder="Início" />
								<span class="input-text">Saiba mais <a href="help.php">clique aqui</a></span> 
							</p>
							<p>
								<br>
								Horas
								<select name="inicio_h">
									<option value="0">00</option>
									<option value="1">01</option>
									<option value="2">02</option> 	
								</select>            
								Minutos
								<select name="inicio_m">
									<option value="10">00</option>
									<option value="10">10</option>
									<option value="20">20</option>
									<option value="30">30</option> 	
								</select> 
							</p>
						</td> 
						<td>
							<p style="float:left; margin-right:10px">
								Data<br>
								<input class="micro" type="text" name="termino" value="<?php echo $termino;  ?>" placeholder="Término" />
								<span class="input-text">Dúvidas? <a href="help.php">Clique aqui</a></span> 
							</p>
							<p>
								<br>
								Horas
								<select name="termino_h">
									<option value="0">00</option>
									<option value="1">01</option>
									<option value="2">02</option> 	
								</select>           
								Minutos
								<select name="termino_m">
									<option value="10">00</option>
									<option value="10">10</option>
									<option value="20">20</option>
									<option value="30">30</option> 	
								</select> 
							</p>
						</td> 
					</tr> 
				</tbody> 
		</table>
		
  
		<div class="hr"></div>
		<h2>Layout</h2>
		<p>
			Logo:<br>
			<input type="file" name="logo" />
		</p>
		<h3>Cabeçalho</h3>
		<p style="float:left; margin-right:10px">
			Imagem:<br>
			<input type="file" name="header_img" />
		</p>
		<p style="float:left; margin-right:20px">
			Alinhamento:<br>
			<select name="header_align">
				<option value="center">Centralizado</option>
				<option value="left">Esquerda</option>
				<option value="right">Direita</option>   
			</select>
		</p>
		<p>
			Cor:<br>
			<input class="small" type="text" name="header_cor" />
			<span class="input-text">Ex:#FFCC00</span>
		</p>
 
		<h3>Rodapé</h3>
		<p style="float:left; margin-right:10px">
			Imagem:<br>
			<input type="file" name="footer_img" />
		</p>
		<p style="float:left; margin-right:20px">
			Alinhamento:<br>
			<select name="footer_align">
				<option value="center">Centralizado</option>
				<option value="left">Esquerda</option>
				<option value="right">Direita</option>   
			</select>
		</p>
		<p>
			Cor:<br>
			<input class="small" type="text" name="footer_cor" />
			<span class="input-text">Ex:#FFCC00</span>
		</p>
        <div class="hr"></div>

		<h3>Página de Início</h3>
		<p>
			Imagem de início:<br>
			<input type="file" name="home_img" />
		</p> 
		<p>
			Texto de início:<br>
			<textarea name="home_txt" class="ckeditor"></textarea>
		</p>
		<div class="hr"></div>
		<h3>Conteúdo</h3>
		<p>
			Descritivo:<br>
			<textarea name="txt_desc" class="ckeditor"></textarea>
		</p>
		<p>
			Regulamento:<br>
			<textarea name="regulamento" class="ckeditor"></textarea>
		</p>
		<p>
			Perguntas Frequentes:<br>
			<textarea name="faq" class="ckeditor"></textarea>
		</p>
		
		<a href="javascript:;" class="button-orange arrow" style="float:right" onClick="document.forms['prova_form'].submit();">
			<?php 
				if($mode == "new") { echo "ENVIAR"; };
				if($mode == "edit") { echo "ATUALIZAR"; }; 
			?>
			<span></span>
	   	</a>
	</form>
</div>
<?php
	require("footer-user.php");
?>