<?php
	
	$id      = $_GET['id'];
	$nome    = $_GET['nome'] ;
	$servico = $_GET['servico'];
	$data    = $_GET['data'];
	$hora    = $_GET['hora'];
	$status  = "agendado";
	$start    = $data ." " . $hora;

	$duracao = $_GET['duracao'];

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



$sql  = "UPDATE agenda SET title = $nome, start=$start, end=$end, servico=$servico,status='Agendado' WHERE id = $id";
	mysqli_query($conexao,$sql) or die("Erro");

	  echo "<script> alert('Agendamento Atualizado');</script>";
      echo "<SCRIPT> location.href='agenda.php' </SCRIPT>"; 



?>