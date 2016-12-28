<?php 
	include('../Bussiness/functions.php');
	session_start(); // para verificar si hay una sesion activa o no

	// Si la sesion esta seteada no necesitamos logearnos denuevo, por lo que lo mandamos al index
	if(isset($_SESSION['USER_ID']))
	{
		header('location: index.php');
	}

	// Si existe la variable msj por url, seteamos los mensajes
	$mensaje = "";
	$accion = "";
	if(isset($_GET['msj']))
	{
		$mensaje = decrypt($_GET['msj'], "Mensaje");
		if($mensaje == 1)
		{
			$accion = "Error";
			$mensaje = "No hay ningun usuario registrado con ese nombre";
		}
		else if ($mensaje == 2)
		{
			$accion = "Error";
			$mensaje = "Contraseña Incorrecta";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login - Twins</title>
	<link rel="stylesheet" type="text/css" href="../Resources/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../Resources/css/tether.min.css">
	<link rel="stylesheet" type="text/css" href="../Resources/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../Resources/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../Resources/css/nouislider.min.css">
	<link rel="stylesheet" type="text/css" href="../Resources/css/nouislider.pips.css">
	<link rel="stylesheet" type="text/css" href="../Resources/css/nouislider.tooltips.css">


	<link rel="stylesheet" href="../Resources/css/footer-distributed-with-address-and-phones.css">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="../Resources/images/favicon.png" type="image/x-icon">
	<link rel="icon" href="../Resources/images/favicon.png" type="image/x-icon">

	<script src="../Resources/js/tether.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../Resources/js/jquery-2.2.4.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../Resources/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../Resources/js/nouislider.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<div class="container" style="min-height: 600px;">
	<br/>
		<center><img src="../Resources/images/favicon.png" align="center" class="img-fluid" style="max-width: 128px;"></center>
	<br/>
		<form action="../Bussiness/validarLogin.php" method="POST">
		<?php 
			if($accion != "") // si hay algun mensaje seteado, activamos el modal con el mensaje correspondiente
			{
				echo    "<script>".
							"$(document).ready(function()".
							"{".
								"$('#myModal').modal('show');".
							"});".
						"</script>";

				echo    '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">'.
							'<div class="modal-dialog" role="document">'.
								'<div class="modal-content">'.
									'<div class="modal-header">'.
										'<button type="button" class="close" data-dismiss="modal" aria-label="Close">'.
											'<span aria-hidden="true">&times;</span>'.
										'</button>'.
										'<h4 class="modal-title">'.$accion.'</h4>'.
									'</div>'.
									'<div class="modal-body">'.
										'<p>'.$mensaje.'</p>'.
									'</div>'.
									'<div class="modal-footer">'.
										'<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>'.
									'</div>'.
								'</div><!-- /.modal-content -->'.
							'</div><!-- /.modal-dialog -->'.
						'</div><!-- /.modal -->';
			}
		?>
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 col-xl-4 col-xl-offset-4 ">
					<input type="text" class="form-control" name="txtUsuario" placeholder="Usuario" required="true" maxlength="30" tabindex="0">
				</div>
			</div>	
			<br/>
			<div class="row"> 
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 col-xl-4 col-xl-offset-4 ">
					<input type="password" class="form-control" name="txtContraseña" placeholder="Contraseña" required="true" maxlength="30">
				</div>
			</div>
			<br/>
			<div class="row"> 
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 col-xl-4 col-xl-offset-4 ">
					<button type="submit" class="btn btn-success form-control">Entrar</button>
				</div>
			</div>
			<br/>
			<div class="row"> 
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 col-xl-4 col-xl-offset-4 ">
					<center>¿No tienes una cuenta? Haz Click <a href="registro.php">Aquí</a></center>
				</div>
			</div>
		</form>
	</div>
</body>
</html>

<?php include('footer.php'); ?>