
<?php 

	if(isset($_COOKIE["ID_PRODUCTO"])){

		$cookie =json_decode($_COOKIE["ID_PRODUCTO"]);
		//print_r($cookie);
		$ver_carrito = new SELECT_QUERY($CNX, 0, "SELECT * FROM productos WHERE ID != :ID");
		$ver_carrito->executeById();
		$todos_p = $ver_carrito->getRecords();

		$contenido = "";
		$total_pago = 0;
		$datos = array();



		for($i = 0; $i < count($todos_p); $i++){

			for($j = 0; $j < count($cookie); $j++){


				if($todos_p[$i]["ID"] == $cookie[$j]->ID){

					array_push($datos, array("CANTIDAD"=>$cookie[$j]->CANTIDAD,"NOMBRE"=>$todos_p[$i]["NOMBRE"],"PRECIO"=>$todos_p[$i]["PRECIO"]));



					$total_pago += $todos_p[$i]["PRECIO"] * $cookie[$j]->CANTIDAD;

					$contenido .= "<div class='products_carrito'> 
						<div>
							<p>" . $todos_p[$i]["NOMBRE"] . "</p> 
							<img src='".$todos_p[$i]["DIRECCION_IMAGEN"]."'>
						</div> 

						<div>

							<p>Precio: <span id='{$todos_p[$i]["ID"]}p'>{$todos_p[$i]["PRECIO"]}</span>€</p>
							<p>Cantidad: <span id='{$todos_p[$i]["ID"]}c'>{$cookie[$j]->CANTIDAD}</span></p>
							<p><a href='index.php?EP&ID={$todos_p[$i]["ID"]}'><button>Elimiar</button></a></p>
							<p class='counters'>

								<span onclick='updateCookie({$todos_p[$i]["ID"]},\"+\", this);' class='fas fa-chevron-up' id='{$todos_p[$i]["ID"]}-1'></span>
								";

								if($cookie[$j]->CANTIDAD == 1){

									$contenido .= "<span class='fas fa-trash' id='{$todos_p[$i]["ID"]}-2' onclick='location.assign(\"index.php?EP&ID={$todos_p[$i]["ID"]}\")'></span>";

								}else{

										$contenido .= "<span onclick='updateCookie({$todos_p[$i]["ID"]},\"-\", this);' class='fas fa-chevron-down' id='{$todos_p[$i]["ID"]}-2'></span>";
								}



							$contenido .= "</p>

						</div>
					</div>";
				}

			}

		}
		$datos = json_encode($datos);
		$tramite = "<div id='tramite'>
			<a href='index.php?tramite&datos=".$datos."'><i class='fas fa-money-bill'></i> Tramitar pago de <span id='buy'>{$total_pago}</span>€</a>
		</div>";

	}else{
		$contenido = "<p class='danger'>Aun no hay agregago nada</p>";
	}




 ?>