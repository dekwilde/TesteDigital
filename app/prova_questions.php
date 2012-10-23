<?php

	mysql_query("BEGIN");
	
	// FIRST login;
	if ($login == null) {
		
		$sql_los = "SELECT * FROM los_questions";
		if($rs_los = mysql_query( $sql_los, $conn)){
			while($row_los = mysql_fetch_assoc( $rs_los )) {

		    	$categoria     = $row_los["nome"];
		    	$quantia     = $row_los["quantia"];
				$sql="SELECT * FROM questions WHERE tipo='$categoria' ORDER BY RAND() LIMIT $quantia";
				if($rs = mysql_query( $sql, $conn )){
					while($row = mysql_fetch_assoc( $rs )) {
		                $sql = "INSERT INTO prova (
		                user_id,
		                question_id,
		                tipo
		                ) VALUES (
		                '" . $user_id . "',
		                '" . $row["id"] .  "',
		                '" . $row["tipo"] .  "'
		                );";

		                if(!mysql_query( $sql, $conn )){
							echo "<script> alert('Falha na conexao com a internet'); </script>";                   	
							mysql_query("ROLLBACK");
		                    die("Tente novamente mais tarde!");
		                }
		            }

		        } else {
					echo "<script> alert('Falha na conexao com a internet'); </script>";                   	
					mysql_query("ROLLBACK");
		            die("Tente novamente mais tarde!");
		        }
		    }
		}else{
			echo "<script> alert('Falha na conexao com a internet'); </script>";                   	
			mysql_query("ROLLBACK");
		    die("Tente novamente mais tarde!");
		}
	}
	
	
	// register login
	$login = $login + 1;
	$sql = "UPDATE user SET 
						login = '" . $login . "'
						
						WHERE id='" . $user_id . "'";	

	if(!mysql_query( $sql, $conn )){
		echo "<script> alert('Falha na conexao com a internet'); </script>";                   	
		mysql_query("ROLLBACK");
	    die("Nao foi possível adicionar o login a  base de dados! Erro: " . mysql_error() );
	}


	








	
	// SECOND LOGIN or MORE
	//Verifica se ja tem login e deleta questões visualizadas e substitui por uma nova que não esteja na lista da mesma categoria
	if ($login > 1) {
		
		
		// Deleta questoes visitadas e não respondidas;
		$sql="SELECT * FROM prova WHERE user_id=$user_id AND status='true' AND resp IS NULL";
		if($rs = mysql_query( $sql, $conn )){		
			while($row = mysql_fetch_assoc( $rs )) {
				$sql = "DELETE FROM prova WHERE user_id=$user_id AND question_id='" . $row["question_id"] . "'"; //deleta
			
				if(!mysql_query( $sql, $conn )){
				   	mysql_query("ROLLBACK");
					echo "<script> alert('Falha na conexao com a internet'); </script>";
				    die("Nao foi possível deletar da  base de dados! Erro: " . mysql_error());
				}					
			}
		} else {
			echo "<script> alert('Falha na conexao com a internet'); </script>";                   	
			mysql_query("ROLLBACK");
            die('Ocorreu um erro. Erro: ' . mysql_error()  );	
		}
		

		
		
		// Verifica questoes que sobraram e substitui por novas, para cada categoria
		$sql_los ="SELECT * FROM los_questions";
		
		if($rs_los = mysql_query( $sql_los, $conn )){	
			while($row_los = mysql_fetch_assoc( $rs_los )) {
		
					$categoria 	= $row_los["nome"];
					$quantia 	= $row_los["quantia"];
				
					// Seleciona questoes do banco de cada categoria
					$questions_data = array();
					$sql="SELECT * FROM questions WHERE tipo='$categoria'";
					if($rs = mysql_query( $sql, $conn )){
						while($row = mysql_fetch_assoc( $rs )) {
							array_push($questions_data, $row["id"]);				
						}
					} else {
						echo "<script> alert('Falha na conexao com a internet'); </script>";                   	
						mysql_query("ROLLBACK");
			            die('Nao foi possivel selecionar da tabela questions. Erro: ' . mysql_error());
					}
		
					// Seleciona questoes do usuário que sobraram da categoria;
					$questions_user = array();
					$sql="SELECT * FROM prova WHERE user_id= $user_id AND tipo='$categoria'";
					
					if($rs = mysql_query( $sql, $conn )){
						while($row = mysql_fetch_assoc( $rs )) {
							array_push($questions_user, $row["question_id"]);					
						}
					} else {
						echo "<script> alert('Falha na conexao com a internet'); </script>";                   	
						mysql_query("ROLLBACK");
			            die('Nao foi possivel selecionar da tabela prova: ' . mysql_error());
					}
					
					$questions_diff = array_diff($questions_data, $questions_user);		
					$questions_result = array_merge($questions_diff);
		
					
					$questions_num = intval($quantia) - count($questions_user);
					
					$questions_select = array_rand($questions_result, $questions_num);
							

					// INSERI NOVA QUESTAO por categoria
					if(count($questions_select)>1) {		
						for ($i = 0; $i < count($questions_select); $i++) {
							$sql_insert = "INSERT INTO prova (
															user_id,
															question_id,
															tipo 
							                          ) VALUES (
															'" . $user_id .  "',
															'" . $questions_result[$questions_select[$i]] .  "',
															'" . $categoria .  "'
							                          );";
														
							if(!mysql_query( $sql_insert, $conn )){
								echo "<script> alert('Falha na conexao com a internet'); </script>";                   	
								mysql_query("ROLLBACK");
			                    die("Nao foi possível substituir $questions_num questoes a base de dados!  $questions_select Erro: " . mysql_error() );
			                }
								
						}
					} else {
						for ($i = 0; $i < count($questions_select); $i++) {
							$sql_insert = "INSERT INTO prova (
															user_id,
															question_id,
															tipo 
							                          ) VALUES (
															'" . $user_id .  "',
															'" . $questions_result[$questions_select] .  "',
															'" . $categoria .  "'
							                          );";
							
							if(!mysql_query( $sql_insert, $conn )){
								echo "<script> alert('Falha na conexao com a internet'); </script>";                   	
								mysql_query("ROLLBACK");
			                    die("Nao foi possível substituir $questions_num questoes da categoria $categoria a base de dados!  $questions_select Erro: " . mysql_error() );
			                }
						}
					}
			}
		} else {
			echo "<script> alert('Falha na conexao com a internet'); </script>";                   	
			mysql_query("ROLLBACK");
		    die('Ocorreu um erro. Erro: ' . mysql_error());
		}
	}
	

	
	
	
	
	
	
	mysql_query("COMMIT");
?>