<?php
	require( 'header.php' );
	
	$mode = $_GET["mode"];

	if(!isset($mode)) {	
?>
		<h3><a href="questions.php?mode=new">Adicionar Nova Quest&atilde;o</a></h3>
		<table width="100%" border="1" cellspacing="2" cellpadding="2">
			  <tr>
			    <th scope="col" >n</th>
				<th scope="col" >id</th>
			    <th scope="col" >categoria</th>
			    <th scope="col" >QUEST&Otilde;ES</th>
			    <th scope="col" >></th>
				<th scope="col" >></th>
				<th scope="col" >></th>
			  </tr>
		<?php
			$sql ="SELECT * FROM questions ORDER BY tipo DESC";
			$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
			$num = 0;
			while($row = mysql_fetch_assoc( $rs ) ) { 
		?>
		  <tr>
		    <td><?php echo $num ; ?></td>
			<td><?php echo $row['id'] ; ?></td>
		    <td><?php echo $row['tipo'] ; ?></td>
		    <td>
				<?php echo $row['pergunta'] ; ?><br>
				ALT1:<?php echo $row['alt1'] ; ?><br>
				ALT2:<?php echo $row['alt2'] ; ?><br>
				ALT3:<?php echo $row['alt3'] ; ?><br>
				ALT4:<?php echo $row['alt4'] ; ?><br>
				ALT5:<?php echo $row['alt5'] ; ?><br>
				
			</td>
		    <td><a href="excluir.php?id=<?php echo $row['id'] ; ?>&db=questions" onclick="return confirma_deletar();" >Excluir</a></td>
			<td><a href="questions.php?mode=edit&id=<?php echo $row['id']; ?>" >Editar</a></td>
			<td><a href="../prova_preview.php?id=<?php echo $num + 1; ?>" >PREVIEW</a></td>
		  </tr>
			
		<?php 
			$num++;
			}
		?>
	</table>
	
	
<?php
	} else {
		$id = $_GET["id"];
		if (isset($id)) {
			$sql ="SELECT * FROM questions WHERE id=$id";
			$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );		
			$row = mysql_fetch_assoc( $rs );
			
			$categoria = $row['tipo']; 
		    $pergunta = $row['pergunta'];
			$alt1 = $row['alt1'];
			$alt2 = $row['alt2'];
			$alt3 = $row['alt3'];
			$alt4 = $row['alt4'];
			$alt5 = $row['alt5'];
			$resp = $row['resposta'];
			
		}
?>
	<h4>Questoes</h4>
	<form action="questions_submit.php?mode=<?php echo $mode; ?>&id=<?php echo $id; ?>" method="post" accept-charset="utf-8">
		<select name="categoria">
			<option value="" >Selecione uma categoria</option>
			<?php
				$sql_los = "SELECT * FROM los_questions";
				$rs_los = mysql_query( $sql_los, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  );
				while($row_los = mysql_fetch_assoc( $rs_los ) ) {
			?>
				<option value="<?php echo $row_los['nome']; ?>" <?php if($row_los['nome'] == $categoria) { echo "selected"; } ?> ><?php echo $row_los['nome']; ?></option>
			<?php
				}
			?>
					
		</select>
		
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

<?php
	} // end if mode else
?>



<?php
	require( 'footer.php' );
?>