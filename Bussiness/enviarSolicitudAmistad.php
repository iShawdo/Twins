<?php 
	include ('conexion.php');
	include('functions.php');
	session_start();
	
	$userPARA	= decrypt($_POST['id'],"USER_ID");
	$userDE = $_SESSION['USER_ID'];
	$idEncriptado = encrypt($userPARA,"USER_ID");
	$fecha = Date("Y-m-d H:i:s");

	
		$consulta="INSERT INTO amigo(USUARIO_ID, USUARIO_AMIGO_ID, EST_ID, AMI_FECHA) 
							VALUES ('$userDE','$userPARA','22','$fecha')";
		$con->query($consulta);

		$mensaje = encrypt("3", "Mensaje");
		echo "perfil.php?msj=".$mensaje."&p=".$idEncriptado."";
	
 ?>