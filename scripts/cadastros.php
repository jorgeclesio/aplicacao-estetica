<?php

include '../conexao.php';

/////////////CADASTRO DE CLIENTES////////////////////////////////
if (isset($_POST['cad_cliente'])) {

	$nome        = mysqli_real_escape_string($conexao, strtoupper($_POST['nome']));
	$telefone    = mysqli_real_escape_string($conexao, $_POST['telefone']);
	$cpf         = mysqli_real_escape_string($conexao, $_POST['cpf']);
	$aniversario = mysqli_real_escape_string($conexao, $_POST['aniversario']);
	$email       = mysqli_real_escape_string($conexao, $_POST['email']); 
	$sexo        = mysqli_real_escape_string($conexao, $_POST['sexo']);
	$endereco    = mysqli_real_escape_string($conexao, $_POST['endereco']);
	$bairro      = mysqli_real_escape_string($conexao, $_POST['bairro']);
	$cidade      = mysqli_real_escape_string($conexao, $_POST['cidade']);
	$estado      = mysqli_real_escape_string($conexao, $_POST['estado']);

$cadastro = consulta_banco("INSERT INTO clientes (cli_nome,cli_telefone,cli_cpf,cli_aniversario,cli_email,cli_sexo,cli_endereco,cli_bairro,cli_cidade,cli_estado) 
		VALUES ('$nome','$telefone','$cpf','$aniversario','$email','$sexo','$endereco','$bairro','$cidade','$estado')") or die("erro ao inserir");

		if (!$cadastro) {
			echo "erro";
		}	

	  echo "<script> alert('Cadastro realizado');</script>";
      echo "<SCRIPT> location.href='../index.php' </SCRIPT>"; 
}


/////////////CADASTRO DE PRODUTOS////////////////////////////////

if (isset($_POST["cad_produto"])) {

		$nome         = mysqli_real_escape_string($conexao, $_POST['nome']);
		$descricao    = mysqli_real_escape_string($conexao, $_POST['descricao']);
		$preco_custo  = mysqli_real_escape_string($conexao, $_POST['p_custo']);
		$preco_venda  = mysqli_real_escape_string($conexao, $_POST['p_venda']);
		$estoque      = mysqli_real_escape_string($conexao, $_POST['estoque']);
	

	

$cadastro = consulta_banco("INSERT INTO produtos (prod_nome, prod_descricao, prod_preco_custo, prod_preco_venda, prod_estoque) 
		VALUES ('$nome', '$descricao', '$preco_custo', '$preco_venda', '$estoque')") or die("erro ao inserir");

	  echo "<script> alert('Cadastro realizado');</script>";
      echo "<SCRIPT> location.href='../index.php' </SCRIPT>"; 

if (!$cadastro) {
	echo "erro";
}


}

/////////////CADASTRO DE SERVIÇOS////////////////////////////////

if (isset($_POST["cad_servico"])) {

		$nome          = mysqli_real_escape_string($conexao, $_POST['nome']);
		$preco         = mysqli_real_escape_string($conexao, $_POST['preco']);
		$comissao      = mysqli_real_escape_string($conexao, $_POST['comissao']);
		$profissional  = mysqli_real_escape_string($conexao, $_POST['profissional']);

$cadastro = consulta_banco("INSERT INTO servicos (serv_nome,serv_valor,serv_comissao,serv_profissional) 
		VALUES ('$nome','$preco','$comissao','$profissional')") or die("erro ao inserir");

	if (!$cadastro) {
	echo "erro";
}


	  echo "<script> alert('Cadastro realizado');</script>";
      echo "<SCRIPT> location.href='../index.php' </SCRIPT>"; 

}


/////////////CADASTRO DE COLABORADORES////////////////////////////////

if (isset($_POST['cad_colaborador'])) {
	

$nome        = mysqli_real_escape_string($conexao, $_POST['nome']);
$telefone    = mysqli_real_escape_string($conexao, $_POST['telefone']);
$cpf         = mysqli_real_escape_string($conexao, $_POST['cpf']);
$aniversario = mysqli_real_escape_string($conexao, $_POST['aniversario']);
$email       = mysqli_real_escape_string($conexao, $_POST['email']); 
$sexo        = mysqli_real_escape_string($conexao, $_POST['sexo']);
$endereco    = mysqli_real_escape_string($conexao, $_POST['endereco']);
$bairro      = mysqli_real_escape_string($conexao, $_POST['bairro']);
$cidade      = mysqli_real_escape_string($conexao, $_POST['cidade']);
$estado      = mysqli_real_escape_string($conexao, $_POST['estado']);

$cadastro = consulta_banco("INSERT INTO colaboradores (col_nome,col_telefone,col_cpf,col_aniversario,col_email,col_sexo,col_endereco,col_bairro,col_cidade,col_estado) 
		VALUES ('$nome','$telefone','$cpf','$aniversario','$email','$sexo','$endereco','$bairro','$cidade','$estado')") or die("erro ao inserir");

if (!$cadastro) {
	echo "erro";
}

	  echo "<script> alert('Cadastro realizado');</script>";
      echo "<SCRIPT> location.href='../index.php' </SCRIPT>"; 
}



?>