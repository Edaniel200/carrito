<?php 


	require_once("../db/cnx.php");

	$sql = "SELECT * FROM productos";


	$do_sql = $CNX->query($sql);

	$records = array();

	//echo json_encode($do_sql->fetch_array(MYSQLI_ASSOC));

	while($record = $do_sql->fetch_array(MYSQLI_ASSOC)){

		array_push($records, array("NOMBRE"=>$record["NOMBRE"],"DESCRIPCION"=>$record["DESCRIPCION"],"ID"=>$record["ID"],"PRECIO"=>$record["PRECIO"],"DIRECCION_IMAGEN"=>$record["DIRECCION_IMAGEN"], "CATEGORIA"=>$record["CATEGORIA"] ));
	}


	echo json_encode($records);


 ?>