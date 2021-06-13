<?php 


	session_start();
	//$_SESSION["carUser"] = false;

	session_destroy();

	header("Location: iniciar_sesion.php");




 ?>