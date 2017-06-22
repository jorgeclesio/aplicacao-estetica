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
   <div class="row">
       <div class="text-center" style="background: pink;height: 80px;line-height: 80px">
       <h1 style="margin: 0;line-height: 80px;color: #fff">Cadastro de Serviços</h1>
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
      <form action="scripts/cad_servicos.php" method="post">
          <div class="form-group col-md-12">
                  <label for="nome">Nome do Serviço:</label>
                  <input type="text" class="form-control"  id="nome" name="nome" placeholder="" required>
          </div>

          <div class="form-group col-md-3">
              <label for="preco">Preço Unitário:</label>
              <input type="text" class="form-control" id="preco" name="preco" placeholder="" required="">
          </div>

          <div class="form-group col-md-3">
              <label for="comissao">Comissão:</label>
              <input type="number" class="form-control" id="comissao" name="comissao" placeholder="%" >
          </div>
        <!--
          <div class="form-group col-md-6">
              <label for="recorrencia">Recorrência (Data de Retorno):</label>
              <input type="date" class="form-control" id="recorrencia" name="recorrencia" placeholder="Retornar em: " required="">
          </div>
        -->
          <div class="form-group col-md-6">
              <label for="profissional">Profissional:</label>
              <select class="form-control col-md-4" name="profissional" id="profissional" >
                  <option value="">Selecione o Profissional</option>

                <?php
                  $sql = "SELECT nome FROM colaboradores";
                  $result = mysqli_query ($conexao,$sql) or die("erro");



                  while ($row = mysqli_fetch_array($result))
                  
                  $nome = $row['nome'];

                   {?>
                    <option value=" <?php echo $nome ?> "><?php echo $nome ?></option>

                <?php  }?>

                  
                </select>
          </div>

          <div class="form-group">
              <input style="background: pink;color: #fff" type="submit" name="salvar" class="btn btn-block" value="Salvar" >
              
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
