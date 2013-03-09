<?php
	require("login-start.php");
	require("../conecta.php");
	require("header.php");
	$side_menu = "prova";
	require("header-user.php");
	$_SESSION["prova_id"] = null;
?>
<div id="content">
		<ul class="breadcrumb">
			<li class="home"><a href="index.php" ></a></li>
			<li class="last"><a href="prova-list.php" >Provas</a></li>
		</ul> 
	  	<a href="prova-form.php?mode=new" class="button-green">Criar Nova Prova</a>

		
		                    		
		<table style="margin-top:20px"  id="sample-table-sortable" class="sortable normal-table" cellspacing='0'> 
				<thead> 
					<tr> 
						<th class="first">Nome</th> 
						<th style="width:250px"></th>
					</tr> 
				</thead> 
				<tbody> 
					<?php
						$sql ="SELECT * FROM prova_id WHERE admin_id = $admin_id ORDER BY id DESC";
						$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
						$num = 0;
						while($row = mysql_fetch_assoc( $rs ) ) { 
					?>					
					<tr>
					    <td><?php echo $row['nome'] ; ?></td>
					    <td>
							<a class="button-orange" href="excluir.php?id=<?php echo $row['id'] ; ?>&db=prova_id" onclick="return confirma_deletar();" >Excluir</a>&nbsp;
							<a class="button-blue" href="prova-form.php?mode=edit&id=<?php echo $row['id']; ?>" >Editar</a>&nbsp;&nbsp;
							<a class="button-blue-light" href="../prova-preview.php?name=<?php echo $row['permalink']; ?>&question=" >Visualizar</a>&nbsp;&nbsp;&nbsp;
						</td>  
				  	</tr>   
					<?php 
						$num++;
						}
					?>
				</tbody> 
		</table>
</div>
<?php
	require("footer-user.php");
?>