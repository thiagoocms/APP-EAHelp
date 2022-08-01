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
            margin-left: 25%;
            text-align: center;
            margin-bottom: 11%;
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

	<div class="box-content1 w50">
            
				<h2>criando um usuario</h2>
                <br>
                <form action="criando_usuario.php" method="post">
                    <div class="form-group">
                      <label>Credencial</label>
                      <input name="usuario" type="text"  class="form-control" placeholder="nome.sobrenome" required>
                    </div>
                    <div class="form-group">
                      <label>E-mail</label>
                      <input name="email" type="text"  class="form-control" placeholder="nome.sobrenome@grupoea.net.br" required>
                    </div>
                    
                    <div class="form-group">
                      <label>Nivel</label>
                      <select name="nivel" class="form-control" required>
                        <option>Administrador</option>
                        <option>Colaborador</option>
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Senha</label>
                      <input name="senha" type="password"  class="form-control" placeholder="12345678" required>
                    </div>
                    
                    

                    <div  class=" button row mt-4">
                      <div class="col-5">
                        <a class="btn btn-lg btn-warning btn-block" href="usuarios.php">Voltar</a>
                      </div>

                      <div class="col-5">
                        <button class="btn btn-lg btn-info btn-block" type="submit">Criar</button>
                      </div>
                    </div>
            </form>
    </div><!--box-content w50-->


</div><!--content-->


</body>
</html>