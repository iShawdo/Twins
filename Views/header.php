<?php 
	session_start();

	if(!isset($_SESSION['USER_ID']))
	{
		header('location: login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="stylesheet" type="text/css" href="/Twins/Resources/css/tether.min.css">
	<link rel="stylesheet" type="text/css" href="/Twins/Resources/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/Twins/Resources/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="/Twins/Resources/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/Twins/Resources/css/nouislider.min.css">
	<link rel="stylesheet" type="text/css" href="/Twins/Resources/css/nouislider.pips.css">
	<link rel="stylesheet" type="text/css" href="/Twins/Resources/css/nouislider.tooltips.css">


	<link rel="stylesheet" href="/Twins/Resources/css/footer-distributed-with-address-and-phones.css">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="/Twins/Resources/images/favicon.png" type="image/x-icon">
	<link rel="icon" href="/Twins/Resources/images/favicon.png" type="image/x-icon">

	<script src="/Twins/Resources/js/jquery-2.2.4.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/Twins/Resources/js/tether.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/Twins/Resources/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/Twins/Resources/js/nouislider.min.js" type="text/javascript" charset="utf-8"></script>
	
</head>
<body style="background-color: #E6E6E6;">

	<nav class="navbar navbar-dark bg-inverse">
		<a class="navbar-brand logo" href="index.php"><h4>Twins<span> ChatOnline</span></h4></a>
		<?php $idEncriptado =  encrypt($_SESSION['USER_ID'], "USER_ID"); ?>
		
		<div class="form-inline pull-xs-right dropdown">
			<button class="btn btn-primary-outline hidden-lg-up"  id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></button>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
				<h6 class="dropdown-header"><?php echo $_SESSION['USER_NOMBRE']; ?></h6>
			    <a class="dropdown-item" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
                <a class="dropdown-item" href="perfil.php?p=<?php echo $idEncriptado ?>"><i class="fa fa-user" aria-hidden="true"></i> Perfil</a>
                <a class="dropdown-item" href="amigos.php"><i class="fa fa-users" aria-hidden="true"></i> Amigos</a>
                <a class="dropdown-item" href="mensajes.php"><i class="fa fa-commenting" aria-hidden="true"></i> Mensajes</a>
                <a class="dropdown-item" href="cuenta.php"><i class="fa fa-cog" aria-hidden="true"></i> Cuenta</a>
			    <div class="dropdown-divider"></div>
				<a class="dropdown-item" href="../Bussiness/cerrarSession.php"><i class="fa fa-power-off" aria-hidden="true"></i> Cerrar Session</a>
			</div>
		</div>		
	</nav>

	
</body>
</html>