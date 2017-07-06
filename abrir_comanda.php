<?php
    include "conexao.php";

    session_start();

?>

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
          <div class="form-group col-md-offset-9 col-md-3">
                <label for=""></label>
                <a href="clientes.php" style="text-decoration: none"><input type="text" class="btn btn-block form-control text-center" value="Novo Cliente"></a>
          </div>

          <div class="form-group col-md-8">
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
          
          

          <div class="form-group col-md-4">
                  <label for="data">Data:</label>
                <input type="text" class="form-control text-center" id="data" name="data" readonly value="<?php  echo date('d-m-Y');?>">
          </div>

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

         <div class="form-group col-md-2">
                  <label for="qtd_servico">Quantidade:</label>
                <input type="text" class="form-control text-center" id="qtd_servico" name="qtd_servico">
          </div>  
          <div class="form-group col-md-4">
                          <label for="colaborador">Profissional:</label>
                            <select class="form-control " name="colaborador" id="colaborador" >
                              
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

            <div class="form-group col-md-6">
              <label for="produto">Home Care:</label>
                <select class="form-control " name="produto" id="produto" >
                  <option value="">Selecione o Produto:</option>
                <?php
                  $i=1;
                  $sql = "SELECT nome FROM produtos order by nome";    
                  $result = mysqli_query ($conexao,$sql) or die("erro");         
                    while ($row = mysqli_fetch_array($result)){?>
                        <option value=" <?php echo $row['id'] ?> "><?php echo $i++ ." - ". $row['nome'] ?>
                           </option>    
                         <?php  }?>
              </select>
         </div> 

         <div class="form-group col-md-2">
                  <label for="qtd_produto">Quantidade:</label>
                <input  type="text" class="form-control text-center" id="qtd_produto" name="qtd_produto">
          </div> 
        </div>
        

        <div class="row">
          
        
          
        </div>
        
          <div class="form-group">
                 <input style="background: pink;color:#fff" type="submit" name="submit" class="btn btn-block" value="Salvar" >
          </div>
        </div>
      </form>
            
            

            
        </div>
   </div>         
    
   


</div>
        
    
      
    </body>
</html>
