<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './Exception.php';
require './PHPMailer.php';
require './SMTP.php';

  if(isset($_FILES['file'])){
    //echo"existe </br>";

    $nombre_archivo = $_FILES['file']['name'];
    $tipo_archivo = $_FILES['file']['type'];
    $tamano_archivo = $_FILES['file']['size'];

    $fileNameCmps = explode(".", $nombre_archivo);
    $fileExtension = strtolower(end($fileNameCmps));

    $validExtension = array('jpg', 'pdf', 'png', 'docx', 'doc');

    echo $fileExtension;

    if((in_array($fileExtension, $validExtension)) && $tamano_archivo < 40000  ){

      error_reporting(E_ALL);
      error_reporting(-1);


      echo $nombres = $_POST['nombres'].'</br>';
      echo $apellidos = $_POST['apellidos'].'</br>';
      echo $telefono = $_POST['telefono'].'</br>';
      echo $celular = $_POST['celular'].'</br>';
      echo $email = $_POST['email'].'</br>';
      echo $archivo = $_FILES['file']['name'];


      echo $message ='<b>Nombres: </b> '.$nombres.
      '<b>Apellidos: </b>'.$apellidos.
      '<br><b>Telefono: </b> '.$telefono.
      '<br><b>Celular: </b> '.$celular.
      '<br><b>Email: </b> '.$email;
      

  


      $mail = new PHPMailer(true);

      try {
        //Server settings
        $mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'topofmind.cm@gmail.com';                     // SMTP username
        $mail->Password   = 'topofmind4';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('topofmind.cm@gmail.com', 'Sitio Web');
        $mail->addAddress('topofmind.cm@gmail.com', 'Sitio Web'); 

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

    }else{

      echo "el archivo supera los 4MB o tiene un formato no valido";
    }
   
    
    
  }else{
    echo"no existe";
  }

    
    ?>