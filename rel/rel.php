<?php
session_start();
    include "../conexao.php";

$tipo = $_GET['rel'];


?>

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Izabelita Medeiros Estética</title>
         <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../js/jquery-ui.min.css" rel="stylesheet">
        <link rel="icon" type="image/jpeg" href="../img/favicon.ico" />
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
       

    <style type="text/css">
   
    body {color: gray;
    background: url(../img/bg.jpg) no-repeat center top fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
    a{color: #b55178; text-decoration: }
    
   
    </style>
       
    </head>
<body>


<div class="container-fluid fundo">
  <div class="row" style="background: pink; padding:  10px">
      <div col class="col-md-offset-2 col-md-8 text-center" style="background: pink; ">
          <div>
              <a href="../index.php"><img src="../img/logo_pq.png" alt=""></a>
           </div>
      </div>
  </div>
   
<br><br>


<div class="principal container">
<?php 
  if ($tipo == "financeiro") { ?>
  <h3 class="text-center" style="color:#B55178;"><b>RELATÓRIO FINANCEIRO</b></h3>
    <table class="table table-hover" style="color:#B55178;">
      <thead>
        <th> - </th>
        <th class="text-center text-uppercase">Data</th>
        <th class="text-uppercase">Cliente</th>
        <th class="text-center text-uppercase">Comanda</th>
        <th class="text-center text-uppercase">Valor</th>
      </thead>
      <tbody>                                         
        <?php 
            $i = 1;
              $sql_fin = mysqli_query($conexao, "SELECT * FROM comanda where status = 'Fechada' and MONTH(data) = MONTH(NOW()) order by data desc ");
              $num_comandas = mysqli_num_rows($sql_fin);
              if ($num_comandas == 0) {
                echo "Nenhum Registro a ser Listado...";
              }
              while ($linha = mysqli_fetch_array($sql_fin)) {?>
                
                
                      <tr>
                          <td><?php echo $i++; ?></td>
                          <td class="text-center"><?php echo date('d/m/Y', strtotime($linha['data'])) ?></td>
                          <td class="text-uppercase"><?php 

                      $id_cliente =  $linha['id_cliente'];

                      $sql_cli = mysqli_query($conexao, "SELECT cli_nome from clientes where idclientes = $id_cliente ");
                    $cliente = mysqli_fetch_array($sql_cli);

                              echo $cliente['cli_nome'];

                          ?>
                            
                          </td>
                          <td class="text-center">
                            <a href="../scripts/detalhes.php?detalhes=<?php echo $linha['id_comanda'] ?>"><?php echo $linha['id_comanda'] ?></a>
                          </td>
                          <td class="text-center"><?php echo 'R$ ' . number_format( $linha['total'], 2, ',', '.' )?></td>
                      </tr>
                          

             <?php }?>

             <?php 
                $soma = mysqli_query($conexao, "select sum(total) as soma from comanda WHERE MONTH(data) = MONTH(NOW())" );
                  $row = mysqli_fetch_array($soma);
                  
                 ?>
                 <tr>
                   <td  colspan="4" class="text-right"><b>TOTAL</b></td><td class="text-center"><b><?php  echo  'R$ '.number_format( $row['soma'], 2, ',', '.')?></b></td>
                 </tr>
      </tbody>
      
    </table>

 <?php  }

  if ($tipo == "clientes") {?>
    <h3 class="text-center" style="color:#B55178;"><b>CLIENTES CADASTRADOS</b></h3>
    <table class="table" style="color:#B55178;">
      <thead>
        <th> - </th>
        <th class=" text-uppercase">Nome</th>
        <th class="text-center text-uppercase">Telefone</th>
        <th class="text-center text-uppercase">Última Visita</th>
      </thead>
      <tbody>
          <?php 
          $i = 1;
          $sql_clientes = mysqli_query($conexao, "SELECT cli_nome, cli_telefone from clientes order by cli_nome");

          while ($rel_cli = mysqli_fetch_array($sql_clientes)) {?>
          
          <tr>
            <td><?php echo $i++; ?></td>
            <td class="text-uppercase"><?php echo $rel_cli['cli_nome']; ?></td>
            <td class="text-center"><?php echo $rel_cli['cli_telefone']; ?></td>
            <td></td>
          </tr>
        

          <?php } 


           ?>


      </tbody>
      
    </table>  
    
 <?php }

  if ($tipo == "produtos") {
    echo "relatorio produtos";
  }

  if ($tipo == "servicos") {
    echo "relatorio servicos";
  }

  
?>    

</div>

</div>

</body>
</html>