<?php

include "conversaciones.php";
include "functions.php";

session_start();

if (empty($_POST['userPara'])) {
	echo "1";
}else
{

	$user_de = decrypt($_POST['userPara'],'USER_ID');
	$userPara = $_SESSION['USER_ID'];
	modificarEstadoMensaje($user_de,$userPara);

	echo "0";
}


?>