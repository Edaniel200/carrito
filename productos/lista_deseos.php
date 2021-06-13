<?php
	if(isset($_COOKIE["LISTA_DESEO"])){

		$cookie =json_decode($_COOKIE["LISTA_DESEO"]);
		
		$ver_carrito = new SELECT_QUERY($CNX, 0, "SELECT * FROM productos WHERE ID != :ID");
		$ver_carrito->executeById();
		$todos_p = $ver_carrito->getRecords();

		$contenido = "";
		$total_pago = 0;
		$datos = array();



		for($i = 0; $i < count($todos_p); $i++){

			for($j = 0; $j < count($cookie); $j++){


				if($todos_p[$i]["ID"] == $cookie[$j]->id){


					$contenido .= "<div class='products'>

							<div>
								 <p><span> {$todos_p[$i]['PRECIO']}€</span></p> <p class='nombre'> {$todos_p[$i]['NOMBRE']} </p>
							</div>

							<div>
								<a  title='{$todos_p[$i]['NOMBRE']}' href='index.php?VPU={$todos_p[$i]['ID']}'><img alt='{$todos_p[$i]["DESCRIPCION"]}' src='{$todos_p[$i]['DIRECCION_IMAGEN']}'></a>
							</div>
							<div class='div_opciones'>	
								<a href='index.php?IPC&ID={$todos_p[$i]['ID']}'><button>Añadir a cesta</button></a>
							</div>

						</div>";

							
				}

			}

		}

	}else{
		$contenido = "<p class='danger'>Aun no hay agregago nada</p>";
	}


?>