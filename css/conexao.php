
<?php

	$host = "mysql.hostinger.com.br";
	$user = "u509905743_dmtt";
	$pass = "Controle1";
	$banco = "u509905743_motos";

	$conexao = mysqli_connect($host, $user, $pass, $banco) or die(mysql_error());
	
	


date_default_timezone_set('America/Belem');

$hora_servidor = date("H:i");
$data_servidor = date("d/m/Y");
?>




