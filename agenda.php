<?php
	include 'conexao.php';
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='css/fullcalendar.min.css' rel='stylesheet' />
<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="js/jquery-ui.min.css" rel="stylesheet">
<link href="css/jquery-ui.min.css" rel="stylesheet">


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src='lib/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>

<script>

	$(document).ready(function() {
  
 var date = new Date();
 var d = date.getDate();
 var m = date.getMonth();
 var y = date.getFullYear();
 var id_event = "";
		

	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay,listWeek'
			},	
			
		views: {
		    agendaWeek: { 
		    	titleFormat: 'DD - MMMM - YYYY'
		        }
		    },
			
		eventLimit: true, 
			
	 	eventClick: function(calEvent, jsEvent, view) {
		  
		   alert('id: ' + calEvent.id);
		   alert('View: ' + view.name);
		   id_event = calEvent.id;
		  
			},
        
        eventClick: function pegaId(calEvent){
		   var id_event = calEvent.id; //pega o id do evento
	   			
	   			//pega o id quando clica no evento
	   			var evento = calEvent.id;
	   			var confirma = confirm('Você quer alterar esse agendamento?');
	   			 if (confirma) {
	   			 window.location = "update_events.php?id="+evento;
				}
	   			
		},
		
        theme:true,  //para fundo do calendario transparente
        TitleFormat:'D MMMM YYYY',
        
		events: function(start, end, timezone, callback) {
		    $.ajax({
		        url: 'events.php',
		        dataType: 'json',
		        data: {
	                start: start.unix(),
	                end: end.unix()
		            },
	            success: function(doc) {
		                var events = [];
		                $(doc).find('event').each(function() {
		                    events.push({
		                    	id: $(this).attr('id'),
		                        title: $(this).attr('title'),
		                        start: $(this).attr('start'), // will be parsed

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
		maxTime:"21:00:00",
		height:'auto',
		ForceEventDuration:true,
		DefaultTimedEventDuration:'01:00:00',
		defaultView: 'agendaWeek',
		editable:true,
		
		monthNames: ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ],	
			
		monthNamesShort: ["Jan","Fev","Mar","Abr","Mai","Jun","Jul", "Ago", "Set", "Out", "Nov", "Dez" ],

		dayNames: [ 'Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
			
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'] 
		});
	

	});//SCRIPT DO FULLCALENDAR
</script>
<style>

	body {
		margin: 40px 10px;
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
					<button style="background: #B0C4DE;border:0"  type="button" class="btn" data-toggle="modal" data-target="#form-agenda">	Fazer um agendamento
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
      <div class="modal-header">
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
			<div class="modal-footer">
			      <p class="text-center">Izabelita Medeiros Estética</p>
	        </div>
      </div> 
	</div>
  </div>
</div>




</div>
</body>
</html>
