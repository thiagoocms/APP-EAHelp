<?php

// Sistema de HelpDesk
// Base = MySQL

$Host= "localhost";   //<----aqui vc deve configurar o caminho para o host


// helpdesk
$Base= "helpdesk" ;  //nao mude
$Usuario= "root" ;   //<---------aqui vc deve colocar o usuario do mysql
$Senha= "" ;  //<---------aqui vc deve colocar a senha do mysql
//$Nivel= "adm";
 
$conexao = mysqli_connect($Host, $Usuario, $Senha, $Base) or die ("nao foi possivel conectar");



?>