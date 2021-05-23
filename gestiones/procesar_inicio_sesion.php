<?php 
	session_start();

	if(isset($_POST["IS"])){

		if($_POST["correo"] != '' && $_POST["contrasena"] != ''){

			$data = tableANDlocation($_POST["opcion_cuenta"]);

			is($_POST["correo"], $_POST["contrasena"], $data);


		}else{


			retornar("Inserte los datos");
		}

	}else if(isset($_COOKIE["US"]) && isset($_COOKIE["PASS"]) && isset($_COOKIE["TAB"])){


		$data = tableANDlocation($_COOKIE["TAB"]);

		is($_COOKIE["US"], $_COOKIE["PASS"], $data);


	}else{
		retornar();
	}





	function is($us, $pass, $data){

		include("../gestiones_db/conexion.php");


		$sql = "SELECT CONTRASENA, ID FROM " . $data["tabla"] . " WHERE USERS = :US";

		echo $sql;

		
		$preparacion = $CNX->prepare($sql);

		$preparacion->execute(array(":US"=>$us));

		if($preparacion->rowCount() > 0){
			$esta = false;


			while($registros = $preparacion->fetch(PDO::FETCH_ASSOC)){

				//echo $registros["ID"];

				if(password_verify($pass, $registros["CONTRASENA"])){

					$esta = true;

					$id = $registros["ID"];



				}

			}


			if($esta){



				if( $data["tab"] == 1){


					$_SESSION["carUser"] = true;
					setcookie("US", $us, time() + 30 * 24 * 60 * 60, "../../");
					setcookie("PASS", $pass, time() + 30 * 24 * 60 * 60, "../../");
					setcookie("TAB", $data["tab"], time() + 30 * 24 * 60 * 60, "../../");



				}else{

					$_SESSION["carSeller"] = true;
				}


				$_SESSION["US"] = $us;
				$_SESSION["USFK"] = $id;

				header("Location:" . $data["location"]);

			}else{

				retornar("usted no esta registrado");
			}



		}else{

			retornar("usted no esta registrado");
		}




	}


	function retornar($err=""){

		header("Location: iniciar_sesion.php?err=". $err);

	}

	function tableANDlocation($type){
		$data = array();


			if($type == 1){

				$tabla = "usuarios_carrito";
				$location = "../index.php";
				$tab = 1;



			}else{

				$tabla = "vendedores_carrito";
				$location = "../gestion_productos/gestions/gestions.php";
				$tab = 2;

			}



			$data["tabla"] = $tabla;
			$data["location"] = $location;
			$data["tab"] = $tab;


			return $data;


	}






 ?>