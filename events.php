<?php

include 'conexao.php';
// liste des événements

 $json = array();
 
 
	
 // Consulta ao banco de dados
$sql = "SELECT * FROM agenda ORDER BY id";
$query = mysqli_query($conexao,$sql) or die(mysql_error());
 
while ($row = mysqli_fetch_array ($query)) {
 	
 	$vetor[] = array_map('utf8_encode', $row);
 
 } 
	
echo json_encode($vetor);

 
?>