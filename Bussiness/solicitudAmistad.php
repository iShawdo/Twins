<?php 

	include('conexion.php');
	include('functions.php');

	if(isset($_GET['id']))
	{
		$AMI_ID = decrypt($_GET['id'],"USER_ID");
		$date = date('Y-m-d');

		if($_GET['action'] == 'aceptar')
		{
			$EST_ID = 23;
		}
		else if($_GET['action'] == 'rechazar')
		{
			$EST_ID = 24;
		}

		$consulta = "UPDATE amigo SET EST_ID = $EST_ID, AMI_FECHA = '$date' WHERE AMI_ID = $AMI_ID";

		if($con -> query($consulta))
		{
			if($_GET['action'] == 'aceptar')
			{
				
				$mensaje = encrypt("1", "Mensaje"); // Solicitud Aceptada
				header('location: ../Views/amigos.php?msj='.$mensaje.'');
			}
			else if($_GET['action'] == 'rechazar')
			{
				$mensaje = encrypt("2", "Mensaje"); // Solicitud Rechazada
				header('location: ../Views/amigos.php?msj='.$mensaje.'');
			}
		}
	}
	else
	{
		header('location: ../Views/amigos.php');
	}
?>