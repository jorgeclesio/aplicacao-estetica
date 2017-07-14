<?php
include '../conexao.php';

	if (isset($_POST['submit'])) {

		$id_comanda   = $_POST['id_comanda'];
		$cli_nome     = $_POST['nome'];
		$data         = $_POST['data'];
		$servico      = $_POST['servico'];
		$qtd_servico  = $_POST['qtd_servico'];
		$colaborador  = $_POST['colaboradores'];
		$produto      = $_POST['produto'];
		$qtd_produto  = $_POST['qtd_produto'];

	$sql_comanda = mysqli_query($conexao, "INSERT INTO comanda (id_cliente, id_colaborador, data) 
	              VALUES ('$cli_nome','$colaborador','$data')");

	$sql_servcomanda = mysqli_query($conexao, "INSERT INTO serv_comanda (quantidade, id_comanda, id_servico)  VALUES ('$qtd_servico','$id_comanda','$servico')"); 
	
	$sql_prodcomanda = mysqli_query($conexao, "INSERT INTO prod_comanda
 				(quantidade, id_comanda, id_produto)  VALUES ('$qtd_produto','$id_comanda','$produto')"); 
	

	  echo "<script> alert('Cadastro realizado');</script>";
      echo "<SCRIPT> location.href='../comanda.php' </SCRIPT>"; 

	
}else{
	echo "erro ao inserir";
}

?>