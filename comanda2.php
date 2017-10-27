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
    
    <?php
        
  $consulta = consulta_banco(
    "SELECT comanda.id_comanda, comanda.id_cliente, serv_comanda.qtd_serv, serv_comanda.id_servico, prod_comanda.qtd_prod, prod_comanda.id_produto
        FROM comanda
        JOIN serv_comanda
        JOIN prod_comanda ON comanda.id_comanda = serv_comanda.id_com OR 
        comanda.id_comanda = prod_comanda.id_com WHERE 
         comanda.status =  'Aberta'
        GROUP BY comanda.id_comanda desc");
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
        <div class="col-md-12">Cliente: <?php echo $row['id_cliente']; ?></div><br><br><br>
        <div class="col-md-6"><u>Serviços:</u></div>
        <div class="col-md-2">Qtd:</div>
        <div class="col-md-4">Valor:</div>
  <!--resultados da comanda-->
        <div class="col-md-6"><?php echo $row['id_servico']; ?></div>
        <div class="col-md-2"><?php echo $row['qtd_serv']; ?></div>
        <div class="col-md-4">
              <?php 
                  //$valor_s = $row['serv_valor'] * $row['qtd_serv'];
                 // echo 'R$ '.number_format($valor_s, 2, ',', '.');  
              ?> 
       </div>

  </div>
</div>

</body>

</html>