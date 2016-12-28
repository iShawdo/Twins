<?php 
include ('conexion.php');
include ('functions.php');
session_start();

	$idFoto1 = $_GET['ft'];
	$idEncriptado = encrypt($_SESSION['USER_ID'],"USER_ID");
	$consulta = "DELETE FROM foto WHERE FOTO_ID = $idFoto1";
	$con -> query($consulta);
	$mensaje = encrypt("2", "Mensaje");
	header ('location: ../Views/perfil.php?msj='.$mensaje.'&p='.$idEncriptado.'');
 ?>