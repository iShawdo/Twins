<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<?php include('../Bussiness/functions.php');
	?>
</head>
<body>
	<?php 

		echo decrypt($_GET['p'], "USER_ID"); 
		$miCumple = new DateTime('1994-09-28');
		$Hoy = new DateTime('now');

		$interval = $miCumple->diff($Hoy);
		echo $interval->format('%Y Años');



	?>
</body>
</html>