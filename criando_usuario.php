<?php
include('conexao.php');
session_start();

$usuario = $_POST['usuario'];
$nivel = $_POST['nivel'];
$email = $_POST['email'];
$senha = $_POST['senha'];
if($nivel == 'Administrador'){
    $query = "INSERT INTO acesso_adm ( usuario, email, senha) VALUES ('$usuario', '$email', '$senha')";

	$result = mysqli_query($conexao, $query);

	
	header('Location: usuarios.php');
} else{
    $query = "INSERT INTO acesso_colaborador ( usuario, email, senha) VALUES ('$usuario', '$email', '$senha')";

	$result = mysqli_query($conexao, $query);

	
	header('Location: usuarios.php');
}
?>