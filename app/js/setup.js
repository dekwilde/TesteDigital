$(document).ready(function() {


    //$.mask.definitions['~'] = "[+-]";
    //$("#date").mask("99/99/9999",{completed:function(){alert("completed!");}});

	//Fone
	$("input[name='fone']").mask("(99) 9999-9999");


	//Cep

	$("#loading_cep").hide();

	$("input[name='cep']").mask("99999-999", {
	               completed: function(){
	                   $("#loading_cep").show();
	                   //Desabilitando os campos de residencia
	                   // $("input[name='rua']").attr("disabled", true);
	                   // $("input[name='numero']").attr("disabled", true);
	                   // $("input[name='bairro']").attr("disabled", true);
	                   // $("input[name='estado']").attr("disabled", true);
	                   // $("input[name='cidade']").attr("disabled", true);
	
	
	
	
						
						var request_CEP = $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$(this).val());
						request_CEP.done(function(script, textStatus) {
						   	alert(textStatus); //success
							// o getScript dá um eval no script, então é só ler!
							//Se o resultado for igual a 1
							if(resultadoCEP["resultado"] && resultadoCEP["bairro"] != ""){
									// troca o valor dos elementos
									$("input[name='rua']").val(unescape(resultadoCEP["tipo_logradouro"])+": "+unescape(resultadoCEP["logradouro"]));
									$("input[name='bairro']").val(unescape(resultadoCEP["bairro"]));
									$("input[name='cidade']").val(unescape(resultadoCEP["cidade"]));
									$("input[name='estado']").val(unescape(resultadoCEP["uf"]));
										                    //Abilitando os campos de residencia
										                    // $("input[name='rua']").removeAttr("disabled");
										                    // $("input[name='numero']").removeAttr("disabled");
										                    // $("input[name='bairro']").removeAttr("disabled");
										                    // $("input[name='estado']").removeAttr("disabled");
										                    // $("input[name='cidade']").removeAttr("disabled");
									$("input[name='numero_casa']").focus();
										                    $("#loading_cep").hide();
							}else{
									alert("Endereço não encontrado");
									//$("#enderecoCompleto").show("slow");
									return false;
							}
						})
						request_CEP.fail(function(jqxhr, settings, exception) {
						  alert("falha");
						});
						
						
						
						

	
	
	               }
	   });




	$("input").blur(function() {
       // $("#info").html("Unmasked value: " + $(this).mask());
    }).dblclick(function() {
        $(this).unmask();
    });


	
	//Email
	$("input[name='email']").focusout(function(){
		var regex = new RegExp("^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]+(.){2}[a-zA-Z]{2,4})+$");
		if(!$(this).val().match(regex)){
		    alert("Email incorreto!");
		    $(this).val("");
		    //$(this).focus();
		}
	});

	$("input[name='pass']").keypress(function(e) { 
	    var s = String.fromCharCode( e.which );
	    if ( s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey ) {
	        alert('Caps Lock ligado.');
	    }
	});
	
	//Nome
	$("input[name='nome']").focusout(function(){
        if(nomeComposto($(this).val())){
           alert("Nome incompleto!");
            $(this).val("");
           //$("input[name='nome']").focus();

        }
	});
	function nomeComposto(nome) {
        var qt = nome.split(' ');
        if(qt.length < 2) {
           var msg = "Nome incompleto";
           return msg;
        } else
            var msg = null;
            return msg;
    }
	


	
	
	adjustStyle($(window).height());



    jQuery('.prova_preview').jcarousel({
		initCallback: mycarousel_initCallback,
		animation: 1500,
		easing: 'easeInOutExpo',
		//buttonNextHTML: null,
        //buttonPrevHTML: null,
		scroll: 1
    });


    jQuery('#prova').jcarousel({
    	//wrap: 'circular',
		initCallback: mycarousel_initCallback,
		itemVisibleInCallback: {
            onAfterAnimation:  setActiveQuestion
        },
        itemVisibleOutCallback: {
            onAfterAnimation:  setVisitedQuestion
        },
		animation: 1500,
		easing: 'easeInOutExpo',
		//buttonNextHTML: null,
        //buttonPrevHTML: null,
		scroll: 1
    });



	$(window).resize(function() {
        adjustStyle($(this).height());
    });


    $("#bt_prova_suporte, #bt_prova_regulamento, #bt_user_menu").fancybox({
		'width': '75%',
		'height': '75%',
        'autoScale': true,
        'transitionIn': 'none',
		'transitionOut': 'none',
		'type': 'iframe'
		
	});
        

	$("[title]").tooltips({ 
		tip_follows_cursor: "on", //on/off
		tip_delay_time: 100 //milliseconds
	});
	
});


function getCEP() {
	/* 
			Para conectar no serviço e executar o json, precisamos usar a função
			getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
			dataTypes não possibilitam esta interação entre domínios diferentes
			Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
			http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
	*/
	$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$(this).val(), function(){
			// o getScript dá um eval no script, então é só ler!
			//Se o resultado for igual a 1
			if(resultadoCEP["resultado"] && resultadoCEP["bairro"] != ""){
					// troca o valor dos elementos
					$("input[name='rua']").val(unescape(resultadoCEP["tipo_logradouro"])+": "+unescape(resultadoCEP["logradouro"]));
					$("input[name='bairro']").val(unescape(resultadoCEP["bairro"]));
					$("input[name='cidade']").val(unescape(resultadoCEP["cidade"]));
					$("input[name='estado']").val(unescape(resultadoCEP["uf"]));
                    //Abilitando os campos de residencia
                    $("input[name='rua']").removeAttr("disabled");
                    $("input[name='numero']").removeAttr("disabled");
                    $("input[name='bairro']").removeAttr("disabled");
                    $("input[name='estado']").removeAttr("disabled");
                    $("input[name='cidade']").removeAttr("disabled");
					$("input[name='numero_casa']").focus();
                    $("#loading_cep").hide();
			}else{
					alert("Endereço não encontrado");
					//$("#enderecoCompleto").show("slow");
					return false;
			}
	});
	
}


function adjustStyle(height) {
    height = parseInt(height);
    if (height < 1200) { 
		$("#fullscreen").css("overflow", "auto");
		$("#center").removeClass("big_center").addClass("small_center");
    } else {     
		$("#fullscreen").css("overflow", "hidden");
		$("#center").removeClass("small_center").addClass("big_center");
    }
}


function mycarousel_initCallback(carousel) {
 
   $('.jcarousel-control a').bind('click', function() {
        carousel.scroll(jQuery.jcarousel.intval(jQuery(this).text()));
		closeViewMore();
        return false;
    });


    $('.jcarousel-scroll select').bind('change', function() {
        carousel.options.scroll = jQuery.jcarousel.intval(this.options[this.selectedIndex].value);
		closeViewMore();
        return false;
    });


    $('.carousel-next').bind('click', function() {
        carousel.next();
        return false;
    });

    $('.carousel-prev').bind('click', function() {
		//carousel.scroll(jQuery.jcarousel.intval(1));      
		carousel.prev();
        return false;
    });



};


function openFullScreen() {
	$("#fullscreen").css("display", "block");
	//window.location.href= "#"
	$("html").css("overflow", "hidden");
	$("body").css("overflow", "hidden");
	$('#fullscreen').animate({opacity: '1.0'}, 1300,'easeInOutExpo');
}


function closeNavegator() {
	$('#navegator').animate({opacity: '0.0'}, 800,'easeInOutExpo', 
	function() {	
		$('#navegator').css("display", "none")		
	});
}


function doLoading(obj) {
	$(obj).hide();
	$("#bt_change").html("<h4>AGUARDE</h4>");
}








