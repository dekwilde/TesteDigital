<?php require( 'conecta.php' ); ?>
<script type="text/javascript" charset="utf-8">
	function setAnswer(alt, question) {
		var request_answer = $.ajax({
		  type: "POST",
		  url: "prova_answer.php",
		  data: {alt: alt, question: question}
		})
		request_answer.done(function( error ) {
		  	if (error == "erro") {
				//
			}
		});
		
		/*
		request_answer.fail(function(jqXHR, textStatus) {
		  alert( "Falha: Esta quest&atilde;o n&atilde;o foi computada no sistema, por favor verifique sua conex&atilde;o com a internet ou reinicie a prova. "  + textStatus );
		});
		*/
		
		request_answer.error(function(jqXHR, textStatus, errorThrown) {
				alert( "Esta questao nao foi computada no sistema. Por favor pare, NAO finalize a prova, feche a pagina, verifique sua conexao com a internet e faca o login novamente. Se estiver utilizando o navegador Internet Explorer, por favor tente utilizar outro. Obrigado." );
		});
		
	}
	function colorAnswer(num) {
		$("#menu_question"+num).css("background-image", "url(img/bt_navegator_answer.png)");
		$("#menu_question"+num).addClass("q_answer");
		$("#menu_question"+num).attr("title", "respondida");

	}
	
	function setActiveQuestion(carousel, item, idx, state) {
		$("#menu_question"+idx).css("background-image", "url(img/bt_navegator_active.png)");
		$("#menu_question"+idx).attr("title", "aberta");
		visitedQuestion($(item).attr("id"));
	};
	
	function setVisitedQuestion(carousel, item, idx, state) {

		if ($("#menu_question"+idx).css("background-image") == "url(img/bt_navegator_answer.png)" || $("#menu_question"+idx).hasClass("q_answer")) {
			$("#menu_question"+idx).css("background-image", "url(img/bt_navegator_answer.png)");
			$("#menu_question"+idx).attr("title", "respondida");
		} else {
			$("#menu_question"+idx).css("background-image", "url(img/bt_navegator_visited.png)");
			$("#menu_question"+idx).attr("title", "vizualizada");
		}
		visitedQuestion($(item).attr("id"));
	};
	
	
	function visitedQuestion(question) {
		var request_view = $.ajax({
		  type: "POST",
		  url: "prova_view.php",
		  data: {question: question}
		})	
		
		
		request_view.done(function( msg ) {
		  //alert( "Data Saved: " + msg );
		});
		
		/*
		request_answer.fail(function(jqXHR, textStatus) {
		  alert( "Falha: Esta quest&atilde;o n&atilde;o foi computada no sistema, por favor verifique sua conex&atilde;o com a internet ou reinicie a prova. "  + textStatus );
		});
		*/
		
		request_view.error(function(jqXHR, textStatus, errorThrown) {
				alert( "Esta questao nao foi computada no sistema. Por favor pare, NAO finalize a prova, feche a pagina, verifique sua conexao com a internet e faca o login novamente. Se estiver utilizando o navegador Internet Explorer, por favor tente utilizar outro. Obrigado." );          
		});
		
		
	}
	
	function finishProva() {
		return confirm("Tem certeza que deseja finalizar a prova?");
	}
	
	function logOut() {
		return confirm("Tem certeza que deseja sair?");
	}
	
	
	
</script>