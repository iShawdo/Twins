<?php 
	include ('conexion.php');
	include('functions.php');
	session_start();
	
	 $USER_ID = $_SESSION['USER_ID'];
	 $idBloqueado = $_GET['id'];

	if (isset($_SESSION['USER_ID'])) {
		
      
      	
      	$idEncriptado = encrypt($idBloqueado,"USER_ID");
      	$fecha = Date("Y-m-d H:i:s");
      	$consulta = "DELETE FROM amigo WHERE ((USUARIO_AMIGO_ID = '$idBloqueado' AND USUARIO_ID = '$USER_ID') OR (USUARIO_ID = '$idBloqueado' AND USUARIO_AMIGO_ID = '$USER_ID'))";
      	$con -> query($consulta);
		
		$consulta2 = "INSERT INTO bloqueo(USUARIO_ID, USUARIO_BLOQ_ID, BLOQ_FECHA)
				 	  			  VALUES ('$USER_ID', '$idBloqueado', '$fecha')";
		$con -> query($consulta2);
		$mensaje = encrypt("5", "Mensaje");
		header ('location: ../Views/perfil.php?msj='.$mensaje.'&p='.$idEncriptado.'');
	}
	 

 ?>