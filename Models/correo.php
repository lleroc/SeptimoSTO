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

        $desde = 'lleroc1@gmail.com';
        $nombreEnvio = "Luis Llerena";
        $host = "smtp.gmail.com";
        $puerto = "587";
        $SMTPAuth = "login";
        $_SMTPSecure = "tls";

        $tituloCorreo = "Hola niños";
        $cuerpocorreo= " hola mundo por correo";

        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = $host;
        $mail->Port = $puerto;
        $mail->SMTPAuth = $SMTPAuth;
        $mail->SMTPSecure = $_SMTPSecure;

        $mail->Username = $desde;
        $mail->Password = "";
        $mail->CharSet="UTF-8";

        $mail->setFrom($desde, $nombreEnvio);

        $mail->addAddress('ua.luisllerena@uniandes.edu.ec');
        $mail->isHTML(true);
        $mail->Subject=$tituloCorreo;
        $mail->Body=$cuerpocorreo;

        if (!$mail->Send()) {
            echo "Error " . $mail->ErrorInfo;
        }else{
            echo 'Se envio con exito';
            flush($mail);
        }


    }

    
}
