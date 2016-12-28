<?php  
include ('conexion.php');
include('../Bussiness/functions.php');
session_start();

	 $idBloqueado = $_GET['id'];
	 $idEncriptado = encrypt($idBloqueado,"USER_ID");
	if (isset($_SESSION['USER_ID'])) {
		$consulta = "DELETE FROM bloqueo WHERE USUARIO_BLOQ_ID = $idBloqueado";
		$con -> query($consulta);
      
      
		
		$mensaje = encrypt("6", "Mensaje");
		header ('location: ../Views/perfil.php?msj='.$mensaje.'&p='.$idEncriptado.'');
	}
?>