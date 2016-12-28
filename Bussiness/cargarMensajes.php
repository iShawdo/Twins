<?php

		include "functions.php";
		include "conexion.php";
		include "fotos.php";
		
		session_start();
		if (isset($_GET['idP']) ) 
		{

			$idUserOther = decrypt($_GET['idP'], "USER_ID");
			$idUserActual = $_SESSION['USER_ID'];
				
					
			$consultaMensajes = "SELECT * FROM  mensaje WHERE (USUARIO_DE = '$idUserActual' AND USUARIO_PARA = '$idUserOther') OR 
								(USUARIO_DE = '$idUserOther' AND USUARIO_PARA = '$idUserActual') ORDER BY MEN_FECHA ASC";
			$respuesta = $con->query($consultaMensajes);
			

			
 
			while ($dato = $respuesta->fetch_assoc()) 
			{
				
				if ($dato['USUARIO_DE'] == $idUserActual) 
				{
					$aux = $dato['USUARIO_DE'];

					if ($dato['USUARIO_DE'] == $idUserActual && $dato['MEN_ESTADO'] == 14) {
						echo '<div class="message-user-box" align="right"><a data-toggle="tooltip" id="tooltipExample" style="text-decoration: none;color: black;" data-placement="right" title="Enviado">
		        		<p class="message-user"  >'.$dato['MEN_MENSAJE'].'</p>&nbsp;<img class="img-rounded" src="'.obtenerFotoPerfil($aux).'" style="width: 30px;height: 30px;">
		    			</a></div>';
					}else
					{
						echo '<div class="message-user-box" align="right"><a data-toggle="tooltip" id="tooltipExample" style="text-decoration: none;color:black;" data-placement="right" title="Visto">
		        		<p class="message-user"  >'.$dato['MEN_MENSAJE'].'</p>&nbsp;<img class="img-rounded" src="'.obtenerFotoPerfil($aux).'" style="width: 30px;height: 30px;">
		    			</a></div>';
					}
					
				}else
				{
					$aux = $dato['USUARIO_DE'];
					
					
					$hora = date_create($dato['MEN_FECHA']);

					$hora = date_format($hora,'d-m-Y H:i:s');

					echo '<div class="message-friend-box"><a data-toggle="tooltip" id="tooltipExample" style="text-decoration: none;color:black;" data-placement="right" title="'.$hora.'"><img id="imgTooltip" class="img-rounded" src="'.obtenerFotoPerfil($aux).'" style="width: 30px;height: 30px;">&nbsp;<p class="message-friend"  >'.$dato['MEN_MENSAJE'].'</p></a>
		    		</div>';

				}
			}
	
		}else
		{

			echo "";
		}

		mysqli_close($con);

?>