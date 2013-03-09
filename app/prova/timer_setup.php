<?php
	$minutes = $row['minutes'];
	$hours = $row['hours'];
	if ($minutes == null || $hours == null) {
		$minutes = 0;
		$hours = 0;
	}
?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		timeCall(0, <?php echo $minutes; ?>, <?php echo $hours; ?>);
	});
	
	var str_hours;
	var str_minutes;
	var str_seconds;
	var t;

	var seconds;
	var minutes;
	var hours;


	function timeCall(s, m, h) {
		seconds = s;
		minutes = m;
		hours = h;
		timeCount();
	}

	function timeCount() {
	 	if (seconds<10) {
			str_seconds = "0" + seconds;
		} else {
			  str_seconds = seconds;
		} 

		if (minutes<10) {
			str_minutes = "0" + minutes;
		} else {
			  str_minutes =  minutes;
		}
		if (hours<10) {
			str_hours = "0" + hours;
		} else {
			  str_hours =  hours;
		}

		document.getElementById('timer_prova').innerHTML= str_hours + ':' + str_minutes + ':' + str_seconds; 

		seconds= seconds + 1;
		if (seconds%60==0){
			minutes+=1;
			seconds=0;
			saveTimer();
		}
		if (minutes>59){
			hours+=1;
			minutes=0;
			seconds=0;
		}
		if(hours == 0 && minutes == 45 && seconds == 0) {
			// desloga usuário e calcula quantos acertos ele tem
			alert("Faltam 15 minutos para finalizar a prova!");
		}
		if(hours == 0 && minutes == 55  && seconds == 0) {
			// desloga usuário e calcula quantos acertos ele tem
			alert("Faltam 5 minutos para finalizar a prova!");
		}
		if(hours == 0 && minutes == 59  && seconds == 0) {
			// desloga usuário e calcula quantos acertos ele tem
			alert("Sua prova vai finalizar automaticamente em 1 minuto.");
		}
		if(hours == 0 && minutes >= 59  && seconds == 0) {
			// desloga usuário e calcula quantos acertos ele tem
			alert("Tempo excedido, sua prova foi finalizada automaticamente.");
			window.location.href = "prova_finish.php";
		}

		t=setTimeout("timeCount()",1000);
	}

	function saveTimer() {
		var request_time = $.ajax({
		  type: "POST",
		  url: "timer.php",
		  data: {minutes: minutes, hours: hours}
		})
		request_time.done(function( msg ) {
		  //alert( "Data Saved: " + msg );
		});
		
		request_time.error(function(jqXHR, textStatus, errorThrown) {
		  alert( "Erro: Sua conexao com a internet deve ter caido! Por favor pare, NAO finalize a prova, feche a pagina, verifique sua conexao com a internet e faca o login novamente" );
		});
		
	}
	function resetTimer() {
	   	seconds=0;
		minutes= 0;
		hours = 0;
		clearTimeout(t);  
	}
	
</script>