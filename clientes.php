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
   <div class="row" style="background: pink">
       <div col class="col-md-offset-2 col-md-8 text-center" style="background: pink; ">
            <div>
                  <a href="index.php"><img src="img/logo_pq.png" alt=""></a>
            </div>
       </div>
   </div>
<br><br>
   <div class="principal">
    <h1 class="text-center" style="margin-top: 0;padding-top: 0;;color: #888">Cadastro de Clientes</h1>
        <p class="text-center text-danger">
            <?php if($_SESSION['status'] != "logado"){
                echo "voce precisa estar esta logado";
                header("Location: login.php");
                
            }?>
        </p>
      
    <div class="row">
    <div class="text-right col-md-offset-2 col-md-8">
      <a href="index.php">Voltar</a></div>
    <div class="col-md-offset-2 col-md-8 ">
      <form action="scripts/cad_clientes.php" method="post">
          <div class="form-group col-md-12 ">
                  <label for="nome">Nome:</label>
                  <input type="text" class="form-control text-uppercase"  id="nome" name="nome" placeholder="" autofocus="" required>
          </div>

          <div class="form-group col-md-4">
              <label for="telefone">Telefone:</label>
              <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="" required="">
          </div>

          <div class="form-group col-md-4">
              <label for="cpf">CPF:</label>
              <input type="text" class="form-control" id="cpf" name="cpf" placeholder="" required="">
          </div>


          <div class="form-group col-md-4">
              <label for="aniversario">Aniversário:</label>
              <input type="date" class="form-control" id="aniversario" name="aniversario" placeholder="" required="">
          </div>

          <div class="form-group col-md-9">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="" required="">
          </div>

          <div class="form-group col-md-3">
                <label for="equipe">Sexo:</label>
                <select class="form-control" name="sexo" id="sexo" required>
                    <option value="feminino">Feminino</option>
                    <option value="masculino">Masculino</option>
                    <option value="outro">Outro</option>
                </select>
            </div>

          <div class="form-group col-md-12">
              <label for="endereco">Endereço:</label>
              <input type="text" class="form-control text-uppercase" id="endereco" name="endereco" placeholder="" required="">
          </div>

          <div class="form-group col-md-5">
              <label for="bairro">Bairro:</label>
              <input type="text" class="form-control text-uppercase" id="bairro" name="bairro" placeholder="" required="">
          </div>

          <div class="form-group col-md-5">
              <label for="cidade">Cidade:</label>
              <input type="text" class="form-control text-uppercase" id="cidade" name="cidade" placeholder="" required="">
          </div>

          <div class="form-group col-md-2">
              <label for="estado">Estado:</label>
              <input type="text" class="form-control text-uppercase" id="estado" name="estado" placeholder="" required="">
          </div>
          <div class="form-group">
                 <input style="background: pink; color: #fff" type="submit" name="submit" class="btn btn-block" value="Salvar" >
              
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
