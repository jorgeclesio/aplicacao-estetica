<?php 

include '../conexao.php';

$servico = $_GET['id'];
echo $servico;
$sql = mysqli_query($conexao, "DELETE FROM serv_comanda WHERE id = $servico ");


if ($sql) {
	echo "<script> alert('Registro excluido da Comanda!');</script>";
      echo "<SCRIPT> location.href='../comanda.php' </SCRIPT>"; 
}else{
	echo "erro ao excluir o registro"; 
}



 ?>