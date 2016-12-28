<?php 

	function obtenerUsuariosRegistrados($edadLower, $edadUpper, $fotoPerfil, $sexo)
	{
		include ('conexion.php');
		include ('usuario.php');

		$edadUpper = $edadUpper + 1;

		$fechaLower = date('Y-m-d');
		$fechaLower = strtotime ( '-'.$edadLower.' year' , strtotime ( $fechaLower ) ) ;
		$fechaLower = date ( 'Y-12-31' , $fechaLower );

		$fechaUpper = date('Y-m-d');
		$fechaUpper = strtotime ( '-'.$edadUpper.' year' , strtotime ( $fechaUpper ) ) ;
		$fechaUpper = date ( 'Y-01-01' , $fechaUpper );

		$userID = $_SESSION['USER_ID'];
		// Era para ver que mierda me traía XD
		// echo $fotoPerfil.' '.$fechaLower.' '.$fechaUpper.' '.$sexo.' '.$edadLower.' '.$edadUpper;

		if($fotoPerfil == 1)
		{
			if($sexo == 1 or $sexo == 2)
			{
				$consulta = "SELECT U.USER_ID FROM usuario U INNER JOIN foto F ON U.USER_ID = F.USUARIO_ID WHERE USER_ID <> $userID AND USER_FECHA_NACIMIENTO BETWEEN '$fechaUpper' AND '$fechaLower' AND USER_SEXO = $sexo AND F.FOTO_PERFIL = 1";
			}
			else
			{
				$consulta = "SELECT U.USER_ID FROM usuario U INNER JOIN foto F ON U.USER_ID = F.USUARIO_ID WHERE USER_ID <> $userID AND USER_FECHA_NACIMIENTO BETWEEN '$fechaUpper' AND '$fechaLower' AND F.FOTO_PERFIL = 1";
			}
		}
		else
		{
			if($sexo == 1 or $sexo == 2)
			{
				$consulta = "SELECT USER_ID FROM usuario WHERE USER_ID <> $userID AND USER_FECHA_NACIMIENTO BETWEEN '$fechaUpper' AND '$fechaLower' AND USER_SEXO = $sexo";
			}
			else
			{
				$consulta = "SELECT USER_ID FROM usuario WHERE USER_ID <> $userID AND USER_FECHA_NACIMIENTO BETWEEN '$fechaUpper' AND '$fechaLower'";
			}
		}

		// $consulta = "SELECT USER_ID FROM USUARIO U WHERE USER_ID <> $userID AND USER_FECHA_NACIMIENTO BETWEEN '$fechaUpper' AND '$fechaLower'";

		$respuesta = $con -> query($consulta);
		$rows = mysqli_num_rows($respuesta);

		if($rows > 0)
		{
			echo '<div class="card-columns">';
			while ($fila = $respuesta->fetch_assoc()) 
			{
				//echo $fila['USER_ID'];

				$consultaBloqUser = "SELECT * FROM bloqueo WHERE USUARIO_ID = '".$fila['USER_ID']."' AND USUARIO_BLOQ_ID = '".$userID."'";

				$respuestaBloqUser = $con->query($consultaBloqUser);
				$rows = mysqli_num_rows($respuestaBloqUser);

				if ($rows <= 0) {
					$usuario = obtenerUsuario($fila['USER_ID']);

					$idEncriptado = encrypt($usuario['USER_ID'], "USER_ID");

					

					echo 
					'<div class="card">'.
		                '<a href="perfil.php?p='.$idEncriptado.'"><img class="card-img-top" src="'.obtenerFotoPerfil($fila['USER_ID']).'"  alt="Card image cap" style="width: 100%;"></a>'.
		                '<div class="list-group">'.
	                  		'<a href="perfil.php?p='.$idEncriptado.'" class="list-group-item" >'.
	                  		obtenerTitleConexion($fila['USER_ID']).'&nbsp;&nbsp;&nbsp;'.
	                  		my_ucfirst($usuario['USER_NOMBRE']).' '.my_ucfirst($usuario['USER_APELLIDO']).
	                  		'</a>'.
	                  		'<span class="list-group-item">'.
	                  		'<table width="100%">'.
								'<tbody>'.
									'<tr>'.
										'<td align="center">'.
											'<i class="fa fa-users fa-lg" title="Amigos" aria-hidden="true"> '.obtenerCantidadAmigos($fila['USER_ID']).'</i>'.
										'</td>'.
										'<td align="center">'.
											'<i class="fa fa-camera-retro fa-lg" title="Fotos" aria-hidden="true"> '.obtenerCantidadFotos($fila['USER_ID']).'</i>'.
										'</td>'.
									'</tr>'.
								'</tbody>'.
							'</table>'.
	                  		'</span>'.
		                '</div>'.
		            '</div>';
				}

				
			}
			echo '</div>';
		}
		else
		{
			echo '<div class="row">
                    <div class="col-xs-12 ">
                        <div class="card card-faded">
                            <div class="card-block">
                                <center><p>No hemos encontrado a nadie que se adapte a tus filtros por el momento, intenta utilizando otras combinaciones <i class="fa fa-smile-o fa-lg" aria-hidden="true"></i></p></center>
                            </div>
                        </div>
                    </div>
                </div>';
		}
	}

?>