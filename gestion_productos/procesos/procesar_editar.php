<?php 

	require_once("../../gestiones_db/conexion.php");



	$sql = "UPDATE productos SET ";
	$contador = 0;
	$comilla = false;
	$val_array = array();

	$imagen_name = $_FILES["imagen_edi"]["name"];
	$tamano_imagen = $_FILES["imagen_edi"]["size"];
	$imagen_tipo = $_FILES["imagen_edi"]["type"];

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
	echo $sql;

	if($contador > 4){

		$sms = "Inserte al menos un datos a modificar";
		$idsms = "smsDanger";

		header("Location: editar.php?sms={$sms}&id={$_POST['id']}&idsms={$idsms}");
		
	}

	$img = false;
	if( ($imagen_tipo == 'image/jpeg' || $imagen_tipo == 'image/jpg' || $imagen_tipo == 'image/png') && $tamano_imagen <= 10000000){


		count($val_array) > 0?$sql .= ", DIRECCION_IMAGEN = :DIRECCION_IMAGEN":$sql .= "DIRECCION_IMAGEN = :DIRECCION_IMAGEN";
		$val_array[":DIRECCION_IMAGEN"] = "img/" . $imagen_name;

		$img = true;
	}



	$sql .= " WHERE ID = :ID";
	$val_array[":ID"] = $_POST["id"];


	echo $sql . "</br>";
	print_r($val_array);

	$preper = $CNX->prepare($sql);
	$preper->execute($val_array);

	if($preper->rowCount() > 0){

		if($img){

			require_once("img_to_delete.php");
			unlink("../../" . $img_to_delete["DIRECCION_IMAGEN"]);
			move_uploaded_file($_FILES["imagen_edi"]["tmp_name"], "../../img" . $imagen_name);

		}

		$sms = "Han habido cambios";
		$idsms = "smsCheck";


		header("Location: ../index.php?sms={$sms}&idsms={$idsms}");
	}else{
		$sms = "El producto no podido ser editado";
		$idsms = "smsDanger";

		header("Location: editar.php?sms={$sms}&id={$_POST['id']}&idsms={$idsms}");
	}








 ?>