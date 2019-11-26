

<style>
    *{
      text-decoration:none;
    }
    .containerMessage,.blank{
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
    .containerMessage{
      z-index: 10;
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

    .btn{
      border: solid 1px;
    width: 100%;
    text-align: center;
    padding: 0.5em 0.5em;
    font-size: 1.3em;
    border-radius: 0.3em;
    transition: 0.3s;
    color: white;
    background:#0066b1;
    cursor: pointer;
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

  <div class="blank">
  </div>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


include_once('Exception.php');
include_once('PHPMailer.php');
include_once('SMTP.php');


  if(isset($_FILES['file'])){
    //echo"existe </br>";

    $nombre_archivo = $_FILES['file']['name'];
    $tipo_archivo = $_FILES['file']['type'];
    $tamano_archivo = $_FILES['file']['size'];
    $ruta = $_FILES['file']['tmp_name'];

    $fileNameCmps = explode(".", $nombre_archivo);
    $fileExtension = strtolower(end($fileNameCmps));

    $validExtension = array('jpg', 'pdf', 'png', 'docx', 'doc');

    echo $fileExtension;
    echo $tamano_archivo;

    if((in_array($fileExtension, $validExtension)) && $tamano_archivo < 400000  ){

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
        $mail->Host       = 'smtp.live.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'topofmind01@aleman.edu.co';                     // SMTP username
        $mail->Password   = 'Aleman2019';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 25;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('topofmind01@aleman.edu.co', 'Sitio Web');
        $mail->addAddress('topofmind01@aleman.edu.co', 'Sitio Web'); 
        $mail->addAddress('recursoshumanos@aleman.edu.co', 'Sitio Web'); 

        $mail->addAttachment($ruta, $nombre_archivo);  

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Formulario Trabaja para nosotros';
        $mail->Body    = $message;;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        
        echo '<div class="containerMessage">
        <div class="message">
            <h2>Formulario enviado con exito!</h2>
            <a class="btn" href="http://www.dscali.edu.co/wordpress/quienes-somos/trabaja-para-nosotros/">Aceptar</a>
        </div>
      </div>';


          } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }

    }else{

      echo '<div class="containerMessage">
        <div class="message">
            <h2>el archivo supera los 4MB o tiene un formato no valido</h2>
            <a class="btn" href="http://www.dscali.edu.co/wordpress/quienes-somos/trabaja-para-nosotros/">Aceptar</a>
        </div>
      </div>';
    }
   
    
    
  }else{
    echo '<div class="containerMessage">
        <div class="message">
            <h2>No se adjunto hoja de vida</h2>
            <a class="btn" href="http://www.dscali.edu.co/wordpress/quienes-somos/trabaja-para-nosotros/">Aceptar</a>
        </div>
      </div>';
  }

    
    ?>

