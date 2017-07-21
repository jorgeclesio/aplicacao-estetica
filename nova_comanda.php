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
         <link rel="stylesheet" href="js/jquery-3.2.1.min.js">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="js/jquery-ui.min.css" rel="stylesheet">
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>

    <style type="text/css">
   
        button{
            margin:  20px; margin-left: 0;background: pink;
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
    .botao{background: pink}
 span.glyphicon-plus{text-align: left}
    
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
       <div class="text-center" >
       <h1 style="">Izabelita Medeiros Estética</h1>
       </div>
   </div>
<br><br>
   <div class="principal">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">

        <form action="">
            <div class="col-md-8">
                <label for="cliente">Nome do Cliente:</label>
                <input type="text" class="btn btn-block" name="cliente" id="cliente" placeholder="Digite o nome do cliente">
            </div>



            <div class="col-md-4">
                <label for="n_comanda">Numero da Comanda:</label>
                <input type="text" class="btn btn-block" name="n_comanda" id="n_comanda" placeholder="">
            </div>
            <br><br><br>

            <div class="form-group col-md-6">
                <label for="produto">Adicionar Produto:</label>
                <select class="form-control" name="produto" id="produto" >
                    <option value="feminino">Selecione um produto</option>
                    <option value="masculino">Masculino</option>
                    <option value="outro">Outro</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="servico">Adicionar Serviço:</label>
                <select class="form-control" name="servico" id="servico" required>
                    <option value="">Selecione um Serviço</option>
                    <option value="masculino">Masculino</option>
                    <option value="outro">Outro</option>
                </select>
            </div><br>
            <br>

            <div class="form-group col-md-6">
                <label for="colaborador">Nome do Colaborador:</label>
                <select class="form-control" name="colaborador" id="colaborador" required>
                    <option value="feminino">Selecione o Colaborador</option>
                    <option value="masculino">Masculino</option>
                    <option value="outro">Outro</option>
                </select>
            </div>
                
            
            
        </form>
        </div>
   </div>         
    
   



</div>        
    
      
    </body>
</html>
