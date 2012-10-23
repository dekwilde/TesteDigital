<?php 
	session_start();
	if ( !isset( $_SESSION['is_admin'] ) ) {
	    header( 'location: index.php' );
	    die;
	}
	require( 'header.php' );	
	require( 'conecta.php' );


?>

<body onLoad="openFullScreen();">
	<div id="fullscreen">
		<?php require( 'template_header.php' ); ?>
		<div id="menu_prova">
		</div>

		<h4 style="width:100%; text-align:center; float:left;">PROVA PREVIEW ONLINE</h4>
		
		
		
		<div id="center" class="big_center">	
			<div id="content" style="height:630px;">
				<div id="prova" class="jcarousel-skin-tango prova_preview">
					<ul>
						<?php
							
							$id = $_GET["id"];
							
							$sql_id="SELECT * FROM questions ORDER BY tipo DESC";
							
							$rs_id = mysql_query( $sql_id, $conn ) or die( 'erro question. Erro: ' . mysql_error()  );
							while($row_id = mysql_fetch_assoc( $rs_id )) {
						?>
						<li id="<?php echo $row_id['id']; ?>">
							<h3>Quest&atilde;o <?php echo $row_id['id']; ?></h3>
							<a href="adm_prova/questions.php?mode=edit&id=<?php echo $row_id['id']; ?>" style="float:right">[ Editar ]</a>	
							<div id="pergunta"><?php echo $row_id['pergunta']; ?></div>
							<input type="radio" name="resposta<?php echo $row_id['id']; ?>" value="alt1"  />
							<label><?php echo $row_id['alt1']; ?></label><br>
							<input type="radio" name="resposta<?php echo $row_id['id']; ?>" value="alt2"  />
							<label><?php echo $row_id['alt2']; ?></label><br>
							<input type="radio" name="resposta<?php echo $row_id['id']; ?>" value="alt3"  />
							<label><?php echo $row_id['alt3']; ?></label><br>
							<input type="radio" name="resposta<?php echo $row_id['id']; ?>" value="alt4"  />
							<label><?php echo $row_id['alt4']; ?></label><br>
							<input type="radio" name="resposta<?php echo $row_id['id']; ?>" value="alt5"  />
							<label><?php echo $row_id['alt5']; ?></label><br>
						</li>
						<?php 
							}
						?>
						
					</ul>	
				</div>	
			</div>
		</div>

		
		<div class="jcarousel-control" style="width:28px; 	margin-left:-14px;" onMouseOver="closeNavegator();">
			<?php
				if ($id == "") {
					//
				} else {
			?>
				<a href="javascript:void(0);" id="menu_question<?php echo $id; ?>" ><?php echo $id; ?></a>
			<?php
				}
			?>
	    </div>
		<div id="navegator" onMouseOver="closeNavegator();">Clique para ir at&eacute; a pergunta</div>
		
		
			
		<?php require( 'template_footer.php' ); ?>
	</div>
</body>

<?php require( 'footer.php' ); ?>