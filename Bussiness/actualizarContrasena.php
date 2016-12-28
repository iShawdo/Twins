<?php 
	session_start();
	include ('conexion.php');
	include ('functions.php');

	$contraAntigua 		= $_REQUEST['txtContraseñaA'];
	$contraAntigua 		= md5($contraAntigua);
	$contraAntigua 		= md5($contraAntigua);

	$contraNueva		= $_REQUEST['txtContraseñaN'];
	$contraNuevaR		= $_REQUEST['txtContraseñaNR'];

	$USER_ID = $_SESSION['USER_ID'];
	

	$consulta = "SELECT * FROM usuario 
						  WHERE USER_PASSWORD = '$contraAntigua' AND USER_ID = $USER_ID";
	$respuesta = $con->query($consulta);
	$rows = mysqli_num_rows($respuesta);

	if($rows > 0)
	{
		if($contraNueva == $contraNuevaR)
		{
			$contraNueva = md5($contraNueva);
			$contraNueva = md5($contraNueva);
			$consulta = "UPDATE usuario SET USER_PASSWORD = '$contraNueva' WHERE USER_ID = $USER_ID";
			$con->query($consulta);
			$mensaje = encrypt("3", "Mensaje"); // La contraseña se cambio exitosamente
			header ('location: ../Views/cambiarContrasena.php?msj='.$mensaje);
		}
		else
		{
			$mensaje = encrypt("1", "Mensaje"); // Las contraseñas nuevas ingresadas no coinciden
			header ('location: ../Views/cambiarContrasena.php?msj='.$mensaje);
			exit();
		}
	}
	else
	{
		$mensaje = encrypt("2", "Mensaje"); // La contraseña antigua no coincide
		header ('location: ../Views/cambiarContrasena.php?msj='.$mensaje);
		exit();
	}

 ?>