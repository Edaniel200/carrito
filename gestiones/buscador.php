<?php 

	if(isset($_POST["valueTittle"])){

		require_once("../gestiones_db/conexion.php");



		$value = $_POST["valueTittle"];

		$sql_PDO = "SELECT * FROM productos WHERE NOMBRE LIKE '%" . $value . "%' ";


		$preper = $CNX->query($sql_PDO);


		echo json_encode($preper->fetchAll());




	}


 ?>