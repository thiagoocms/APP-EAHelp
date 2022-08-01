<?php
include('menu.php');
include('conexao.php');

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
<?php
    $dados = filter_input_array(INPUT_POST,);
    @$inicio = $dados['inicio'];
    @$fim = $dados['fim'];
    @$_SESSION['inicio'] = $inicio;
    @$_SESSION['fim'] = $fim
    
?>

    <div class="content ">
        <div class="box-content w50 center">
            <form action="" method="post">
            
            <h6 class='card-subtitle mb-1 text-muted'> entre quanto tempo?</h6>
            inicio: <input type="date" name="inicio" id=""> fim: <input type="date" name="fim" id="">
            <hr>
            <input  class='btn bg-info'type="submit" value="Pesquisar" name="pesq">

            </form>
        </div>

        <?php
            
            if(!empty($dados['pesq'])){
                
                echo "<div class='box-content w100'>";
                ?>
                <!-- Download Excel -->
                <div style="position: absolute; top: 10px; left: 10px;">
                        
                        <a href="excel_lista.php"><img src="Excel.png" style="cursor: pointer" title="Download" width="40" height="40"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <!-- Fim do Download Excel -->
                <?php
                
            
                $query = "SELECT * FROM chamados_fechados WHERE abriu BETWEEN '{$inicio}' AND '{$fim}'";
                $result = mysqli_query($conexao, $query);
                $row = mysqli_num_rows($result);
            
            

                echo "
                <h6 class='card-subtitle mb-1 text-muted'>$row registros encontrados</h6>
                
                <table class='i'>
                
                <tr>

                    
                    <th>Token</th>
                    <th>E-mail</th>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Data de abertura</th>
                    <th>resolvido em</th>
                    

                </tr>
                    
                
                ";
                $cont = 0;  
                $cont1 = 0; 
                while($registro = mysqli_fetch_array($result)){

                    @$titulo = $registro['titulo'];
                    @$categoria = $registro['categoria'];
                    @$descricao = $registro['descricao'];
                    @$token = $registro['token'];
                    @$email1 = $registro['email'];
                    @$id = $registro['id'];
                    @$fechou = $registro['fechou'];
                    $fechou3 = new DateTime($fechou);  
                    
                    @$abriu = $registro['abriu'];
                    $abriu3 = new DateTime($abriu);  
                    
                    @$intervalo = ceil(($fechou3->getTimestamp() - $abriu3->getTimestamp())/60);
                    @$intervalo2 = ((($fechou3->getTimestamp() - $abriu3->getTimestamp())/60)/60);
                    @$intervalo3 = (((($fechou3->getTimestamp() - $abriu3->getTimestamp())/60)/60)/24);

                    
                    if($intervalo3 >= 7)  {
                        $intervalo = $intervalo - 2880 ;
                    }else if($intervalo3 >= 14)  {
                        $intervalo = $intervalo - 5760;
                    }else if($intervalo3 >= 21)  {
                        $intervalo = $intervalo - 8640;
                    }else if($intervalo3 >= 30)  {
                        $intervalo = $intervalo - 11520;
                    }
                    if($intervalo2 >= 8 ) {
                        $intervalo = 480;
                    }
                    $cont = $cont + $intervalo;
                    $cont1 = $cont1 + $intervalo3;
                    $Object = new DateTime($abriu);  
                    $abriu2 = $Object->format("d-m-Y ");
                    $list2 [$id] = array(
                        'id' =>  $id,'token' => $token,'email'=> $email1,'titulo'=> $titulo,'categoria'=> $categoria,
                        'descricao'=> $descricao,'abriu'=> $abriu,'fechou'=> $fechou,'intervalo'=> $intervalo,
                    );
                    

                    echo"  <tr>

                        
                    <td><form action='consulta_chamado_fechado.php' method='post'><input type='hidden' name='id' value='$id'> <input type='submit'  class='btn' value='$token'></form></td>
                    <td>$email1</td>
                    <td>$titulo</td>
                    <td>$categoria</td>
                    <td>$abriu2</td>
                    <td>$intervalo minutos</td>
                

                    </tr>
                    
                    
                    
                    ";}
                    
                    $tma = ceil($cont / $row);
                echo "</table>
                    <h6 class='card-subtitle mb-1 text-muted'>O tempo medio de atendimento é de $tma minutos por chamado</h6>
                    </div>";
                @$_SESSION['list2'] = $list2;

            };
            
            

        ?>
        <br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
    </div><!--content-->
    




</body>
</html>