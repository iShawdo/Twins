<?php 

function obtenerFotoPerfil($USER_ID)
{
	include ('conexion.php');

	// Vemos si tiene alguna foto de perfil seleccionada
	$query = "SELECT FOTO_RUTA,FOTO_NOMBRE FROM foto WHERE USUARIO_ID = $USER_ID AND FOTO_PERFIL = 1";
	$respuesta = $con -> query($query);
	$rows = mysqli_num_rows($respuesta);

	if($rows > 0)
	{
		$datos = $respuesta -> fetch_assoc();
		return $datos['FOTO_RUTA'].$datos['FOTO_NOMBRE'];
	}
	else
	{
		return "../Resources/userImages/foto-default.jpg";
	}
}

function subirFoto($directorio, $nombreFoto, $userID)
{
	include ('conexion.php');

	$insert = "INSERT INTO foto (USUARIO_ID, FOTO_RUTA, FOTO_NOMBRE, FOTO_PERFIL) VALUES ($userID, '$directorio', '$nombreFoto', 0)";
	if($con -> query($insert))
	{
		return true;
	}else
	{
		return false;
	}
}

function tengoQueCambiarNombreFoto($nombreAux)
{
	include ('conexion.php');

	$consulta = "SELECT * FROM foto WHERE FOTO_NOMBRE = '$nombreAux'";
	$respuesta = $con -> query($consulta);
	$rows = mysqli_num_rows($respuesta);

	if($rows > 0 )
	{
		return true;
	}else
	{
		return false;
	}

}

function obtenerFotos($USER_ID, $ID_PERFIL)
{
	include('conexion.php');
     
    $consulta = "SELECT FOTO_RUTA,FOTO_NOMBRE,FOTO_ID FROM foto WHERE USUARIO_ID = $ID_PERFIL";
    $respuesta = $con -> query($consulta);

    while($rows = $respuesta -> fetch_array())
    {   
    	$idfoto = $rows['FOTO_ID'];
        $FOTITO = $rows['FOTO_RUTA'].$rows['FOTO_NOMBRE'];
        echo '<div class="card" >';
        echo '<img class="card-img-top " src="'.$FOTITO .'"  alt="Card image cap" style="width: 100%;">';
        if ($USER_ID == $ID_PERFIL) 
        {
            echo' 
              <div class="card-block text-xs-center">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary" onclick="location.href=\'../Bussiness/actualizarFoto.php?ft='.$idfoto.'\'">Perfil</button>
                    <button type="button" class="btn btn-primary" onclick="location.href=\'../Bussiness/eliminarFoto.php?ft='.$idfoto.'\'">Eliminar</button>
                </div>
              </div>';
        }
        echo' </div>';
    }                       
}

?>