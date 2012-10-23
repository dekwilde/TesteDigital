<?php
	$sql="SELECT * FROM user WHERE id=$user_id";
	$rs = mysql_query( $sql, $conn ) or die( 'Ocorreu um erro. Erro: ' . mysql_error()  ); 
	$row = mysql_fetch_assoc( $rs );
	$user_sign_day = $row['sign_day'];
	$today = time();
	
	$user_able = "";
	

	$target_start = mktime(00, 00, 5, 8, 30, 2012); // inicio do período de prova: 30 de agosto de 2012
	$difference_start =($target_start-$today);
	$days_start = floor($difference_start/86400);
	$hours_start = floor(($difference_start-($days_start*86400))/3600);
	$mins_start = floor (($difference_start-($days_start*86400)-($hours_start*3600))/60);


	$target_init = mktime(23, 59, 55, 9, 2, 2013);	// inicio do período de prova
	$difference_init =($target_init-$user_sign_day);
	$days_init = floor($difference_init/86400);
	$hours_init = floor(($difference_init-($days_init*86400))/3600);
	$mins_init = floor (($difference_init-($days_init*86400)-($hours_init*3600))/60);
	
	
	$target_end = mktime(23, 59, 55, 9, 2, 2013); // termino do período prova: 9 de setembro de 2012
	$difference_end =($target_end-$today);
	$days_end = floor($difference_end/86400);
	$hours_end = floor(($difference_end-($days_end*86400))/3600);
	$mins_end = floor (($difference_end-($days_end*86400)-($hours_end*3600))/60);


	
	if ($difference_init<0 || $difference_end<0 || $difference_start>0) {
		//echo "OOOchi... ja passou do tempo meu filho!!! $difference";
		$user_able = false;
	} else {
		//print "$user_day $days $hours $mins";	
		$user_able = true;
	}
?>