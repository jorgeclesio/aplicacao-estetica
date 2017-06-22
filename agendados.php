<?php
	include 'conexao.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='css/fullcalendar.min.css' rel='stylesheet' />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="js/jquery-ui.min.css" rel="stylesheet">
<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {

 var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			

			
			events: function(start, end, timezone, callback) {
		        $.ajax({
		            url: 'events.php',
		            dataType: 'json',
		            data: {
		                // our hypothetical feed requires UNIX timestamps
		                start: start.unix(),
		                end: end.unix()
		            },
		            success: function(doc) {
		                var events = [];
		                $(doc).find('event').each(function() {
		                    events.push({
		                        title: $(this).attr('title'),
		                        start: $(this).attr('start') // will be parsed
		                    });
		                });
		                callback(events);
		            }
		        });
    },
			
    		slotLabelFormat:'H(:mm)a',   //hora em formato am e pm
    		eventColor: '#FF00FF',
			timeFormat: 'H(:mm)a',
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: 'events.php',
			
			
			buttonText: {
       		 	prev: '<' , 
       		 	next: '>' , 
			 	today: 'Hoje', 
				month: 'Mês' , 
				week:  'Semana' , 
				day: 'Dia' 
    		},
			minTime:"08:00:00",
			maxTime:"20:00:00",
			defaultView: 'agendaWeek',
			monthNames: ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ],
			
			monthNamesShort: ["Jan","Fev","Mar","Abr","Mai","Jun","Jul", "Ago", "Set", "Out", "Nov", "Dez" ],

			dayNames: [ 'Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
			
			dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'] 
		});
		
	});

</script>
<style>

	body {
		margin: 40px 10px;
		background: #FFC0CB;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
		background:url(/img/bg.jpg) no-repeat center top fixed;
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
	 
            }

</style>
</head>
<body>
	
	<div class="container">
		<div class="col-md-offset-7">
		<button style="background: pink;border:0"  type="button" class="btn" data-toggle="modal" data-target="#form-agenda">	Fazer um agendamento
		</button>
		</div>

		<div class="row">
	       <div class="text-center col-md-offset-2 col-md-8" >
	       <h1 style=""><img style="margin-top: -40px;margin-bottom: 20px" src="img/logo.png" width="200px" align="left" alt=""></h1>
	       </div><div><br><br></div>
	    </div>
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div id='calendar'></div>
			</div>
		</div>
	</div>

	
<!-- Modal -->
<div id="form-agenda" class="modal fade" style="height: 700px" role="dialog">
  <div class="modal-dialog">

    <!-- Modal Conteudo-->
    <div  style="background: #FFEFD5"  class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Agendamento</h4>
      </div>
      <div style="height: 500px" class="modal-body">
        <form action="agendar.php" method="post">
		  <div class="form-group">
		    <label for="nome">Nome:</label>
		    <input type="text" class="form-control" name="nome" id="nome">
		  </div>
		  <div class="form-group col-md-3">
		    <label for="servico">Serviço:</label>
		    <select class="form-control" name="servico" id="servico">
		    	<option value="">Selecione o Servico</option>
		    	<option value="Limpeza de Pele">Limpeza de Pele</option>
		    	<option value="Sobracelhas Fio a Fio">Sobracelhas Fio a Fio</option>
		    	<option value="Alongamento de Cílios">Alongamento de Cílios</option>
		    </select>
		  </div>
		  <div class="form-group col-md-3">
		    <label for="data">Data:</label>
		    <input type="date" name="data" class="form-control" id="date">
		  </div>
		  <div class="form-group col-md-3">
		    <label for="hora">Horário:</label>
		    <input type="time" class="form-control" name="hora" id="hora">
		  </div>
		  <div class="form-group col-md-3">
		    <label for="duracao">Duração:</label>
		    <select class="form-control" name="duracao" id="duracao">
		    	<option value="1">1 Hora</option>
		    	<option value="15">1,5 Horas</option>
		    	<option value="2">2 Horas</option>
		  </div>
		  <div class="col-md-8">
		  		<button type="submit" name="submit" class="btn btn-block">Salvar</button>
		  </div>
		</form>
		<div class="modal-footer">
		<p class="text-center">Izabelita Medeiros Estética</p>
      </div>
      </div>
      
    </div>

  </div>
</div>
</body>
</html>
