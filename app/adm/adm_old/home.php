<?php
	require( 'header.php' );
	
?>

		<h4>Usu&aacute;rios Cadastrados</h4>
		<table width="100%" border="1" cellspacing="2" cellpadding="2">
			  <tr>
			    <th scope="col" >n</th>
				<th scope="col" >id</th>
			    <th scope="col" >nome</th>
			    <th scope="col" >email</th>
			    <th scope="col" >responsavel</th>
				<th scope="col" >escola</th>
			    <th scope="col" >cep</th>
			    <th scope="col" >fone</th>
			    <th scope="col" >horario</th>
			    <th scope="col" >pass</th>
				<th scope="col" >acertos</th>
				<th scope="col" >minutos</th>
			    <th scope="col" >></th>
				<th scope="col" >></th>
			  </tr>
		<?php
			$sql ="SELECT * FROM user";
			$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
			$num = 0;
			while($row = mysql_fetch_assoc( $rs ) ) { 
		?>
		  <tr>
		    <td><?php echo $num ; ?></td>
			<td><?php echo $row['id'] ; ?></td>
		    <td><?php echo $row['nome'] ; ?></td>
		    <td><?php echo $row['email'] ; ?></td>
			<td><?php echo $row['responsavel'] ; ?></td>
		    <td><?php echo $row['escola'] ; ?></td>
		    <td><?php echo $row['cep'] ; ?></td>
		    <td><?php echo $row['fone'] ; ?></td>
		    <td><?php echo $row['horario'] ; ?></td>
		    <td><?php echo $row['pass'] ; ?></td>
			<td><?php echo $row['acertos'] ; ?></td>
			<td><?php echo $row['minutes'] ; ?></td>
			<td><a href="user_edit.php?id=<?php echo $row['id']; ?>" >Editar</a></td>
			<td><a href="user_reset.php?id=<?php echo $row['id']; ?>" >Resetar</a></td>    
			<!-- <td><a href="excluir.php?id=<?php echo $row['id'] ; ?>&db=user" onclick="return confirma_deletar();" >Excluir</a></td> -->
		  </tr>
			
		<?php 
			$num++;
			}
		?>
	</table>
	
	
<?php
	require( 'footer.php' );
?>