<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php

session_start();
include('conexao.php');
include('funcao_email_abrindo.php');
date_default_timezone_set('America/Recife');

$Object = new DateTime();  
$abriu = $Object->format("Y-m-d H:i:s "); 
$email = $_SESSION['email'];
$id = $_SESSION['id'];
$token= md5(uniqid());
$titulo = $_POST['titulo'];
$categoria = $_POST['categoria'];
$descricao = $_POST['descricao'];
$prioridade = $_POST['prioridade'];

$query = "INSERT INTO registra_chamado (token, titulo, categoria, descricao, usuario_id, email, abriu, prioridade) VALUES ('$token', '$titulo', '$categoria', '$descricao', '$id', '$email', '$abriu','$prioridade')";
    
$result = mysqli_query($conexao, $query);

emailcolaborador($email, $token, $titulo, $categoria);

emailadm($token);



?>
	
</body>
</html>