<?php 
session_start();
include('conexao.php');
?>

<?php 
    $query = "select  * from registra_chamado";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);


    $query2 = "select  * from chamados_fechados";
    $result2 = mysqli_query($conexao, $query2);
    $row2 = mysqli_num_rows($result2);
    $registro = mysqli_fetch_array( $result2);

   
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="estilo/font-awesome.min.css">
	<link href="index_2.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<div class="menu">
	<div class="menu-wraper">
	<div class="box-usuario">
		
			<div class="avatar-usuario">
				<i class="fa fa-user"></i>
			</div><!--avatar-usuario-->
		
		
		<div class="nome-usuario">
			<p><?php echo $_SESSION['usuario']; ?></p>
            
			<p><?php echo $_SESSION['cargo']; ?></p>
		</div><!--nome-usuario-->
	</div><!--box-usuario-->
	<div class="items-menu">
        <a class="btn " href="index_2.php"> Home</a>
		<a class="btn " href="usuarios.php"> Usuarios</a>
        <a class="btn " href="relatorio.php"> Relatorios</a>
        
	</div><!--items-menu-->
	</div><!--menu-wraper-->
</div><!--menu-->
<header>
	<div class="center">
		<div class="menu-btn">
			
		</div><!--menu-btn-->

		<div class="loggout">
			<a href="logoff.php" class='fas fa-sign-out-alt'></a>
		</div><!--loggout-->

		<div class="clear"></div>
	</div>
</header>
</body>
</html>