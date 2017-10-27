<?php
session_start();
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
        <link rel="stylesheet" href="css/font-awesome.min.css">
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
        tr.item:hover{
          background: pink
        }
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
  <div class="principal container">
         <h1 class="text-center" style="margin-top: 0;padding-top: 0;;color: #888">Comanda</h1>
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            

<!-- ################ Nova Comanda ################ -->
            <div class="col-md-6">
                  <br>
                <a style="background: pink;margin-bottom:  0" href="abrir_comanda.php" class="btn btn-block">
                    <span  class="glyphicon glyphicon-plus">&nbsp  Nova Comanda</span> 
                </a>
            </div>

            <br><br><br>
			

    	       <div class="tab-content">

    <!-- ################Lista as Comandas com Status "Aberta"################ -->
    		    <div id="aberta" class="tab-pane fade in active">
    			       <h3>Comandas Abertas</h3>
                <div>

                  <?php 
                      $sql_comanda = 'select * from comanda c inner join serv_comanda s on c.id_comanda = s.id_com where c.status="Aberta" group by c.id_comanda   order by c.id_comanda desc   ';
                      $exec_comanda = mysqli_query($conexao, $sql_comanda);

          while ($linha = mysqli_fetch_array($exec_comanda)) {?>
                    <div class="row" style="border: 1px solid #FFC0CB; border-radius: 3px;background: #fff;margin-bottom: 10px; padding: 5px">
                        <div class="col-md-12 text-left">
                          <span class="text-left">Comanda: 
                            <?php 
                                $id_com = $linha['id_comanda'];
                                echo $id_com ."<br>"; 
                                ?>
                          </span> 
                        </div>
                        <div class="text-center"><h3>Izabelita Medeiros Estetica</h3></div>
                        <div class="text-center">CNPJ: 28.770.243/0001-28</div>
                            <hr>
                        <div>
                      
                            <div class="col-md-6"> Cliente: <h4>
                            <?php  
                              $id_cli = $linha['id_cliente'];
                              $sql_cliente = "select * from clientes where idclientes = $id_cli";
                              $exec_cliente = mysqli_query($conexao, $sql_cliente);
                              $cliente = mysqli_fetch_array($exec_cliente);
                                echo strtoupper($cliente['cli_nome'])."<br>"; 
                              ?> </h4>
                            </div>

                            <div class="col-md-6 text-right"> Id Col.: 
                            <?php  
                              $id_col = $linha['id_colaborador'];
                              $sql_col = "select * from colaboradores where idcolaboradores = $id_col";
                              $exec_col = mysqli_query($conexao, $sql_col);
                              $col = mysqli_fetch_array($exec_col);
                                echo strtoupper($col['idcolaboradores'])."<br>"; 
                              ?> 
                            </div>
                        
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th> - </th>
                              <th>Serviços</th>
                              <th>valor</th>
                              <th></th>
                            </tr>
                          </thead><a href=""></a>

                          <?php 
                      $serv_comanda = "SELECT servicos.serv_nome as nome, servicos.serv_valor as valor, serv_comanda.id_com as id_da_comanda, serv_comanda.id    FROM comanda 
                                        join servicos 
                                        join serv_comanda 
                                  on comanda.id_comanda = serv_comanda.id_com and serv_comanda.id_servico = servicos.id
                                        WHERE id_com = $id_com order by comanda.id_comanda desc";
                      $exec_serv_comanda = mysqli_query($conexao, $serv_comanda);
                      $num = mysqli_num_rows($exec_serv_comanda);
 

                      while ($servico =  mysqli_fetch_array($exec_serv_comanda)) { ?>
                        
                        <tr class="item">
                          <td></td>
                          <td><?php echo $servico["nome"]?></td>
                          <td><?php echo "R$ " .  number_format($servico["valor"], 2, ',', '.')?></td>
                          <td>
                            <a href='scripts/editar_comanda.php?id=<?php echo $servico["id"]?>' onClick="return confirm('Tem certeza que quer excluir este serviço?')" title='<?php echo $servico["id"]?>'>
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                          </td>
                        </tr>';
                                                           
                      <?php }
              
                      ?>

                        </table>

                      <div class="col-md-12 text-right"><strong> Total: 
                           <?php     
                                $sum = 0;
                                  foreach ($exec_serv_comanda as $value){
                                      $sum += $value['valor'];
                                  }
                              echo 'R$  ' . number_format($sum, 2, ',', '.')."<br>";
                            ?>  
                            </strong>
                      </div>

                      
                      

                        </div>   
                    
                        <div> 
                              <button type="button" id="" style="margin: 5px;"  class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">PAGAR
                              </button>

                              <button type="button" style="margin: 5px;" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal">EDITAR
                              </button>
                        </div> 
                    </div>
                          
                      <?php } ?>
                   
                </div>

                  
            </div><br><br><br>
     
    
            </div> <!--fim div aberta -->
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
                  echo $id_com; 
                  
                ?></b>
              </div>
              
              <hr>
                            
              <div class="col-md-6"></div>
              <div></div><hr>
              
              <div class="form-group col-md-6">
                <label for="dinheiro"><span>Dinheiro</span></label>
                <input id="input-dinheiro" class="form-control" type="number" autofocus="" placeholder="R$ ">
              </div>

              <div class="form-group col-md-2">
                <label for="cartao"></label>
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
              <div class="col-md-6"><label for="total">Valor a Pagar:</label>
                  <input class="form-control" type="text" readonly=""  value="<?php echo 'R$ '.number_format($total, 2, ',', '.');  ?>">
              </div>
              <div class="col-md-6"><label for="cartao">Troco:</label>
                    <input class="form-control" type="text" readonly="">
              </div>
                <br><br><br>
              
          </form>
          <hr>
        </div>
        <div class="col-md-6" style="margin-top: 10px"></div>
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