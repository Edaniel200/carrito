<?php 
	session_start();

	if(isset($_POST["CC"])){

		realizarCuenta();

	}else{

		header("Location:crear_cuenta.php");
	}




	function realizarCuenta(){

		if($_POST["nombre"] != '' && $_POST["apellidos"] != '' && $_POST["contrasena"] != '' && $_POST["direccion"] != '' && $_POST["correo"] != ''){



			include("../gestiones_db/conexion.php");
			include("../gestiones_db/insert.php");


			$datos = array("nombre"=>$_POST["nombre"],"apellidos"=>$_POST["apellidos"],"contrasena"=>password_hash($_POST["contrasena"], PASSWORD_DEFAULT),"direccion"=>$_POST["direccion"],"correo"=>$_POST["correo"]);



			if($_POST["opcion_cuenta"] == 1){

				$tabla = "usuarios_carrito";

			}else{

				$tabla = "vendedores_carrito";

			}

			$location = "iniciar_sesion.php";



			$insertar_usuario = new INSERT($CNX, $datos, "INSERT INTO " . $tabla . "(NOMBRE, APELLIDOS, DIRECCION, CONTRASENA, USERS) VALUES(:NOM, :APE, :DIR, :CONTRA, :US )");

			$insertar_usuario->executeInsert();
			echo $insertar_usuario->getAffected();


			if($insertar_usuario->getAffected() > 0){


				$_SESSION["email_tmp"] = $_POST["correo"];
			
				header("Location:" . $location);



			}else{

				$err = "Cuenta no creada, Verifique los datos";

				header("Location:crear_cuenta.php?err=" . $err);


			}








		}else{

			$err = "inserte los datos";
			header("Location:crear_cuenta.php?err=" . $err);

		}


		//echo $err;







	}






 ?>		
