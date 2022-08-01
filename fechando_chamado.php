<?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;
   
   require 'vendor/autoload.php';
    session_start();
    include('conexao.php');
    date_default_timezone_set('America/Recife');

    $abriu = $_SESSION['abriu'];

    $Object = new DateTime();  
	$fechou = $Object->format("Y-m-d H:i:s ");

    $firstDate  = new DateTime($abriu);
    $secondDate = new DateTime($fechou);
    $intvl = $firstDate->diff($secondDate);
    $tem ="$intvl->h:$intvl->i:$intvl->s" ;
    
    


    $id = $_SESSION['id1'];
    $token = $_SESSION['token']; 
    $email = $_SESSION['email1'];
    $titulo = $_SESSION['titulo'];
    $categoria = $_SESSION['categoria'];
    $descricao = $_SESSION['descricao'];
    $prioridade = $_SESSION['prioridade'];
 

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
        $mail->Subject = "[$token]Seu chamado foi fechado! ";
        $informacoes = "Olá, seu chamado de titulo ($titulo) e de categoria  ($categoria) foi resolvido! ";
        $mail->Body    =  $informacoes;
        
    
        $mail->send();
        echo 'Message has been sent';
        $query ="INSERT INTO chamados_fechados (id, titulo, categoria, descricao, token, email, abriu, fechou, prioridade) VALUES ('$id', '$titulo', '$categoria', '$descricao', '$token', '$email', '$abriu', '$fechou', '$prioridade')";
        $result = mysqli_query($conexao,$query);
    
    
        $query2 = "DELETE FROM registra_chamado WHERE id = '{$id}' and token = '{$token}'";
        $result2 = mysqli_query($conexao,$query2);
    
        header('location: index_2.php');
    
       
        
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

   
    

?>  