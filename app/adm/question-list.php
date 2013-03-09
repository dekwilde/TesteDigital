<?
	/*
	O que faz o arquivo:
	Mostra quantas questoes falta para preencher em cada categoria escolhida, especificando também o numero de questao na prova.
	Mostra todas as questoes, se quiser pode filtrar por categoria, que já vem pré-selecionadas
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
			<li>
				<a href="prova-form.php?mode=<?php echo $mode; ?>&id=<?php echo $id; ?>" >
					<?php 
						if($mode == "new") { echo "Nova"; };
						if($mode == "edit") { echo "Editar"; }; 
					?>
				</a>
			</li>
			<li class="last"><a href="question-list.php?mode=<?php echo $mode; ?>" >Questões</a></li> 
		</ul>		
		<?php
			if($mode == "edit") { 
		?>
		
		<a href="question-form.php?mode=edit" class="button-green">Adicionar questão</a>
							
		<?php 
			}; 
		?>  
		<ul class="accordion fixed" style="margin-top:20px">
			<li class="current">
				<h4 class="first">Relação de Questões/Categoria<span></span></h4>
				<div>
					<table  id="sample-table-sortable" class="sortable normal-table" cellspacing='0'>
						<thead>   
						    <tr>
							    <th scope="col" class="first">Categoria</th>
								<th scope="col" >Quantia</th>
							    <th scope="col" >Range</th>
							    <th scope="col" >Criadas</th>
							    <th scope="col" >Faltam</th>
							  </tr>
					   	</thead>
			            <tbody>
							<?php 
								//mostra quantas questoes faltam ser criadas para cada categoria
								$sql ="SELECT * FROM prova_category WHERE prova_id = $prova_id ORDER BY id DESC";
								$rs = mysql_query( $sql, $conn );
								while($row = mysql_fetch_assoc( $rs ) ) { 
							?>					
							<tr>  
								<?php
									$category_id = $row["category_id"];
					                $shuf = $row['shuf'];
									$quantia = $row['quantia'];

									// calcula quantida de questoes com aquela categoria
									$sql_qnum = "SELECT * FROM questions WHERE prova_id = $prova_id AND category_id = $category_id"; 
					                $rs_qnum = mysql_query( $sql_qnum, $conn );
									$row_qnum = mysql_num_rows( $rs_qnum );


							   		$faltam =  $shuf - $row_qnum;

									// select para puxar o nome
									$sql_in ="SELECT * FROM category WHERE id = $category_id";
									$rs_in = mysql_query( $sql_in, $conn );
									$row_in = mysql_fetch_assoc( $rs_in );



								?>
								<td><?php echo $row_in['nome']; ?></td> 
								<td><?php echo $quantia; ?></td> 
								<td><?php echo $shuf; ?></td>
								<td><?php echo $row_qnum; ?></td>
							    <td><strong style="color:<?php if($faltam>0) { echo "#cc2222";  } else { echo "#22cc22"; } ?>" ><?php echo $faltam; ?></strong></td> 
						  	</tr>   
							<?php 
								}
							?>  
						</tbody>
					</table>
				</div>
				
			</li>
			<li>
				<h4>Visualizar Questões<span></span></h4>
				<div>
					<table  id="sample-table-sortable" class="sortable normal-table" cellspacing='0'>
						<thead>   
						    <tr>
							    <th scope="col" class="first">n</th>
								<th scope="col" >id</th>
							    <th scope="col" >categoria</th>
							    <th scope="col" >QUESTÃO</th>
							    <th scope="col" ></th>
							  </tr>
					   	</thead>

						<tbody>  
						<?php
							$sql ="SELECT * FROM questions WHERE prova_id=$prova_id ORDER BY category_id DESC";
							$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
							$num = 0;
							while($row = mysql_fetch_assoc( $rs ) ) { 
						?>
						  <tr>
						    <td><?php echo $num ; ?></td>
							<td><?php echo $row['id'] ; ?></td>
						    <td><?php echo $row['category_id'] ; ?></td>
						    <td>
								<?php echo $row['pergunta'] ; ?><br>
								ALT1:<?php echo $row['alt1'] ; ?><br>
								ALT2:<?php echo $row['alt2'] ; ?><br>
								ALT3:<?php echo $row['alt3'] ; ?><br>
								ALT4:<?php echo $row['alt4'] ; ?><br>
								ALT5:<?php echo $row['alt5'] ; ?><br>

							</td>
						    <td>
								<a class="button-orange" style="width:60%" href="excluir.php?id=<?php echo $row['id'] ; ?>&db=questions" onclick="return confirma_deletar();" >Excluir</a>
								<a class="button-blue" style="width:60%" href="questions.php?mode=edit&id=<?php echo $row['id']; ?>" >Editar</a>
								<a class="button-brown" style="width:60%" href="../prova_preview.php?id=<?php echo $num + 1; ?>" >PREVIEW</a>
							</td>
						  </tr>

						<?php 
							$num++;
							}
						?>
						</tbody>
					</table>
				</div>
			</li>
		</ul>

		



</div>
<?php
	require("footer-user.php");
?>	   