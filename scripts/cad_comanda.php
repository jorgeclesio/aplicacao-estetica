<?php
include '../conexao.php';
	if (isset($_POST['submit'])) {
		$id_comanda	= $_POST['id_comanda'];
		$cli_nome	= $_POST['nome'];
		$data		= $_POST['data'];
		$servico	= $_POST['servico'];
		$qtd_servico	= $_POST['qtd_servico'];
		$colaborador	= $_POST['colaboradores'];
		$produto	= $_POST['produto'];
		$qtd_produto	= $_POST['qtd_produto'];

$sql_comanda = "INSERT INTO comanda (id_cliente, id_colaborador, data)  VALUES ('$cli_nome','$colaborador','$data')";
$query = mysqli_query($conexao, $sql_comanda);

$sql_servcomanda = "INSERT INTO serv_comanda (id_cliente, id_colaborador, data) VALUES ('$cli_nome','$colaborador','$data')";
$query = mysqli_query($conexao, $sql_comanda);

	echo $cli_nome .'id do nome <br>'.
	$id_comanda .'id da comanda <br>'.
	 $data .'<br>'.
	  $servico .'id do servico <br>'.
	   $colaborador .'id do colaborador <br>'.
	    $qtd_servico .'qtd servico <br>'. 
	    $produto .'id do produto <br>'.
	     $qtd_produto.'qtd do produto <br>';
	  //echo "<script> alert('Cadastro realizado');</script>";
      //echo "<SCRIPT> location.href='../index.php' </SCRIPT>"; 
	//echo "erro ao inserir";
}

?>
