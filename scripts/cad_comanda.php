<?php
include '../conexao.php';

if ($_POST['submit']) {
	
$num_comanda  = $_POST['num_comanda'];
$nome         = $_POST['nome'];
$servico      = $_POST['servico'];
$data        = date('Y-m-d');
$colaborador  = $_POST['colaborador'];


	$sql = "INSERT INTO comanda (num_comanda,id_cliente,id_servico,id_colaborador,data) 
		VALUES ('$num_comanda','$nome','$servico','$colaborador','$data')";
	$query = mysqli_query ($conexao, $sql) or die(mysql_error());

	  echo "<script> alert('Cadastro realizado');</script>";
      echo "<SCRIPT> location.href='../index.php' </SCRIPT>"; 
}else{
	echo "erro ao inserir";
}

?>