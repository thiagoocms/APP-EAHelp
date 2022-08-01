<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';



function emailcolaborador($email, $token, $titulo, $categoria){
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
        $mail->Subject = "Seu chamado foi aberto! $token";
        $informacoes = "Olá, seu chamado de titulo ($titulo) e de categoria  ($categoria) foi criado com sucesso! ";
        $mail->Body    =  $informacoes;
        
    
        $mail->send();
        echo 'Message has been sent';
    
       
        
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
function emailadm($token){

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
	$mail->addAddress('suporte@grupoea.net.br', '');     //Add a recipient
	
	

	//Content
	$mail->isHTML(true);                                  //Set email format to HTML
	$mail->CharSet = "UTF-8";
	$mail->Subject = "Um chamado foi aberto! $token";
	$informacoes = "Va para o helpdesk tem  chamado aberto!";
	$mail->Body    =  $informacoes;
	

	$mail->send();
	echo 'Message has been sent';	
	//echo $texto;
    
	

} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
header('Location: home.php');

?>
