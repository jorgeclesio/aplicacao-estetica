<?php
    include "conexao.php";

    session_start();

?>

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="8wPWvRE7psOApt4vrgpqR1CqRLoYnX_Q7r_UHB_Ftxo" />
        <title>Izabelita Medeiros Estética</title>
         <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <!-- JQueryUI -->
        <link href="js/jquery-ui.min.css" rel="stylesheet">
        <link rel="icon" type="image/jpeg" href="img/favicon.ico" />

        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>

    <style type="text/css">
   
        button{
            height: 80px;margin:  20px; margin-left: 0;background: pink;
            opacity: 0.8;
            filter: alpha(opacity=50); /* For IE8 and earlier */
        }
        button a{font-size: 1.2em}

    body {
    background: url(img/bg.jpg) no-repeat center top fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
    a{color: blue; text-decoration: none}
    a:hover{color: #fff;text-decoration: none;}
 
    
    </style>
       
    </head>
    <body>

        <p class="text-center text-danger">
            <?php if($_SESSION['status'] != "logado"){
                echo "voce precisa estar esta logado";
                header("Location: login.php");
                
            }?>
        </p>

<div class="container-fluid fundo">
   <div class="row">
       <div class="text-center col-md-offset-2 col-md-8" >
       <h1 style=""><img src="img/logo.png" class="img-responsive"" width="400px" align="left" alt=""></h1>
       </div>
   </div>
<br><br>
   <div class="principal">
    <div class="row">
       
        <div class="col-md-offset-2 col-md-8">
            <div class="col-md-6"><a href="agenda.php"><button class="btn btn-block" style="box-shadow: 1px 1px 2px">
                Lista de Agendamentos</button></a>
            </div>
            <div class="col-md-6">
                <a style="display: block;" href="comanda.php">
                    <button class="btn btn-block" style="box-shadow: 1px 1px 2px">Comanda/vendas</button>
                </a>
            </div>
            <div class="col-md-6">
                <a style="display: block;" href="clientes.php">
                    <button class="btn btn-block" style="box-shadow: 1px 1px 2px">Cadastro de Clientes</button>
                </a>
            </div>
            <div class="col-md-6">
                <a style="display: block;" href="produtos.php">
                    <button class="btn btn-block" style="box-shadow: 1px 1px 2px">Cadastro de Produtos</button>
                </a>
            </div>
            <div class="col-md-6">
                <a style="display: block;" href="servicos.php">
                    <button class="btn btn-block" style="box-shadow: 1px 1px 2px">Cadastro de Serviços</button>
                </a>
            </div>
            <div class="col-md-6">
                <a style="display: none;" href="colaboradores.php">
                    <button class="btn btn-block" style="box-shadow: 1px 1px 2px">Cadastro de Colaboradores</button>
                </a>
            </div>
            <div class="col-md-6">
                <a style="display: block;" href="colaboradores.php">
                    <button class="btn btn-block" style="box-shadow: 1px 1px 2px">Relatórios</button>
                </a>
            </div>
        </div>
    </div>   

   </div>         
    
   



</div>        
    
      
    </body>
</html>
