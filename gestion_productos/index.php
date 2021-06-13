<?php 
	session_start();

	$_SESSION['fromAgg'] = true;


	if(!isset($_SESSION["carSeller"])){

		header("Location: ../gestiones/iniciar_sesion.php");
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Gestions | productos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

	<script src="https://kit.fontawesome.com/845f067532.js" crossorigin="anonymous"></script>

	

	<style type="text/css">
		*{
			padding: 0px;
			margin: 0px;

		}

		nav{
			position: sticky;
			top: 0px;
			padding: 15px 0px;
			background-color: #599;
		}
		nav > ul{
			display: flex;
			justify-content: flex-start;
		}
		nav > ul > li{
			list-style-type: none;
			margin: 0px 5px;
		}
		nav a{
			text-decoration: none;
			padding: 5px;
			color: white;
		}
		nav a:hover{
			color: #333;
		}


		#smsDanger, #smsCheck{

			color: white;
			text-align: center;
			padding: 10px 0px;
			font-size: 1.1rem;
			
		}
		#smsDanger{

			background-color: #DF1C44;
		}
		#smsCheck{
			background-color: #194A8D;
		}

		section{
			display: flex;
			justify-content:center;
			flex-wrap: wrap;


			padding: 10px;
			box-sizing: border-box;
		}
		section > div{
			width: 250px;

			background-color: white;

			margin: 5px;
			padding: 10px 0px;

			border: solid 1px #ddd;



		}
		section > div:hover{

			border: solid 1px #999;
		}


		section > div > div{

			padding: 10px 0px;

		}

		section > div > div:nth-child(1), section > div > div:nth-child(5){

			display: flex;
			justify-content: space-between;

			padding: 0px 10px;

		}
		section > div > div:nth-child(1) > span:nth-child(1){

			color: #777;

		}
		section > div > div:nth-child(1) > span:nth-child(2){

			color: white;
			padding: 3px;
			border-radius: 5px;
			background-color: #588;

		}

		section > div > div:nth-child(2) > p{

			text-align: center;
			color: #777;
			font-weight: bolder;
		}

		section > div > div:nth-child(3){
			text-align: center;
		}

		section > div > div:nth-child(3) > img{
			width: 200px;
			height: 150px;
		}

		section > div > div:nth-child(4){
			padding: 5px;
		}

		section > div > div:nth-child(4) > p{

			text-align: justify;
			color: #555;
		}


		section > div > div:nth-child(5){
			padding: 10px 0px 0px 0px;
		}

		section > div > div:nth-child(5) button{
			width: 100px;
			padding: 5px;
			color: white;

		}
		section > div > div:nth-child(5) > a:nth-child(1) > button{

			border:solid 1px #aae;
			border-left:solid 1px transparent;
			background-color: #aae;
		}
		section > div > div:nth-child(5) > a:nth-child(1) > button:hover{
			background-color: #33a;
			color: white;

		}


		section > div > div:nth-child(5) > a:nth-child(2) > button{
			
			border:solid 1px #eaa;
			border-right:solid 1px transparent;
			background-color: #eaa;

		}
		section > div > div:nth-child(5) > a:nth-child(2) > button:hover{
			background-color: #a33;
			color: white;

		}





		@media(max-width: 768px){


			section > div{
				width: 220px;

			}
			p,span,button{
				font-size: 0.85rem;
			}
			section > div > div:nth-child(3) > img{
				width: 150px;
				height: 100px;
			}
			section > div > div:nth-child(5) button{
				width: 80px;

			}

		}

		@media(max-width: 500px){

			section > div{
				width: 250px;

			}
			p,span,button{
				font-size: 1rem;
			}
			section > div > div:nth-child(3) > img{
				width: 200px;
				height: 150px;
			}
			section > div > div:nth-child(5) button{
				width: 100px;

			}


		}

	</style>
	<script type="text/javascript">

		function StartApp(){

			$(".div_opciones").hide();
			$(".productos").mouseenter((obj) =>{
				console.time();

				const objeto = obj.currentTarget.lastChild;
				$(objeto).fadeIn(150);

				$(obj.currentTarget).mouseleave(() => $(objeto).fadeOut(150) );

				console.timeEnd();

			});


		}

		
		window.addEventListener("load", StartApp);
	</script>

</head>
<body>

	<nav>
		<ul>
				
			<li><a href="procesos/formulario_agregar.php">Agregar Producto</a></li>
			<li><a href="../gestiones/cerrar_sesion.php">Cerrar Sesion</a></li>
			<li><a href="../">Ver la tienda</a></li>

		</ul>
	</nav>
	<div>
		<?php 

			if(isset($_GET["sms"])){

				echo "<p id='{$_GET["idsms"]}'> {$_GET["sms"]}</p>";

			}
		 ?>

	</div>
	<section>

		<?php 

			$resProcess = file_get_contents("http://localhost/carrito/gestion_productos/procesos/peticion_productos.php?id=" . $_SESSION["USFK"]);
			$res = json_decode($resProcess);

			//print_r($res);

			foreach ($res as $key => $value) {

				echo "<div class='productos' id='{$value->ID}'>";

					echo "<div> 
						<span> {$value->NOMBRE} </span>
						<span> Precio: {$value->PRECIO} €</span> 
					</div>";

					echo "<div>
						<p> {$value->CATEGORIA}</p>
					</div>";

					echo "<div>
					 	<img src='../{$value->DIRECCION_IMAGEN}'> 
					 </div>";

					echo "<div>
					 	<p> {$value->DESCRIPCION}</p> 
					 </div>";

					echo "<div class='div_opciones'>

							<a href='procesos/editar.php?id={$value->ID}'><button>Editar</button></a>
							<a href='procesos/eliminar.php?id={$value->ID}&l={$value->DIRECCION_IMAGEN}'><button>Eliminar</button></a>
					</div>";

				echo "</div>";
			}

		 ?>
		
	</section>


</body>
</html>