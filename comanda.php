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
    a:hover{color: #fff;text-decoration: none;}
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

            <br><br><br><br>
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
                
                <table class="table table-responsive table-striped table-bordered" style="margin-top: 1px">
        <tr class="text-center" style="background: pink;color:gray;">
            <td>Num Comanda</td>
            <td>Data</td>
            <td>Serviços</td>
            <td>Produtos</td>
            <td>Valor a Pagar</td>
            <td>Status</td>
            <?php
       
        ?>
            
        </tr>

        <?php
         
        
         $query = "SELECT * FROM comanda WHERE status = 'Aberto' ";
         $result = mysqli_query ($conexao, $query) or die ("Erro ao consultar o banco");

         


         while ($res = mysqli_fetch_array($result)) {?>
             
    <tr style="text-align:center;">
         <td> <?php echo $res['num_comanda'] ?> </td>
         <td> <?php echo $res['data'] ?></td>
         <td> <?php 
         
            $servico = "SELECT * FROM servicos WHERE id=$res[id_servico]";
                    $exec_servico = mysqli_query($conexao,$servico);
                    $escreve_nome_servico = mysqli_fetch_array($exec_servico);
                        echo  $escreve_nome_servico['nome']."<br>";
            ?></td>
         <td> 
            <?php 
         
            $produto = "SELECT * FROM produtos WHERE id=$res[id_produto]";
                    $exec_produto = mysqli_query($conexao,$produto);
                    $escreve_nome_produto = mysqli_fetch_array($exec_produto);
                        echo  $escreve_nome_produto['nome']."<br>";
            ?>
         </td>
         <td> <?php echo $res['total'] ?>
        </td>
         <td> <a href="#">Fechar Comanda</a></td>
       

        </tr>
        <?php } ?>
        </table>
            
            
       
        </div>
   </div>         
    
   



</div>        
    
      
    </body>
</html>
