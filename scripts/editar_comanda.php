<?php 

include '../conexao.php';

$acao=$_GET['acao'];


if ($acao == "apagar" ) {
		
		$servico = $_GET['id'];
		$item_comanda = mysqli_query($conexao, "DELETE FROM serv_comanda WHERE id = $servico ");

		if ($item_comanda) {
				echo "<script> alert('Registro excluido da Comanda!');</script>";
		      	echo "<SCRIPT> location.href='../comanda.php' </SCRIPT>"; 
		}else{
			echo "erro ao excluir o registro"; 
		}

}else{
	echo "erro ao excluir o registro";
}









if ($acao == "editar") {
	echo "vamos editar a comanda";
}

 

 ?>