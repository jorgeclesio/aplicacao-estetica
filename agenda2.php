<?php
	include 'conexao.php';
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='css/fullcalendar.min.css' rel='stylesheet' />
<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="js/jquery-ui.min.css" rel="stylesheet">
<link href="css/jquery-ui.min.css" rel="stylesheet">

<link rel="icon" type="image/jpeg" href="img/favicon.ico" />


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src='lib/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>

<script>

	<script type='text/javascript'>

$(document).ready(function() {
    $('#calendar').fullCalendar({
        googleCalendarApiKey: '<YOUR API KEY>',
        events: {
            googleCalendarId: 'izamedeirosestetica@gmail.com'
        }
    });
});

</script>
</script>
<style>

	body {
		margin: 40px 10px;
		color:gray;
		background: #FFC0CB;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
		background:url(img/bg.jpg) no-repeat center top fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
	}

	button{
		background: #FFC0CB;
	}

	#calendar {
		
		margin: 20 auto;
	}
</style>
</head>
<body>
	
	
	<div class="container">

		<div class="row">
			<div class="col-md-offset-2 col-md-8">
	
		       <div class="text-center  col-md-6" >
		       <a href="index.php"><h1 style=""><img style="margin-top: -40px;margin-bottom: 20px" src="img/logo.png" width="200px" align="left" alt=""></h1></a>
		       </div>

		       <div class="text-right col-md-6">
					<button style="background: pink;color: #fff;border:0"  type="button" class="btn" data-toggle="modal" data-target="#form-agenda">	Fazer um Agendamento
					</button>
				</div><br><br>
				
			</div><br>


	       <div><br><br></div>
	       <p id="idDoEvento"></p>
	    </div>
		


	<!-- #############CALENDARIO############# -->
		<div class="row">
			<div class="col-md-12">
				<div style="text-align: center" id='calendar'></div>
			</div>
		</div>
	</div>
	
<!-- #############CADASTRO DE AGENDAMENTOS############# -->
<div id="form-agenda" class="modal fade"  role="dialog">
  <div class="modal-dialog">
    <div  style="background: #FFEFD5"  class="modal-content">
      <div class="modal-header" style="background: pink; color: #fff">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><h1 align="center">Agendamento</h1></h4>
      </div>
      <div  class="modal-body">
	        <form action="agendar.php" method="post">
				  <div class="form-group">
				    <label for="nome">Nome:</label>
				    <input type="text" class="form-control text-uppercase" name="nome" id="nome" required="">
				  </div>
				  <div class="form-group col-md-6">
				    <label for="data">Data:</label>
				    <input type="date" name="data" class="form-control" id="date" required="">
				  </div>
				  <div class="form-group col-md-6">
				    <label for="servico">Serviço:</label>
				    <select class="form-control text-uppercase" name="servico" id="servico" required="">
				    	<option value="">Selecione o Servico</option>
				    	<?php
               				$result = consulta_banco("SELECT serv_nome FROM servicos");
                  
                  			while ($row = mysqli_fetch_array($result)){?>
                    
              <option value=" <?php echo $row['serv_nome']; ?> "><?php 
             
              	 echo  $row['serv_nome']; ?></option>

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
				    	<option value="3">3 horas</option>
				    	
				    </select>
				  </div>
				  
				  
				  
				  		<button type="submit" name="submit" style="background: pink;color: #fff" class="btn btn-block">Salvar</button>
				  
			</form>
			<div class="modal-footer">
			      <p class="text-center" style="color: gray">Izabelita Medeiros Estética</p>
	        </div>
      </div> 
	</div>
  </div>
</div>

</div>
</body>
</html>
