<?php 

	require_once("../db/cnx.php");


	$ID = $_GET["id"];

	$sql = "DELETE FROM productos WHERE ID = ?";
	$preper = $CNX->prepare($sql);

	
	$ok = mysqli_stmt_bind_param($preper, "i", $ID);
	$ok = mysqli_stmt_execute($preper);

	if($ok){	

	unlink("../../" . $_GET["l"]);

		$sms = "Eliminado Correctamente";
		$idsms = "smsCheck";

	}else{
		$sms = "No se pudo Eliminar";
		$idsms = "smsDanger";
	}


	header("Location: ../index.php?sms={$sms}&idsms={$idsms}");




 ?>