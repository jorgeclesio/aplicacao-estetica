 
<?php
include 'conexao.php';

if (isset($_POST['submit'])) {
	
	$nome    = $_POST['nome'] ;
	$data    = $_POST['data'];
	$servico = $_POST['servico'];
	$hora    = $_POST['hora'];
	$status  = "Agendado";
	$nome    = $nome . "  -  " . $servico;
	$start    = $data ." " . $hora;
	$duracao = $_POST['duracao'];

	switch ($duracao) {
		case '1':
			$d = $start;
			$d1 = strtotime($d);
			$d2 = strtotime('+60 minutes', $d1);
			$end = date('Y-m-d H-i-s', $d2);
			break;
		
		case '15':
			$d = $start;
			$d1 = strtotime($d);
			$d2 = strtotime('+90 minutes', $d1);
			$end = date('Y-m-d H-i-s', $d2);
			break;

		case '2':
			$d = $start;
			$d1 = strtotime($d);
			$d2 = strtotime('+120 minutes', $d1);
			$end = date('Y-m-d H-i-s', $d2);
			break;

		case '25':
			$d = $start;
			$d1 = strtotime($d);
			$d2 = strtotime('+150 minutes', $d1);
			$end = date('Y-m-d H-i-s', $d2);
			break;

		case '3':
			$d = $start;
			$d1 = strtotime($d);
			$d2 = strtotime('+180 minutes', $d1);
			$end = date('Y-m-d H-i-s', $d2);
			break;
	}
	


$sql  = "INSERT INTO agenda (title,start,end,servico,status) values ('$nome','$start','$end','$servico','$status')";
	mysqli_query ($conexao,$sql) or die("Erro");

	  echo "<script> alert('Cadastro realizado');</script>";
      echo "<SCRIPT> location.href='agenda.php' </SCRIPT>"; 
}else{
	echo "Erro ao Inserir...";
}


?>