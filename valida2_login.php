<?php
session_start();
if(!$_SESSION['usuario']){
    header('Location: index.php?login=erro');
}

//variavel que verifica se a autenticacao foi realizada
$query_id= "select  id, email from acesso_colaborador where usuario = 'teste' and senha = '1234'";
$usuario_id = mysqli_query($conexao, $query_id);
$result_id = mysqli_fetch_array($usuario_id);
echo $result_id['id'];


$usuario_autenticado = false;

$usuario_perfil_id = null;
echo $usuario_id;

$perfis = array(1 => 'Administrativo', 2 => 'Usuário');

//usuarios do sistema
$usuarios_app = array(
    array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),

);

?>