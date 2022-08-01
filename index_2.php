<?php 

include('conexao.php');
include('menu.php');
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





<div class="content ">

	<div class='box-content w100'>
    <?php echo " <h6 class='card-subtitle mb-1 text-muted'>Número de chamados abertos: $row</h6>"?>

        <table class='i'>
            <tr>

                
                <th>Token</th>
                <th>E-mail</th>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Prioridade</th>
                

            </tr>
            
            <?php 
            $cont = 0;
            while($registro = mysqli_fetch_array($result)) { 
        
                @$titulo = $registro['titulo'];
                @$categoria = $registro['categoria'];
                @$descricao = $registro['descricao'];
                @$token = $registro['token'];
                @$email1 = $registro['email'];
                @$id = $registro['id'];
                @$abriu = $registro['abriu'];
                @$prioridade = $registro['prioridade'];
                
               $list[$id] = array(
                    $id, $token, $email1, $titulo, $categoria, $descricao, $abriu, $prioridade
                );
                  
                $cont += 1;
            
                

                echo"  <tr>

                    
                    <td><form action='consulta_chamado.php' method='post'><input type='hidden' name='id' value='$id'> <input type='submit'  class='btn' value='$token'></form></td>
                    <td>$email1</td>
                    <td>$titulo</td>
                    <td>$categoria</td>
                    <td>$prioridade</td>
                   

                     </tr>
                     
                     ";
                 } 
                 ;
                 @$_SESSION['list'] = $list;
                 
                 
                                    
                ?>

        </table>
        
    </div><!--box-content w100-->
    <?php
    $dados = filter_input_array(INPUT_POST,);
    
    
?>
    <div class='box-content w100 '>
        <h4 class='card-subtitle mb-1 text-muted'>Encontrar chamado</h4>
        <form action="" method="post">
            <label for="">pesquiser por:</label>
            <input type="text"name='token' placeholder='token do chamado...'>
            <input  class=""type="submit"  name="pesq" value='Procurar'>
            
        </form>
        <?php

            if(!empty($dados['pesq'])){
                $token1 = $dados['token'];

                $query3 = "select  * from registra_chamado where token = '{$token1}' ";
                $result3 = mysqli_query($conexao, $query3);
                $registro3 = mysqli_fetch_array($result3);
                $row3 = mysqli_num_rows($result3);

                $query4 = "select  * from chamados_fechados where token = '{$token1}'";
                $result4 = mysqli_query($conexao, $query4);
                $registro4 = mysqli_fetch_array($result4);
                $row4 = mysqli_num_rows($result4);

                ?>
                <table class='i'>
                    <tr>
                
                    <th>Token</th>
                    <th>E-mail</th>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Situação</th>
                    <th>Prioridade</th>

                    </tr>
                <?php

                if($row3 == 1){
                    $token3 = $registro3['token'];
                    $email3 = $registro3['email'];
                    $titulo3 = $registro3['titulo'];
                    $categoria3 = $registro3['categoria'];
                    $id3 = $registro3['id'];
                    $descricao3 =  $registro3['descricao'];
                    $abriu3 = $registro3['abriu'];
                    $prioridade3 = $registro3['prioridade'];
                    $situacao3 = 'aberto';

                    $list[$id3] = array(
                        $id3, $token3, $email3, $titulo3, $categoria3, $descricao3, $abriu3, $prioridade3,
                    );

                    echo"
                    <td><form action='consulta_chamado.php' method='post'><input type='hidden' name='id' value='$id3'> <input type='submit'  class='btn' value='$token3'></form></td>
                    <td>$email3</td>
                    <td>$titulo3</td>
                    <td>$categoria3</td>
                    <td>$situacao3</td>
                    <td>$prioridade3</td>
                    ";
                    
                                                          
                }else if($row4 == 1){
                    $token4 = $registro4['token'];
                    $email4 = $registro4['email'];
                    $titulo4 = $registro4['titulo'];
                    $categoria4 = $registro4['categoria'];
                    $id4 = $registro4['id'];
                    $descricao4 =  $registro4['descricao'];
                    $abriu4 = $registro4['abriu'];
                    $fechou4 = $registro4['fechou'];
                    $prioridade4 = $registro4['prioridade'];
                    $situacao4 = 'fechado';
                   
                    $fechou42 = new DateTime($fechou4);  
                    
                    
                    $abriu42 = new DateTime($abriu4);  
                    
                    @$intervalo = ceil(($fechou42->getTimestamp() - $abriu42->getTimestamp())/60);

                    $list2 [$id4] = array(
                        'id' =>  $id4,'token' => $token4,'email'=> $email4,'titulo'=> $titulo4,'categoria'=> $categoria4,
                        'descricao'=> $descricao4,'abriu'=> $abriu4,'fechou'=> $fechou4, 'intervalo' => $intervalo, 
                        'prioridade' => $prioridade4,
                    );

                    echo"
                    <td><form action='consulta_chamado_fechado.php' method='post'><input type='hidden' name='id' value='$id4'> <input type='submit'  class='btn' value='$token4'></form></td>
                    <td>$email4</td>
                    <td>$titulo4</td>
                    <td>$categoria4</td>
                    <td>$situacao4</td>
                    <td>$prioridade4</td>
                    ";

                ?>
                </table>
                <?php
            }

            @$_SESSION['list'] = $list;
            @$_SESSION['list2'] = $list2;
        }
        ?>
                

        
         

       
    </div> <!--box-content w100-->
    <br><br><br><br><br><br><br><br><br>
    
    
   


</div><!--content-->



</body>
</html>