<?php 

	session_start();
	include ('conexion.php');

	$userID = $_SESSION['USER_ID'];
	$conectado = 21; // Segun la bd, este numero es Desconectado! :D
	$date = date('Y-m-d H:i:s');

	// Insertamos el inicio de sesion a la tabla conexion
	$cambioEstado = "INSERT INTO CONEXION (USER_ID, DOM_ID, CON_FECHA) VALUES ($userID, $conectado, '$date')";
	$respuestaCambioEstado = $con -> query($cambioEstado);

	session_start();
	session_unset();
	session_destroy();

	header('location: ../Views/login.php');

?>