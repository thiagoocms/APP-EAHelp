<?php 
include('conexao.php');
include('validador_acesso.php');

$query = "select  * from acesso_colaborador where usuario = '{$_SESSION['usuario']}' and senha = '{$_SESSION['senha']}'";
$result = mysqli_query($conexao, $query);
$registro = mysqli_fetch_array($result);
//print_r($registro);

$query2 = "select  * from registra_chamado";
$result2 = mysqli_query($conexao, $query2);



?>

<?php

 
  
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <header>
        <div class="inner-widthz">
            <h4>EAHelp</h4>
            <div class="menu-icon">
                <i class="fas fa-plus"></i>
                
            </div><!--nenu-icon-->
            
        </div><!--inner-width-->
        
    </header>

    <div class="navigation-menu">
        <nav>
            <li><a href="abrir_chamado_equipamentos.php">Equipamentos (CPU, Monitor, Teclado e etc)</a></li>
            <li><a href="abrir_chamado_user.php">Usuário e Senha</a></li>
            <li><a href="abrir_chamado_telefonia.php">Telefonia</a></li>
            <li><a href="abrir_chamado_insta.php">instalações e atualizações</a></li>
            <li><a href="abrir_chamado_sistemas.php">Sistemas</a></li>
            <li><a href="abrir_chamado_intranet.php">Intranet</a></li>
            <li><a href="abrir_chamado_vpn.php">VPN</a></li>
            
        </nav>
        <div><a href="#"></a></div>
    </div><!--navigation-menu-->
    <div class="body ">
    
    <div class='card-body'>
        <div class="card-columns">


                <?php  while($registro2 = mysqli_fetch_array($result2)) { ?>
                
                            <?php

                                @$titulo = $registro2['titulo'];
                                @$categoria = $registro2['categoria'];
                                @$descricao = $registro2['descricao'];
                                @$abriu = $registro2['abriu'];

                                //
                                
                                //só vamos exibir o chamado, se ele foi criado pelo usuário
                                    if($_SESSION['id'] != $registro2['usuario_id']) {
                                        continue;
                                    }
                                

                                

                            ?>
                
                    <div class="card text-center border-dark " style="width: 20rem;">
                        <div class="card-body  ">
                            <h5 class="card-title"><?=$titulo?></h5>
                            
                            <h6 class="card-subtitle mb-1 text-muted"><?=$categoria?></h6>
                            <h7 class="card-text"><?=$descricao?></h7>
                            

                        </div>
                        <div class="card-footer bg-transparent border-dark text-muted">
                        Aberto em: <?=$abriu?>
                        <h7 class="card-text"> status:<?=@$status?></h7>
                        </div>
                    </div>
                
                

                <?php } ?>

            
        </div>
        </div>
    
        

    </div><!--body-->
    

    <script>
        $(".menu-icon").click(function(){
            $(this).toggleClass("active");
            $(".navigation-menu").toggleClass("active");
            $(".menu-icon i").toggleClass("fa-times");
        });
    </script>
    
</body>
</html>