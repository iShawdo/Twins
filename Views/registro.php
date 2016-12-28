<?php 
	session_start();
	include ('../Bussiness/functions.php');

	// Si la sesion esta seteada no necesitamos logearnos denuevo, por lo que lo mandamos al index
	if(isset($_SESSION['USER_ID']))
	{
		header('location: index.php');
	}

	// Si existe la variable msj por url, seteamos los mensajes
	$mensaje = "";
	$accion = "";
	if(isset($_GET['error']))
	{
		$mensaje = decrypt($_GET['error'], "Error");
		if($mensaje == 1)
		{
			$accion = "Error";
			$mensaje = "El nombre de usuario ya se encuentra registrado en el sistema.";
		}
		else if ($mensaje == 2)
		{
			$accion = "Error";
			$mensaje = "El correo ingresado ya se encuentra asociado a otra cuenta.";
		}
		else if ($mensaje == 3)
		{
			$accion = "Error";
			$mensaje = "Las contraseñas ingresadas no coinciden.";
		}
		else if ($mensaje == 4)
		{
			$accion = "Error";
			$mensaje = "Fecha de nacimiento incorrecta.";
		}
		else if ($mensaje == 5)
		{
			$accion = "Error";
			$mensaje = "Ocurrió un error inesperado, intente denuevo mas tarde.";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro - Twins</title>
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

	<?php 
		if($accion != "")
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


	<div class="container" style="min-height: 600px;">
	<br/>
	<center><img src="../Resources/images/favicon.png" align="center" class="img-fluid" style="max-width: 128px;"></center>
		<br/>
		<form action="../Bussiness/registrarUsuario.php" method="POST">
			<div class="row">
				<div class="col-xs-12 ">
					<div class="card card-faded">
						<h4 class="card-header card-secondary" >
							<strong>Información Personal</strong>
						</h4>
						<div class="card-block">
							<div class="row">
								<div class="col-xs-6">
									<input type="text" class="form-control" name="txtNombre" placeholder="Nombre" required="true" maxlength="50">
								</div>
								<div class="col-xs-6">
									<input type="text" class="form-control" name="txtApellido" placeholder="Apellido" required="true" maxlength="50">
								</div>
							</div>
							<br/>
							<div class="row">
								<div class="col-xs-6">
									<input type="email" class="form-control" name="txtCorreo" placeholder="Correo" required="true" maxlength="50">
								</div>
								<div class="col-xs-6">
									<select class="form-control" name="ddlSexo">
										<option value="1">Masculino</option>
								        <option value="2">Femenino</option>
								    </select>
								</div>
							</div>
							<br/>
							<div class="row">
								<div class="col-xs-2">
									<select class="form-control" name="ddlDia">
										<?php 
											for ($i=1; $i <= 31; $i++) { 
												echo '<option value="'.$i.'">'.$i.'</option>';
											}

										?>
								    </select>
								</div>
								<div class="col-xs-2">   
								    <select class="form-control" name="ddlMes">
										<option value="1">Enero</option>
								        <option value="2">Febrero</option>
								        <option value="3">Marzo</option>
								        <option value="4">Abril</option>
								        <option value="5">Mayo</option>
								        <option value="6">Junio</option>
								        <option value="7">Julio</option>
								        <option value="8">Agosto</option>
								        <option value="9">Septiembre</option>
								        <option value="10">Octubre</option>
								        <option value="11">Noviembre</option>
								        <option value="12">Diciembre</option>
								    </select>
								</div>
								<div class="col-xs-2">
								    <select class="form-control" name="ddlAno">
										<?php 
											$today = getdate();
											$y = $today['year'];
											for ($i=$y-18; $i >= 1920; $i--) { 
												echo '<option value="'.$i.'">'.$i.'</option>';
											}
										?>
								    </select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="col-xs-12 ">
					<div class="card card-faded" >
						<h4 class="card-header card-secondary" >
							<strong>Información Registro</strong>
						</h4>
						<div class="card-block">
							<div class="row">
								<div class="col-xl-6 col-md-6 col-xs-12">
									<input type="text" class="form-control" name="txtUsuario" placeholder="Nombre Usuario" required="true" maxlength="30">
								</div>
							</div>
							<br/>
							<div class="row">
								<div class="col-xs-6">
									<input type="password" class="form-control" name="txtContraseña" placeholder="Contraseña" required="true" maxlength="30">
								</div>
								<div class="col-xs-6">
									<input type="password" class="form-control" name="txtContraseña2" placeholder="Repetir Contraseña" required="true" maxlength="30">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<br/>
			<div class="row">
				<div class="col-xs-12 col-xl-2 col-xl-offset-8 col-md-2 col-md-offset-8 col-sm-6">
					<a class="btn btn-danger form-control" href="login.php" >Volver</a>
				</div>
				<div class="col-xs-12 col-xl-2 col-md-2 col-sm-6">
					<button type="submit" class="btn btn-success form-control" >Registrar</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>

<?php include('footer.php'); ?>