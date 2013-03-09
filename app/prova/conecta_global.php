<?php

$conn = mysql_pconnect('', 'tranz_dekwilde', 'dekman') or die( 'Erro ao se conectar com o banco: ' . mysql_error() );
mysql_select_db('tranz_provaonline', $conn) or die( 'Erro ao escolher database: ' . mysql_error() );
mysql_set_charset('iso-8859-1',$conn);

?>