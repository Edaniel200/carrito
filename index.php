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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

	<script src="https://kit.fontawesome.com/845f067532.js" crossorigin="anonymous"></script>

	

	<style type="text/css">
	@media(max-width: 2000px){	


		*{
			padding: 0px;
			margin: 0px;
		}
		body{
		}
		header{
			display: flex;
			position: sticky;
			top: 0px;

			justify-content: space-around;
			align-items: center;
			padding: 5px 0px;
			background-color: white;

			box-shadow: 1px 1px 1px 1px #bbb;
		}
		#menu{
			display: none;
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

/*---------------------------------------------- MENSAJES DEVUELTOS -------------------------*/

		.conf{

			color: white;
			text-align: center;
			background-color: #222;
			
			padding: 5px 0px;

		}

		#sessionMessage{

			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;

			color: white;
			text-align: center;
			background-color: #c55;
			
			padding: 10px 0px;


		}

		#sessionMessage > p{

			padding: 0px 10px;
			color: #fbb;
		}
		#sessionMessage button{
			padding: 5px;
			background-color: #722;
			color: #fbb;
			border:solid 1px #700;
		}

/*--------------------------------- NAVEGACION -------------------*/

		nav{
			display: block;
			padding: 20px 0px;

			
		}

	
		nav > ul{

			display: flex;
			justify-content: center;
			align-items: center;
			overflow-x: auto;
			padding-bottom: 2px;

		}
		nav > ul::-webkit-scrollbar{

			height: 2px;


		}
		nav > ul::-webkit-scrollbar-thumb{

			background-color: #ccc;


		}

		li{
			list-style-type: none;
			background-color: #75f;

			width: 120px;
			min-width: 100px;


			padding: 5px;
			border-radius: 5px;
			border: solid 1px #75f;
			margin: 0px 0px 0px 10px;

			text-align: center;
		}


		li a{

			color: white;
		}

		li:hover{
			background-color: white;

			border: solid 1px #75f;
			
		}
		li:hover a{

			color: #333;

		}
	




/*------------------------------------------- BUSCADOR ------------------------*/

		#buscador{
			position: relative;
			padding: 10px 0px;

		}

		#buscador > div:nth-child(1){

			display: flex;
			justify-content: center;
			align-items: center;


		}

		#buscador > div:nth-child(1) > span > input{

			width: 300px;
			padding: 5px;

		}
		#buscador > div:nth-child(1) > span > button{

			width: 100px;
			padding: 5px;


			color: white;
			border:solid 1px #555;
			background-color: #333;


		}

		#buscador  span{

			margin: 0px 10px;
			
		}

		#buscador  span > *{
		padding: 5px;

		}

		#caja_resultado_buscar{
			
			display: none;

		}

		#caja_resultado_buscar > div{
			text-align: center;
			padding: 10px 0px;



		}

		#caja_resultado_buscar > div > div{
			display: inline-block;

			padding: 10px 0px;
		}
		#caja_resultado_buscar > div a{
			text-align: center;
			padding: 5px;
			margin: 0px 5px;
			color: white;
			background-color: #75f;

			border-radius: 5px;
			box-shadow: 1px 1px 1px 1px #aaa;


		}


		

/*----------------------------------- PRODUCTOS -----------------------*/


		#product{

			width: 100%;
			display: flex;
			justify-content: center;
			flex-wrap: wrap;


			padding: 20px 0px;

		}

		.products{
			width: 200px;
		
			padding: 10px;

			border-bottom: solid 1px #aaa;
			margin: 5px;


		}
		.products > p , .vpu_products > p{
			padding: 5px 0px;
			text-align: center;

		}
		.nombre{

			font-weight: bold;
			padding:15px 0px;
		}

		.descripcion{
			font-weight: normal;
			padding: 15px 0px;
		}

		.products > div , .vpu_products > div{
			width: 100%;
			padding: 15px 0px;

		}

		.products > div  img{
			width: 100%;
			height: 150px;

		}


		.vpu_products{

			width: 500px;

		}

		.vpu_products > div  {
			text-align: center;

		}
		.vpu_products > div > img  {
			width: 250px;
			height: 200px;

		}



		.products button , .vpu_products button {
			width: 200px;
			padding: 5px 0px;
			border:solid 1px #555;
			background-color: black;
			color: white;

			border-radius: 5px;

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




		.products_carrito{

			width: 400px;
			display: flex;
			align-items: center;
			padding: 10px;
			border:solid 1px #ccc;
			border-radius: 5px;


		}
		.products_carrito > div{

			flex: 1;
			background-color: unset;

		}
		.products_carrito > div:nth-child(1) > img{
			width: 100%;

		}
		.products_carrito > div:nth-child(1) > p{
			text-align: center;
			padding: 5px 0px;
			font-weight: bold;
		}
		.products_carrito > div:nth-child(2) > p{
			text-align: center;
			padding: 5px 0px;
			color: #444;
		}
		.products_carrito > div:nth-child(2) button{
			padding: 5px;
			width: 100px;
			background-color: black;
			color: white;
			border:solid 1px #444;
		}

	}


	

		@media(max-width: 768px){

			#menu{
				display: block;
			}
			nav{

				animation: none;
				display: none;
				padding: 10px;
				position: fixed;
				width: 250px;

				background-color: white;

				z-index: 1000;
				box-shadow: 1px 2px 1px 1px #bbb;

				border-top: solid 1px #bbb; 

			}
			nav > ul{
				width: 100%;
				flex-direction: column;
				justify-content: flex-start;
				align-items: flex-start;

			}
			li{
				background-color: unset;
				width: 200px;

				padding: 5px;
				border:none;
				border-radius: 0px;
				border-bottom: solid 1px #999; 

				margin: 0px 0px 0px 10px;

				text-align: left;
			}

			li a{

				color: #444;
			}

			li:hover{
				background-color: white;
				border:none;
				border-bottom: solid 1px #000;
				
			}
			li:hover a{

				color: #333;

			}




			header h1{
				font-size: 1.3rem;
			}

			header i{
				font-size: 1.1rem;
			}

			.products{

				width: 170px;

			}

			.products > div  img{
			
				height: 130px;


			}

			.vpu_products{

				width: 400px;

			}

			.vpu_products > div > img  {
				width: 225px;
				height: 175px;

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

			#sessionMessage > p{
				font-size: 0.9rem;
				padding: 0px 3px;
			}


			.products{

				width: 140px;

			}

			.products > div  img{
				
				height: 100px;


			}
			.nombre{
				font-size: 0.9rem;
			}

			.descripcion{
				font-size: 0.9rem;
			}

			.vpu_products{

				width: 300px;

			}

			.vpu_products > div > img  {
				width: 200px;
				height: 150px;

			}




			#tramite  h3{
				font-size: 0.85rem;
			}



			.products_carrito{

				width: 300px;

			}
			.products_carrito > div:nth-child(1) > p{
				font-size: 0.85rem;
			}
			.products_carrito > div:nth-child(2) > p{
				font-size: 0.9rem;
			}



	/*------------------------------------------- BUSCADOR ------------------------*/


			#buscador > div:nth-child(1) > span > input{

				width: 200px;

			}
			#buscador > div:nth-child(1) > span > button{

				width: 80px;

			}
			


		}

		@media(max-width: 420px){
			header{
				padding: 15px 0px;
			}

			header h1{
				font-size: 1.1rem;
			}

			header i{
				font-size: 0.9rem;
			}



			.vpu_products .nombre{
				font-size: 1.2rem;
			}

			.vpu_products .descripcion{
				font-size: 1rem;
			}

			.vpu_products{

				width: 300px;

			}

			.vpu_products > div > img  {
				width: 200px;
				height: 150px;

			}

			.vpu_products button{

				padding: 5px 0px;

			}





			#tramite  h3{
				font-size: 0.8rem;
			}

			#buscador > div:nth-child(1) > span > input{

				width: 170px;

			}
			#buscador > div:nth-child(1) > span > button{

				width: 50px;

			}
			



		}
		
		



	</style>


	<script type="text/javascript">

		StartApp = () => {





			let ButtonSearch = document.getElementById("buscar");
			let seachBox = document.getElementById("caja_buscar");



			ButtonSearch.addEventListener("click", () => {

				let valu = document.getElementById("caja_buscar").value;

				valu != ""?defineArgement(valu):alert("Inserte Algo");

			});


			$("#menu").click(function(){

				let categorias_nav = document.getElementById("categorias");

				categorias_nav.style.display != "block"?$("#categorias").show(300):$("#categorias").hide(150);


			});

		}

		settingApp = () => {

			if(window.innerWidth > 768){

				$("#categorias").show(100);

			}
		}


		defineArgement = (valu) => {

			let box = document.getElementById("caja_resultado_buscar");
			let closeBox = document.getElementById("cerrar_resultado_buscar");


			callDocument(valu);

			box.style.display = "block";
			closeBox.addEventListener("click", () =>{ box.style.display = "none"; });


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

		printResult = printResult => {

			let box = document.getElementById("resultado_buscar");

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
<body onresize="settingApp();">
	<header>
		<div id="menu">
			<span class="fas fa-align-left" ></span>
		</div>
		<div>
			<h1>STORE</h1>
		</div>
		<div>
			<a href="index.php?carrito"><i style="color: #000;" class="fas fa-shopping-cart"></i></a>
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
			<li><a href="index.php" class=""> Inicio</a></li>
			<?php 

				echo $categorias_nav;

			 ?>
		</ul>
		
	</nav>


	<?php 


	 		if(isset($_GET["conf"])){


				echo "<p class='conf' id='conf'>" . $_GET["conf"] . "</p>";

	 		}


	 		if(isset($userSession)){

				echo $userSession;

	 		}
		//echo $conexMessage;

		

	 ?>


	 <div id="buscador">

		<div>
				
			<span>
				<input type="text" name="caja_buscar" id="caja_buscar" placeholder="buscar por nombre">
			</span>

			<span>
				<button id="buscar" class="fas fa-search"></button>
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

	  <style type="text/css">
	  	
			@keyframes categorias{


				50%{
					display: block;
					background-color: #000;
				}

			}

	  </style>

</body>
</html>
