<?php

use PHPMailer\PHPMailer\PHPMailer;

include_once('../Mailer/src/PHPMailer.php');
include_once('../Mailer/src/SMTP.php');
include_once('../Mailer/src/Exception.php');
include_once('../Config/conexion.php');

class EnvioCorreos
{
    public function recuperar($Usuarios_Correo){
        $mail = new PHPMailer();

        $fromemail = "noreplay@uniandesenlinea.edu.ec";
            $fromname = "Alumni UNIANDES";
            $host = "mail.asematica.com.ec";
            $port = "587";
            $SMTPAuth = "login";
            $_SMTPSecure = "tls";

            $subject = "Hola niños";
            $bodyemail = "<!DOCTYPE html>
        <html lang='es'>
          <head>
            <meta charset='UTF-8' />
            <meta http-equiv='X-UA-Compatible' content='IE=edge' />
            <meta name='viewport' content='width=device-width, initial-scale=1.0' />
            <title>Restablecer Contraseña</title>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css'>
          </head>
          <body>
            <h1>Recuperar Contraseña</h1>
        
            <a class='btn btn-outline-primary'
              href='http://localhost/septimosto/restablecer.php?correo=lleroc1@gmail.com&clave=123'
            >
              Presione aqui para recuperar su contraseña
            </a>
          </body>
        </html>
        ";
        $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = $host;
            $mail->Port = $port;
            $mail->SMTPAuth = $SMTPAuth;
            $mail->SMTPSecure = $_SMTPSecure;
            $mail->Username = $fromemail;
            $mail->Password = "noreplay2022";
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($fromemail, $fromname);

        $mail->addAddress($Usuarios_Correo);
        $mail->isHTML(true);
            
        $mail->Subject = $subject;
        $mail->Body = $bodyemail;

        if (!$mail->Send()) {
            echo "Error " . $mail->ErrorInfo;
        }else{
           return '1';
            flush($mail);
        }


    }

    
}
