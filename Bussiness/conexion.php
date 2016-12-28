<?php 

	$servidor = "localhost";
	$usuario = "root";
	$password = "";
	$bd = "twins";

	$con = new mysqli($servidor, $usuario, $password, $bd);
	$con->set_charset("utf8");
	
	date_default_timezone_set('Chile/Continental');

	//Verificamos errores
	if(mysqli_connect_errno())
	{
		header('location: ../Views/error.php?e='.mysqli_connect_errno().'');
		exit();
	}

?>