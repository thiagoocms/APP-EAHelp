 <?php
	session_start();
	include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Contato</title>
		<link rel="stylesheet" href="index_2.css">
	<head>
	<body>
		<?php
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'relatorio.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		

		$inicio = $_SESSION['inicio'];
		$fim = $_SESSION['fim'];
		
		
		
		
		//Selecionar todos os itens da tabela 
		$query = "SELECT * FROM chamados_fechados WHERE abriu BETWEEN '{$inicio}' AND '{$fim}'";
		$result = mysqli_query($conexao, $query);
		$row = mysqli_num_rows($result);

		$html .="<h6 class='card-subtitle mb-1 text-muted'>$row registros encontrados</h6>";

		$html .= '<table class="i">';

		$html .= '<tr>';

		$html .= '<td>Token</td>';
		$html .= '<td>E-mail></td>';
		$html .= '<td>Titulo</td>';
		$html .= '<td>Categoria</td>';
		$html .= '<td>Data de abertura</td>';
		$html .= '<td>Resolvido em</td>';
		
		$html .= '</tr>';
            
		$cont = 0;
		while($registro = mysqli_fetch_array($result)){

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
			if($intervalo2 >= 8 )  {
				$intervalo = 480;
			}
			$cont = $cont + $intervalo;
			$Object = new DateTime($abriu);  
            $abriu2 = $Object->format("d-m-Y ");
			$html .= '<tr>';
			$html .= '<td>'.$registro['token'].'</td>';
			$html .= '<td>'.$registro['email'].'</td>';
			$html .= '<td>'.$registro['titulo'].'</td>';
			$html .= '<td>'.$registro['categoria'].'</td>';
			$html .= '<td>'.$abriu2.'</td>';
			$html .= '<td>'.$intervalo.' minutos</td>';
			
			$html .= '</tr>';
			
		}
		$tma = ceil($cont / $row);
		$html .= '</table>';
		$html .="<h6 class='card-subtitle mb-1 text-muted'>O tempo medio de atendimento é de $tma minutos por chamado</h6>";
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html>