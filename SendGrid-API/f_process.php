<?php
session_start();

/*SendGrid Library*/
require_once ('vendor/autoload.php');

/*Post Data*/
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$message = trim($_POST['message']);

if(empty($name) && empty($email) && empty($message) && empty($phone)) {
    $_SESSION['msgFields'] = "Please enter mandatory fields - Encasillados mandatorios";
    return header("Location:../contact.php");
} else {
    /*Content*/
    $from = new SendGrid\Email($name, $email);
    $subject = "Contact Form - Forma de Contacto - santiempleo.com";
    $to = new SendGrid\Email("Santi Staffing Solutions", "carlos@santistaffingsolutions.com");
    $content = new SendGrid\Content("text/html", "You have a new message with following details - Tiene un mensaje con los siguientes detalles<hr>.<br>Name - Nombre: $name<br><br>Phone - Telefono: $phone<br><br>Email - Correo Electronico: $email<br><br>Message - Mensaje:<br><br> $message");

    /*Send the mail*/
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
    $apiKey = ('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');
    $sg = new \SendGrid($apiKey);

    /*Response*/
    $response = $sg->client->mail()->send()->post($mail);
    
    if($response->_status_code == 202){
        $_SESSION['msg'] = "Message has been sent successfully - El mensaje se ha enviado exitosamente.";
    } else {
        $_SESSION['msg'] = "Message has not been sent successfully - El mensaje no se ha enviado exitosamente.";
    }
    header("Location:../contact.php");
}
