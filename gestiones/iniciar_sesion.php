<?php 
	session_start();

	$_SESSION["carUser"] = false;

	if(isset($_COOKIE["US"]) && isset($_COOKIE["PASS"])){


		header("Location:procesar_inicio_sesion.php");

	}


	isset($_SESSION["email_tmp"])?$email_tmp = $_SESSION["email_tmp"]:$email_tmp = "";
	


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Inicio de sesion</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/845f067532.js" crossorigin="anonymous"></script>

	<style type="text/css">
		*{
			padding: 0px;
			margin: 0px;
		}
		section{
			padding: 20px;
			box-sizing: border-box;
			display: flex;
			justify-content: center;
			align-items: center;
		}


		section > div{

			width: 700px;
			padding: 20px;

		}
		section > div > div,form{
			padding: 20px 0px;
		}


		h2{
			width: 100%;
			padding: 10px 0px;
			color: #555;
			font-size: 1.3rem;
			text-align: center;
			text-transform: uppercase;
		}


		section > div > form{
			display: flex;
			justify-content: center;
			flex-direction: column;
			align-items: center;

			background-color: white;
			display: flex;
			justify-content: space-around;
		}		
		select {
			width: 200px;
			padding: 5px;

			border:solid 1px #777;
			background-color: #778;
			color: white;
		}


		button{
			width: 200px;
			padding: 10px;
			border:solid 1px #373;

			background-color: #595;
			color: white;
			border-radius: 5px;
			font-size: 1rem;

			margin-top: 15px;



		}
		input{
			width: 300px;
			padding: 5px;
			margin: 10px 0px;
			color: #444;
		}
		p{
			color: #555;
		}
		#enlaces{

			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
		}
		#enlaces > a{
			width: 200px;
			margin-top: 10px;
			text-align: center;

			background-color: #788;
			border:solid 1px #566;
			padding: 10px;
			color: #cdd;
			text-decoration: none;

			border-radius: 5px;
			font-size: 1rem;
			font-weight: bold;

		}

		.danger{
			background-color: #b22;
			color: white;
			text-align: center;
			padding: 10px 0px;
			text-transform: uppercase;

		}
		#titulo{
			padding: 20px 0px;
		}
		#titulo > h1{
			text-align: center;
			color: #788;
		}

		@media(max-width: 768px){

			.danger{
				font-size: 0.9rem;

			}
			section{
				flex-direction: column;
			}

			section > div{

				width: 100%;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				-o-box-sizing: border-box;
				-ms-box-sizing: border-box;

			}

			h2{
				font-size: 1.1rem;
			}
			#enlaces > a{


				font-size: 0.9rem;
				width: 180px;

			}

		}

		@media(max-width: 400px){

			.danger{
				font-size: 0.8rem;

			}

			h2{
				font-size: 0.95rem;
			}
			#enlaces > a{


				font-size: 0.9rem;
				width: 180px;

			}

			input{
				width: 250px;
			}

		}

	</style>
</head>
<body>
	<div>
		<?php 

			if(isset($_GET["err"])){

				echo "<p class='danger'>".$_GET["err"]."</p>";

			}

		 ?>

	</div>


		<section>
			<div>
					
				<div>
					<h2>Inicar Sesi&oacuten Comprador</h2>
				</div>

				<form method="POST" action="procesar_inicio_sesion.php">

					<input type="email" name="correo" placeholder="email" value="<?php echo $email_tmp; ?>">
					<input type="password" name="contrasena" placeholder="contraseña">
					<p>Tipo de Usuario</p>
					<br>
					<select name="opcion_cuenta">
						<option value="1">Comprador</option>
						<option value="2">Vendedor</option>
					</select>

				

					
					<button type="submit" name="IS" class="fas fa-sign-in-alt"> Iniciar Sesion</button>

				</form>




			</div>

			 <div id="enlaces">
			 	<div>
			 		<h2>Otras Opciones...</h2>
			 	</div>

			 	<a href="../" class="fab fa-product-hunt"> Entrar a la Tienda</a>


			 	<a href="crear_cuenta.php" class="fas fa-user"> Crear Cuenta</a>


			 	<a href="../" class="fab fa-product-hunt"> Iniciar Sesión Vendedor</a>
			 	

			 </div>
		</section>
		<div id="titulo">

			<h1>STORE</h1>

		</div>

</body>
</html>