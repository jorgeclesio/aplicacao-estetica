
<?php

	$host = "localhost";
	$user = "root";
	$pass = "";
	$banco = "estetica";

	//$host = "mysql.hostinger.com.br";
	//$user = "u728216278_rob";
	//$pass = "controle";
	//$banco = "u728216278_bela";

	$conexao = mysqli_connect($host, $user, $pass, $banco) or die(mysql_error());
	
	


date_default_timezone_set('America/Belem');

$hora_servidor = date("H:i");
$data_servidor = date("d/m/Y");
?>




