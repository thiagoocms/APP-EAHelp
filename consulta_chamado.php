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
     @ $list = $_SESSION['list'];
      $id = $_POST['id'];
     
      ?>
            
            
        

                    
                    <tr>
                        <th>Id:</th>
                        <td><?php echo $list[$id][0]?></td>
                    </tr>
            
                    <tr>
                        <th>Token:</th>
                        <td><?php echo $list[$id][1]?></td>
                    </tr>
                    <tr>
                        <th>E-mail:</th>
                        <td><?php echo $list[$id][2]?></td>
                    </tr>
                    
                    <tr>
                        <th>Titulo:</th>
                        <td><?php echo $list[$id][3]?></td>
                    </tr>
                    <tr>
                        <th>Categoria:</th>
                        <td><?php echo $list[$id][4]?></td>
                    </tr>
                    <tr>
                        <th>Descrição:</th>
                        <td><?php echo $list[$id][5]?></td>
                    </tr>
                    <tr>
                        <th>Prioridade:</th>
                        <td><?php echo $list[$id][7]?></td>
                    </tr>
                   
            <?php
    
           @ $Object =  new DateTime($list[$id][6]);  
            $tempo = $Object->format("d-m-Y H:i:s ");
            ?>
                    
                 
    </table>
    <label for="">chamado foi aberto em:</label>
    <h6><?php echo $tempo?> </h6>
    
    <a class=' btn bg-warning' href="index_2.php">voltar</a>
    <a class="btn bg-danger" href="fechando_chamado.php"> fechar</a>
    </div><!--box-content w50-->
    <div class="box-content1 w50 right">
        <form action="mudar_prioridade.php" method="post">
            <div class="form-group">
                <label>Prioridade</label>
                <select name="prioridade" class="form-control" required>
                <option><?php echo $list[$id][7]?></option>
                <option>baixa</option>
                <option>media</option>
                <option>alta</option>
                
                </select>
                <input type="hidden" name="id" value="<?php echo $id ?>">
            </div>
        
            <input class="btn bg-warning" type="submit" value="Mudar">
        </form>
    </div>
    
    <div class="box-content1 w50 ">
        <form action="enviar_mensagem.php" method="post">

        <div class="form-group">
            <label>mensagem:</label>
            <textarea name="msg" class="form-control" rows="4"></textarea>
            <br>
            <input class="btn bg-warning" type="submit" value="Enviar">
        </div>

        </form>
    </div>
    <?php

        @$_SESSION['id1'] = $list[$id][0];
        @$_SESSION['token'] = $list[$id][1];
        @$_SESSION['email1'] = $list[$id][2];
        @$_SESSION['titulo'] = $list[$id][3];
        @$_SESSION['categoria'] = $list[$id][4];
        @$_SESSION['descricao'] = $list[$id][5];
        @$_SESSION['abriu'] = $list[$id][6];
        @$_SESSION['prioridade'] = $list[$id][7];
        
        //print_r($_SESSION)
    ?>


</div><!--content-->


</body>
</html>