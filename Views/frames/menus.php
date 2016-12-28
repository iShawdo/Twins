<?php 
include('../Bussiness/fotos.php');
include('../Bussiness/functions.php');

    function menuLateralIzquierdo()
    {
        // obtengo la foto de perfil
        $foto = obtenerFotoPerfil($_SESSION['USER_ID']);
        $idEncriptado = encrypt($_SESSION['USER_ID'], "USER_ID");

        echo 
        '<div class="card">'.
            '<br/>'.
            '<center>'.
            '<img class="img-fluid img-circle" src="'.$foto.'"  alt="Card image cap" style="width: 128px; height: 128px;">'.
            '<p class="text-muted">'.($_SESSION['USER_NOMBRE']).'</p>'.
            '</center>'.
            '<br/>'.
            '<ul class="list-group list-group-flush" style="margin-left: 25%; margin-right: 25%;">'.
                '<a class="list-group-item" href="../Views/index.php"><i class="fa fa-home fa-lg" aria-hidden="true"></i> Inicio</a>'.
                '<a class="list-group-item" href="../Views/perfil.php?p='.$idEncriptado.'"><i class="fa fa-user fa-lg" aria-hidden="true"></i> Perfil</a>'.
                '<a class="list-group-item" href="../Views/amigos.php"><i class="fa fa-users fa-lg" aria-hidden="true"></i> Amigos</a>'.
                '<a class="list-group-item" href="../Views/mensajes.php"><i class="fa fa-commenting fa-lg" aria-hidden="true"></i> Mensajes</a>'.
                '<a class="list-group-item" href="../Views/cuenta.php"><i class="fa fa-cog fa-lg" aria-hidden="true"></i> Cuenta</a>'.
                '<a class="list-group-item" href="../Bussiness/cerrarSession.php"><i class="fa fa-power-off fa-lg" aria-hidden="true"></i> Salir</a>'.
            '</ul>'.
            '<br/><br/><br/>'.
        '</div>';
    }


?>