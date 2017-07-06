<?php
include '../conexao.php';

if ($_POST['submit']) {
	

		$cli_nome     = $_POST['nome'];
		$data         = $_POST['nome'];
		$id_servico   = $_POST['servico'];
		$qtd_servico  = $_POST['qtd_servico'];
		$id_servico   = $_POST['produto'];
		$qtd_produto  = $_POST['qtd_produto'];


	echo $cli_nome;
	  //echo "<script> alert('Cadastro realizado');</script>";
      //echo "<SCRIPT> location.href='../index.php' </SCRIPT>"; 
}else{
	echo "erro ao inserir";
}

?>