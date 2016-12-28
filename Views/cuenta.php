<?php 
include('frames/menus.php');
include('../Bussiness/usuario.php');
include('header.php'); 

$mensaje = "";
$accion = "";
if(isset($_GET['msj']))
{
    $mensaje = decrypt($_GET['msj'], "Mensaje");

    if($mensaje == 1)
    {
        $accion = "Error";
        $mensaje = "Este nombre de usuario ya se encuentra utilizado por alguien mas, prueba con otro.";
    }
    else if ($mensaje == 2)
    {
        $accion = "Error";
        $mensaje = "Este correo ya se encuentra asignado a otra cuenta, por favor intenta utilizando otro.";
    }
    else if ($mensaje == 3)
    {
        $accion = "Éxito";
        $mensaje = "Datos actualizados correctamente.";
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

        if($accion != "")
        {
            echo    
                "<script>".
                    "$(document).ready(function()".
                    "{".
                        "$('#myModal').modal('show');".
                    "});".
                "</script>";

            echo    
                '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">'.
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
                    <div style="min-height: 400px;">
                        <form action="../Bussiness/actualizarUsuario.php" method="POST">
                            <div class="row">
                                <div class="col-xs-12 ">
                                    <div class="card card-faded">
                                        <h4 class="card-header card-secondary" align="center" >
                                            <strong> Cuenta </strong>
                                        </h4>
                                        <div class="card-block">
                                            <?php $usuario = obtenerUsuario($_SESSION['USER_ID']); ?>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6" >
                                                    <?php 
                                                        echo '<input type="text" class="form-control" name="txtNombre" placeholder="Nombre" required="true" maxlength="50" value="'.$usuario['USER_NOMBRE'].'"/>'
                                                    ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <?php  
                                                        echo '<input type="text" class="form-control" name="txtApellido" placeholder="Apellido" required="true" maxlength="50" value="'.$usuario['USER_APELLIDO'].'"/>'
                                                    ?>

                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                    <?php  
                                                        echo '<input type="email" class="form-control" name="txtCorreo" placeholder="Correo" required="true" maxlength="50" value="'.$usuario['USER_CORREO'].'"/>'
                                                    ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <?php  
                                                        echo'<input type="text" class="form-control" name="txtNomUsuario" placeholder="Nombre Usuario" required="true" maxlength="50" value="'.$usuario['USER_NAME'].'"/>'
                                                    ?>
                                                </div>

                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                    <?php  
                                                        echo'<input type="Number" class="form-control" name="txtEstatura" placeholder="Estatura" step="any" min="1" max="2" value="'.$usuario['USER_ESTATURA'].'">'
                                                    ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <?php
                                                        cargarDDLEstadoCivil($_SESSION['USER_ID']);
                                                    ?> 
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                    <?php
                                                        cargarDDLColorPelo($_SESSION['USER_ID']);
                                                    ?>                             
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <?php
                                                        cargarDDLColorOjos($_SESSION['USER_ID']);
                                                    ?>
                                                </div> 
                                            </div>       
                                            <br/>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                    <?php
                                                        echo '<textarea class="form-control" name="txtDescripcion" placeholder="Descripcion" maxlength="500" style="resize: none;">'.$usuario['USER_DESCRIPCION'].'</textarea>';
                                                    ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <?php  
                                                        echo '<input type="Number" class="form-control" name="txtPeso" placeholder="Peso" min="35" max="200" value="'.$usuario['USER_PESO'].'">';
                                                    ?>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-xs-12 col-xl-3 col-xl-offset-3 col-md-4  col-sm-6">
                                                    <a class="btn btn-warning form-control" href="cambiarContrasena.php">Cambiar Contraseña</a>
                                                </div>
                                                <div class="col-xs-12 col-xl-3 col-md-4 col-sm-6">
                                                    <a class="btn btn-danger form-control" href="index.php">Volver</a>
                                                </div>

                                                <div class="col-xs-12 col-xl-3 col-md-4 col-sm-12">
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