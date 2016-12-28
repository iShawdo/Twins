 $(document).on('ready',function(){
    
    funcionAmistad();
    funcionMensaje();

});

                                                      

 var funcionMensaje = function()
 {  
     $("#btnEnviarMP").on('click', function(e)
     {
         e.preventDefault();

         var mensajito = $("#txtMensajePerfil").val();
         var id =  document.URL;
         id = id.substring(id.indexOf("p="), id.length);
         id = id.replace("p=", "");
     $.ajax
         ({
         type:'POST',
         url:'../Bussiness/enviarMensajePerfil.php',
         data:('mensajito='+mensajito+'&id='+id),
         success:function(respuesta){
                $("#txtMensajePerfil").val("");
                $("#mensajeErrorMP").val("");
                if (respuesta == 0) 
                {   
                     $("#modalEnviarMP").modal('toggle');
                }else
                {
                    $("#mensajeErrorMP").val("No se pudo enviar el mensaje");

                }
           }
         })

     });
  }

                                 
var funcionAmistad = function(){  

    $("#btnEnviarAmistad").on('click',function(e)
    {
      e.preventDefault();
      
        var id =  document.URL;
        id = id.substring(id.indexOf("p="), id.length);
        id = id.replace("p=", "");
        $.ajax
            ({
            type:'POST',
            url:'../Bussiness/enviarSolicitudAmistad.php',
            data:('id='+id),
            success:function(respuesta){
                                         
                $(location).attr('href',respuesta);
                                        
                } 
            })

    });
 }