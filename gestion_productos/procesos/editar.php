<!DOCTYPE html>
 <html>
 <head>
 	<title>Editar Producto</title>
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
 	</style>
 </head>
 <body>


 	<section>
 		<div>
	 			
	 		<div>
	 			<h2>Inserte solamente lo que desea editar</h2>
	 		</div>

	 		<form method="POST" action="procesar_editar.php" enctype="multipart/form-data">

				<div>
					<input type="text" name="datos[NOMBRE]" placeholder="Nombre" value="">
				</div>
				<div>
					<input type="file" name="imagen_edi" size="20" value="">
				</div>
				<div>
					<!--<textarea name="descripcion_p">
						no se puede
					</textarea>-->
					<input type="text" name="datos[DESCRIPCION]" placeholder="Descripción" value="">
				</div>
				<div>
					<input type="text" name="datos[CATEGORIA]" placeholder="Categoria" value="">
				</div>
				<div>
					<input type="number" name="datos[PRECIO]" placeholder="Precio" value="">
				</div>
				<div>
					<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
				</div>
				<div>
					<button type="submit">ACTUALIZAR PRODUCTO</button>
				</div>
				
	 			
	 		</form>
	 		<div>
	 			<?php 

	 				if(isset($_GET["sms"])){

	 					echo "<p>" . $_GET["sms"] . "</p>";

	 				}

	 			 ?>
	 		</div>
 		</div>
 	</section>
 </body>
 </html>