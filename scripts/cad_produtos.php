<?php
include '../conexao.php';
?>



<?php
if ($_POST["salvar"]) {

		$nome         = $_POST['nome'];
		$descricao    = $_POST['descricao'];
		$preco_custo  = $_POST['p_custo'];
		$preco_venda  = $_POST['p_venda'];
		$estoque      = $_POST['estoque'];
	

	consulta_banco("INSERT INTO servicos (prod_nome,prod_descricao,prod_preco_custo,prod_preco_custo) 
		VALUES ('$nome','$descricao','$preco_custo','$preco_venda','$estoque')") or die("erro ao inserir");

	  echo "<script> alert('Cadastro realizado');</script>";
      echo "<SCRIPT> location.href='../index.php' </SCRIPT>"; 

}else{
	echo "erro ao cadastrar";
}
?>