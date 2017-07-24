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
      <h1 class="text-center" style="margin-top: 0;padding-top: 0;;color: #888">Cadastro de Produtos</h1>

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
      <form action="scripts/cad_produtos.php">
          <div class="form-group col-md-12">
                  <label for="nome">Nome:</label>
                  <input type="text" class="form-control text-uppercase"  id="nome" name="nome" placeholder="" autofocus="" required>
          </div>

          <div class="form-group col-md-12">
              <label for="descricao">Descrição:</label>
              <textarea rows="4" cols="50" class="form-control" id="descricao" name="descricao" placeholder=""></textarea>
          </div>
          
          <div class="form-group col-md-4">
              <label for="p_custo">Preço de Custo:</label>
              <input type="number" class="form-control" id="p_custo" name="p_custo" placeholder="R$ " required="">
          </div>


          <div class="form-group col-md-4">
              <label for="number">Preco  de Venda:</label>
              <input type="text" class="form-control" id="p_venda" name="p_venda" placeholder="R$ " required="">
          </div>

          <div class="form-group col-md-4">
              <label for="estoque">Estoque:</label>
              <input type="number" class="form-control" id="estoque" name="estoque" placeholder="" required="">
          </div>

          
          <div class="form-group">
                 <input style="background: pink; color: #fff" type="submit" name="submit" class="btn btn-block" value="Salvar" >
              
          </div>
      </form>



    </div>   
  </div>
   </div>
   
   



</div> 
    
</body>
</html>
