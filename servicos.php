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
        <!-- Bootstrap -->
            <link href="css/style.css" rel="stylesheet">
            <link href="js/jquery-ui.min.css" rel="stylesheet">
            <link rel="icon" type="image/jpeg" href="img/favicon.ico" />
        <!-- JS -->
            <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
            <script src="js/mask.js" type="text/javascript"></script>
   <style>
       form label {color:pink}


::-webkit-input-placeholder {color: pink;}
:-moz-placeholder { /* Firefox 18- */color: pink;}
::-moz-placeholder {  /* Firefox 19+ */color: pink;}
:-ms-input-placeholder {color: pink;}
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

<div class="container-fluid">
   <div class="row" style="background: pink; ">
        <div class="row" style="background: pink">
            <div col class="col-md-offset-2 col-md-8 text-center" style="background: pink; ">
                <div>
                      <a href="index.php"><img src="img/logo_pq.png" alt=""></a>
                </div>
           </div>
        </div> 
  </div>
   
<br><br>
   <div class="principal">
      <h1 class="text-center" style="margin-top: 0;padding-top: 0;;color: #888">Cadastro de Serviços</h1>
        <p class="text-center text-danger">
            <?php if($_SESSION['status'] != "logado"){
                echo "voce precisa estar esta logado";
                header("Location: login.php");
                
            }?>
        </p>

    <div class="row">
    <div class="text-right col-md-offset-2 col-md-8">
      <a href="index.php">Voltar</a></div>
    <div class="col-md-offset-2 col-md-8">
      <form action="scripts/cadastros.php" method="post">
          <div class="form-group col-md-9">
                  <label for="nome">Nome do Serviço:</label>
                  <input type="text" class="form-control text-uppercase"  id="nome" name="nome" placeholder="" autofocus="" required>
          </div>

          <div class="form-group col-md-3">
              <label for="preco">Preço Unitário:</label>
              <input type="number" class="form-control" id="preco" name="preco" placeholder="R$" required=" ">
          </div>

          

          <div class="form-group">
              <input style="background: pink;color: #fff" type="submit" name="cad_servico" class="btn btn-block" value="Salvar" >
              
          </div>
      </form>



    </div>   
   </div>
   </div>
  
   



</div> 

<!--Código JavaScript  -->       
<script>
    jQuery(function($){
    
    $("#cpf").mask("999.999.999-99");
    $("#telefone").mask("(99) 99999-9999");
    });
</script>    
      
    </body>
</html>
