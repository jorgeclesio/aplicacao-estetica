<?php
    include "conexao.php";

    session_start();

?>

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Izabelita Medeiros Estética</title>
         <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <!-- JQueryUI -->
        <link href="js/jquery-ui.min.css" rel="stylesheet">
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
       <h1 style=""><img src="img/logo.png" width="400px" align="left" alt=""></h1>
       </div>
   </div>
<br><br>
   <div class="principal">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="col-md-6"><button class="btn btn-block" style="box-shadow: 1px 1px 2px">
                <a href="agenda.php">Lista de Agendamentos</a></button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-block" style="box-shadow: 1px 1px 2px"><a style="display: block;" href="comanda.php">Comanda/vendas</a></button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-block" style="box-shadow: 1px 1px 2px"><a style="display: block;" href="clientes.php">Cadastro de Clientes</a></button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-block" style="box-shadow: 1px 1px 2px"><a style="display: block;" href="produtos.php">Cadastro de Produtos</a></button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-block" style="box-shadow: 1px 1px 2px"><a style="display: block;" href="servicos.php">Cadastro de Serviços</a></button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-block" style="box-shadow: 1px 1px 2px"><a style="display: block;" href="colaboradores.php">Cadastro de Colaboradores</a></button>
            </div>
        </div>
    </div>   

   </div>         
    
   



</div>        
    
      
    </body>
</html>
