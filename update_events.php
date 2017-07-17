<?php
	include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Atualização da Agenda</title>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- Bootstrap -->
         <link rel="stylesheet" href="js/jquery-3.2.1.min.js">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="js/jquery-ui.min.css" rel="stylesheet">
        <link rel="icon" type="image/jpeg" href="img/favicon.ico" />
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <style type="text/css">
   
        button{
            margin:  ; margin-left: 0;background: pink;
            opacity: 0.8;
            filter: alpha(opacity=50); /* For IE8 and earlier */
        }
        button a{font-size: 1.2em}

    body {color: gray;
    background: url(img/bg.jpg) no-repeat center top fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
    a{color: blue; text-decoration: none}
    a:hover{color: ;text-decoration: none;}
    .botao{background: pink}
    
    </style>
    
</head>
<body>
	<?php 
		$id = $_GET['id'];
		$query = mysqli_query($conexao, "SELECT * FROM agenda WHERE id = $id");
		$row = mysqli_num_rows($query);

		if ($row > 0) {
			$linha = mysqli_fetch_array($query);
		}
	 ?>

	<h1 class="text-center">Atualização do Agendamento id-<b><?php echo $id; ?></b></h1>

	<form action="" method="post">
		<div class="container">
			<div class="row">

				<div class="col-md-offset-2 col-md-8">
				<?php  
					$data = date('Y-m-d', strtotime($linha['start']));
				?>
				  <div class="form-group">
				    <label for="nome">Nome:</label>
				    <input type="text" class="form-control text-uppercase" name="nome" id="nome" value="<?php echo $linha['title']; ?>" required="">
				  </div>
				  <div class="form-group col-md-6">
				    <label for="data">Data:</label>
				    <input type="date" name="data" value="<?php echo $data; ?>" class="form-control" id="date"  required="">
				  </div>
				  <div class="form-group col-md-6">
				    <label for="servico">Serviço:</label>
				    <select class="form-control text-uppercase" name="servico" id="servico" required="">
				    	<option value="">Selecione o Servico</option>
				    	<?php
               				$result = consulta_banco("SELECT serv_nome FROM servicos");
                  
                  			while ($row = mysqli_fetch_array($result)){?>
                    
              <option value=" <?php echo $row['serv_nome']; ?> "><?php echo $row['serv_nome']; ?></option>

                <?php  }?>
				    </select>
				  </div>
				  <div class="form-group col-md-6">
				    <label for="hora">Horário Início:</label>
				    <input type="time" class="form-control" name="hora" id="hora" required="">
				  </div>
				  <div class="form-group col-md-6">
				    <label for="duracao">Duracao:</label>
				    <select class="form-control" name="duracao" id="duracao" required="">
				    	<option value="1">1 hora</option>
				    	<option value="15">1 hora e meia</option>
				    	<option value="2">2 horas</option>
				    	<option value="25">2 hora e meia</option>
				    	<option value="3">3 hora</option>
				    	
				    </select>
				  </div>
				  
				  
				  
				  		<button type="submit" name="submit" class="btn btn-block">Salvar</button>
				  
			</form>

<?php 

if (isset($_POST['submit'])) {
	
	$nome    = $_POST['nome'] ;
	$data    = $_POST['data'];
	$servico = $_POST['servico'];
	$hora    = $_POST['hora'];
	$status  = "Agendado";
	$nome    = $nome . "  -  " . $servico;
	$start    = $data ." " . $hora;
	$duracao = $_POST['duracao'];

	switch ($duracao) {
		case '1':
			$d = $start;
			$d1 = strtotime($d);
			$d2 = strtotime('+60 minutes', $d1);
			$end = date('Y-m-d H-i-s', $d2);
			break;
		
		case '15':
			$d = $start;
			$d1 = strtotime($d);
			$d2 = strtotime('+90 minutes', $d1);
			$end = date('Y-m-d H-i-s', $d2);
			break;

		case '2':
			$d = $start;
			$d1 = strtotime($d);
			$d2 = strtotime('+120 minutes', $d1);
			$end = date('Y-m-d H-i-s', $d2);
			break;

		case '25':
			$d = $start;
			$d1 = strtotime($d);
			$d2 = strtotime('+150 minutes', $d1);
			$end = date('Y-m-d H-i-s', $d2);
			break;

		case '3':
			$d = $start;
			$d1 = strtotime($d);
			$d2 = strtotime('+180 minutes', $d1);
			$end = date('Y-m-d H-i-s', $d2);
			break;
	}
	


$sql  = "UPDATE agenda SET title = '$nome', start = '$start', end = '$end', servico = '$servico', status = '$status' ";
	mysqli_query ($conexao,$sql) or die("Erro");

	  echo "<script> alert('Registro Atualizado');</script>";
      echo "<SCRIPT> location.href='agenda.php' </SCRIPT>"; 
}else{
	echo "Erro ao Inserir...";
}


?>

			</div>
		</div>
	</div>
</body>
</html> 