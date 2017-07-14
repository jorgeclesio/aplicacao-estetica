<?php
include '../conexao.php';

	if (isset($_POST['submit'])) {

		$id_comanda   = $_POST['id_comanda'];
		$cli_nome     = $_POST['nome'];
		$data         = date("Y-m-d", strtotime($_POST['data']));
		$servico      = $_POST['servico'];
		$qtd_servico  = $_POST['qtd_servico'];
		$colaborador  = $_POST['colaboradores'];
		$produto      = $_POST['produto'];
		$qtd_produto  = $_POST['qtd_produto'];
		

		//CALCULANDO E INSERINDO O TOTAL DA COMANDA
		$serv_preco = "SELECT serv_valor from servicos where id = $servico" ;
			$exec = mysqli_query($conexao, $serv_preco);
				$pre_serv = mysqli_fetch_array($exec);
					$preco_servico = $pre_serv['serv_valor'] * $qtd_servico;
		
		if (!empty($produto)&&!empty(qtd_produto)) {
			
			$prod_preco = "SELECT prod_preco_venda from produtos where id = $produto" ;
			$exec2 = mysqli_query($conexao, $prod_preco);
				$pre_prod = mysqli_fetch_array($exec2);
					$preco_produto = $pre_prod['prod_preco_venda'] * $qtd_produto;
		}else{
			$preco_produto = 0;
		}
		

		$total = $preco_servico + $preco_produto;

	//INSERÇÃO NA TABELA COMANDA
	$sql_comanda = mysqli_query($conexao, "INSERT INTO comanda (id_cliente, id_colaborador, total, data) 
	              VALUES ('$cli_nome','$colaborador','$total','$data')");
	
	//INSERÇÃO NA TABELA SERV_COMANDA
	$sql_servcomanda = mysqli_query($conexao, "INSERT INTO serv_comanda (quantidade, id_comanda, id_servico)  VALUES ('$qtd_servico','$id_comanda','$servico')"); 
	
	//INSERÇÃO NA TABELA PROD_COMANDA
	$sql_prodcomanda = mysqli_query($conexao, "INSERT INTO prod_comanda
 				(quantidade, id_comanda, id_produto)  VALUES ('$qtd_produto','$id_comanda','$produto')"); 
	
 
	  echo "<script> alert('Cadastro realizado');</script>";
      echo "<SCRIPT> location.href='../comanda.php' </SCRIPT>"; 

	
}else{
	echo "erro ao inserir";
}

?>