<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions

$phpmailer = new PHPMailer();
try {
$phpmailer->isSMTP();
$phpmailer->Host = 'smtp.gmail.com';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 465;
$phpmailer->SMTPsecure = PHPMailer::ENCRYPTION_SMTPS;
$phpmailer->Username = 'de6b53131e4ddf';
$phpmailer->Password = 'd4a9b34eabbd36';

//Recipients
$phpmailer->setFrom('bracoscali@gmail.com', 'Bryan');
$phpmailer->addAddress('$correo', '$name');     //Add a recipient

$phpmailer->isHTML(true);                                  //Set email format to HTML
$phpmailer->Subject = 'Olvido de Contraseña';
$phpmailer->Body    = 'esta es su contraseña <b>#</b>';
/* $phpmailer->AltBody = 'This is the body in plain text for non-HTML mail clients'; */

$phpmailer->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
}