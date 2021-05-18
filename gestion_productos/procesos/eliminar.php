<?php 

	require_once("../db/cnx.php");




	/*$sql_bring_DIR_IMG = "SELECT DIRECCION_IMAGEN FROM productos WHERE ID = ?";
	$preper_sql_bring = $CNX->prepare($sql_bring_DIR_IMG);

	mysqli_stmt_bind_param($preper_sql_bring, "i", $ID);
	mysqli_stmt_execute($preper_sql_bring);
*/

	$ID = $_GET["id"];

	$sql = "DELETE FROM productos WHERE ID = ?";
	$preper = $CNX->prepare($sql);

	
	$ok = mysqli_stmt_bind_param($preper, "i", $ID);
	$ok = mysqli_stmt_execute($preper);

	/*mysqli_stmt_bind_result($preper_sql_bring, $DIRECCION_IMAGEN);
    mysqli_stmt_fetch($preper_sql_bring);

	echo $DIRECCION_IMAGEN;

*/






	if($ok){	

	unlink("../../" . $_GET["l"]);

		$sms = "eliminado Correctamente";

	}else{
		$sms = "No se pudo Eliminar";
	}


	//header("Location: ../gestions/gestions.php?sms=" . $sms);




 ?>