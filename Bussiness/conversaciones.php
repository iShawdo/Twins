<?php 

	function obtenerListadoMensajeros()
	{

		include ('conexion.php');


	    $userId = $_SESSION['USER_ID'];
	    $consulta = "SELECT  DISTINCT (U.USER_ID), (U.USER_NOMBRE) 
	                FROM usuario U
	                INNER JOIN mensaje M ON (U.USER_ID = M.USUARIO_DE OR U.USER_ID = M.USUARIO_PARA)
	                WHERE 
	                U.USER_ID != '$userId' AND (M.USUARIO_DE = '$userId' OR M.USUARIO_PARA = '$userId') ";

//INNER JOIN bloqueo B ON (U.USER_ID = B.USUARIO_ID OR U.USER_ID = B.USUARIO_BLOQ_ID) 
//AND (B.USUARIO_ID != '$userId' AND  B.USUARIO_BLOQ_ID != '$userId')
	    
		$respuesta = $con -> query($consulta);

		if(mysqli_num_rows($respuesta) > 0)
		{
	        
	        $arreglo1 = array();
	        $cont=0;
	        while ( $select = $respuesta->fetch_assoc()) {
	            $consultaUsuario = array('usuarioId' => $select['USER_ID'],
	                                'usuarioName' => $select['USER_NOMBRE']);
	            array_push($arreglo1,$consultaUsuario );
	            $cont++;
	        }
	        for ($x=0; $x <count($arreglo1); $x++) { 

	        	
				
					$userMen = encrypt($arreglo1[$x]['usuarioId'], "USER_ID");
	            	$foto = obtenerFotoPerfil($arreglo1[$x]['usuarioId']);

	            ?>
	                <button type="button" class="list-group-item" id="btnUserConv<?=$x?>" onclick="setUserMessageBox('<?php echo $userMen;?>');setActive('btnUserConv<?=$x?>');">
	                <img class="img-circle" src="<?php echo $foto;?>" style="width: 64px;height: 64px;">&nbsp;<?php echo my_ucfirst($arreglo1[$x]['usuarioName']);?>&nbsp;</button>
				<?php

				
	            
	            // lo ideal sería aqui hacerlo con un echo, intente hacerlo y no funciona, pero sería lo mejor :)


//setURL('cajaMensajes.php?idP=<?php echo $userMen;?"">');setAction('<?php echo $userMen;?"">');

	        } 
		}

		mysqli_close($con);
	}

	function obtenerConversacion($USER_ID_DE, $USER_ID_PARA)
	{
		

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
							
							
?>

							<div class="message-user-box" align="right">
				        		<p class="message-user"  ><?php echo $dato['MEN_MENSAJE'];?></p>&nbsp;<img class="img-rounded" src="<?php echo obtenerFotoPerfil($aux);?>" style="width: 30px;height: 30px;">
				    		</div>

<?php

						}else
						{
							$aux = $dato['USUARIO_DE'];

?>
							<div class="message-friend-box">
				        		<img class="img-rounded" src="<?php echo obtenerFotoPerfil($aux);?>" style="width: 30px;height: 30px;">&nbsp;<p class="message-friend"  ><?php echo $dato['MEN_MENSAJE'];?></p>
				    		</div>

<?php
						}

					}

				
		}else
		{

			echo "";
		}

		
	}

	function modificarEstadoMensaje($user_de, $user_para){

		include "conexion.php";

		$consulta = "UPDATE mensaje set men_estado = 15 WHERE (usuario_para = '$user_para' AND usuario_de = '$user_de' AND men_estado = 14)";
		
		$con->query($consulta);

		mysqli_close($con);
	}


?>