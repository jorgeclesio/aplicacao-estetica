<?php 
include 'conexao.php';
?>
<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Izabelita Medeiros Estética</title>
         <!-- Bootstrap -->
         <link rel="stylesheet" href="js/jquery-3.2.1.min.js">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="js/jquery-ui.min.css" rel="stylesheet">
        <link rel="icon" type="image/jpeg" href="img/favicon.ico" />
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        
        <script src="js/jquery.maskMoney.js"></script>

    <style type="text/css">
        button{background: pink;  }
        button a{font-size: 1.2em}
        tr.item:hover{ background: #FEF4EB }
	    body {color: gray; 
	    	background: url(img/bg.jpg) no-repeat center top fixed;
		        -webkit-background-size: cover;
		        -moz-background-size: cover;
		        -o-background-size: cover;
		        background-size: cover;
	            }
    </style>
    </head>
<body >

<!-- ################-  CABEÇALHO -################ -->
<div class="container-fluid">
  <div class="row" style="background: pink; padding:  10px; margin-bottom: 5px">
      <div col class="col-md-offset-2 col-md-8 text-center" style="background: pink; ">
          <div>
              <a href="index.php"><img src="img/logo_pq.png" alt=""></a>
           </div>
      </div>
  </div>
</div>   


<?php

$id = $_GET['id'];
$acao = $_GET['acao'];
$total = $_GET['tot'];


if ($acao == "pagar") {?>

<!-- ################-  MODAL DE PAGAMENTO -################ -->
<div class="container">
      <!-- Modal conteudo-->
    <div  style="background: #FFEFD5; width: 50%; margin: 0 auto" class="modal-content">
       	<div class="modal-header" style="background: #CA5F82; color: #fff">
     
          <h3 class="modal-title text-center">PAGAMENTO</h3>
        </div>
        <form action="recibo.php" method="post">
        	<input type="hidden" id="total" name="total" value='<?php echo $total; ?>'>
	        <div  class="modal-body">
			  	<div class="col-md-12">
	              		<div class="col-md-8 text-right"></div>
	              		<div class="col-md-4 text-right">
	              			<span>Comanda N. </span>
	              			<strong><?php echo $id; ?></strong>
	              			<input type="hidden" name="id" value="<?php echo $id; ?>">
	              		</div>
	              		<div><span text-right><i style="cursor: pointer;" onclick="atualizar()" class="fa fa-refresh" aria-hidden="true"></i></span></div>

	              		
		              	<div class="col-md-offset-2 col-md-8">
		              		<label for="total">Valor a Pagar:</label>
		              		<strong>
		                    	<input id="val_pag" class="form-control input-lg" autofocus="" name="val_pag" type="text" readonly=""  value="<?php echo 'R$ '.number_format($total, 2, ',', '.');  ?>">
		                	</strong><br>
		                </div>
		                <div></div>

			            <div class="form-group col-md-offset-2 col-md-8">
			              <label for="dinheiro"><span>Dinheiro</span></label>
			              <input id="dinheiro" step="0.01" onkeyup="calcular(this.value)" name="dinheiro" class="form-control input-lg" type="number"  placeholder="R$ ">
			            </div>
					
			            <div class="form-group col-md-offset-2 col-md-8">
			              <label for="cartao">Cartão:</label>
			              <input id="cartao" onkeyup="calc_cartao(this.value)" class="form-control" name="cartao" type="number" placeholder="R$ ">
			            </div>
			            <div class="col-md-offset-2 col-md-8 a_desconto text-right"><a href="#" onclick="abrir_desc()">Abrir desconto</a></div>
			            <div style="display: none" class="col-md-offset-2 col-md-8 f_desconto text-right"><a href="#" onclick="fechar_desc()">Fechar desconto</a></div>
			            <div class="form-group col-md-offset-2 col-md-8 desconto" style="display: none">
		                	<label for="cartao">Desconto:</label>
		                    <input id="desconto" onkeyup="desconto(this.value)" class="form-control" name="desconto" type="text" placeholder="R$ ">
		                </div>

		                <div class="form-group col-md-offset-2 col-md-8">
		                	<label for="cartao">Troco:</label>
		                    <input id="troco" class="form-control" name="troco" type="text" readonly="">
		                </div>
	          			<input type="hidden" name="" id="valor_total" value="">
			  	</div>
	         <div id="info"></div>
	          
	        </div>
	        <div class="col-md-6" style="margin-top: 10px"></div>
	        <div class="modal-footer ">
	          	<button type="submit" class="btn btn-block" style="background: #CA5F82; pink;color: #fff">Concluir Pagamento</button>
	        </div>
        </form>
    </div>
     
</div>


<script type="text/javascript">


//FUNCOES PARA PAGAMENTO EM DINHEIRO, CARTAO OU AMBOS
	var total = parseInt($("#total").val());
	var dinheiro = parseInt($("#dinheiro").val('0'));
	var cartao = parseInt($("#cartao").val('0'));
	var desconto = parseInt($("#desconto").val('0'));

	function calcular(dinheiro){

		var total = parseInt($("#total").val());

		var cartao = parseInt($("#cartao").val());
		var valor_pago = parseInt(dinheiro) + cartao;
			troco = valor_pago - total;
					
					$("#troco").val(troco);

	console.log(cartao);
	}

	function calc_cartao(cartao){
		var total = parseInt($("#total").val());
		var dinheiro = parseInt($("#dinheiro").val());
		var valor_pago2 = parseInt(cartao) + dinheiro;
			troco = valor_pago2 - total;
					$("#troco").val(troco);

	console.log(troco);
	}

//FUNCAO PARA MOSTRAR E ESCONDER GUIA DE DESCONTO
	function abrir_desc(){
		$(".desconto").show();
		$(".a_desconto").hide();
		$(".f_desconto").show();
	}

	function fechar_desc(){
		$(".desconto").hide();
		$(".f_desconto").hide();
		$(".a_desconto").show();
		
	}

	

//EVITA O ENVIO DO FORMULARIO AO CLICAR NO ENTER
	$('input').keypress(function (e) {
	        var code = null;
	        code = (e.keyCode ? e.keyCode : e.which);                
	        return (code == 13) ? false : true;
	   });


//FUNCAO PARA ATUALIZAR A PAGINA
	function atualizar() {
	    location.reload();
	}


</script>

<?php }?>

</body>
</html>