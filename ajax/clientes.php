<?php 

	include '../conexao.php';

	$cliente = $_GET['q'];

	$sql = "SELECT * FROM clientes WHERE cli_nome like '%$cliente%' ";
	$query = mysqli_query($conexao, $sql);

	$dados = array();

	while ($row = mysqli_fetch_assoc($query)) {
		$dados[] = strtoupper($row['cli_nome']);
	}


	echo json_encode($dados);

 ?>