<?php
session_start();
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
        <link rel="icon" type="image/jpeg" href="img/favicon.ico" />
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        

    <style type="text/css">
   
    body {color: gray;
    background: url(img/bg.jpg) no-repeat center top fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
    a{color: gray; text-decoration: none}
    a:hover{color: ;text-decoration: none;}
   
    </style>
       
    </head>
<body>


<div class="container-fluid fundo">
  <div class="row" style="background: pink; padding:  10px">
      <div col class="col-md-offset-2 col-md-8 text-center" style="background: pink; ">
          <div>
              <a href="index.php"><img src="img/logo_pq.png" alt=""></a>
           </div>
      </div>
  </div>
   
<br><br>


      <div class="container">
          <div class="row">
            <form method="get" action="rel/rel.php">
              <div class="row">
                  
                  <div class="form-group col-md-6">
                      <label style="color:#B55178;">Selecione o Tipo de Relatorio</label>
                      <select class="form-control" style="height: 40px" required="" name="rel" id="rel" >
                              <option value=""></option>
                              <option style="color:#B55178;"  value="financeiro">Financeiro</option>
                              <option style="color:#B55178;"  value="clientes">Clientes</option>
                              <option style="color:#B55178;"  value="produtos">Produtos</option>
                              <option style="color:#B55178;" value="servicos">Serviços</option>
                    </select>
                  </div>

                  <div  class="form-group col-md-6"></div>
                  
                  <div  class="form-group col-md-12">
                    <button class="btn btn-success">Abrir</button>
                  </div>
              </div>
            </form>
          </div>
   
      </div>

</div>

</body>
</html>