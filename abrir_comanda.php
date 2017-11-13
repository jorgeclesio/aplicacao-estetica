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
        
        <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
        
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="jquery-ui/jquery-ui.js"></script>
       

   
   <script>
        $( function() {
         
          $( "#nome" ).autocomplete({
                source: function(request,response){
                  $.ajax({
                    url: 'ajax/clientes.php',
                    dataType: 'json',
                    data: {q:request.term},
                    success: function(data){
                        response(data);
                    }

                  });       
                }
            });
        } );
  </script>
      
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
<div class="row" style="background: pink">
      <div col class="col-md-offset-2 col-md-8 text-center" style="background: pink; ">
          <div>
              <a href="index.php"><img src="img/logo_pq.png" alt=""></a>
           </div>
      </div>
  </div>
<div class="container">
   <div class="row"><br>
       <div class="text-center" >
       <h1 style="">Nova Comanda</h1>
       </div>
   </div>
        <br><br>

   <div class="row">
        <div class="col-md-offset-2 col-md-8">
        
        <div class="form-group col-md-offset-9  col-md-3">
                <label for=""></label>
                <a href="clientes.php" style="text-decoration: none"><input type="text" class="btn btn-block form-control text-center" value="Novo Cliente"></a>
        </div>

    <form action="scripts/cad_comanda.php" method="post">
      
        <input type="hidden" name="id_comanda" value="<?php 

             $idcomanda = mysqli_query($conexao,"SELECT MAX(id_comanda) as id FROM comanda");


              while ($row = mysqli_fetch_array($idcomanda)) {

               $id =  $row['id'] + 1; //ou usa id ou tem que usar max(id)

               echo $id;
              }

        ?>">

        <div class="row">
          <div class="form-group col-md-8">
                  <label for="nome">Nome:</label>
                  <input class="form-control col-md-4" type="text" name="nome" id="nome">
                  
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
                $consulta_servico = consulta_banco("SELECT * FROM servicos order by serv_nome");
                    $i=1;
                  $i=1;
                          
                    while ($row = mysqli_fetch_array($consulta_servico)){?>
                        <option value=" <?php echo $row['id']; ?> "><?php echo $i++ ." - ". $row['serv_nome']; ?>
                           </option>
                         <?php  }?>
              </select>
         </div>

           
          <div class="form-group col-md-6">
                          <label for="colaborador">Profissional:</label>
                            <select class="form-control " name="colaboradores" id="colaborador" >
                              
                            <?php
              $consulta = consulta_banco("SELECT * FROM colaboradores order by col_nome");
                              $i=1;      
                                while ($row = mysqli_fetch_array($consulta)){?>
                                    <option value=" <?php echo $row['idcolaboradores']; ?> "><?php echo $i++ ." - ". $row['col_nome']; ?>
                                       </option>    
                                     <?php  }?>
                          </select>
            </div>

            
        </div>
       
          <div class="form-group">
                 <input style="background: pink;color:#fff" type="submit" name="submit" class="btn btn-block" value="Salvar" >
          </div>
        
      </form>
            
          </div>  

            
        </div>
   </div>         
    
   


</div>
        
    
      
    </body>
</html>
