
//Este script ya no se usa, pero de momento quedará incluido en caso de cualquier eventualidad no prevista

$(document).on('ready', funcionPrincipal);

function funcionPrincipal() {
    $('#btnEnviarMensaje').on('click', enviarMensaje); 
}

function enviarMensaje(){
	
    var mensaje = $("#txtaMensaje").val();
    var userPara = document.getElementById("viewMensajes").src;
    	$.ajax({
	        type:'POST',
	        url: '../Bussiness/enviarMensaje.php',
	        data: ('txtaMensaje='+mensaje+'&userPara='+userPara),
	        success:function(respuesta) {
	            if (respuesta > 0) {
	                $('#prueba').html('mensaje enviado');
	                $("#txtaMensaje").val("");
	                
	                
	            }else
	            {
	                $('#prueba').html('mensaje no se pudo enviar');
	            }
	        }   
    	})
}

