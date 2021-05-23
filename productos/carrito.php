
<?php 

	if(isset($_COOKIE["ID_PRODUCTO"])){

		$cookie =json_decode($_COOKIE["ID_PRODUCTO"]);

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

							<p>Precio:	".$todos_p[$i]["PRECIO"]." €</p>
							<p>Cantidad:	".$cookie[$j]->CANTIDAD."</p>
							<p><a href='index.php?EP&ID=".$todos_p[$i]["ID"]."'><button>Elimiar</button></a></p>

						</div>
					</div>";
				}

			}

		}
		$datos = json_encode($datos);
		$tramite = "<div id='tramite'>
			<h3>Total a pagar:	".$total_pago ." €</h3>
			<a href='index.php?tramite&datos=".$datos."'><button>Tramitar pago</button></a>
		</div>";

	}else{
		$contenido = "<p class='danger'>Aun no hay agregago nada</p>";
	}




 ?>