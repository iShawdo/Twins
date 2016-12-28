<?php  
	session_start();

	include ('functions.php');
	include ('conexion.php');

	$nombre  = $_REQUEST['txtNombre'];
	$apellido = $_REQUEST['txtApellido'];
	$correo = $_REQUEST['txtCorreo'];
	$sexo = $_REQUEST['ddlSexo'];
	$dia = $_REQUEST['ddlDia'];
	$mes = $_REQUEST['ddlMes'];
	$ano = $_REQUEST['ddlAno'];
	$usuario = $_REQUEST['txtUsuario'];
	$contraseña = $_REQUEST['txtContraseña'];
	$contraseña2 = $_REQUEST['txtContraseña2'];

	$userAministrador = 1; // administrador
	$userNormal = 2; // usuario normal

	// Validar si existe el nombre de usuario en el sistema
	$queryNombreUsuario = "SELECT USER_NAME FROM usuario WHERE UPPER(USER_NAME) = UPPER('$usuario')";
	$respuestaNombreUsuario = $con -> query($queryNombreUsuario);
	$rows = mysqli_num_rows($respuestaNombreUsuario);
	if($rows > 0)
	{
		$error = encrypt("1", "Error"); // El nombre de usuario ya se encuentra registrado en el sistema
		header ('location: ../Views/registro.php?error='.$error);
		exit();
	}

	// Validar si existe el correo ingresado en el sistema
	$queryCorreoUsuario = "SELECT USER_CORREO FROM usuario WHERE UPPER(USER_CORREO) = UPPER('$correo')";
	$respuestaCorreoUsuario = $con -> query($queryCorreoUsuario);
	$rows = mysqli_num_rows($respuestaCorreoUsuario);
	if($rows > 0)
	{
		$error = encrypt("2", "Error"); // El correo ingresado ya se encuentra asociado a otra cuenta
		header ('location: ../Views/registro.php?error='.$error);
		exit();
	}

	// Validamos que ambas contraseñas ingresadas sean iguales
	if($contraseña != $contraseña2)
	{
		$error = encrypt("3", "Error"); // Las contraseñas ingresadas no coinciden
		header ('location: ../Views/registro.php?error='.$error);
		exit();
	}

	// fecha de nacimiento a insertar en la bd
	$fechaNacimiento = $ano.'-'.$mes.'-'.$dia;
	if(!checkdate($mes, $dia, $ano))
	{
		$error = encrypt("4", "Error"); // Fecha de nacimiento incorrecta
		header ('location: ../Views/registro.php?error='.$error);
		exit();
	}

	$contraseña = md5($contraseña);
	$contraseña = md5($contraseña);

	$query = "INSERT INTO usuario (USER_NAME, USER_PASSWORD, USER_CORREO, TIP_USER_ID, USER_NOMBRE, USER_APELLIDO, USER_SEXO, USER_FECHA_NACIMIENTO) 
				VALUES (UPPER('$usuario'), '$contraseña', UPPER('$correo'), $userNormal, UPPER('$nombre'), UPPER('$apellido'), $sexo, '$fechaNacimiento')";
	// si la query se ejecuta correctamente pasamos al siguiente paso
	if($con -> query($query))
	{
		// obtenemos el id con el que se inserto el usuario nuevo
		$userID = mysqli_insert_id($con);

		$_SESSION['USER_ID'] = $userID;
		$_SESSION['USER_NAME'] = $usuario;
		$_SESSION['TIP_USER_ID'] = $userNormal;
		$_SESSION['USER_NOMBRE'] = my_ucfirst($nombre).' '.my_ucfirst($apellido);

		$conectado = 20; // Segun la bd, este numero es Conectado! :D
		$date = date('Y-m-d H:i:s');

		// Insertamos el inicio de sesion a la tabla conexion
		$cambioEstado = "INSERT INTO conexion (USER_ID, DOM_ID, CON_FECHA) VALUES ($userID, $conectado, '$date')";
		$respuestaCambioEstado = $con -> query($cambioEstado);


		header ('location: ../Views/index.php');
	}
	else
	{
		$error = encrypt("5", "Error"); // Error de insersión
		header ('location: ../Views/registro.php?error='.$error);
		exit();
	}
?>