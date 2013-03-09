<?php

	$conn = mysql_pconnect('127.0.0.1', 'root', 'admin') or die( 'Erro ao se conectar com o banco: ' . mysql_error() );
	mysql_select_db('provaonline', $conn) or die( 'Erro ao escolher database: ' . mysql_error() );
	mysql_set_charset('iso-8859-1',$conn);

?>