<?php 

include "functions.php";
include "conexion.php";
include "fotos.php";
include "usuario.php";

$arregloDatos = array();

if (isset($_POST['userPara']) ) 
{

	$idUserOther = decrypt($_POST['userPara'], "USER_ID");
	$idSession = $_SESSION['USER_ID'];
	
		
			
	$consultaMensajes = "SELECT user_id, user_nombre, user_apellido, user_sexo FROM usuario WHERE user_id =".$idUserOther;
	$respuesta = $con->query($consultaMensajes);
	
	$dato = $respuesta->fetch_assoc();
	
	$foto = obtenerFotoPerfil($idUserOther);

		$consultaBloqUser = "SELECT * FROM bloqueo WHERE USUARIO_ID = $idUserOther OR USUARIO_BLOQ_ID = $idUserOther";

		$respuestaBloqUser = $con->query($consultaBloqUser);
		$rows = mysqli_num_rows($respuestaBloqUser);

		if ($rows > 0) {
			if ($dato['user_sexo'] == 2) {

				$arregloDatos['color'] = "#f8bbd0";
				$arregloDatos['head'] ="<img class=\"img-rounded\" src=\"".$foto."\" style=\"width: 40px;height: 40px;margin-left: 5px; margin-top: 5px;margin-bottom: 5px;\">&nbsp;<font face=\"sans-serif\" size=\"4\" color=\"white\">".$dato['user_nombre']."&nbsp;".$dato['user_apellido']."</font><div style=\"margin-right:25px; float: right; margin-top: 12px;color: black;\"><h5><span class=\"label label-danger\">Usuario Bloqueado &nbsp;<i class=\"fa fa-ban\" aria-hidden=\"true\"></i></span></h5></div>";
			}else
			{
				$arregloDatos['color'] =  "#81d4fa";
				$arregloDatos['head'] ="<img class=\"img-rounded\" src=\"".$foto."\" style=\"width: 40px;height: 40px;margin-left: 5px; margin-top: 5px; margin-bottom: 5px;\">&nbsp;<font face=\"sans-serif\" size=\"4\" color=\"white\">".$dato['user_nombre']."&nbsp;".$dato['user_apellido']."</font><div style=\"margin-right:25px; float: right; margin-top: 15px;color: red;\"><h5><span class=\"label label-danger\">Usuario Bloqueado &nbsp;<i class=\"fa fa-ban\" aria-hidden=\"true\"></i></span></h5></div>";
			}
		}else
		{
			
			if ($dato['user_sexo'] == 2) {

				$arregloDatos['color'] = "#f8bbd0";
				$arregloDatos['head'] ="<a href=\"perfil.php?p=".$_POST['userPara']."\" style=\"color: white;\"><img class=\"img-rounded\" src=\"".$foto."\" style=\"width: 40px;height: 40px;margin-left: 5px; margin-top: 5px;margin-bottom: 5px;\">&nbsp;<font face=\"sans-serif\" size=\"4\" color=\"white\">".$dato['user_nombre']."&nbsp;".$dato['user_apellido']."</font></a><div style=\"margin-right:25px; float: right; margin-top: 15px;\">".obtenerTitleConexion($idUserOther)."</div>";
			}else
			{
				$arregloDatos['color'] =  "#81d4fa";
				$arregloDatos['head'] ="<a href=\"perfil.php?p=".$_POST['userPara']."\" style=\"color: white;\"><img class=\"img-rounded\" src=\"".$foto."\" style=\"width: 40px;height: 40px;margin-left: 5px; margin-top: 5px; margin-bottom: 5px;\">&nbsp;<font face=\"sans-serif\" size=\"4\" color=\"white\">".$dato['user_nombre']."&nbsp;".$dato['user_apellido']."</font></a><div style=\"margin-right:25px; float: right; margin-top: 15px;\">".obtenerTitleConexion($idUserOther)."</div>";
			}
		
		}
		
		

				
		$arregloDatos['error'] = "0";
}else
{
	$arregloDatos['error'] = "1";
}

echo json_encode($arregloDatos);

?>