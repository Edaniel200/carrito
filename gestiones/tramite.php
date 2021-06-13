<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;


	if(!$_SESSION["carUser"]){


		$contenido = "<div id='tramite_fallido'>
		 <p><i class='fas fa-exclamation' style='color:#f55;'></i></p>
		 <h3>Inicie sesion para poder realizar el pago y sino tiene una cuenta, <a href='gestiones/crear_cuenta.php'>Crear Una</a></h3>
		 </div>";

	}else{

		$productos_pedidos = json_decode($_GET["datos"]);

		require 'vendor/autoload.php';

		
	    //echo $_SESSION['enviar_email']; 


		$mail = new PHPMailer(true);

		try{

			$mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->SMTPAuth = true;
			// $mail->Host = 'smtp.hostinger.es';
			// $mail->Username = 'danielmartinezvazquez8@wsiteportafolio.com';
			// $mail->Password = 'ErwingDaniel1038';

			$mail->Host = 'smtp.gmail.com';
			$mail->Username = 'danielmartinezvazquez8@gmail.com';
			$mail->Password = 'ErwingDaniel1038';
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = '587';



			$mail->setFrom('danielmartinezvazquez8@gmail.com');
			$mail->addAddress($_SESSION['US']);

			$mail->isHTML(true);

			$mail->Subject = '	PEDIDO ';
			$cuerpo = "";
			for($i = 0; $i < count($productos_pedidos); $i++){

				$cuerpo .= "<p> Nombre: " . $productos_pedidos[$i]->NOMBRE . " Precio: " . $productos_pedidos[$i]->PRECIO . " Cantidad: " .  $productos_pedidos[$i]->CANTIDAD . "</p>";


			}
			$mail->Body = '<h3>Usted ha realizado un pedido de: </h3><div>'.$cuerpo.'</div><small>RECUEDE QUE ESTO ES UNA TIENDA DE PRACTICA, NO LE LLEGARÁ NI DEBE NADA, GRACIAS.</small>';

			if($mail->send()){

				setcookie("ID_PRODUCTO", "", time() - 1);


				header("Location: index.php?conf=Pedido Realizado");

			}

			//echo 'enviado';
			

		} catch (Exception $e) {

    		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
		
	}

 ?>
