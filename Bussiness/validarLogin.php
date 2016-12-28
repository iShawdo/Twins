<?php 
	session_start();
	include ('conexion.php');
	include ('functions.php');

	$usuario = $_REQUEST['txtUsuario'];
	$contraseña = $_REQUEST['txtContraseña'];
	$contraseña = md5($contraseña);
	$contraseña = md5($contraseña);

	$consulta = "SELECT USER_NAME FROM usuario WHERE UPPER(USER_NAME) = UPPER('$usuario')";
	$respuesta = $con -> query($consulta);

	if(mysqli_num_rows($respuesta) > 0)
	{
		$consultaFinal = "SELECT USER_ID, USER_NAME, USER_PASSWORD, TIP_USER_ID, USER_NOMBRE, USER_APELLIDO FROM usuario WHERE USER_NAME = '$usuario' AND USER_PASSWORD = '$contraseña'";
		$respuestaFinal = $con -> query($consultaFinal);

		if(mysqli_num_rows($respuestaFinal) > 0)
		{	
			// generamos la session y redireccionamos al home de la aplicación
			$registro = $respuestaFinal->fetch_assoc();
			$_SESSION['USER_ID'] = $registro['USER_ID'];
			$_SESSION['USER_NAME'] = $registro['USER_NAME'];
			$_SESSION['TIP_USER_ID'] = $registro['TIP_USER_ID'];
			$_SESSION['USER_NOMBRE'] = my_ucfirst($registro['USER_NOMBRE']).' '.my_ucfirst($registro['USER_APELLIDO']);

			$userID = $registro['USER_ID'];
			$conectado = 20; // Segun la bd, este numero es Conectado! :D
			$date = date('Y-m-d H:i:s');

			// Insertamos el inicio de sesion a la tabla conexion
			$cambioEstado = "INSERT INTO conexion (USER_ID, DOM_ID, CON_FECHA) VALUES ($userID, $conectado, '$date')";
			$respuestaCambioEstado = $con -> query($cambioEstado);

			header ('location: ../Views/index.php');
		}
		else
		{
			$mensaje = encrypt("2", "Mensaje"); // la contraseña no coincide con el usuario
			header ('location: ../Views/login.php?msj='.$mensaje);
		}
	}
	else
	{
		$mensaje = encrypt("1", "Mensaje"); // no encontro el nombre de usuario
		header ('location: ../Views/login.php?msj='.$mensaje);
	}
?>