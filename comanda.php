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
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
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
        on serv_comanda.id_comanda = comanda.id  and comanda.status = 'Aberta' group by comanda.id");
            
            //DETALHAMENTO DA COMANDA
            while ($row = mysqli_fetch_array($consulta)) {?>
        <div class="col-md-12" style="background: #fffAF0; border: 1px solid pink; border-radius: 8px; margin-bottom: 5px">
            <div class="col-md-8 text-right"></div><div class="col-md-4 text-right">Comanda N. <b><?php echo $row['id']; ?></b></div>
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
            <div class="col-md-4"><b><?php echo 'R$ '.number_format($valor, 2, ',', '.');  ?></b></div>
            
            <div class="col-md-6" ></div>
            <!--CONCLUIR A COMANDA E FAZER O PAGAMENTO-->
            <div class="col-md-6 text-right"><a href="pagamento.php" style="display: block;">
                <button class="btn btn-xs" style="background: #00FA9A;margin: 8px;padding: 5px;color: #ffe"> PAGAR</button></a></div>
             
        </div> 
            <?php }  ?>
             
    
      
            
            
       
        </div>
   </div>         
    
   



</div>        
    
      
    </body>
</html>
