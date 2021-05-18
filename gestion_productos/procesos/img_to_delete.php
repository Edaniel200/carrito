<?php 

		$sql_bring_DIR_IMG = "SELECT DIRECCION_IMAGEN FROM productos WHERE ID = :ID";
		$preper_sql_bring = $CNX->prepare($sql_bring_DIR_IMG);
		$preper_sql_bring->execute(array(":ID"=>$_POST["id"]));

		$img_to_delete = $preper_sql_bring->fetch(PDO::FETCH_ASSOC);



 ?>