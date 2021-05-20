<?php 

	ob_start();

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;


	if(!$_SESSION["carUser"]){


		$contenido = "<div><h3>Inicie sesion para poder realizar el pago y sino tiene una cuenta cree una <a href='gestiones/crear_cuenta.php'>Crear Cuenta</a></h3></div>";

	}else{

		$productos_pedidos = json_decode($_GET["datos"]);
		print_r($productos_pedidos);



		
	    //echo $_SESSION['enviar_email']; 

		include ('mailer/PHPMailer.php');
		include ('mailer/SMTP.php');
		include ('mailer/Exception.php');

		$mail = new PHPMailer(true);

		try{
			$mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->Host = 'smtp.hostinger.es';
			$mail->Username = 'danielmartinezvazquez8@wsiteportafolio.com';
			$mail->Password = 'ErwingDaniel1038';
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = '587';



			$mail->setFrom('danielmartinezvazquez8@wsiteportafolio.com');
			$mail->addAddress($_SESSION['US']);

			$mail->isHTML();

			$mail->Subject = '	PEDIDO ';
			$cuerpo = "";
			for($i = 0; $i < count($productos_pedidos); $i++){

				$cuerpo .= "<p> Nombre: " . $productos_pedidos[$i]->NOMBRE . " Precio: " . $productos_pedidos[$i]->PRECIO . " Cantidad: " .  $productos_pedidos[$i]->CANTIDAD . "</p>";


			}
			$mail->Body = '<h3>Usted ha realizado un pedido de: </h3><div>'.$cuerpo.'</div>';

			if($mail->send()){

				setcookie("ID_PRODUCTO", "", time() - 1);


				//header("Location: index.php?conf=Pedido Realizado");

			}

			//echo 'enviado';
			

		}catch(Exception $e){
			echo 'Error: ' . $e->errorInfo;
		}
		
	    	
			//header("Location:citas.php");
			
			ob_end_flush();


		
	}

 ?>