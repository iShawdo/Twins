<?php 
	include "conexion.php";
	include "functions.php";
	session_start();
	
	

		$aux = $_POST['userPara'];

		if (empty($aux)) {
			echo "0";
			
		}else
		{
			
			$userPara = decrypt($aux, "USER_ID");
		
			if ( !empty( trim($_POST['txtaMensaje']) ) ) 
			{
				$consultaBloqUser = "SELECT * FROM bloqueo WHERE USUARIO_ID = '$userPara' 
				OR USUARIO_BLOQ_ID = '$userPara'";

				$respuestaBloqUser = $con->query($consultaBloqUser);
				$rows = mysqli_num_rows($respuestaBloqUser);
				
				if ($rows <= 0) {

					$mensaje = $_POST['txtaMensaje'];
					$userDe = $_SESSION['USER_ID'];
					$fechaActual = date("Y-m-d H:i:s");


					$consultaMensaje = "INSERT INTO mensaje(USUARIO_DE, USUARIO_PARA, MEN_MENSAJE, MEN_FECHA, MEN_ESTADO) 
										VALUES('$userDe','$userPara', '$mensaje', '$fechaActual', 14)";

					$con->query($consultaMensaje);
					

					echo mysqli_insert_id($con);

				}else
				{
					echo "-1";
				}

				
				
			}else
			{
				echo "0";
			}
		
		}
	unset($mensaje);
?>