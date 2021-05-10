<?php 
		include("principal/conexiones_carrito.php");


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Carrito</title>
	<meta charset="utf-8">
	<meta name="description" content="Es una practica de carrito de compras basada en php puro, sin javaScript">
	<meta name="keywords" content="carrito, compras, pedido">
	<meta name="robot" content="index">
	<meta http-equiv="cache-control" content="no-control">
	<meta name="viewport" content="width=device-width; initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/845f067532.js" crossorigin="anonymous"></script>

	

	<style type="text/css">
		
		*{
			padding: 0px;
			margin: 0px;
		}
		body{
		}
		header{
			display: flex;

			justify-content: space-around;
			align-items: center;
			padding: 5px 0px;
			background-color: white;

			border-bottom: solid 2px #ccc; 
		}
		header h1{
			font-size: 1.6rem;
			font-style: italic;
			color: #555;
		}
		header i{
			font-size: 1.3rem;
		}

		a{

			padding: 5px;
			text-decoration: none;
			color: grey;

		}
		#sessionMessage{
			display: flex;
			background-color: #9d9;
			color: #595;

			padding: 10px 0px;
		}
		#sessionMessage > p{
			padding: 0px 10px;
		}
		#sessionMessage button{
			padding: 3px;
			background-color: #595;
			color: white;
			border:solid 1px #7b7;
		}
		nav{
			padding: 20px 0px;
		}

		nav > ul{

			display: flex;
			justify-content: center;
			align-items: center;

		}

		li{
			list-style-type: none;
			padding: 0px 5px;
			background-color: white;
			margin: 0px 0px 0px 10px;
			border-radius: 5px;
			border: solid 1px grey;
		}
		nav > ul  a{
			color: grey;
			font-size: 1.1rem;
		}
		#buscador{

			position: relative;
			padding: 10px;

		}
		#buscador > div:nth-child(1){

			display: flex;
			justify-content: center;


		}

		#buscador  span{
			margin: 0px 10px;
			
		}

		#buscador  span > *{
		padding: 5px;

		}

		#caja_resultado_buscar{
			display: none;

			position: absolute;
			top: 40px;
			right: 25%;
			left: 25%;


			padding: 10px;

			background-color: #eee;
		}

		#caja_resultado_buscar > div{
			text-align: center;
			padding: 5px;

		}


		#product{

			width: 100%;
			display: flex;
			justify-content: center;
			flex-wrap: wrap;


			padding: 20px 0px;

		}

		.products{
		
			padding: 10px;

			border-bottom: solid 1px grey;
			margin: 5px;


		}
		.products > p{
			padding: 5px 0px;
			text-align: center;

		}

		.products > div{
			width: 100%;

		}

		.products > div  img{
			width: 250px;
			height: 200px;


		}

		.products button{
			padding: 3px;
			border:solid 1px #555;
			background-color: #ccf;
			color: #559;

		}
		.precioCantidad{
			padding: 5px 0px;
			display: flex;
			justify-content: space-around;
			background-color: black;
			color: white;
		}
		#tramite{
			display: flex;
			justify-content: center;
		}
		#tramite > *{
			padding: 0px 5px;
		}
		#tramite  button{
			padding: 5px;
			background-color: #599;
			color: white;
			border: solid 1px #577;
		}
		#tramite  h3{
			color: #333;
			font-size: 1.2rem;
		}

		.danger{
			background-color: #a55;
			padding: 10px;
			color: #9dd;
		}
		.conf{
			background-color: #5a5;
			padding: 5px 0px;
			text-align: center;
			color: white;
		}

		@media(max-width: 768px){


			header h1{
				font-size: 1.3rem;
			}

			header i{
				font-size: 1.1rem;
			}

			.products > div  img{
				width: 200px;
				height: 160px;


			}

			#tramite  h3{
				font-size: 1rem;
			}


		}
		
		@media(max-width: 500px){


			header h1{
				font-size: 1.1rem;
			}

			header i{
				font-size: 0.9rem;
			}

			.products > div  img{
				width: 150px;
				height: 130px;


			}

			#tramite  h3{
				font-size: 0.85rem;
			}


		}

		@media(max-width: 410px){


			header h1{
				font-size: 1rem;
			}

			header i{
				font-size: 0.85rem;
			}

			.products > div  img{
				width: 150px;
				height: 110px;


			}

			#tramite  h3{
				font-size: 0.8rem;
			}

			.products{
			
				padding: 0px;



			}


		}
		
		



	</style>


	<script type="text/javascript">

		StartApp = () => {

			let ButtonSearch = document.getElementById("buscar");
			let seachBox = document.getElementById("caja_buscar");



			ButtonSearch.addEventListener("click", defineArgement);

		}

		getBox = (box) => {

			return box = document.getElementById(box);

		}
		


		defineArgement = () => {

			let valu = document.getElementById("caja_buscar").value;
			let box = getBox("caja_resultado_buscar");
			let closeBox = getBox("cerrar_resultado_buscar");


			callDocument(valu);

			box.style.display = "block";
			closeBox.addEventListener("click", () =>{box.style.display = "none";});


		}

		 callDocument = async (valu) => {
		 	//alert("yeah");

		 	const data = new FormData();
		 	data.append("valueTittle", valu);

		 	let resProcess = await fetch("gestiones/buscador.php", {
		 		method : "POST",
		 		body : data
		 	});

		 	let res = await resProcess.json();


		 	printResult(res);


		}

		printResult = (printResult) => {

			let box = getBox("resultado_buscar");

			let contain = "";

				for(let i = 0; i < printResult.length; i++){
					console.log(printResult[i]["ID"]);

					contain += `<div class='result'>

						<a href='index.php?VPU=` + printResult[i]["ID"] + `'>` + printResult[i]["NOMBRE"] + `</a>

					</div>`;


				}


				box.innerHTML = contain;
		}

		window.addEventListener("load", StartApp);
	</script>

</head>
<body>
	<header>
		<div>
			<h1>CARRITO</h1>
		</div>
		<div>
			<a href="index.php?carrito"><i style="color: #000;" class="fas fa-shopping-cart"></i></a>
		</div>
		<div>
			<a href="index.php" class="fas fa-home"> Inicio</a>
		</div>
		<?php 

			if($_SESSION["carUser"]){

				echo '<div>
					<a href="gestiones/cerrar_sesion.php" class="fas fa-external-link-alt"> Cerrar Sesi&oacuten </a>
				</div>';

			}


		 ?>
	</header>
	<nav id="categorias">
		<ul>
			<?php 

				echo $categorias_nav;


			 ?>
		</ul>
		
	</nav>
	<div id="buscador">

		<div>
				
			<span>
				<input type="text" name="caja_buscar" id="caja_buscar">
			</span>

			<span>
				<button id="buscar">BUSCAR</button>
			</span>
		</div>

		<div id="caja_resultado_buscar">
			<div>
				<span class="fas fa-close" id="cerrar_resultado_buscar"></span>
			</div>
			<div id="resultado_buscar">

				SIN RESULTADO
				
			</div>

		</div>

		
	</div>

	<?php 



	 		if(isset($_GET["conf"])){


				echo "<p class='conf' id='conf'>" . $_GET["conf"] . "</p>";

	 		}


	 		if(isset($userSession)){

				echo $userSession;

	 		}
		//echo $conexMessage;

		

	 ?>

	 <div id="product">

	 	<?php 

	 		if(isset($contenido)){

				echo $contenido;

	 		}

	 	 ?>

	 </div>
	 <?php 

	 		if(isset($tramite)){

				echo $tramite;
	 		}


	  ?>

</body>
</html>