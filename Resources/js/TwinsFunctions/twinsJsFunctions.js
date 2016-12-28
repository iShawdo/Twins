//esto verifica que encuanto el documento este listo realizara la funcion "funcionPrincipal"


//------------------------------------------//
// Funciones antes usadas en el iframe 		//
// este archivo ya no se esta ocupando pero //
// quedará incluido en caso de cualquier    //
// eventualidad no prevista                 //
//------------------------------------------//

$(document).on('ready', funcionPrincipal);
function funcionPrincipal() {
 	//se le añade el evento "onload" al elemento con id ="viewMensajes" el que corresponde al iframe de  mensajes.php y
 	//ejecuta la funcion "onLoadIframeMensaje" 
    $('#viewMensajes').on('ready', onLoadIframeMensaje);
 }
 function onLoadIframeMensaje(){
 	//estas dos lineas se encargan de que al momento de recargarse el iframe el scroll se vaya automaticamente hasta el final, de ser necesario
 	var $contents = $('#viewMensajes').contents();
     $contents.scrollTop($contents.height());
 }
//funcion utilizada para enviar por get el id del usuario con quien se desea conversar, al archivo cajaMensaje.php y asi cargar la conversion
 function setURL(url){
     document.getElementById('viewMensajes').src = url;
     //document.getElementById('formMensaje').action = url;
 }

//-------------------------------------//
//                                     //
//-------------------------------------//



