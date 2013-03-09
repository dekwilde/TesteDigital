<?php
/*
	O que faz:
	1- mostra as categorias da prova com campo de quantidade de questoes dessa categoria na prova e a quantia de questoes aleatorias
	2- Botao para adicionar nova categoria (category-form.php)                   
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
			<li>
				<a href="prova-form.php?mode=<?php echo $mode; ?>&id=<?php echo $prova_id; ?>" >
					<?php 
						if($mode == "new") { echo "Nova"; };
						if($mode == "edit") { echo "Editar"; }; 
					?>
				</a>
			</li>
			<li class="last"><a href="prova-category-list.php?mode=<?php echo $mode; ?>" >Categorias</a></li> 
		</ul>		
		<?php
			if($mode == "edit") { 
		?>
		
		<a href="category-form.php?mode=edit" class="button-green">Adicionar Categoria</a>
							
		<?php 
			}; 
		?> 

		                      
		
		<table style="margin-top:20px"  id="sample-table-sortable" class="sortable normal-table" cellspacing='0'> 
				<thead> 
					<tr> 
						<th class="first">Nome</th>  
						<th>Quantia</th>
						<th>Range</th>
						<th style="width:210px"></th>
					</tr> 
				</thead> 
				<tbody> 
					<?php
						$sql ="SELECT * FROM prova_category WHERE prova_id = $prova_id ORDER BY id DESC";
						$rs = mysql_query( $sql, $conn );
						while($row = mysql_fetch_assoc( $rs ) ) { 
					?>					
					<tr>
						
						<?php
							$category_id = $row["category_id"];
							$sql_in ="SELECT * FROM category WHERE id = $category_id";
							$rs_in = mysql_query( $sql_in, $conn );
							$row_in = mysql_fetch_assoc( $rs_in ); 
						?>
					    <td><?php echo $row_in['nome'] ; ?></td>
						<form name="form_category<?php echo $category_id; ?>"  id="form_category<?php echo $category_id; ?>" action="prova-category-submit.php?id=<?php echo $category_id; ?>" method="post" accept-charset="utf-8">
							<td><input class="micro" type="text" name="quantia" value="<?php echo $row['quantia'] ; ?>" ></td>
							<td><input class="micro" type="text" name="shuf" value="<?php echo $row['shuf'] ; ?>" ></td>
						    <td>
								<a class="button-orange" href="excluir.php?id=<?php echo $category_id; ?>&db=prova_category" onclick="return confirma_deletar();" >Excluir</a>&nbsp;
								<a class="button-blue arrow" href="javascript:;" onClick="document.forms['form_category<?php echo $category_id; ?>'].submit();" >Atualizar<span></span></a>&nbsp;&nbsp;
							</td>
						</form>     
				  	</tr>   
					<?php 
						}
					?>
				</tbody> 
		</table>
</div>
<?php
	require("footer-user.php");
?>