<?php 

include('conexao.php');
include('menu.php');
?>

<?php 
    $query = "select  * from acesso_adm";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);


    $query2 = "select  * from acesso_colaborador";
    $result2 = mysqli_query($conexao, $query2);
    $row2 = mysqli_num_rows($result2);
    

   
    

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





<div class="content">
    <div class='box-content'>
    
    <table class='i'>
                <tr>

                    
                    <th>Credencial</th>
                    <th>E-mail</th>
                    <th>Cargo</th>
                    
                    

                </tr>
                
                <?php 
                
                while($registro = mysqli_fetch_array($result)) { 
            
                    @$usuario = $registro['usuario'];
                    @$email = $registro['email'];
                    @$cargo = 'Administrador';
                
                
                
                    

                    echo"  <tr>

                        
                        
                        <td>$usuario</td>
                        <td>$email</td>
                        <td>$cargo</td>
                    

                        </tr>
                        
                        ";
                    } 
                    ;
                while($registro2 = mysqli_fetch_array($result2)) { 
            
                        @$usuario = $registro2['usuario'];
                        @$email = $registro2['email'];
                        @$cargo = 'Colaborador';
                    
                    
                    
                        
        
                        echo"  <tr>
        
                            
                            
                            <td>$usuario</td>
                            <td>$email</td>
                            <td>$cargo</td>
                        
        
                            </tr>
                            
                            ";
                        } 
                        ;
                    
                    
                                        
                    ?>

            </table>
            <div class='center'>
                <a class="btn " href="criar_usuario.php">Novo Usuario</a>
            </div>
     </div>

     <br><br><br><br><br><br><br><br>
</div><!--content-->


</body>
</html>