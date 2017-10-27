<?php
include '../conexao.php';

	if (isset($_POST['submit'])) {

		$id_comanda   = $_POST['id_comanda'];
		$cli_nome     = $_POST['nome'];
		$data         = date("Y-m-d", strtotime($_POST['data']));
		$servico      = $_POST['servico'];
		$colaborador  = $_POST['colaboradores'];
		
	
	//INSERÇÃO NA TABELA COMANDA

		$cad_comanda = "INSERT INTO comanda (id_cliente, id_colaborador, data) 
	              VALUES ('$cli_nome','$colaborador','$data')";
	    $exec_cad_comanda = mysqli_query($conexao, $cad_comanda);

	    if (!$exec_cad_comanda) {
	    	echo "erro ao cadastrar comanda";
	    }


	
	//INSERÇÃO NA TABELA SERV_COMANDA

	    $cad_servcomanda = "INSERT INTO serv_comanda (id_com, id_servico)  VALUES ('$id_comanda','$servico')";
	    $exec_cad_servcomanda = mysqli_query($conexao, $cad_servcomanda);

	    if (!$exec_cad_servcomanda) {
	    	echo "erro ao cadastrar no serv_comanda";
	    }


	
 
	  echo "<script> alert('Cadastro realizado');</script>";
      echo "<SCRIPT> location.href='../comanda.php' </SCRIPT>"; 

	
}else{
	echo "erro ao inserir";
}

?>