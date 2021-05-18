<!DOCTYPE html>
<html>
<head>
	<title>Formulario Agregar Productos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1">

	<style type="text/css">

 		section{
			padding: 20px;
			box-sizing: border-box;
			display: flex;
			justify-content: center;
		}
		section > div{
			background-color: #eee;
			width: 700px;
			padding: 20px;

		}
		section > div > div,form{
			padding: 10px 0px;
		}
		section > div > div > h2{
			padding: 10px 0px;
			color: #555;

			text-align: center;
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

		button{
			width: 150px;
			padding: 5px;
			color: #bbf;
			background-color: #559;
			border:solid 1px #266;

		}
		input{
			width: 200px;
			padding: 3px;
			margin: 10px 0px;
		}

		a{
			text-decoration: none;
			padding: 5px;
			background: #55c;
			color: white;
		}
		
		#sms{
			background-color: black;
			color: white;
			text-align: center;
			padding: 5px 0px;
		}
	</style>
</head>
<body>

	<div>
		<?php 

			if(isset($_GET["sms"])){

				echo "<p id='sms'>" . $_GET["sms"] . "</p>";

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
					<!--<textarea name="descripcion_p">
						no se puede
					</textarea>-->
					<input type="text" name="descripcion_p" placeholder="Descripción">
				</div>
				<div>
					<input type="text" name="categoria_p" placeholder="Categoria">
				</div>
				<div>
					<button type="submit">AGREGAR PRODUCTO</button>
				</div>
				
			</form>
			
			<div>
				<a href="../gestions/gestions.php">inicio</a>
			</div>


		</div>
	</section>
</body>
</html>