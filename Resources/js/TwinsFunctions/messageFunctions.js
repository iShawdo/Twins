$(document).on('ready', function(){

	enviarMensaje();
	funcionPrincipal();

});

var funcionPrincipal = function() {
   	$.ajaxSetup({ cache : false});
	setInterval("cargarMessages()", 5000);

}

var cargarMessages = function(){

var userPara = $("#viewMessages").attr('name');

$.ajax({
        url: '../Bussiness/cargarMensajes.php',
        type: 'GET',
        data: ('idP='+userPara)
    })
    .done(function(info) {
        $('#viewMessages').html(info);
        var altura = $("#viewMessages").prop("scrollHeight");
		$("#viewMessages").scrollTop(altura);

        
    })
}


var enviarMensaje = function (){

	$('#btnEnviarMensaje').on('click', function(e){
		e.preventDefault();

		var mensaje = $("#txtaMensaje").val();
    	var userPara = $("#viewMessages").attr('name');
    	$.ajax({
	        type:'POST',
	        url: '../Bussiness/enviarMensaje.php',
	        data: ('txtaMensaje='+mensaje+'&userPara='+userPara),
	        success:function(respuesta) {
	            if (respuesta > 0) 
	            {
	                $("#txtaMensaje").val("");
	                cargarMessages();
	            }
	            if (repuesta == -1) 
	            {
	            	$("#txtaMensaje").val("");
	            }
	        }   
    	})

	});
}

function setUserMessageBox(url){
    

    $("#viewMessages").attr('name', url);
   	cargarHeadMessage();
    cargarMessages();
    var altura = $("#viewMessages").prop("scrollHeight");
	$("#viewMessages").scrollTop(altura);
	
   
}

function setActive(btn){
    
    $("#list-friend-box").find("button").removeClass('active');
    $("#list-friend-box").find("button#" + btn).addClass('active');
    modificarEstadoMessage();

}

var cargarHeadMessage = function (){

	
	var altura = $("#viewMessages").prop("scrollHeight");
	$("#viewMessages").scrollTop(altura);

	var userPara = $("#viewMessages").attr('name');

	$.ajax({
        type:'POST',
        url: '../Bussiness/cargarHeadMessage.php',
        data: ('userPara='+userPara),
        dataType: 'json',
        encode: true })
		.done(function(respuesta){
			if (respuesta.error == 1) 
			{
				$("#headBoxMessage").html("");
			}else
			{
				$("#headBoxMessage").html(respuesta.head);
				$("#headBoxMessage").css('background-color',respuesta.color);
			}
		});

}

var modificarEstadoMessage = function (){

	var userPara = $("#viewMessages").attr('name');

	$.ajax({
        type:'POST',
        url: '../Bussiness/modificarEstadoMensaje.php',
        data: ('userPara='+userPara),
        success:function(respuesta){
        	if (respuesta==0) {
        		$("#estadoMensaje").text("recibido");
        	}
        }
    });
		

}
