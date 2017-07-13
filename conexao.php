
<?php
			##############CONFIGURAÇÃO DE CONEXÃO##############

//CONSTANTES QUE DEFINEM A CONEXAO LOCAL
if($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1'){
	define('DB_HOST' , 'localhost', true);
	define('DB_USER' , 'root',true);
	define('DB_PASS' , '',true);
	define('DB_BASE' , 'estetica',true);
}
//CONSTANTES QUE DEFINEM A CONEXAO NA WEB
elseif($_SERVER['SERVER_NAME'] == 'servidornet' || $_SERVER['SERVER_NAME'] == 'nomesite'){
	define('DB_HOST' , 'nomedosite',true);
	define('DB_USER' , 'nomeusuario',true);
	define('DB_PASS' , 'senha',true);
	define('DB_BASE' , 'nomedobanco',true);
}

//TESTA A CONEXAO COM O MYSQL E COM O BANCO DE DADOS
$conexao = mysqli_connect(DB_HOST,DB_USER,DB_PASS) or die("erro de conexao");
mysqli_select_db($conexao,DB_BASE) or die("nao conectou com o banco");

//FUNCAO PARA FACILITAR CRUD COM O BANCO DE DADOS
function consulta_banco($query){
    global $conexao; //pegando a variável que está em escopo global.
    $resultado = mysqli_query($conexao,$query);
    return $resultado;
    
}
//CONFIGURACOES GERAIS
date_default_timezone_set('America/Belem');

//Viriáveis globais
$hora_servidor = date("H:i");
$data_servidor = date("d/m/Y");
?>




