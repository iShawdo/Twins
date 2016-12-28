<?php 
	
function obtenerNombre($USER_ID)
{
	include('conexion.php');
	$consulta = "SELECT USER_NOMBRE FROM usuario WHERE USER_ID = $USER_ID";
	$respuesta = $con -> query($consulta);
	$row = $respuesta->fetch_assoc();

	return $row['USER_NOMBRE'];
}

function obtenerApellido($USER_ID)
{
	include('conexion.php');
	$consulta = "SELECT USER_APELLIDO FROM usuario WHERE USER_ID = $USER_ID";
	$respuesta = $con -> query($consulta);
	$row = $respuesta->fetch_assoc();

	return $row['USER_APELLIDO'];
}

function obtenerCorreo($USER_ID)
{
	include('conexion.php');
	$consulta = "SELECT USER_CORREO FROM usuario WHERE USER_ID = $USER_ID";
	$respuesta = $con -> query($consulta);
	$row = $respuesta->fetch_assoc();

	return $row['USER_CORREO'];
}

function obtenerSexo($USER_ID)
{
	include('conexion.php');
	$consulta = "SELECT USER_SEXO FROM usuario WHERE USER_ID = $USER_ID";
	$respuesta = $con -> query($consulta);
	$row = $respuesta->fetch_assoc();

	return $row['USER_SEXO'];
}

function obtenerUserName($USER_ID)
{
	include('conexion.php');
	$consulta = "SELECT USER_NAME FROM usuario WHERE USER_ID = $USER_ID";
	$respuesta = $con -> query($consulta);
	$row = $respuesta->fetch_assoc();

	return $row['USER_NAME'];
}

function obtenerDescripcion($USER_ID)
{
	include('conexion.php');
	$consulta = "SELECT USER_DESCRIPCION FROM usuario WHERE USER_ID = $USER_ID";
	$respuesta = $con -> query($consulta);
	$row = $respuesta->fetch_assoc();

	return $row['USER_DESCRIPCION'];
}

function obtenerEstatura($USER_ID)
{
	include('conexion.php');
	$consulta = "SELECT USER_ESTATURA FROM usuario WHERE USER_ID = $USER_ID";
	$respuesta = $con -> query($consulta);
	$row = $respuesta->fetch_assoc();

	return $row['USER_ESTATURA'];
}

function obtenerPeso($USER_ID)
{
	include('conexion.php');
	$consulta = "SELECT USER_PESO FROM usuario WHERE USER_ID = $USER_ID";
	$respuesta = $con -> query($consulta);
	$row = $respuesta->fetch_assoc();

	return $row['USER_PESO'];
}

function obtenerColorOjos($USER_ID)
{
	include('conexion.php');
	$consulta = "SELECT USER_COLOR_OJOS FROM usuario WHERE USER_ID = $USER_ID";
	$respuesta = $con -> query($consulta);
	$row = $respuesta->fetch_assoc();
	
	return $row['USER_COLOR_OJOS'];
}

function obtenerColorPelo($USER_ID)
{
	include('conexion.php');
	$consulta = "SELECT USER_COLOR_PELO FROM usuario WHERE USER_ID = $USER_ID";
	$respuesta = $con -> query($consulta);
	$row = $respuesta->fetch_assoc();

	return $row['USER_COLOR_PELO'];
}

function obtenerEstadoCivil($USER_ID)
{
	include('conexion.php');
	$consulta = "SELECT USER_ESTADO_CIVIL FROM usuario WHERE USER_ID = $USER_ID";
	$respuesta = $con -> query($consulta);
	$row = $respuesta->fetch_assoc();

	return $row['USER_ESTADO_CIVIL'];
}

function obtenerFecha($USER_ID)
{
	include('conexion.php');
	$consulta = "SELECT USER_FECHA_NACIMIENTO FROM usuario WHERE USER_ID = $USER_ID";
	$respuesta = $con -> query($consulta);
	$row = $respuesta->fetch_assoc();

	return $row['USER_FECHA_NACIMIENTO'];
}

function obtenerEstadoAmigo($userID)
{
	include('conexion.php');
	$mi_ID = $_SESSION['USER_ID'];
	$consulta = "SELECT * FROM amigo WHERE AMI_ID = (SELECT MAX(AMI_ID) FROM amigo WHERE ((USUARIO_AMIGO_ID = $userID AND USUARIO_ID = $mi_ID) OR (USUARIO_AMIGO_ID = $mi_ID AND USUARIO_ID = $userID)))";
	$respuesta = $con-> query($consulta);
	$row = $respuesta->fetch_assoc();

	return $row['EST_ID'];
}

function obtenerBloqueado($userID)
{
	include('conexion.php');
	$consulta = "SELECT * FROM bloqueo WHERE USUARIO_AMIGO_ID = $userID";
	$respuesta = $con-> query($consulta);
	$row = $respuesta->fetch_assoc();

	return $row['EST_ID'];
}

function tengoBloqueadoUsuario($USER_ID, $USER_BLOQ_ID) 
{
    include('conexion.php');
    $consulta = "SELECT * FROM bloqueo WHERE USUARIO_ID = $USER_ID AND USUARIO_BLOQ_ID = $USER_BLOQ_ID";
    $respuesta = $con -> query($consulta);
    $rows = mysqli_num_rows($respuesta);
    
    if($rows > 0)
    {
    	return true;
    }
    else
    {
    	return false;
    }
}

function obtenerQuienBloquea() 
{
    include('conexion.php');
  
    $id_USER = $_SESSION['USER_ID'];
    $consulta = "SELECT USUARIO_ID FROM bloqueo WHERE USUARIO_BLOQ_ID = $id_USER";
    $respuesta = $con -> query($consulta);

    return $respuesta;
}

function obtenerUsuario($USER_ID)
{
	include ('conexion.php');


	$consulta = "SELECT * FROM usuario WHERE USER_ID = $USER_ID";
	$respuesta = $con -> query($consulta);
	$rows = mysqli_num_rows($respuesta);

	if($rows > 0)
	{
		$fila = $respuesta->fetch_assoc();
		return $fila;
	}
	else
	{
		return null;
	}
}

function obtenerTitleConexion($USER_ID)
{
	include ('conexion.php');


	$consulta = "SELECT * FROM conexion WHERE USER_ID = $USER_ID AND CON_ID = (SELECT MAX(CON_ID) FROM conexion WHERE USER_ID = $USER_ID)";
	$respuesta = $con -> query($consulta);
	$rows = mysqli_num_rows($respuesta);

	if($rows > 0)
	{
		$fila = $respuesta->fetch_assoc();
		if($fila['DOM_ID'] == 20)
		{
			return '<i class="fa fa-user" aria-hidden="true" style="color: #04B404;" title="Conectado"></i>';
		}
		else
		{
			$fechaDesconexion = date_create($fila['CON_FECHA']);
			$fechaDesconexion = date_format($fechaDesconexion, 'd/m/Y');
			$fechaActual = date('Y-m-d H:i:s');
			//$interval = $fechaDesconexion->diff($fechaActual);

			
			return '<i class="fa fa-user" aria-hidden="true" style="color: #FA5858;" title="Desconectado (Última conexión: '.$fechaDesconexion.')"></i>';
		}
	}
	else
	{
		return '<i class="fa fa-user" aria-hidden="true" style="color: #FA5858;" title="Desconectado"></i>';
	}
}

function obtenerCantidadAmigos($USER_ID)
{
	include ('conexion.php');


	$consulta = "SELECT * FROM amigo WHERE EST_ID = 23 AND (USUARIO_ID = $USER_ID OR USUARIO_AMIGO_ID = $USER_ID)";
	$respuesta = $con -> query($consulta);
	$rows = mysqli_num_rows($respuesta);

	return $rows;
}

function obtenerCantidadFotos($USER_ID)
{
	include ('conexion.php');

	$consulta = "SELECT * FROM foto WHERE USUARIO_ID = $USER_ID";
	$respuesta = $con -> query($consulta);
	$rows = mysqli_num_rows($respuesta);

	return $rows;
}

function cargarDDLEstadoCivil($USER_ID)
{
	include('conexion.php');
    $consulta = "SELECT * FROM dominio WHERE DOM_TITLE = 'ESTADO_CIVIL'";
    $respuesta = $con-> query($consulta);
    $estadoC = obtenerEstadoCivil($USER_ID);

    echo
        '<select class="form-control" name="ddlEstadoCivil">
            <option>Estado Civil</option>';
    
    while($fila = $respuesta -> fetch_assoc()) 
    {
        if($fila['DOM_ID'] == $estadoC)
        {
            echo'<option value="'.$fila['DOM_ID'].'" selected="True">'.my_ucfirst($fila['DOM_DESC']).'</option>';
        }
        else 
        {
            echo'<option value="'.$fila['DOM_ID'].'">'.my_ucfirst($fila['DOM_DESC']).'</option>';
        }
    } 

    echo '</select>';
}

function cargarDDLColorPelo($USER_ID)
{
	include('conexion.php');
    $consulta = "SELECT * FROM dominio WHERE DOM_TITLE = 'COLOR_PELO'";
    $respuesta = $con-> query($consulta); 
    $colorPelo = obtenerColorPelo($USER_ID);

    echo
        '<select class="form-control" name="ddlPelo">
            <option>Color de Pelo</option>';

    while($fila = $respuesta -> fetch_assoc()) 
    {
        if($fila['DOM_ID'] == $colorPelo)
        {
            echo'<option value="'.$fila['DOM_ID'].'" selected="True">'.my_ucfirst($fila['DOM_DESC']).'</option>';
        }
        else
        {
            echo'<option value="'.$fila['DOM_ID'].'">'.my_ucfirst($fila['DOM_DESC']).'</option>';
        }
    } 

    echo '</select>';
}

function cargarDDLColorOjos($USER_ID)
{
	include('conexion.php');
    $consulta = "SELECT * FROM dominio WHERE DOM_TITLE = 'COLOR_OJOS'";
    $respuesta = $con-> query($consulta); 
    $colorOjos = obtenerColorOjos($USER_ID);

    echo
        '<select class="form-control" name="ddlOjos">
            <option>Color de Ojos</option>';

    while($fila = $respuesta -> fetch_assoc()) 
    {
        if($fila['DOM_ID'] == $colorOjos)
        {
            echo'<option value="'.$fila['DOM_ID'].'" selected="True">'.my_ucfirst($fila['DOM_DESC']).'</option>';
        }
        else
        {
            echo'<option value="'.$fila['DOM_ID'].'">'.my_ucfirst($fila['DOM_DESC']).'</option>';
        }
    } 

    echo '</select>';
}

	function obtenerDescEstadoCivil($DOM_ID, $sexo)
    {
        include('conexion.php');
        $consulta = "SELECT * FROM dominio WHERE DOM_ID = $DOM_ID";
        $respuesta = $con -> query($consulta);
        $fila = $respuesta -> fetch_assoc();

        if($sexo == 1)
        {
        	if($fila['DOM_ID'] == 16)
	        {
	        	return "Soltero";
	        }
	        elseif ($fila['DOM_ID'] == 17)
	        {
	        	return "En Pareja";
	        }
	        elseif ($fila['DOM_ID'] == 18)
	        {
	        	return "Casado";
	        }
	        elseif ($fila['DOM_ID'] == 19)
	        {
	        	return "Divorciado";
	        }
        }
        elseif($sexo == 2)
		{
			if($fila['DOM_ID'] == 16)
	        {
	        	return "Soltera";
	        }
	        elseif ($fila['DOM_ID'] == 17)
	        {
	        	return "En Pareja";
	        }
	        elseif ($fila['DOM_ID'] == 18)
	        {
	        	return "Casada";
	        }
	        elseif ($fila['DOM_ID'] == 19)
	        {
	        	return "Divorciada";
	        }
		}
    }

    function ObtenerDescColorPelo($DOM_ID)
    {
        include('conexion.php');
        $consulta = "SELECT * FROM dominio WHERE DOM_ID = $DOM_ID";
        $respuesta = $con -> query($consulta);
        $fila = $respuesta -> fetch_assoc();
        
        return $fila;
    }

    function ObtenerDescColorOjos($DOM_ID)
    {
        include('conexion.php');
        $consulta = "SELECT * FROM dominio WHERE DOM_ID = $DOM_ID";
        $respuesta = $con -> query($consulta);
        $fila = $respuesta -> fetch_assoc();
        
        return $fila;
    }


?>