<?php
	include ('conexion.php');
	include('functions.php');
	session_start();
	

	
	$aux = $_POST['id'];

if (empty($aux)) {
	echo "0";
}else
{
	$userPARA	= decrypt($aux,"USER_ID");
	if (!empty(trim($_POST['mensajito']))) 
	{
		$mensajito = $_POST['mensajito'];
		$userDE = $_SESSION['USER_ID'];
		$fecha = Date("Y-m-d H:i:s");

		$consulta = "INSERT INTO mensaje(USUARIO_DE, USUARIO_PARA, MEN_MENSAJE, MEN_FECHA, MEN_ESTADO) 
							VALUES ('$userDE','$userPARA','$mensajito','$fecha',14)";
		$con->query($consulta);
		$error = 0;

		echo $error;
	}else {
		$error = 1;
		echo $error;
	}
}
	
	

 ?>