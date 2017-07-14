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
    a{color: blue; text-decoration: none}
    a:hover{color: ;text-decoration: none;}
    .botao{background: pink}
    
    </style>
       
    </head>
    <body>

       

<div class="container-fluid fundo">
   <div class="row">
       <div class="text-center" >
       <h1 style="">Izabelita Medeiros Estética</h1>
       </div>
   </div>
<br><br>
   <div class="principal">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
        
            <div class="col-md-6">
                <span>Exibir:</span>
                <div class="btn-group" role="group" aria-label="...">
                  <button style="background: pink" type="button" class="btn btn-default">Todas</button>
                  <button style="background: pink" type="button" class="btn btn-default active">Abertas</button>
                  <button style="background: pink" type="button" class="btn btn-default">Fechadas</button>
                </div>
                
            </div>

            <div class="col-md-6">
                <a style="background: pink" href="abrir_comanda.php" class="btn">
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

      
        <h3>Comandas Abertas</h3>
        <?php

        $consulta = consulta_banco("select comanda.id,comanda.data,clientes.cli_nome,colaboradores.col_nome,serv_comanda.quantidade,servicos.serv_valor,servicos.serv_nome from comanda
            inner join serv_comanda
            inner join colaboradores
            inner join clientes
            inner join servicos
        on serv_comanda.id_comanda = comanda.id  and comanda.status = 'Aberta' group by comanda.id desc");
             
            //DETALHAMENTO DA COMANDA
            while ($row = mysqli_fetch_array($consulta)) {?>
        <div class="col-md-12" style="background: #fffAF0; border: 1px solid pink; border-radius: 8px; margin-bottom: 5px">
                <?php $id = $row['id']; ?>
            <div class="col-md-8 text-right"></div><div class="col-md-4 text-right">Comanda N. <b><?php echo $id; ?></b></div>
            <!--cabeçalho da comanda-->
            <div class="col-md-12">Cliente: <?php echo $row['cli_nome']; ?></div><br><br><br>
            <div class="col-md-6"><u>Serviços:</u></div>
            <div class="col-md-2">Qtd:</div>
            <div class="col-md-4">Valor:</div>
            <!--resultados da comanda-->
            <div class="col-md-6"><?php echo $row['serv_nome']; ?></div>
            <div class="col-md-2"><?php echo $row['quantidade']; ?></div>
            <div class="col-md-4"><?php echo 'R$ '.number_format($row['serv_valor'], 2, ',', '.'); ?></div>
                <?php $valor=''; $valor += $row['serv_valor'];  ?><br><br><br>
            <div class="col-md-12" style="border-bottom: 1px solid gray"></div>
            <div class="col-md-8 text-right "><b>TOTAL</b></div>   
            <div class="col-md-4"><b><?php echo 'R$ '.number_format($valor, 2, ',', '.') * $row['quantidade'];  ?></b></div>
            
            <div class="col-md-6" ></div>
            <!--CONCLUIR A COMANDA E FAZER O PAGAMENTO-->
            <div class="col-md-6 text-right">
                <button type="button" style="margin: 5px;" class="btn btn-success" data-toggle="modal" data-target="#myModal">PAGAR
                </button>
            </div>
             
        </div> 
            <?php }  ?>
 
        </div>


   </div>         
  






  <!-- MODAL DE PAGAMENTOS -->
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
              <div class="col-md-8 text-right"></div><div class="col-md-4 text-right">Comanda N. <b><?php echo $id; ?></b></div>
              
              <hr>
                            
              <div class="col-md-6"></div>
              <div></div><hr>
              <div class="col-md-6"><label for="total">Valor a Pagar:</label>
                  <input class="form-control" type="text" readonly=""  value="<?php echo 'R$ '.number_format($valor, 2, ',', '.');  ?>"></div>
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
   




    </body>
</html>
