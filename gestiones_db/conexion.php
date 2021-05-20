<?php 

	
	try{

		$CNX = new PDO("mysql:host=localhost; dbname=usuarios", "root", "");
		$CNX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$CNX->exec("SET CHARACTER SET UTF8");


		$conexMessage = "COnexion Establecida";


	}catch(Exception $err){

		$conexMessage = "Error -> " . $err->getMessage();

	}




 ?>