<?php
include '../conexao.php';

if ($_POST['submit']) {
	

$nome        = $_POST['nome'];
$telefone    = $_POST['telefone'];
$cpf         = $_POST['cpf'];
$aniversario = $_POST['aniversario'];
$email       = $_POST['email'];
$sexo        = $_POST['sexo'];
$endereco    = $_POST['endereco'];
$bairro      = $_POST['bairro'];
$cidade      = $_POST['cidade'];
$estado      = $_POST['estado'];

	$sql = "INSERT INTO clientes (nome,telefone,cpf,aniversario,email,sexo,endereco,bairro,cidade,estado) VALUES ('$nome','$telefone','$cpf','$aniversario','$email','$sexo','$endereco','$bairro','$cidade','$estado')";
	mysqli_query ($conexao,$sql) or die("Erro");

	  echo "<script> alert('Cadastro realizado');</script>";
      echo "<SCRIPT> location.href='../index.php' </SCRIPT>"; 
}

?>