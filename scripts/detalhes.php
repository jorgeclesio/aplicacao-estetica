<?php
session_start();
    include "../conexao.php";
    $detalhes = $_GET['detalhes'];
?>

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Izabelita Medeiros Estética</title>
         <!-- Bootstrap -->
         <link rel="stylesheet" href="../js/jquery-3.2.1.min.js">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../js/jquery-ui.min.css" rel="stylesheet">
        <link rel="icon" type="image/jpeg" href="../img/favicon.ico" />
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        

    <style type="text/css">
   
        button{
            margin:  ; margin-left: 0;background: pink;
            opacity: 0.8;
            filter: alpha(opacity=50); /* For IE8 and earlier */
        }
        button a{font-size: 1.2em}
        tr.item:hover{
          background: #FEF4EB
        }
    body {color: gray;
    background: url(../img/bg.jpg) no-repeat center top fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
    a{color: gray; text-decoration: none}
    a:hover{color: ;text-decoration: none;}
   
    
    </style>
       
    </head>
<body>


<div class="container-fluid fundo">
  <div class="row" style="background: pink; padding:  10px">
      <div col class="col-md-offset-2 col-md-8 text-center" style="background: pink; ">
          <div>
              <a href="index.php"><img src="../img/logo_pq.png" alt=""></a>
           </div>
      </div>
  </div>
   
<br><br>
<div class="principal container">
         
  <div class="row">
      <div class="col-md-offset-3 col-md-6" style="background: #fff;border-radius: 5px; padding: 5px">
          <div class="col-md-6">Comanda N. <?php echo $detalhes; ?></div>
          <div class="col-md-6 text-right"><a href="../rel/rel.php?rel=financeiro"><i class="fa fa-lg fa-undo" aria-hidden="true"></i></a></div><br>
          <h3 class="text-center">Izabelita Medeiros Estética</h3>
          <div class="text-center">CNPJ: 28.770.243/0001-28</div>
                            <hr>
          <?php 
            $sql_comanda = mysqli_query($conexao,"select * from comanda c inner join serv_comanda s on c.id_comanda = $detalhes  group by c.id_comanda  order by c.id_comanda desc ");
            
            $linha = mysqli_fetch_array($sql_comanda);

           ?>
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

          <table class="table ">
                          <thead>
                            <tr>
                              <th> - </th>
                              <th>Serviços</th>
                              <th>valor</th>
                              <th></th>
                            </tr>
                          </thead>

                          <?php 
                      $serv_comanda = "SELECT servicos.serv_nome as nome, servicos.serv_valor as valor, serv_comanda.id_com as id_da_comanda, serv_comanda.id    FROM comanda 
                                        join servicos 
                                        join serv_comanda 
                                  on comanda.id_comanda = serv_comanda.id_com and serv_comanda.id_servico = servicos.id
                                        WHERE id_com = $detalhes order by comanda.id_comanda desc";
                      $exec_serv_comanda = mysqli_query($conexao, $serv_comanda);
                      $num = mysqli_num_rows($exec_serv_comanda);
 

                      while ($servico =  mysqli_fetch_array($exec_serv_comanda)) { ?>
                        
                        <tr class="item">
                          <td></td>
                          <td><?php echo $servico["nome"]?></td>
                          <td><?php echo "R$ " .  number_format($servico["valor"], 2, ',', '.')?></td>
                          <td>
                            <a href='scripts/editar_comanda.php?acao=apagar&id=<?php echo $servico["id"]?>' onClick="return confirm('Tem certeza que quer excluir este serviço?')" title='<?php echo $servico["id"]?>'>
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                          </td>
                        </tr>';
                                                           
                      <?php }
              
                      ?>

                        </table>

                      <div class="col-md-12 text-right"><strong> Total: 
                           <input style="background: #fff; border:none" type="text" name="total" disabled value='
                           <?php     
                                $sum = 0;
                                  foreach ($exec_serv_comanda as $value){
                                      $sum += $value['valor'];
                                  }
                                      echo 'R$  ' . number_format($sum, 2, ',', '.');
                            ?> '>
                            
                            </strong>
                      </div>

          
      </div>

 
   
  </div>

</div>

</body>
</html>