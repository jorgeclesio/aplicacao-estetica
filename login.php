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
    <link href="css/login.css" rel="stylesheet">
    <link href="js/jquery-ui.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpeg" href="img/favicon.ico" />
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
	<div class="col-md-offset-3 col-md-6">

	<form action="autentica.php" method="post">
			<div class=" log_label">
				<label style="padding-left:5% " for="usuario">Usuário:</label>
			</div>
			
			<div style="height: 30px;line-height: 30px;font-size: 2em" class="text-center">
				<input class="text-center btn-block" style="letter-spacing:10px;color: pink" id="usuario" name="usuario">
			</div><br>
			
			<div class=" log_label">
				<label style="padding-left:5% " for="senha">Senha:</label>
			</div>
			
			<div style="height: 30px;line-height: 30px;font-size: 2em"  class="">
				<input style="height:40px;color: pink"   class="text-center btn-block" style="letter-spacing:10px" id="senha"  type="password" name="senha">
			</div><br>

			<div style="height: 30px;line-height: 30px;font-size: 2em" class="text-center">
				<input style="font-size: 20px"  height="40px" id="btn-submit"  class="btn btn-block" type="submit" value="Entrar" name="logar">
			
			</div>
	</form>
	</div>

		<p class="text-center text-danger">
			<?php if(isset($_SESSION['loginErro'])){
				echo $_SESSION['loginErro'];
				unset($_SESSION['loginErro']);
			}?>
		</p>
	</div>
</body>
</html>