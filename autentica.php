<?php
	session_start();
	include 'conexao.php';



		if ($_POST['logar']) {
			
		

			$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']); 
			$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
					
		
		$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' && senha = '$senha' LIMIT 1";
		$query = mysqli_query($conexao, $sql);
		$resultado = mysqli_fetch_assoc($query);
		
	
		if(isset($resultado)){
			
			$_SESSION['usuarioNome'] = $resultado['usuario'];
			$_SESSION['status'] = "logado";
			header("Location: index.php");
			

		}else{	
			$_SESSION['loginErro'] = "Usuário ou senha Inválido";
			$_SESSION['logar'] = "Voce precisa estar logado!";
			header("Location: login.php");
		}
	}
	
?>