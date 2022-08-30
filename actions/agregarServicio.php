<?php

include '../Class/Servicio.php';
include '../Class/DatosBasicos.php';

extract($_POST); // Create the variables  $fechainicio, $tipoResiduoGeneral, $peso, $direccion, $localidad 

$estado = 'Pendiente';

$objServicio =  new Servicio();
$objServicio->setData($fechainicio, $direccion, $localidad, $tipoResiduoGeneral, $peso, $estado, $userId);
$objServicio->crearServicio();
$idServicio = $objServicio->getId();

$correo = DatosBasicos::getCorreo($userId);

// Envio de Mail


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../Class/PHPMailer/src/Exception.php';
require '../Class/PHPMailer/src/PHPMailer.php';
require '../Class/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);


ob_start();
include 'mailTemplate.php';
$body = ob_get_clean();

try {
    //Server settings
    $mail->isSMTP();   
    $mail->IsHTML(true);                                         //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ekoappPoo@gmail.com';                     //SMTP username
    $mail->Password   = 'kqouvrgptsupdscl';                               //SMTP password
    $mail->SMTPSecure = 'ssl';                                   //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ekoapppoo@gmail.com', 'EkoApp');
    $mail->addAddress($correo['correo'], $correo['nombre']);     //Add a recipient

    //Content
    $mail->Subject = 'Creacion de servicio de recolecta';
    
    $mail->Body    = $body;
    $mail->AltBody    = $body;
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
};

header('Location: ../views/dashboard.php');
