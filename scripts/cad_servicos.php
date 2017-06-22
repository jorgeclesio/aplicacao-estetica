<?php
include '../conexao.php';
?>



<?php
if ($_POST["salvar"]) {
	

		$nome          = $_POST['nome'];
		$preco         = $_POST['preco'];
		$comissao      = $_POST['comissao'];
		$profissional  = $_POST['profissional'];

	$sql = "INSERT INTO servicos (nome,preco_unit,comissao,profissional) 
			VALUES ('$nome','$preco','$comissao','$profissional')";
	mysqli_query ($conexao,$sql) or die("Erro");

	  echo "<script> alert('Cadastro realizado');</script>";
      echo "<SCRIPT> location.href='../index.php' </SCRIPT>"; 

}else{
	echo "erro";
}
?>