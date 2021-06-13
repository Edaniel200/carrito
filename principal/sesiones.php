<?php 
	session_start();



	if(!isset($_SESSION["carUser"])){

		header("Location: gestiones/iniciar_sesion.php");


	}else{

		if(!$_SESSION["carUser"]){

			$userSession = "		
				<div class='sessionMessage'>

					<i class='fas fa-exclamation-triangle' style='color:#f55;'></i>

					

					<p><a href='gestiones/iniciar_sesion.php'>Iniciar Sesión</a>para gestionar pagos</p>
						
				</div>


			";
		}

	}



 ?>