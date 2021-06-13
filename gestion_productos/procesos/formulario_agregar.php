<?php 

	session_start();

	if(!isset($_SESSION["carSeller"])){

		header("Location: ../../gestiones/iniciar_sesion.php");
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulario Agregar Productos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1">

	<style type="text/css">

	*{
		padding: 0px;
		margin: 0px;
	}


 		section{
			padding: 20px;
			display: flex;
			justify-content: center;
			align-items: flex-start;

			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			-ms-box-sizing: border-box;
			-o-box-sizing: border-box;
		}
		section > div{

			width: 500px;
			padding: 10px;

		}
		section > div > div,form{
			padding: 10px 0px;
		}
		section > div > div > h2{
			padding: 5px 0px;
			color: #555;

			font-family: georgia;
		}

		section > div > form{

			display: flex;
			justify-content: flex-start;
			flex-direction: column;

			background-color: white;
			display: flex;
		}


		section > div > form > div{
			padding: 5px 0px;

		}
		button{
			width: 200px;
			padding: 10px 5px;
			color: white;
			background-color: #599;
			border:solid 1px #599;
			border-radius: 5px;

		}

		input{
			width: 250px;
			height: 25px;
			padding: 5px;
			margin: 10px 0px;
		}
		select{
			padding: 5px;
			width: 200px;
		}


		textarea{

			width: 400px;
			height: 100px;
			padding: 5px;
		}

		section > #masOpciones > div:nth-child(2){

			display: flex;
			flex-direction: column;

		}

		a{
			width: 200px;
			text-align: center;
			text-decoration: none;
			padding: 10px 5px;
			background: #579;
			color: white;
			margin-top: 10px ;

			border-radius: 5px;

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


		@media(max-width: 768px){


	 		section{

	 			flex-direction: column;
	 			justify-content: center;
	 			align-items: center;
			}
			section > div{
				width: 100%;
			}
			section > div > div > h2{
				text-align: center;
				font-size: 1.3rem;
			}


			section > div > form{

				justify-content: center;


			}

			section > #masOpciones > div:nth-child(2){

				justify-content: center;
				align-items: center;

			}

			#sms{

				font-size: 1rem;

			}


		}

		@media(max-width: 500px){
			section > div > div > h2{
				font-size: 1.1rem;
			}


			button{
				padding: 5px;
				font-size: 0.8rem;

			}

			textarea{

				width: 100%;
				height: 100px;
			}


			a{
				padding: 5px;

			}
			
		}
	</style>
</head>
<body>

	<div>

		<?php 

			if(isset($_GET["sms"])){

				echo "<p id='{$_GET["idsms"]}'> {$_GET["sms"]}</p>";

			}
		 ?>

	</div>

	<section>
		<div>
			<div>
				<h2>Datos del Producto</h2>
			</div>
			<form method="POST" action="proceso_agregar.php" enctype="multipart/form-data">

				<div>
					<input type="text" name="nombre_p" placeholder="Nombre">
				</div>
				<div>
					<input type="number" name="precio_p" placeholder="Precio">
				</div>
				<div>
					<input type="file" name="imagen" size="20">
				</div>
				<div>
					<textarea type="text" name="descripcion_p" placeholder="Descripción"></textarea>
				</div>
				<div>
					<select type="text" name="categoria_p">

						<option value="Deporte">Deporte</option>
						<option value="Alimentación">Alimentación</option>
						<option value="Informática">Informática</option>
						<option value="Mascotas">Mascotas</option>
						<option value="Ferretería">Ferretería</option>
						<option value="Juegos">Juegos</option>
						<option value="Bebidas">Bebidas</option>
						<option value="Dulces">Dulces</option>
						<option value="Software">Software</option>
						<option value="Belleza">Belleza</option>
						
					</select>
				</div>
				<div>
					<button type="submit">AGREGAR PRODUCTO</button>
				</div>
				
			</form>

		</div>

		<div id="masOpciones">
			<div>
				<h2>+ opciones</h2>
			</div>
			<div>			
				<a href="../">Inicio</a>
				<a href="../../">Ver la tienda</a>
			</div>
		</div>

	</section>
</body>
</html>