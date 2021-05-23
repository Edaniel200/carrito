<?php 
	session_start();
	//echo $_SESSION["USFK"];


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Gestions | productos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1">

	<style type="text/css">
		section{
			display: flex;
			justify-content:center;
			flex-wrap: wrap;


			padding: 10px;
			box-sizing: border-box;
		}
		section > div{

			padding: 5px;
			background-color: white;

			box-shadow: 1px 2px 2px 1px #aaa;
			margin: 10px 0px;



		}
		section > div > div{
			padding: 10px 0px;

		}

		section > div > div:nth-child(1){
			display: flex;
			justify-content: space-around;

		}
		section > div > div > img{
			width: 250px;
			height: 200px;
		}
		#sms{
			background-color: black;
			color: white;
			text-align: center;
			padding: 5px 0px;
		}
		li{
			list-style-type: none;
		}
		nav a{
			text-decoration: none;
			padding: 5px;
			background: #55c;
			color: white;
		}

		button{
			padding: 5px;
			color: white;
			background-color: black;
			border:solid 1px #444;
		}

		@media(max-width: 768px){

			section > div > div {
				text-align: center;
			}

			section > div > div > img{
				width: 200px;
				height: 150px;
			}


			section > div > div > img{
				width: 150px;
				height: 100px;
			}


		}
		@media(max-width: 500px){

			section > div > div > img{
				width: 150px;
				height: 100px;
			}


		}


	</style>

</head>
<body>

	<nav>
		<li><a href="../procesos/formulario_agregar.php">Agregar Producto</a></li>
		<li><a href="../../gestiones/cerrar_sesion.php">Cerrar Sesion</a></li>
	</nav>
	<div>
		<?php 

			if(isset($_GET["sms"])){

				echo "<p id='sms'>" . $_GET["sms"] . "</p>";

			}
		 ?>

	</div>
	<section>

		<?php 

			$resProcess = file_get_contents("http://localhost/carrito/gestion_productos/procesos/peticion_productos.php?id=" . $_SESSION["USFK"]);
			$res = json_decode($resProcess);

			//print_r($res);

			foreach ($res as $key => $value) {

				echo "<div>";

				echo "<div> <span>" . $value->NOMBRE . "</span> Precio: ". $value->PRECIO ."€ </div>";	

				echo "<div>". $value->CATEGORIA ."</div>";


				echo "<div> <img src='../../" . $value->DIRECCION_IMAGEN . "'> </div>";

				echo "<div>". $value->DESCRIPCION ."</div>";


				echo "<div>

						<a href='../procesos/editar.php?id=".$value->ID."'><button>Editar</button></a>
						<a href='../procesos/eliminar.php?id=".$value->ID."&l=".$value->DIRECCION_IMAGEN."'><button>Eliminar</button></a>
				</div>";


				echo "</div>";
			}

		 ?>
		
	</section>


</body>
</html>