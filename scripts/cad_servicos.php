<?php
include '../conexao.php';
?>



<?php
if ($_POST["salvar"]) {

		$nome          = $_POST['nome'];
		$preco         = $_POST['preco'];
		$comissao      = $_POST['comissao'];
		$profissional  = $_POST['profissional'];

	consulta_banco("INSERT INTO servicos (serv_nome,serv_valor,serv_comissao,serv_profissional) 
		VALUES ('$nome','$preco','$comissao','$profissional')") or die("erro ao inserir");

	  echo "<script> alert('Cadastro realizado');</script>";
      echo "<SCRIPT> location.href='../index.php' </SCRIPT>"; 

}else{
	echo "erro";
}
?>