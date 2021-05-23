	<?php 
		session_start();
		require_once("../db/cnx.php");

		$nombre_imagen = $_FILES['imagen']['name'];
		$nombre_p = $_POST["nombre_p"];
		$precio_p = $_POST["precio_p"];
		$descripcion_p = $_POST["descripcion_p"];
		$categoria_p = $_POST["categoria_p"];
	


		if($nombre_imagen != '' && $nombre_p != '' && $precio_p != '' && $descripcion_p != '' && $categoria_p != ''){



			$sql = "INSERT INTO productos (NOMBRE, DESCRIPCION, PRECIO, DIRECCION_IMAGEN, CATEGORIA, ID_VENDEDOR) VALUES(?,?,?,?,?,?)";

			$tipo_imagen = $_FILES["imagen"]["type"];
			$temp_imagen = $_FILES["imagen"]["tmp_name"];
			$tamano_imagen = $_FILES["imagen"]["size"];

			$dir_destino = "img/" . $nombre_imagen;

			$preper = $CNX->prepare($sql);


			$ok = $preper->bind_param("ssissi", $nombre_p, $descripcion_p, $precio_p, $dir_destino, $categoria_p, $_SESSION["USFK"]);
			$ok = $preper->execute();

			if($ok){

				$sms = "Agregado Correctamente";

				move_uploaded_file($temp_imagen, "../../img/" . $nombre_imagen);

			}else{
				$sms = "No se pudo Agregar";
			}





			//no se hara if para validar size
			//tampoco si es un txt u otro archivo ya que es personal



		}else{


				$sms = "Inserte una imagen";

		}

			header("Location: formulario_agregar.php?sms=" . $sms);





	 ?>