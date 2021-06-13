<?php 

	session_start();

	if(!isset($_SESSION["carSeller"])){

		header("Location: ../../gestiones/iniciar_sesion.php");
	}



 ?>
<!DOCTYPE html>
 <html>
 <head>
 	<title>Editar Producto</title>
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
			font-size: 1rem;


			text-transform: uppercase;
			
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

			#smsDanger, #smsCheck{

				font-size: 0.9rem;

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

					echo "<p id='{$_GET['idsms']}'> {$_GET["sms"]}</p>";

				}

			 ?>
		</div>


 	<section>
 		<div>
	 			
	 		<div>
	 			<h2>Inserte lo que desea editar</h2>
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
					<select type="text" name="datos[CATEGORIA]">

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
					<input type="number" name="datos[PRECIO]" placeholder="Precio" value="">
				</div>
				<div>
					<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
				</div>
				<div>
					<button type="submit">ACTUALIZAR PRODUCTO</button>
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