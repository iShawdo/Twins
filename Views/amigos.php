<?php 


include('frames/menus.php');
include('../Bussiness/amistad.php');
include('header.php');

    // Si existe la variable msj por url, seteamos los mensajes
$mensaje = "";
$accion = "";
if(isset($_GET['msj']))
{
    $mensaje = decrypt($_GET['msj'], "Mensaje");
    if($mensaje == 1)
    {
        $accion = "Éxito";
        $mensaje = "La solicitud de amistad fue aceptada con éxito.";
    }
    else if ($mensaje == 2)
    {
        $accion = "Éxito";
        $mensaje = "La solicitud de amistad fue rechazada con éxito.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amigos - Twins</title>
</head>
<body>


    <?php 
    if($accion != "")
    {
        echo    "<script>".
        "$(document).ready(function()".
        "{".
        "$('#myModal').modal('show');".
        "});".
        "</script>";

        echo    '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">'.
        '<div class="modal-dialog" role="document">'.
        '<div class="modal-content">'.
        '<div class="modal-header">'.
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'.
        '<span aria-hidden="true">&times;</span>'.
        '</button>'.
        '<h4 class="modal-title">'.$accion.'</h4>'.
        '</div>'.
        '<div class="modal-body">'.
        '<p>'.$mensaje.'</p>'.
        '</div>'.
        '<div class="modal-footer">'.
        '<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>'.
        '</div>'.
        '</div><!-- /.modal-content -->'.
        '</div><!-- /.modal-dialog -->'.
        '</div><!-- /.modal -->';
    }
    ?>

  <br/>
  <div id="wrapper">
    <div class="container-fluid">
        <div class="row">
            <!-- Contenido del menú, Copiar esto en cada página ya que no existe la masterpage aquí :c -->
            <div class="col col-lg-3 hidden-md-down">
                <?php menuLateralIzquierdo(); ?>
            </div>
            <div class="col col-lg-9">
                <div class="row">
                    <div class="col-xs-12 ">
                        <div class="card card-faded">
                            <h4 class="card-header card-secondary" >
                                <center><strong>Solicitudes de Amistad</strong></center>
                            </h4>
                            <div class="card-block">
                                <div class="row">
                                    <table class="table table-hover" width="100%">
                                        <tbody>
                                            <?php obtenerSolicitudesAmistad($_SESSION['USER_ID']); // funcion que llena la tabla con las solicitudes de amistad que tenga el usuario pendiente ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 ">
                        <div class="card card-faded">
                            <h4 class="card-header card-secondary" >
                                <center><strong>Amigos</strong></center>
                            </h4>
                            <div class="card-block">
                                <div class="row">
                                    <?php obtenerAmigos($_SESSION['USER_ID']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php include('footer.php'); ?>