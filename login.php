<?php
session_start();
include('conexao.php');

?>
<?php
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$usuario_autenticado = false;
	
$usuario_perfil_id = null;


$query = "select  * from acesso_colaborador where usuario = '{$usuario}' and senha = '{$senha}'";
$result = mysqli_query($conexao, $query);
$registro = mysqli_fetch_array($result);
$row = mysqli_num_rows($result);

$query2 = "select  * from acesso_adm where usuario = '{$usuario}' and senha = '{$senha}'";
$result2 = mysqli_query($conexao, $query2);
$registro2 = mysqli_fetch_array($result2);
$row2 = mysqli_num_rows($result2);


$id = $registro['id'];
$id2 = $registro2['id'];
$email = $registro['email'];
$email2 = $registro2['email'];



if($row == 1){

    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha'] = $senha;
    $_SESSION['autenticado'] = 'SIM';
    
    $usuario_perfil_id = 2;
    $_SESSION['id'] = $id;
	$_SESSION['perfil_id'] = $usuario_perfil_id;
    $_SESSION['email'] = $email;
    $_SESSION['cargo'] = "Colaborador";
	

	

    header('location: home.php');
}else if($row2 == 1){

    $_SESSION['usuario'] = $usuario;
    $_SESSION['autenticado'] = 'SIM';
    
    $usuario_perfil_id = 1;
    $_SESSION['id'] = $id2;
	$_SESSION['perfil_id'] = $usuario_perfil_id;
    $_SESSION['email'] = $email2;
    $_SESSION['cargo'] = "Administrador";


    header('location: index_2.php');
}else{
    header('Location: index.php?login=erro');
}
    
?>




