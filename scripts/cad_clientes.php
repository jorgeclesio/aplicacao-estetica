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

consulta_banco("INSERT INTO clientes (cli_nome,cli_telefone,cli_cpf,cli_aniversario,cli_email,cli_sexo,cli_endereco,cli_bairro,cli_cidade,cli_estado) 
		VALUES ('$nome','$telefone','$cpf','$aniversario','$email','$sexo','$endereco','$bairro','$cidade','$estado')") or die("erro ao inserir");

	

	  echo "<script> alert('Cadastro realizado');</script>";
      echo "<SCRIPT> location.href='../index.php' </SCRIPT>"; 
}

?>