<?php 

    include('../Bussiness/conversaciones.php');
    include('frames/menus.php');
    include('header.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mensajes - Twins</title>
    
</head>
<body>
    <br/>
    <div id="wrapper">
        <div class="container-fluid">
            <div class="row">
                <!-- Contenido del menú, Copiar esto en cada página ya que no existe la masterpage aquí :c -->
                <div class="col col-lg-3 hidden-md-down">
                    <?php menuLateralIzquierdo(); ?>
                </div>
                <div class="col col-lg-9">
                <!-- Inserte el contenido de la página aquí -->
                    <div class="row" style="margin: 0px;">
                        <div class="col list-friend-box" id="list-friend-box">
                            <div class="list-group" >
                                <?php 
                                    obtenerListadoMensajeros();
                                ?>
                            </div>
                       </div>
                       <div class="col" style="margin: 0px;width: 70%;float: left;">
                           <div class="list-group" style="">
                                <div class="message-box" id="cajaMensajes" >
                                     <!-- la clase message-frien-box es para almacenar los mensajes del otro usuario con el que se esta hablando -->
                                    <div id="headBoxMessage" style="width: 100%;box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);display: inline-block;"></div>
                                    <div id="viewMessages"  name="" style="overflow: auto;border-radius:.25rem;height: 479px">
                                        <!--aqui se cargan todos los mensajes -->
                                    </div>
                                    
                                </div>  
                                    <div class="input-group" style="border-radius:.25rem;box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);">
                                    <textarea class="form-control" maxlength="2500" placeholder="Escribe un mensaje..." rows="5" id="txtaMensaje" name="txtaMensaje" style="height: 40px;resize: none;" required="true"></textarea>
                                    <span class="input-group-btn" style="">
                                        <button class="btn btn-secondary" type="button" id="btnEnviarMensaje"  style="height: 40px;color: #00b0ff;"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i></button>
                                    </span> 
                                </div>                   
                            </div>                            
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="../Resources/js/TwinsFunctions/messageFunctions.js" type="text/javascript" charset="utf-8" ></script>
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>
</html>

<?php include('footer.php'); ?>