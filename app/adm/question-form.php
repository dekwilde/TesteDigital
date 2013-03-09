<?php
/*
	o que o arquivo faz:
	0-		Com a categoria já criada previamente 
	1.1 	
	1-		Verifica as categorias que já existem cadastradas para a prova com opção de selecionar 
	1.1		mostra opção de criar uma nova (Caso não existe a categoria desejada) encaminha para uma outra pagina(category-form.php)
	2		Seleciona categoria e cria questao
	3		Da opção se o usuário quer tornar a questão publica ou não
	4		Se a questao se torna publica o usuário ganha pontos
	5		Deve conter na tabela de questoes: 	user_id => usuário que criou
	   	  										legacy 	=> "private" ou "public"
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
	$side_menu = "question";
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
			<li><a href="question-list.php?mode=<?php echo $mode; ?>" >Questões</a></li>
			<li class="last"><a href="question-form.php?mode=<?php echo $mode; ?>&id=<?php echo $id; ?>" >Nova questão</a></li>
		</ul> 



<?php
		$id = $_GET["id"];
		if (isset($id)) {
			$sql ="SELECT * FROM questions WHERE prova_id=$prova_id AND id=$id";
			$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );		
			$row = mysql_fetch_assoc( $rs );
			
			$categoria = $row['categoria_id']; 
		    $pergunta = $row['pergunta'];
			$alt1 = $row['alt1'];
			$alt2 = $row['alt2'];
			$alt3 = $row['alt3'];
			$alt4 = $row['alt4'];
			$alt5 = $row['alt5'];
			$resp = $row['resposta'];
			
		}
?>
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
				<form name="qestion_form_new" action="question-submit.php?mode=new&id=<?php echo $id; ?>" method="post" accept-charset="utf-8">
					<select name="categoria">
						<option value="" >Selecione uma categoria</option>
						<?php
							$sql ="SELECT * FROM prova_category WHERE prova_id = $prova_id ORDER BY id DESC";
							$rs = mysql_query( $sql, $conn );
							while($row = mysql_fetch_assoc( $rs ) ) { 
						?>					
							<?php
								$category_id = $row["category_id"];
								$sql_in ="SELECT * FROM category WHERE id = $category_id";
								$rs_in = mysql_query( $sql_in, $conn );
								$row_in = mysql_fetch_assoc( $rs_in ); 
							?>
							<option value="<?php echo $category_id; ?>" <?php if($category_id == $categoria) { echo "selected"; } ?> ><?php echo $row_in['nome']; ?></option>
						<?php
							}
						?>
					</select>
		            <div class="hr"></div>
					<p>
					Pergunta<br>
					<textarea class="ckeditor" name="pergunta" rows="4" cols="40"><?php echo $pergunta;  ?></textarea>
					</p>
					<p>
					Alternativa 1<br>
					<textarea  id="id_alt1"  class="ckeditor" name="alt1"rows="2" cols="40" style="height:10px"><?php echo $alt1;  ?></textarea>
					</p>
					<p>
					Alternativa 2<br>
					<textarea class="ckeditor" name="alt2" id="alt2"  rows="2" cols="40"  style="height:10px"><?php echo $alt2;  ?></textarea>
					</p>
					<p>
					Alternativa 3<br>
					<textarea class="ckeditor" name="alt3" id="alt3"  rows="2" cols="40"  style="height:10px"><?php echo $alt3;  ?></textarea>
					</p>
					<p>
					Alternativa 4<br>
					<textarea class="ckeditor" name="alt4" id="alt4"  rows="2" cols="40"  style="height:10px"><?php echo $alt4;  ?></textarea>
					</p>
					<p>
					Alternativa 5<br>
					<textarea class="ckeditor" name="alt5" id="alt5"  rows="2" cols="40"  style="height:10px"><?php echo $alt5; ?></textarea>
					</p>
					<p>
					<h4>Resposta</h4>
					<input type="radio" name="resp" value="alt1" <?php if($resp == "alt1") { echo "checked"; } ?>><label for="alt1" >Alternativa 1</label><br>
					<input type="radio" name="resp" value="alt2" <?php if($resp == "alt2") { echo "checked"; } ?>><label for="alt2"  >Alternativa 2</label><br>
					<input type="radio" name="resp" value="alt3" <?php if($resp == "alt3") { echo "checked"; } ?>><label for="alt3"  >Alternativa 3</label><br>
					<input type="radio" name="resp" value="alt4" <?php if($resp == "alt4") { echo "checked"; } ?>><label for="alt4"  >Alternativa 4</label><br>
					<input type="radio" name="resp" value="alt5" <?php if($resp == "alt5") { echo "checked"; } ?>><label for="alt5"  >Alternativa 5</label><br>
					</p>
		
					<p><input type="submit" value="ENVIAR &rarr;"></p>
				</form>   
			</div>  
		
		
		
		
		
		
			<div id="tab-02-content">
				<!-- <select name="categoria">
					<option value="" >Selecione uma categoria</option>
					<?php
						$sql ="SELECT * FROM prova_category WHERE prova_id = $prova_id ORDER BY id DESC";
						$rs = mysql_query( $sql, $conn );
						while($row = mysql_fetch_assoc( $rs ) ) { 
					?>					
						<?php
							$category_id = $row["category_id"];
							$sql_in ="SELECT * FROM category WHERE id = $category_id";
							$rs_in = mysql_query( $sql_in, $conn );
							$row_in = mysql_fetch_assoc( $rs_in ); 
						?>
						<option value="<?php echo $category_id; ?>" <?php if($category_id == $categoria) { echo "selected"; } ?> ><?php echo $row_in['nome']; ?></option>
					<?php
						}
					?>
				</select> 
				<div class="hr"></div>
				-->
				<form name="qestion_form_select" action="question-submit.php?mode=list" method="post" accept-charset="utf-8">            
					<p>
						Selecione todas que deseja usar<br>
					</p>
					<table id="sample-table-sortable" class="sortable normal-table" style=" float:left; width:100%" cellspacing='0'> 
						<thead> 
							<tr> 
								<th class="first">Categoria</th> 
								<th style="float:left; width:30%">Pergunta</th> 
								<th style="float:left; width:40%"></th> 
							</tr> 
						</thead>
						<tbody>
							<?php
								$sql = "SELECT  *
										FROM    questions
										WHERE id NOT IN
									        (
									        SELECT  question_id
									        FROM    prova_question
									        )
										AND category_id IN
											(
											SELECT category_id
											FROM   prova_category 
											)";
								$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
								while($row = mysql_fetch_assoc( $rs ) ) { 
							?>
							<tr> 
								<td>
								<?php
									$category_id = $row["category_id"];
									$sql_in ="SELECT * FROM category WHERE id = $category_id";
									$rs_in = mysql_query( $sql_in, $conn );
									$row_in = mysql_fetch_assoc( $rs_in );
									echo $row_in['nome'] ; 
								?>
								</td> 
								<td style="float:left; overflow:hidden; width:30%"><?php echo $row['pergunta'] ; ?></td> 
								<td style="float:left; width:40%;">
									<a href="javascript:;" class="button-blue arrow">	
										Visualizar<span></span>
									</a>
									<a href="javascript:;" class="button-grey arrow">	
										<p style="padding:0px; margin:0px">Selecionar</p>
										<span><input nome="question_id" style="margin:10px" type="checkbox" value="<?php echo $row['id'] ; ?>"/></span>
									</a>
								</td> 
							</tr>
							<?php 
								}
							?> 
					 	</tbody>
					</table> 					   
					<a href="javascript:;" class="button-green arrow" onClick="document.forms['question_form_select'].submit();">
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
	require( 'footer.php' );
?>