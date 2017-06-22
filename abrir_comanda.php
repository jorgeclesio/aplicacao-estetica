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
        <link href="js/jquery-ui.min.css" rel="stylesheet">
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
       

    <style type="text/css">
   
      

    body {color: gray;
    background: url(img/bg.jpg) no-repeat center top fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
    
    
    </style>
       
    </head>
    <body>

        <p class="text-center text-danger">
            <?php if($_SESSION['status'] != "logado"){
                echo "voce precisa estar esta logado";
                header("Location: login.php");
                
            }?>
        </p>

<div class="container-fluid">
   <div class="row">
       <div class="text-center" >
       <h1 style="">Comanda</h1>
       </div>
   </div>
        <br><br>

   <div class="row">
        <div class="col-md-offset-2 col-md-8">
    <form action="scripts/cad_comanda.php" method="post">
        <div class="row">
          <div class="form-group col-md-7">
                  <label for="nome">Nome:</label>
                  <select class="form-control col-md-4" name="nome" id="nome" >
                  <option value="">Selecione o Cliente</option>
                <?php
                    $i=1;
                     $sql = "SELECT nome FROM clientes order by nome";    
                     $result = mysqli_query ($conexao,$sql) or die("erro");         
                        while ($row = mysqli_fetch_array($result)){?>
                           <option value=" <?php echo $row['id'] ?> "><?php echo $i++ ." - ". $row['nome'] ?></option>    
                         <?php  }?>
              </select>
          </div>

          <div class="form-group col-md-3">
                  <label for="data">Data:</label>
                <input type="text" class="form-control text-center" id="num_comanda" name="num_comanda" readonly value="<?php  echo date('d-m-Y');            ?>">
          </div>

          <div class="form-group col-md-2">
              <label for="num_comanda">Num. Comanda:</label>
              <input type="text" class="form-control" id="num_comanda" name="num_comanda" readonly value="
            <?php
                     $sql = "SELECT num_comanda FROM comanda WHERE num_comanda = (SELECT MAX(num_comanda) FROM comanda)";    
                     $result = mysqli_query ($conexao,$sql) or die("erro");         
                        while ($row = mysqli_fetch_array($result)){
                                $num_comanda = $row['num_comanda'];
                                echo $num_comanda +1;
                         }?>

              ">
          </div>
        </div>
        

        <div class="row">
          <div class="form-group col-md-6">
              <label for="servico">Serviços:</label>
                <select class="form-control " name="servico" id="servico" >
                  <option value="">Selecione o Serviço:</option>
                <?php
                  $i=1;
                  $sql = "SELECT nome FROM servicos order by nome";    
                  $result = mysqli_query ($conexao,$sql) or die("erro");         
                    while ($row = mysqli_fetch_array($result)){?>
                        <option value=" <?php echo $row['id'] ?> "><?php echo $i++ ." - ". $row['nome'] ?>
                           </option>    
                         <?php  }?>
              </select>
           </div>
        
          <div class="form-group col-md-6">
              <label for="colaborador">Profissional:</label>
                <select class="form-control " name="colaborador" id="colaborador" >
                  <option value="">Selecione o Profissional:</option>
                <?php
                  $i=1;
                  $sql = "SELECT nome FROM colaboradores order by nome";    
                  $result = mysqli_query ($conexao,$sql) or die("erro");         
                    while ($row = mysqli_fetch_array($result)){?>
                        <option value=" <?php echo $row['id'] ?> "><?php echo $i++ ." - ". $row['nome'] ?>
                           </option>    
                         <?php  }?>
              </select>
           </div>
        </div>
        
          <div class="form-group">
                 <input  type="submit" name="submit" class="btn btn-block" value="Salvar" >
          </div>
        </div>
      </form>
            
            

            
        </div>
   </div>         
    
   


</div>
        
    
      
    </body>
</html>
