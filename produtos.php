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
            <link type="text/css" href="css/style.css" rel="stylesheet">
            <link href="js/jquery-ui.min.css" rel="stylesheet">
        <!-- JS -->
            <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
            <script src="js/mask.js" type="text/javascript"></script>
   <style>
       
   </style>

    </head>

    <body>

<div class="container-fluid">
   <div class="row">
       <div class="text-center" style="background: pink;height: 80px;line-height: 80px">
       <h1 style="margin: 0;line-height: 80px;color: #fff">Cadastro de Produtos</h1>
       </div>
   </div>
<br><br>
   <div class="principal">

        <p class="text-center text-danger">
            <?php if($_SESSION['status'] != "logado"){
                echo "voce precisa estar esta logado";
                header("Location: login.php");
                
            }?>
        </p>

    <div class="row">
    <div class="col-md-offset-2 col-md-8">
      <form action="scripts/cad_clientes.php">
          <div class="form-group col-md-12">
                  <label for="nome">Nome:</label>
                  <input type="text" class="form-control"  id="nome" name="nome" placeholder="" required>
          </div>

          <div class="form-group col-md-4">
              <label for="telefone">Telefone:</label>
              <input type="text" class="form-control" id="telefone" name="nome" placeholder="" required="">
          </div>

          <div class="form-group col-md-4">
              <label for="cpf">CPF:</label>
              <input type="text" class="form-control" id="cpf" name="cpf" placeholder="" required="">
          </div>


          <div class="form-group col-md-4">
              <label for="aniversario">Aniversário:</label>
              <input type="text" class="form-control" id="aniversario" name="aniversario" placeholder="" required="">
          </div>

          <div class="form-group col-md-9">
              <label for="email">Email:</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="" required="">
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
              <input type="text" class="form-control" id="endereco" name="endereco" placeholder="" required="">
          </div>

          <div class="form-group col-md-5">
              <label for="bairro">Bairro:</label>
              <input type="text" class="form-control" id="bairro" name="bairro" placeholder="" required="">
          </div>

          <div class="form-group col-md-5">
              <label for="cidade">Cidade:</label>
              <input type="text" class="form-control" id="cidade" name="cidade" placeholder="" required="">
          </div>

          <div class="form-group col-md-2">
              <label for="estado">Estado:</label>
              <input type="text" class="form-control" id="estado" name="estado" placeholder="" required="">
          </div><br>
          <div class="form-group">
                 <input style="background: pink" type="submit" name="submit" class="btn btn-block" value="Salvar" >
              
          </div>
      </form>



    </div>   
  </div>
   </div>
<div class="row">
   <div class="col-md-12" style="position: absolute;bottom: 0;width: 100%;background: pink">
       <p class="text-center">sistema de gestao</p>
   </div>         
</div>    
   



</div> 

<!--Código JavaScript  -->       
<script>
    jQuery(function($){
    $("#aniversario").mask("99/99/9999");
    $("#cpf").mask("999.999.999-99");
    $("#telefone").mask("(99) 99999-9999");
    });
</script>    
      
    </body>
</html>
