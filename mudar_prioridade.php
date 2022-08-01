<?php
include('conexao.php');

$prioridade = $_POST['prioridade'];
$id = $_POST['id'];


$query = "UPDATE registra_chamado SET prioridade = '{$prioridade}' WHERE registra_chamado.id = '{$id}'";
$result = mysqli_query($conexao,$query);

header('Location: index_2.php');

/*
UPDATE `registra_chamado` SET `prioridade` = 'baixa' WHERE `registra_chamado`.`id` = 37
 */

?>