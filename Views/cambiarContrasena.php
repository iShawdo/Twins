<?php 

include('frames/menus.php');
include('header.php'); 

// Si existe la variable msj por url, seteamos los mensajes
$mensaje = "";
$accion = "";
if(isset($_GET['msj']))
{
    $mensaje = decrypt($_GET['msj'], "Mensaje");
    if($mensaje == 1)
    {
        $accion = "Error";
        $mensaje = "Las nuevas contraseñas ingresadas no coinciden.";
    }
    else if ($mensaje == 2)
    {
        $accion = "Error";
        $mensaje = "Error en su contraseña Actual, porfavor ingrese su contraseña actual.";
    }
    else if ($mensaje == 3)
    {
        $accion = "Éxito";
        $mensaje = "La contraseña fué actualizada exitosamente.";
    }
}
   
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cuenta - Twins</title>
</head>
<body>
    <?php 
        if($accion != "") // si hay algun mensaje seteado, activamos el modal con el mensaje correspondiente
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
                    <!-- Inserte el contenido de la página aquí -->
                    <div class="" style="min-height: 400px;">
                        <form action="../Bussiness/actualizarContrasena.php" method="POST">
                            <div class="row">
                                <div class="col-xs-12 ">
                                    <div class="card card-faded">
                                        <h4 class="card-header card-secondary" align="center" >
                                            <strong> Cambiar Contraseñas </strong>
                                        </h4>
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-xs-12 col-xl-6 col-md-6 col-sm-6">
                                                    <input type="password" class="form-control" name="txtContraseñaA" placeholder="Antigua Contraseña" required="true" maxlength="30">
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-xs-12 col-xl-6 col-md-6 col-sm-6">
                                                    <input type="password" class="form-control" name="txtContraseñaN" placeholder="Nueva Contraseña" required="true" maxlength="30">
                                                </div>

                                                <div class="col-xs-12 col-xl-6 col-md-6 col-sm-6 ">
                                                    <input type="password" class="form-control" name="txtContraseñaNR" placeholder="Repetir Contraseña" required="true" maxlength="30">
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-xs-12 col-xl-2 col-xl-offset-8 col-md-2 col-md-offset-8 col-sm-6">
                                                    <a class="btn btn-danger form-control" href="cuenta.php" >Volver</a>
                                                </div>
                                                <div class="col-xs-12 col-xl-2 col-md-2 col-sm-6">
                                                    <button type="submit" class="btn btn-success form-control">Guardar</button>
                                                </div>
                                            </div>
                                            <br/>
                                        </div>
                                    </div>
                                </div>
                                <br/>     
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



<?php include('footer.php'); ?>