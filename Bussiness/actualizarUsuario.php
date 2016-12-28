<?php 
	session_start();
	include ('conexion.php');
	include ('functions.php');

	$_SESSION['nombre'] = $_POST['txtNombre'];
	$_SESSION['apellido'] = $_POST['txtApellido'];
	$_SESSION['correo'] = $_POST['txtCorreo'];
	$_SESSION['nomUsuario'] = $_POST['txtNomUsuario'];


	$nombreC          	= $_POST['txtNombre'];
	$apellidoC        	= $_POST['txtApellido'];
	$correoC        	= $_POST['txtCorreo'];
	$nombreUsuarioC		= $_POST['txtNomUsuario'];
	
	$descripcionC		= $_POST['txtDescripcion'];
	$estaturaC			= $_POST['txtEstatura'];
	$pesoC				= $_POST['txtPeso'];
	$colorOjosC			= $_POST['ddlOjos'];
	$colorPeloC			= $_POST['ddlPelo'];
	$estadoCivilC		= $_POST['ddlEstadoCivil'];

	$USER_ID = $_SESSION['USER_ID'];

		$consulta = "SELECT USER_NAME FROM usuario
					WHERE USER_NAME = '$nombreUsuarioC'
					AND USER_ID != '$USER_ID' 
					";
					
		$respuesta = $con -> query($consulta);
		$rows = mysqli_num_rows($respuesta);




	if ($rows == 0) {
		$consulta2 = "UPDATE usuario SET USER_NOMBRE = '$nombreC',
											  USER_APELLIDO ='$apellidoC',
											  USER_CORREO = '$correoC',
											  USER_NAME = '$nombreUsuarioC',
											  USER_DESCRIPCION = '$descripcionC',
											  USER_ESTATURA = '$estaturaC',
											  USER_PESO	= '$pesoC',
											  USER_COLOR_OJOS = '$colorOjosC',
											  USER_COLOR_PELO = '$colorPeloC',
											  USER_ESTADO_CIVIL = '$estadoCivilC'
											 WHERE USER_ID = $USER_ID
											  
											  ";
			$con->query($consulta2);
			$mensaje = encrypt("3", "Mensaje");
			header ('location: ../Views/cuenta.php?msj='.$mensaje);
		

		
	}else {
		$nombreU = $rows['USER_NAME'];
		if($nombreU = $nombreUsuarioC) {
			$mensaje = encrypt("1", "Mensaje"); // 
		header ('location: ../Views/cuenta.php?msj='.$mensaje);
		exit();
		}
	}

	$consulta3 = "SELECT USER_CORREO FROM usuario
					WHERE USER_CORREO = '$correoC'
					AND USER_ID != '$USER_ID'";
					
	$respuesta3 = $con -> query($consulta3);
	$rows3 = mysqli_num_rows($respuesta3);
		
		if ($rows3 == 0) {
		$consulta4 = "UPDATE usuario SET USER_NOMBRE = '$nombreC',
											  USER_APELLIDO ='$apellidoC',
											  USER_CORREO = '$correoC',
											  USER_NAME = '$nombreUsuarioC',
											  USER_DESCRIPCION = '$descripcionC',
											  USER_ESTATURA = '$estaturaC',
											  USER_PESO	= '$pesoC',
											  USER_COLOR_OJOS = '$colorOjosC',
											  USER_COLOR_PELO = '$colorPeloC',
											  USER_ESTADO_CIVIL = '$estadoCivilC'
											 WHERE USER_ID = $USER_ID
											  
											  ";
			$con->query($consulta4);
			$mensaje = encrypt("3", "Mensaje");
			header ('location: ../Views/cuenta.php?msj='.$mensaje);
	}else {
		$correo = $rows3['USER_CORREO'];
		if ($correo = $correoC) {
			$mensaje = encrypt("2", "Mensaje");
			header ('location: ../Views/cuenta.php?msj='.$mensaje);
			exit();
		}
	}

	

		

	    
?>