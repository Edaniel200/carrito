<?php 


	session_start();
	$_SESSION["carUser"] = false;
	setcookie("US", $us, time() - 1, "../../");
	setcookie("PASS", $pass, time() - 1, "../../");



	header("Location: ../");




 ?>