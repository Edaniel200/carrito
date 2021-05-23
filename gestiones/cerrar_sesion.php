<?php 


	session_start();
	//$_SESSION["carUser"] = false;
	setcookie("US", "", time() - 1, "../../");
	setcookie("PASS", "", time() - 1, "../../");
	setcookie("TAB", "", time() - 1, "../../");


	session_destroy();

	header("Location: iniciar_sesion.php");




 ?>