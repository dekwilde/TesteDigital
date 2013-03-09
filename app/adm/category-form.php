<?php
/*
	o que o arquivo faz:                       
	1-		Ja verifica pela sessao qual prova esta adicionando a categoria
	1-		campo para o nome da nova categoria
	2-		select box com todas categorias já existentes para selecao de uma parent
	3-		SUBMIT: (category-submit.php) cria a categoria na base de dados geral e adiciona a id dela na tabela de categorias da prova
	4-		RETORNO: Verifica se a categoria já não existe, se sim, retorna o erro, se não, se estiver em mode=edit vai para prova-category-list.php, se não vai para category-list.php
*/
?>

<?php
	require("login-start.php");
	require("../conecta.php");
   
?>                            
<?php
	$mode = $_GET["mode"];
	$prova_id = $_SESSION["prova_id"];
?>
<?php
	require("header.php");
	$side_menu = "category";
	require("header-user.php"); 
?>
<div id="content">
		<ul class="breadcrumb">
			<li class="home"><a href="index.php" ></a></li>
			<li><a href="prova-list.php" >Prova: <?php echo $_SESSION["prova_nome"]; ?></a></li>
			<?php if ($mode == "edit") { ?>  
			<li>
				<a href="prova-form.php?mode=<?php echo $mode; ?>&id=<?php echo $id; ?>" >
					<?php 
						if($mode == "new") { echo "Nova"; };
						if($mode == "edit") { echo "Editar"; }; 
					?>
				</a>
			</li>
			<?php } ?>
			<li><a href="prova-category-list.php?mode=<?php echo $mode; ?>" >Categorias</a></li>
			<li class="last"><a href="category-form.php?mode=<?php echo $mode; ?>" >Nova Categoria</a></li>
		</ul>
		
		 
		<div class="panel">
			<div class="tabs">
				<ul>
					<?php if($mode == "edit") { ?>
						<li class="active" ><a href="#" rel="tab-01-content">Criar Nova</a></li>
						<li><a href="#" rel="tab-02-content">Selecionar Existente</a></li> 
					<?php } else { ?>
					   <li class="active"><a href="#" rel="tab-01-content">Criar Nova</a></li>
					<?php } ?>
					
				</ul>
			</div>
			
			<div class="tabs-content">
			<!-- ## Panel Content  -->
			     
				<div id="tab-01-content" class="active">
					<h2>Criar Nova Categoria</h2> 
					<div class="hr"></div> 
					<form name="category_form_creat" action="category-submit.php?mode=<?php echo $mode; ?>" method="post" accept-charset="utf-8">
						<p>
							Categoria Pai
							<select name="parent">
								<option value="0">Selecione um</option>
								<?php
									$sql ="SELECT * FROM category"; 

									$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
									while($row = mysql_fetch_assoc( $rs ) ) { 
								?>
								<option value="<?php echo $row['id'] ; ?>"><?php echo $row['nome'] ; ?></option>
								<?php 
									}
								?> 	
							</select>           
						</p>
						<p>
							Nome<br>
							<input class="normal" type="text" name="nome" value="<?php echo $nome;  ?>" placeholder="Nome" />
						</p>
						<p>
							Permalink<br>
							<input class="normal" type="text" name="permalink" value="<?php echo $permalink;  ?>" placeholder="Permalink" />
						</p> 
						<?php if($mode == "edit") { ?>
							<p style="float:left; margin-right:5px">
								Quantia<br>
								<input class="micro" type="text" name="quantia" value="<?php echo $nome;  ?>" placeholder="Nome" />
							</p>
							<p>
								Shuffle Range<br>
								<input class="micro" type="text" name="shuf" value="<?php echo $shuf;  ?>" placeholder="Shuffle Range" />
							</p>
						<?php } ?>
						<a href="javascript:;" class="button-green arrow" onClick="document.forms['category_form_creat'].submit();">
							CRIAR
							<span></span>
					   	</a>       			
					</form>
				</div>  
			
			
			
			
			
			
				<div id="tab-02-content">
  					<h2>Selecionar Categoria</h2> 
					<div class="hr"></div>
					<form name="category_form_select" action="category-submit.php?mode=<?php echo $mode; ?>" method="post" accept-charset="utf-8">            
						<p>
							Categorias<br>
						</p>
						<select name="category_id">
							<option value="0">Selecione um</option>
							<?php
								$sql = "SELECT  *
										FROM    category
										WHERE   id NOT IN
									        (
									        SELECT  category_id
									        FROM    prova_category
									        )";
								$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
								while($row = mysql_fetch_assoc( $rs ) ) { 
							?>
							<option value="<?php echo $row['id'] ; ?>"><?php echo $row['nome'] ; ?></option>
							<?php 
								}
							?> 	
						</select>
						
						<?php if($mode == "edit") { ?>
							<div class="hr"></div>
							<p style="float:left; margin-right:5px">
								Quantia<br>
								<input class="micro" type="text" name="quantia" value="<?php echo $nome;  ?>" placeholder="Nome" />
							</p>
							<p>
								Shuffle Range<br>
								<input class="micro" type="text" name="shuf" value="<?php echo $shuf;  ?>" placeholder="Shuffle Range" />
							</p>
						<?php } ?>
						<a href="javascript:;" class="button-green arrow" onClick="document.forms['category_form_select'].submit();">
							ADICIONAR
							<span></span>
					   	</a>
					</form>   			
				</div>
				
				
				
				
				
			

			
			<!-- ## / Panel Content  -->
			</div>
		</div>
		
		
		 

</div>
<?php
	require("footer-user.php");
?>