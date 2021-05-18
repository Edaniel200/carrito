<?php 

	require_once("../../gestiones_db/conexion.php");

	$sql = "UPDATE productos SET ";
	$contador = 0;
	$comilla = false;
	$val_array = array();

	$imagen_name = $_FILES["imagen_edi"]["name"];

	foreach ($_POST["datos"] as $key => $value) {

		if($value != "" && $key != "PRECIO"){

			if($key != "NOMBRE" && count($val_array) > 0 ){

				$sql .= ",";

			}
			$sql .=  $key . " = :"  . $key . " ";
			$comilla = true;

			$val_array[":".$key] = $value;


		}else if($key == "PRECIO" && $value != ""){
			if($comilla){
				$sql .= ",";
			}

			$sql .=  $key . " = " . ":$key" ;

			$val_array[":".$key] = $value;

		}else{

			$contador++;
		}

	}

	if($contador > 4){

		$sms = "Inserte al menos un datos a modificar";

		header("Location: editar.php?sms=" . $sms . "&id=" . $_POST['id']);
		
	}

	if( $imagen_name != ''){


		count($val_array) > 0?$sql .= ", DIRECCION_IMAGEN = :DIRECCION_IMAGEN":$sql .= "DIRECCION_IMAGEN = :DIRECCION_IMAGEN";

		$val_array[":DIRECCION_IMAGEN"] = "img/" . $imagen_name;
	}



	$sql .= " WHERE ID = :ID";
	$val_array[":ID"] = $_POST["id"];


	echo $sql . "</br>";
	print_r($val_array);

	$preper = $CNX->prepare($sql);
	$preper->execute($val_array);
	//echo $_SERVER["DOCUMENT_ROOT"] . "/carrito/img/" . $imagen_name;

//echo $img_to_delete["DIRECCION_IMAGEN"];
	if($preper->rowCount() > 0){

		require_once("img_to_delete.php");

		unlink("../../" . $img_to_delete["DIRECCION_IMAGEN"]);


		move_uploaded_file($_FILES["imagen_edi"]["tmp_name"], "../../img/" . $imagen_name);


		$sms = "Han habido cambios";


		header("Location: ../gestions/gestions.php?sms=" . $sms . "&id=" . $_POST['id']);
	}else{
		$sms = "no han habido cambios";
		header("Location: editar.php?sms=" . $sms . "&id=" . $_POST['id']);
	}






 ?>