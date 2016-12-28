<?php 
include ('conexion.php');
include('../Bussiness/functions.php');
session_start();

	 $USER_ID = $_SESSION['USER_ID'];
	 $idEncriptado = encrypt($USER_ID['USER_ID'],"USER_ID");
	if (isset($_SESSION['USER_ID'])) {
		$consulta = "UPDATE foto SET FOTO_PERFIL = 0
				 WHERE USUARIO_ID = '$USER_ID'";
		$con -> query($consulta);
      
      	$idFoto1 = $_GET['ft'];
		
		$consulta2 = "UPDATE foto SET FOTO_PERFIL = 1
				 WHERE FOTO_ID = '$idFoto1'";
		$con -> query($consulta2);
		$mensaje = encrypt("1", "Mensaje");
		header ('location: ../Views/perfil.php?msj='.$mensaje.'&p='.$idEncriptado.'');
	}
	 
 ?>