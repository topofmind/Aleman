<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="UTF-8">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway:400,500,600,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css">

  <style>
    .containerMessage{
      position: absolute;
      background: white;
      top:0;
      right:0;
      left:0;
      bottom:0;
      display:flex;
      justify-content:center;
      align-items:center
    }

    .message{
      padding: 2em;
      box-sizing:border-box;
      text-align:center;
      box-shadow: 0em 0em 0.6em rgba(0,0,0,0.5);
      border-radius: 1em;
      background:white;
      animation: 0.7s fadeIn forwards;
      animation-delay: 0.3s;
      opacity:0;
    }

    @keyframes fadeIn{
      0%{
        opacity:0;transform: translateY(80px);
      }
      100%{
        opacity:1;transform: translateY(0px);
      }
    }

    .message h2{
      margin-bottom: 30px;
    }
  </style>

</head>
<body>

    
<div class="containerMessage">
  <div class="message">
      <h2>Formulario enviado con exito!</h2>
      <a class="btn" href="../contacto.php">Aceptar</a>
  </div>
</div>


<?php
error_reporting(E_ALL);
error_reporting(-1);

 
//   echo $nombre= $_POST['nombre']."<br>";
//   echo $telefono = $_POST['telefono']."<br>";
//   echo $email = $_POST['email']."<br>";
//   echo $ciudad = $_POST['ciudad']."<br>";
//   echo $asunto = $_POST['asunto']."<br>";
//   echo $mensaje = $_POST['mensaje']."<br>";

 $nombre= $_POST['nombre'];
 $telefono = $_POST['telefono'];
 $email = $_POST['email'];
 $ciudad = $_POST['ciudad'];
 $asunto = $_POST['asunto'];
 $mensaje = $_POST['mensaje'];
  
 

  echo $message ='<b>Nombre: </b> '.$nombre.
    '<br><b>Telefono: </b> '.$telefono.
    '<br><b>Email: </b> '.$email.
    '<br><b>Ciudad: </b> '.$ciudad.
    '<br><b>Asunto: </b> '.$asunto.
    '<br><b>Mensaje: </b> '.$mensaje;
    // '<br><b>Políticas de tratamiento de datos personales: </b> '.$politicas;

    $url = 'contacto.php';


    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require './Exception.php';
    require './PHPMailer.php';
    require './SMTP.php';
    
    // Load Composer's autoloader
    //require 'vendor/autoload.php';
    
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'mail.drcarloscastillo.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'contacto@drcarloscastillo.com';                     // SMTP username
        $mail->Password   = 'C4rl0sC4st1llo*';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('contacto@drcarloscastillo.com', 'Sitio Web');
        $mail->addAddress('contacto@drcarloscastillo.com', 'Sitio Web');     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $message;;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>

</body>
</html>