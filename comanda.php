<?php
    include "conexao.php";

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
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="ajax/cad_clientes.js"></script>

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
    a{color: gray; text-decoration: none}
    a:hover{color: ;text-decoration: none;}
    .botao{background: pink}

    .nav-tabs {background:rgba(255,128,192,0.3);border: 1px solid pink;border-radius: 3px;padding: 0;margin: 0}
    .nav-tabs a{margin: -4px}
    
    </style>
       
    </head>
<body>

<div class="container-fluid fundo">
  <div class="row" style="background: pink">
        <div col class="col-md-offset-2 col-md-8 text-center" style="background: pink; ">
            <div>
                  <a href="index.php"><img src="img/logo_pq.png" alt=""></a>
            </div>
       </div>
    </div>
   
<br><br>
<div class="principal">
         <h1 class="text-center" style="margin-top: 0;padding-top: 0;;color: #888">Comanda</h1>

    <div class="row">
        <div class="col-md-offset-3 col-md-6">
        
            <div class="col-md-6">
                <span>Exibir:</span>
                <div role="group" aria-label="...">
                    <ul  class="nav nav-tabs">
                      <li> <a data-toggle="tab" href="#todas"  >Todas</a></li>
                      <li> <a data-toggle="tab" href="#aberta" class="active">Abertas</a></li>
                      <li> <a data-toggle="tab" href="#fechada">Fechadas</a></li>
                    </ul>
                </div>
                
            </div>

<!-- ################ Nova Comanda ################ -->
            <div class="col-md-6">
                  <br>
                <a style="background: pink;margin-bottom:  0" href="abrir_comanda.php" class="btn btn-block">
                    <span  class="glyphicon glyphicon-plus">&nbsp  Nova Comanda</span> 
                </a>
            </div>

            <br><br><br>
			<div id="busca" style="display: none">
				<div class="col-md-12">
					<p>Filtrar Período:</p> 
				</div>
           
					<form class="form-inline" action="">
						
						<div class="form-group">
							<span>De:</span> 
							<input class="btn" type="date" name="data_inicio" id="inicio">
						</div>

						<div class="form-group">
							<span> Até:</span>
							<input class="btn" type="date" name="data_final" id="fim">
						</div>
							<button class="btn" type="submit" name="buscar" value="Buscar">Buscar</button>
						
					</form>
				<br>
			</div>

	<div class="tab-content">

<!-- ################Lista as Comandas com Status "Aberta"################ -->
		<div id="aberta" class="tab-pane fade in active">
			<h3>Comandas Abertas</h3>
				<?php
				$consulta = consulta_banco("select * from comanda
					inner join serv_comanda
			  inner join prod_comanda
					inner join clientes
					inner join servicos
					inner join produtos
			on 
			 comanda.id_comanda=serv_comanda.id_com and 
			 comanda.id_comanda=prod_comanda.id_com and
			 comanda.id_cliente=clientes.idclientes and
			 serv_comanda.id_servico=servicos.id  and
			 prod_comanda.id_produto=produtos.id and
				  comanda.status = 'Aberta' group by comanda.id_comanda desc");
            //DETALHAMENTO DA COMANDA
			while ($row = mysqli_fetch_array($consulta)) { ?>
		  <div class="col-md-12" style="background: #fffAF0; border: 1px solid pink; border-radius: 8px; margin-bottom: 5px">
						<?php $id = $row['id_comanda']; ?>
		  <div class="col-md-8 text-right"></div><div class="col-md-4 text-right">Comanda N. 
					  <b>              
						<?php echo $id; ?>
					  </b>
		  </div>
            <!--cabeçalho da comanda-->
				<div class="col-md-12">Cliente: <?php echo $row['cli_nome']; ?></div><br><br><br>
				<div class="col-md-6"><u>Serviços:</u></div>
				<div class="col-md-2">Qtd:</div>
				<div class="col-md-4">Valor:</div>
  <!--resultados da comanda-->
				<div class="col-md-6"><?php echo $row['serv_nome']; ?></div>
				<div class="col-md-2"><?php echo $row['qtd_serv']; ?></div>
				<div class="col-md-4">
              <?php 
                  $valor_s = $row['serv_valor'] * $row['qtd_serv'];
                  echo 'R$ '.number_format($valor_s, 2, ',', '.');  
              ?> 
  </div>
                <br><br><br>


  <div class="col-md-6"><u>Produtos:</u></div>
  <div class="col-md-2">Qtd:</div>
  <div class="col-md-4">Valor:</div>
  <!--resultados da comanda-->
  <div class="col-md-6"><?php echo $row['prod_nome']; ?></div>
  <div class="col-md-2"><?php echo $row['qtd_prod']; ?></div>
  <div class="col-md-4">
              <?php 

                  $valor_p = $row['prod_preco_venda'] * $row['qtd_prod'];
                  echo 'R$ '.number_format($valor_s, 2, ',', '.');  
                  
              ?>
              
    </div><br><br><br>
  <div class="col-md-12" style="border-bottom: 1px solid gray"></div>
  <div class="col-md-8 text-right "><b>TOTAL</b></div>   
            <div class="col-md-4"><b>
              <?php 
                    $total = $valor_p + $valor_s;
                echo 'R$ '.number_format($total, 2, ',', '.'); 

               ?></b>
            </div>
            
  <div class="col-md-6" ></div>
            <!--CONCLUIR A COMANDA E FAZER O PAGAMENTO-->
		<div class="col-md-6 text-right">
                <button type="button" style="margin: 5px;" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">PAGAR
                </button>

                <button type="button" style="margin: 5px;" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal">EDITAR
                </button>
        </div>
             
    </div> 
            <?php }  ?>
		</div><!--fim div aberta -->
  
<!-- ################Lista as Comandas com Status "Fechada"################ -->
  <div id="fechada" class="tab-pane fade">
        <h3>Comandas Fechadas</h3>
      
    <?php 
      $consulta_comanda = "SELECT * FROM comanda INNER JOIN serv_comanda INNER JOIN servicos INNER JOIN clientes
        on comanda.id_comanda = serv_comanda.id_com and
           serv_comanda.id_servico = servicos.id and 
           comanda.id_cliente = clientes.idclientes
        where comanda.status = 'Fechada' group by comanda.id_comanda desc";
      $res_comanda = mysqli_query($conexao, $consulta_comanda);

      while ($linha = mysqli_fetch_array($res_comanda)) {?>
<div class="col-md-12" style="background: #fffAF0; border: 1px solid pink; border-radius: 8px; margin-bottom: 5px">
  <?php $id = $linha['id_comanda']; ?>
  <div class="col-md-8 text-right"></div><div class="col-md-4 text-right">Comanda N. 
              <b>              
                <?php echo $id; ?>
              </b>
  </div>

  
        <!--cabeçalho da comanda-->
  <div class="col-md-12">Cliente: <?php echo $linha['cli_nome']; ?></div><br><br><br>
  <div class="col-md-6"><u>Serviços:</u></div>
  <div class="col-md-2">Qtd:</div>
  <div class="col-md-4">Valor:</div>
  <!--resultados da comanda-->
  <div class="col-md-6"><?php echo $linha['serv_nome']; ?></div>
  <div class="col-md-2"><?php echo $linha['qtd_serv']; ?></div>
  <div class="col-md-4">
              <?php 
                  $valor_s = $linha['serv_valor'] * $linha['qtd_serv'];
                  echo 'R$ '.number_format($valor_s, 2, ',', '.');  
              ?> 
  </div><br><br><br>
</div> <!-- fim da div de resultados da comanda -->   


      
      <?php } ?>
    
  </div><!--fim div fechada -->

<!-- ################Lista Todas as Comandas################ -->
  <div id="todas" class="tab-pane fade">
    <h3>Todas as Comandas</h3>
    <p>lista todas as comndas</p>
  </div>

	</div><!--fim div content -->

        </div>
   </div>         
  

  <!-- ################MODAL DE PAGAMENTOS################ -->
    <div class="container">
  
  
   <!-- Modal -->
  <div class="modal fade" style="background: " id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal conteudo-->
      <div  style="background: #FFEFD5;" class="modal-content">
        <div class="modal-header" style="background: pink; color: #fff">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-center">PAGAMENTO</h3>
        </div>
        <div  class="modal-body">
          <form action="">
              <div class="col-md-8 text-right"></div><div class="col-md-4 text-right">Comanda N. <b>
                <?php 
                  echo $id; 
                ?></b>
              </div>
              
              <hr>
                            
              <div class="col-md-6"></div>
              <div></div><hr>
              <div class="col-md-6"><label for="total">Valor a Pagar:</label>
                  <input class="form-control" type="text" readonly=""  value="<?php echo 'R$ '.number_format($total, 2, ',', '.');  ?>"></div>
              <div class="form-group col-md-6">
                <label for="dinheiro"><span>Dinheiro</span></label>
                <input id="input-dinheiro" class="form-control" type="number" autofocus="" placeholder="R$ ">
              </div>
              <div class="col-md-6"><label for="cartao">Troco:</label>
                    <input class="form-control" type="text" readonly=""></div>
              <div class="form-group col-md-2">
                <label for="cartao">Parcelas:</label>
                <select class="btn" name="parc" id="parc">
                  <option value="1">1x</option>
                  <option value="2">2x</option>
                  <option value="3">3x</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="cartao">Cartão:</label>
                <input class="form-control" type="number" placeholder="R$ ">
              </div>

              
          </form>
          <hr>
        </div>
        <div class="col-md-6"></div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-block" style="background: pink;color: #fff" data-dismiss="modal">Concluir Pagamento</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
   
</div>

</div>

</body>
</html>
