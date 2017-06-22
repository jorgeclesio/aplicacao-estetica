<?php 
session_start();
 require_once 'conexao.php';
 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>DMTT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="js/jquery-ui.min.css" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
</head>


<body style="background: #FFC0CB;margin: 0">
<div class="container">
	<div class="row">
		<div class="text-center" style=" height: 150px"><br><br>
			<img class="text-center" src="img/logo.png" height="100px" align="center" alt="">
		</div>
	</div>

	<br><br>

	<form action="autentica.php" method="post">
			<div class="text-center log_label">
				<label style="" for="usuario">Usuário:</label>
			</div>
			
			<div class="text-center">
				<input id="usuario" name="usuario">
			</div><br>
			
			<div class="text-center log_label">
				<label for="senha">Senha:</label>
			</div>
			
			<div class="text-center">
				<input id="senha"  type="password" name="senha">
			</div><br>

			<div style="height: 60px;line-height: 60px;font-size: 3em" class="text-center">
				<input height="40px" id="btn-submit" style="width: 60%;" class="btn" type="submit" value="Entrar" name="logar">
			
			</div>
	</form>

		<p class="text-center text-danger">
			<?php if(isset($_SESSION['loginErro'])){
				echo $_SESSION['loginErro'];
				unset($_SESSION['loginErro']);
			}?>
		</p>
	</div>
</body>
</html>