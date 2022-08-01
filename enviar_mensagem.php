<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
 
$msg = $_POST['msg'];
$token = $_SESSION['token'];
$email = $_SESSION['email1'];
$titulo = $_SESSION['titulo'];
$categoria = $_SESSION['categoria'];


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.grupoea.net.br';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'suporte@grupoea.net.br';                     //SMTP username
    $mail->Password   = '102030EDu@#';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('suporte@grupoea.net.br', 'Suporte EA');
    $mail->addAddress($email, '');     //Add a recipient
    
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet = "UTF-8";
    $mail->Subject = "[$token] Você tem uma pergunta sobre esse chamado";
    $informacoes = "Olá, um dos administradores online fez uma pergunta ($msg) em seu chamado de titulo ($titulo) e de categoria  ($categoria)  ";
    $mail->Body    =  $informacoes;
    

    $mail->send();
    echo 'Message has been sent';

    
    

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
header('Location: index_2.php');
?>