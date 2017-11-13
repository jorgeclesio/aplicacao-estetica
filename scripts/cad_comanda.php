<?php
include '../conexao.php';

	if (isset($_POST['submit'])) {

		$id_comanda   = $_POST['id_comanda'];
		$cli_nome     = $_POST['nome'];
		$data         = date("Y-m-d", strtotime($_POST['data']));
		$servico      = $_POST['servico'];
		$colaborador  = $_POST['colaboradores'];
		


		$cliente = mysqli_query($conexao, "select * from clientes where cli_nome = '$cli_nome' ");
		$linha = mysqli_fetch_assoc($cliente);

		$id_cliente = $linha['idclientes'];

	


	//INSERÇÃO NA TABELA COMANDA
		$cad_comanda = mysqli_query($conexao, "INSERT INTO comanda (id_cliente,id_colaborador,data) 
	              VALUES ('$id_cliente','$colaborador','$data') " );
		

	    if (!$cad_comanda) {
	    	echo "erro ao cadastrar comanda";
	    }


	
	//INSERÇÃO NA TABELA SERV_COMANDA

		$servico = mysqli_query($conexao, "INSERT INTO serv_comanda (id_com,id_servico) VALUES ('$id_comanda','$servico')");

	    if (!$servico) {
	    	echo "erro ao cadastrar no serv_comanda";
	    }


	
 
	 echo "<script> alert('Cadastro realizado');</script>";
     echo "<SCRIPT> location.href='../comanda.php' </SCRIPT>"; 

	
}else{
	echo "erro ao inserir";
}

?>