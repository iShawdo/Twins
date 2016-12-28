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
            $accion = "Éxito";
            $mensaje = "Foto de perfil Actualizada.";
            
        }
        else if ($mensaje == 2)
        {
            $accion = "Éxito";
            $mensaje = "Foto de perfil Eliminada :'(.";
           
        }
        else if ($mensaje == 3)
        {
            $accion = "Éxito";
            $mensaje = "Solicitud de amistad enviada.";
            
        }else if ($mensaje == 4)
        {
            $accion = "Éxito";
            $mensaje = "Mensaje enviado.";
            
        }else if ($mensaje == 5)
        {
            $accion = "Éxito";
            $mensaje = "Usuario bloqueado.";
            
        }else if ($mensaje == 6)
        {
            $accion = "Éxito";
            $mensaje = "Usuario Desbloqueado.";
            
        }

    }

    $userID = "";
    if (isset($_GET['p']))
    {
        $userID = decrypt($_GET['p'],"USER_ID");
        $usuario = obtenerUsuario($userID);
    }
    else
    {
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Perfil - Twins</title>
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
                <div style="min-height: 400px;">
                    <div class="row">
                        <div class="col-xs-12 ">
                            <div class="card card-faded">
                                <h4 class="card-header card-secondary" align="center" >
                                    <strong> Perfil </strong>
                                </h4>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                            <?php
                                                $foto = obtenerFotoPerfil($userID);
                                                echo ' <img class=" img-rounded" src="'.$foto.'"  alt="Imagen de Perfil" style="width: 100%; height: auto;">';
                                            ?>     
                                        </div>
                                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                            <?php
                                                echo '<h3><strong>'.my_ucfirst($usuario['USER_NOMBRE']).' '.my_ucfirst($usuario['USER_APELLIDO']).'</strong></h3>';
                                            ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                            <?php
                                                if($usuario['USER_DESCRIPCION'] != "")
                                                {
                                                    echo '<p>'.$usuario['USER_DESCRIPCION'].'</p>';
                                                }
                                            ?>
                                        </div>
                                        <div class="col-sm-8">
                                            <?php  
                                                if($usuario['USER_ESTADO_CIVIL'] != "")
                                                {
                                                    $estado = ObtenerDescEstadoCivil($usuario['USER_ESTADO_CIVIL'],$usuario['USER_SEXO']);
                                                    echo '<h5>'.my_ucfirst($estado).'</h5>';
                                                }
                                            ?>
                                        </div>
                                        <div class="col-sm-8">
                                            <?php
                                                $miCumple = new DateTime($usuario['USER_FECHA_NACIMIENTO']);
                                                $fechaHoy = new DateTime('now');
                                                $interval = $miCumple->diff($fechaHoy);
                                                $edad = $interval->format('%Y');
                                                echo '<h5>'.$edad.' Años</h5>';
                                            ?>
                                        </div>
                                        <div class="col-sm-8">
                                            <?php  
                                                $sexo = $usuario['USER_SEXO'];

                                                if ($sexo == 1) 
                                                {
                                                    $sexo = "<i class=\"fa fa-mars\" aria-hidden=\"true\"></i> Hombre";
                                                }
                                                elseif ($sexo == 2) 
                                                {
                                                    $sexo = "<i class=\"fa fa-venus\" aria-hidden=\"true\"></i> Mujer";
                                                }

                                                echo '<h5>'.$sexo.'</h5>';
                                            ?>
                                        </div>
                                    </div>
                                    <br/>
                                    <h4><center><strong>Información Adicional</strong></center></h4>
                                    <br/>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <?php
                                                if($usuario['USER_ESTATURA'] != "")
                                                {
                                                    echo '<label> Estatura: '.$usuario['USER_ESTATURA'].'</label>';
                                                }
                                                else
                                                {
                                                    echo '<label> Estatura: No informada</label>';
                                                }
                                            ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <?php  
                                                if($usuario['USER_PESO'] != "")
                                                {
                                                    echo '<label> Peso: '.$usuario['USER_PESO'].'</label>';
                                                }
                                                else
                                                {
                                                    echo '<label> Peso: No informado</label>';
                                                }
                                            ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <?php
                                                if($usuario['USER_COLOR_OJOS'] != "")
                                                {
                                                    $ojos = ObtenerDescColorOjos($usuario['USER_COLOR_OJOS'])['DOM_DESC']; // crear este metodo en dominio
                                                    echo '<label> Color de Ojos: '.my_ucfirst($ojos).'</label>';
                                                }
                                                else
                                                {
                                                    echo '<label> Color de Ojos: No informado</label>';
                                                }
                                            ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <?php
                                                if($usuario['USER_COLOR_PELO'] != "")
                                                {
                                                    $pelo = ObtenerDescColorPelo($usuario['USER_COLOR_PELO'])['DOM_DESC'];
                                                    echo '<label> Color de Pelo: '.my_ucfirst($pelo).'</label>';
                                                }
                                                else
                                                {
                                                    echo '<label> Color de Pelo: No informado</label>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <?php 
                                    if ($_SESSION['USER_ID'] != $userID ) 
                                    {
                                ?>
                                <div class="container-fluid">
                                    <div class="row">
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 col-lg-offset-6 col-xl-2 col-xl-offset-6">
                                                <button type="button" class="btn btn-info form-control" data-toggle="modal" data-target="#modalEnviarMP" title="Enviar Mensaje">
                                                    <i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                                <div class="modal fade" id="modalEnviarMP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <button type="button" class="close" 
                                                                   data-dismiss="modal">
                                                                       <span aria-hidden="true">&times;</span>
                                                                       <span class="sr-only">Close</span>
                                                                </button>
                                                                <h4 class="modal-title" id="myModalLabel">
                                                                    Enviar mensaje
                                                                </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                        
                                                                <?php 

                                                                    function after($this, $inthat)
                                                                    {
                                                                        if (!is_bool(strpos($inthat, $this)))
                                                                        return substr($inthat, strpos($inthat,$this)+strlen($this));
                                                                    };

                                                                    $url = $_SERVER["REQUEST_URI"];
                                                                    $url = after('p=', $url);

                                                                ?>
                                                                        
                                                                <div class="form-group">
                                                                    <textarea  class="form-control" id="txtMensajePerfil" name="txtMensajePerfil" placeholder="Escribe un mensaje..." maxlength="2500" rows="4" style ="resize:none;"></textarea>
                                                                </div>

                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                
                                                                <button type="button" id="btnEnviarMP" class="btn btn-info">Enviar</button>&nbsp;<font id="mensajeErrorMP" class="text-muted"></font>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php

                                                $estaBloqueado = tengoBloqueadoUsuario($_SESSION['USER_ID'],$userID);
                                                if ($estaBloqueado) 
                                                {
                                                    echo '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                                                            <a class="btn btn-danger form-control" title="Desbloquear Usuario" href="../Bussiness/desbloquearUsuario.php?id='.$userID.'" ><i class="fa fa-unlock fa-lg" aria-hidden="true"></i></a>
                                                        </div>';
                                                }
                                                else
                                                {
                                                    echo '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                                                            <a class="btn btn-danger form-control" title="Bloquear Usuario" href="../Bussiness/bloquearUsuario.php?id='.$userID.'" ><i class="fa fa-lock fa-lg" aria-hidden="true"></i></a>
                                                        </div>';
                                                }
                                            
                                                $amigo = obtenerEstadoAmigo($userID); 
                                                if ($amigo == 22 ) 
                                                {
                                                    echo '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                                                            <a class="btn btn-success form-control" title="Solicitud en Espera" href="#"><i class="fa fa-spinner fa-lg fa-spin" aria-hidden="true"></i></a>
                                                         </div>';
                                                }
                                                elseif($amigo == 23)
                                                {
                                                    echo '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                                                            <a class="btn btn-success form-control" title="¡Ya son Amigos!" href="#"><i class="fa fa-users fa-lg" aria-hidden="true"></i></a>
                                                        </div>';
                                                }
                                                else
                                                {
                                                    if (!$estaBloqueado) 
                                                    {
                                                        echo '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                                                                <a id="btnEnviarAmistad" class="btn btn-success form-control" title="Enviar Solicitud de Amistad"><i class="fa fa-user-plus fa-lg" aria-hidden="true"></i></a>
                                                            </div>';
                                                    }
                                                }

                                            ?>           
                                    </div>
                                </div>
                                <br/>
                                <?php

                                    }

                                ?>      
                            </div>
                        </div>
                    </div>
                </div> 
                <br/>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card card-faded">
                            <h4 class="card-header card-secondary">
                                <center><strong>Fotos</strong></center>
                            </h4>
                            <div class="card-block">
                                <?php 
                                    $dir_subida = '../Resources/userImages/'; // directorio de subida de imagenes
                                    if(isset($_FILES['fichero_usuario'])) // si viene la imagen seteada
                                    {
                                        if($_FILES['fichero_usuario']['type'] == 'image/jpeg') // verificamos si es una imagen jpeg
                                        { 
                                            $contador = 1;
                                            $salir = false;
                                            $nombreAux = basename($_FILES['fichero_usuario']['name'],".jpg"); // tomamos el nombre de la foto
                                            while($salir == false)
                                            {   
                                                if(tengoQueCambiarNombreFoto($nombreAux.".jpg") == true) // si el nombre esta ocupado
                                                {
                                                    $nombreAux = $nombreAux.$contador; // le agregamos un numero que va con un contador
                                                    $contador = $contador + 1;
                                                }else
                                                {
                                                    $salir = true; // si no salimos
                                                }
                                            }
                                            $fichero_subido = $dir_subida . $nombreAux . ".jpg";
                                            if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
                                               
                                                if(subirFoto($dir_subida, $nombreAux.".jpg", $_SESSION['USER_ID']))
                                                {
                                                    $accion = "Éxito";
                                                    $mensaje = "Imagen subida con éxito.";
                                                }
                                            }
                                        }else
                                        {
                                            $accion = "Error";
                                            $mensaje = "La imagen no cumple con el formato permitido, intente subir solo archivos .jpeg .png.";
                                        }
                                    }else
                                    {
                                        $accion = "Advertencia";
                                        $mensaje = "Debe seleccionar una imagen para poder subir a su perfil.";
                                    }

                                    echo    "<script>".
                                                "$('#myModal2').modal('show');".
                                            "</script>";

                                    echo    '<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">'.
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


                                    if($_SESSION['USER_ID'] == $userID)
                                    {
                                        $idEncriptado = encrypt($userID, "USER_ID");
                                        echo 
                                        '<form enctype="multipart/form-data" action="perfil.php?p='.$idEncriptado.'" method="POST">'.
                                        '<div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                        <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000000" />
                                                        <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
                                                        <input name="fichero_usuario" type="file" class="form-control"/>
                                                        
                                                </div> 
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                    <input type="submit" value="Subir Foto" class="btn btn-success"/>&nbsp;<i class="fa fa-question-circle fa-lg" aria-hidden="true" title="Por el momento solo se admiten fotos en formato .jpg, pronto mejoraremos esta funcionalidad :)" style="color: #5383d3;"></i>
                                                </div> 
                                            </div>'.
                                        '</form> <br/>';
                                    } 

                                ?>
                                <div class="card-columns">
                                    <div class="card-deck">
                                        <?php
                                            obtenerFotos($_SESSION['USER_ID'], $userID);                   
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <br/>
            </div>
        </div>
    </div>
</div>
   <script src="../Resources/js/perfilFunctions.js" type="text/javascript" charset="utf-8" ></script>
</body>
</html>

<?php include('footer.php'); ?>