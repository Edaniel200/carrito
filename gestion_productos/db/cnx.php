<?php 

	$CNX = new mysqli("localhost", "root", "", "usuarios");

	if($CNX->connect_errno){

		die("Han habido fallos con la conexion");

	}


	//echo "Conectado Correctamente";


 ?>