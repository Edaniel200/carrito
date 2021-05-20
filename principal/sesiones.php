<?php 
	session_start();



	if(!isset($_SESSION["carUser"])){

		header("Location: gestiones/iniciar_sesion.php");




	}else{

		if(!$_SESSION["carUser"]){

			$userSession = "		
				<div id='sessionMessage'>
					<p>Aún no ha iniciado sesión, inicie sesión para gestionar pagos</p>
					<a href='gestiones/iniciar_sesion.php'><button>Iniciar Sesión</button></a>
				</div>


			";
		}

	}



 ?>