<?php 
	session_start();
		if($_POST["usuario"] != '' && $_POST["contrasena"] != ''){
			$pass = "\$2y\$10\$AmgHlje4Fin1fySVUfykouiuErZcVy/z39gicUf24TKnILkZCIz3.";
			if($_POST["usuario"] == "Admin123_ErwingDaniel1038" && password_verify($_POST["contrasena"], $pass) ){



				$_SESSION["log"] = true;

				header("Location: ../gestions/gestions.php");




			}else{
				echo "no es igual";
			}



		}else{
			header("Location: ../");
		}




 ?>