<?php 

include('conexao.php');
include('menu.php');
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

    <style>
        .box-content1{
            background: rgba(255, 255, 255, 0.799);
            padding: 30px;
            
            text-align: center;
            
            margin-top: 10px
            
        }
        table{
            font-weight: 300;
            align-items: center;
            margin:20px 0;
            width: 100%;
            border-collapse: collapse;
        }

        table tr{
            border-bottom: 1px solid #ccc;
            width: 100%;
        }

        table tr{
            color:#555;
        }


        table td{
            padding: 8px;
            color: #333;
        }
    </style>
</head>
<body>





<div class="content">


	<div class="box-content1 w50 center">
    <table>
      <?php 
      @$list = $_SESSION['list2'];
      @$id = $_POST['id'];
      //print_r($list);
      ?>
            
            
        

                    
                    <tr>
                        <th>Id:</th>
                        <td><?php echo $list[$id]['id']?></td>
                    </tr>
            
                    <tr>
                        <th>Token:</th>
                        <td><?php echo $list[$id]['token']?></td>
                    </tr>
                    <tr>
                        <th>E-mail:</th>
                        <td><?php echo $list[$id]['email']?></td>
                    </tr>
                    
                    <tr>
                        <th>Titulo:</th>
                        <td><?php echo $list[$id]['titulo']?></td>
                    </tr>
                    <tr>
                        <th>Categoria:</th>
                        <td><?php echo $list[$id]['categoria']?></td>
                    </tr>
                    <tr>
                        <th>Descrição:</th>
                        <td><?php echo $list[$id]['descricao']?></td>
                    </tr>
                    <tr>
                        <th>resolvido em:</th>
                        <td><?php echo @$list[$id]['intervalo']?> minutos</td>
                    </tr>
            <?php
            $abriu = $list[$id]['abriu'];
            $fechou = $list[$id]['fechou'];
            $Object =  new DateTime($abriu);  
            $tempo1 = $Object->format("d-m-Y h:i:s a");
            $Object2 =  new DateTime($fechou);  
            $tempo2 = $Object2->format("d-m-Y h:i:s a");
            ?>
                    
                 
    </table>
    <label for="">chamado foi aberto em:</label>
    <h6><?php echo $tempo1?> </h6> 
        <hr>
    <label for="">chamado foi fechado em:</label>
    <h6><?php echo $tempo2?> </h6>
    <?php

      
    ?>
    <a class=' btn bg-warning' href="relatorio.php">voltar</a>
   
    </div><!--box-content w50-->
    


</div><!--content-->


</body>
</html>