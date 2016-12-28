<?php 


	include('usuario.php');

	function  obtenerSolicitudesAmistad($USER_ID)
	{
		include('conexion.php');

		$estadoSolicitud = 22; // ESPERA
		$consulta = "SELECT * FROM amigo WHERE EST_ID = $estadoSolicitud AND USUARIO_AMIGO_ID = $USER_ID";
		$respuesta = $con -> query($consulta);
		$rows = mysqli_num_rows($respuesta);

		if($rows > 0)
		{
			while($fila = $respuesta -> fetch_assoc())
			{
				$foto = obtenerFotoPerfil($fila['USUARIO_ID']);
				$idEncriptado = encrypt($fila['AMI_ID'],"USER_ID");
				$usuario = obtenerUsuario($fila['USUARIO_ID']);
				$userIDEncriptado = encrypt($fila['USUARIO_ID'],"USER_ID");
				echo 
				'<tr>'.
		            '<td>'.
		                '<img class="img-rounded" src="'.$foto.'" style="width: 36px; height: 36px;"/> &nbsp;&nbsp;'.
		                '<a href="perfil.php?p='.$userIDEncriptado.'" title="Ir al perfil de '.my_ucfirst($usuario['USER_NOMBRE']).'">'.
		                    my_ucfirst($usuario['USER_NOMBRE']).' '.my_ucfirst($usuario['USER_APELLIDO']).
		                '</a>'.
		            '</td>'.
		            '<td align="right">'.
		                '<a href="../Bussiness/solicitudAmistad.php?id='.$idEncriptado.'&action=aceptar" class="btn btn-success">Aceptar</a> &nbsp;&nbsp;'.
		                '<a href="../Bussiness/solicitudAmistad.php?id='.$idEncriptado.'&action=rechazar" class="btn btn-danger">Rechazar</a>'.
		            '</td>'.
		        '</tr>';
			}
			
		}
		else
		{
			echo 
			'<tr>'.
                '<td align="center">'.
                    'Aún no tienes solicitudes de amistad, calma ya vendrán <i class="fa fa-smile-o fa-lg" aria-hidden="true">'.
                '</td>'.
            '</tr>';
		}
	}

	function obtenerAmigos($USER_ID)
	{
		include('conexion.php');

		$estadoSolicitud = 23; // ACEPTADA
		$consulta = "SELECT DISTINCT * FROM amigo WHERE EST_ID = $estadoSolicitud AND ((USUARIO_AMIGO_ID = $USER_ID) OR (USUARIO_ID = $USER_ID))";
		$respuesta = $con -> query($consulta);
		$rows = mysqli_num_rows($respuesta);

		if($rows > 0)
		{
			echo '<div class="card-columns">';
			while($fila = $respuesta -> fetch_assoc())
			{
				if($fila['USUARIO_ID'] <> $USER_ID )
				{
					$foto = obtenerFotoPerfil($fila['USUARIO_ID']);
					$idEncriptado = encrypt($fila['USUARIO_ID'],"USER_ID");
					$usuario = obtenerUsuario($fila['USUARIO_ID']);

					echo 
					'<div class="card">'.
		                '<a href="perfil.php?p='.$idEncriptado.'"><img class="card-img-top" src="'.$foto.'"  alt="Card image cap" style="width: 100%;"></a>'.
		                '<div class="list-group">'.
	                  		'<a href="perfil.php?p='.$idEncriptado.'" class="list-group-item" >'.
	                  		obtenerTitleConexion($fila['USUARIO_ID']).'&nbsp;&nbsp;&nbsp;'.
	                  		my_ucfirst($usuario['USER_NOMBRE']).' '.my_ucfirst($usuario['USER_APELLIDO']).
	                  		'</a>'.
	                  		'<span class="list-group-item">'.
	                  		'<table width="100%">'.
								'<tbody>'.
									'<tr>'.
										'<td align="center">'.
											'<i class="fa fa-users fa-lg" title="Amigos" aria-hidden="true"> '.obtenerCantidadAmigos($fila['USUARIO_ID']).'</i>'.
										'</td>'.
										'<td align="center">'.
											'<i class="fa fa-camera-retro fa-lg" title="Fotos" aria-hidden="true"> '.obtenerCantidadFotos($fila['USUARIO_ID']).'</i>'.
										'</td>'.
									'</tr>'.
								'</tbody>'.
							'</table>'.
	                  		'</span>'.
		                '</div>'.
		            '</div>';

				}else
				{
					$foto = obtenerFotoPerfil($fila['USUARIO_AMIGO_ID']);
					$idEncriptado = encrypt($fila['USUARIO_AMIGO_ID'],"USER_ID");
					$usuario = obtenerUsuario($fila['USUARIO_AMIGO_ID']);

					echo 
					'<div class="card">'.
		                '<a href="perfil.php?p='.$idEncriptado.'"><img class="card-img-top" src="'.$foto.'"  alt="Card image cap" style="width: 100%;"></a>'.
		                '<div class="list-group">'.
	                  		'<a href="perfil.php?p='.$idEncriptado.'" class="list-group-item" >'.
	                  		obtenerTitleConexion($fila['USUARIO_AMIGO_ID']).'&nbsp;&nbsp;&nbsp;'.
	                  		my_ucfirst($usuario['USER_NOMBRE']).' '.my_ucfirst($usuario['USER_APELLIDO']).
	                  		'</a>'.
	                  		'<span class="list-group-item">'.
	                  		'<table width="100%">'.
								'<tbody>'.
									'<tr>'.
										'<td align="center">'.
											'<i class="fa fa-users fa-lg" title="Amigos" aria-hidden="true"> '.obtenerCantidadAmigos($fila['USUARIO_AMIGO_ID']).'</i>'.
										'</td>'.
										'<td align="center">'.
											'<i class="fa fa-camera-retro fa-lg" title="Fotos" aria-hidden="true"> '.obtenerCantidadFotos($fila['USUARIO_AMIGO_ID']).'</i>'.
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
			echo 
			'<table class="table table-hover">'.
			'<tr>'.
                '<td align="center">'.
                    'Aún no tienes ningún amigo, prueba suerte en el buscador de amigos, Suerte <i class="fa fa-smile-o fa-lg" aria-hidden="true"> ! '.
                '</td>'.
            '</tr>'.
            '</table>';
		}
	}

?>