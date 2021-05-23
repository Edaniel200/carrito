<?php 

	require_once("gestiones_db/conexion.php");
	require_once("gestiones_db/select.php");

	$contenido = "";
	$categorias_nav = "";

	$categorias = new SELECT_QUERY($CNX, "-", "SELECT DISTINCT(CATEGORIA) FROM productos WHERE CATEGORIA != :CAT");
	$categorias->executeByCategory();
	$record_c = $categorias->getRecords();

	for($i = 0; $i < count($record_c); $i++){

		$categorias_nav .= "<li><a href='index.php?cat=".$record_c[$i]["CATEGORIA"]."'>".$record_c[$i]["CATEGORIA"]."</a></li>";

	}


	
	if(isset($_GET["VPU"])){


		$ver = new SELECT_QUERY($CNX, $_GET["VPU"], "SELECT productos.NOMBRE as NOMBRE_PRODUCTO, productos.PRECIO AS PRECIO, productos.DIRECCION_IMAGEN AS DIRECCION_IMAGEN, productos.DESCRIPCION,productos.ID AS ID, vendedores_carrito.NOMBRE AS VENDEDOR FROM productos INNER JOIN vendedores_carrito on productos.ID_VENDEDOR = vendedores_carrito.ID WHERE productos.ID = :ID");

		$ver->executeById();
		$record = $ver->getRecords();
		

			$contenido = "<div class='vpu_products'> 

				<p class='nombre'>" . $record[0]["NOMBRE_PRODUCTO"] . "<p> 
				<div id='content_img'><img src='".$record[0]["DIRECCION_IMAGEN"]."'></div> 	
				<div id='content_img'><p> Vendedor: " . $record[0]["VENDEDOR"] . "</p></div> 
				<p class='descripcion'>Descripción: ".$record[0]["DESCRIPCION"]."</p> <p>Precio: ".$record[0]["PRECIO"]."€</p>
				<p><a href='index.php?IPC&ID=".$record[0]["ID"]."'><button>Añadir a cesta</button></a></p>

			<div>" ;

			// $o = json_decode($_COOKIE["ID_PRODUCTO"]);
			// print_r($o);

		

	}else if(isset($_GET["IPC"])){
		$arr = array();

		if(isset($_COOKIE["ID_PRODUCTO"])){
			//$ID_PRODUCTO_COOKIE = array(array("ID"=>$_COOKIE["ID_PRODUCTO"]), array("ID"=>$_GET["IPC"]));
			$datos_agregar = array("ID"=>$_GET["ID"], "CANTIDAD"=>1);


			$cook = json_decode($_COOKIE["ID_PRODUCTO"]);

			//print_r($cook);
			$esta = false;

			for($i = 0; $i < count($cook); $i++){

				if($_GET["ID"] == $cook[$i]->ID){
				
					$cook[$i]->CANTIDAD += 1;

					$esta = true;
					echo "SI";

				}

			}


			if($esta){

				$cook = json_encode($cook);
				//print_r( $cook);


			}else{

				array_push($cook,$datos_agregar);

				$cook = json_encode($cook);

			}

		}else{

			$cook =json_encode(array(array("ID"=>$_GET["ID"], "CANTIDAD"=>1)));

		}

		setcookie("ID_PRODUCTO", $cook, time() + 30 * 24 * 60 * 60);
		header("Location: index.php?VPU=" . $_GET["ID"]);


	}else if(isset($_GET["carrito"])){

		include("productos/carrito.php");


	}else if(isset($_GET["tramite"])){

		include("gestiones/tramite.php");


	}else if(isset($_GET["cat"])){

		$ver_productos_de_categoria = new SELECT_QUERY($CNX, $_GET["cat"], "SELECT * FROM productos WHERE CATEGORIA = :CAT");
		$ver_productos_de_categoria->executeByCategory();
		$record_p_c = $ver_productos_de_categoria->getRecords();



		for($i = 0; $i < count($record_p_c); $i++){


			$contenido .= "<div class='products'>


					<div>
						<a href='index.php?VPU=".$record_p_c[$i]['ID']."'>

							<img src='".$record_p_c[$i]["DIRECCION_IMAGEN"]."' alt='" . $record_p_c[$i]["NOMBRE"] . "' title='" . $record_p_c[$i]["NOMBRE"] . "'>
						</a>
					</div>

						<p>" . $record_p_c[$i]['NOMBRE'] . "</p>


				</div>";


		}




	}else{



		$ver_productos = new SELECT_QUERY($CNX, "-", "SELECT * FROM productos WHERE CATEGORIA != :CAT");
		$ver_productos->executeByCategory();
		$record_p = $ver_productos->getRecords();




		for($i = 0; $i < count($record_p); $i++){


			$contenido .= "<div class='products'>

					<div><a href='index.php?VPU=".$record_p[$i]['ID']."'><img src='".$record_p[$i]["DIRECCION_IMAGEN"]."'></a></div>
					<p class='nombre'>" . $record_p[$i]['NOMBRE'] . " " . $record_p[$i]['PRECIO'] .  "€</p>


				</div>";


		}


	}


 ?>