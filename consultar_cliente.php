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
        <script src="ajax/cad_clientes.js"></script>

    <style type="text/css">
   
        button{
            margin:  ; margin-left: 0;background: pink;
            opacity: 0.8;
            filter: alpha(opacity=50); /* For IE8 and earlier */
        }
        button a{font-size: 1.2em}

    body {color: gray;
    background: url(img/bg.jpg) no-repeat center top fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
    a{color: blue; text-decoration: none}
    a:hover{color: #fff;text-decoration: none;}
    .botao{background: pink}
    
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
       <h1 style="">Comanda</h1>
       </div>
   </div>
<br><br>
   <div class="principal">
    <div class="row">
        
    <form action="" method="post">
          <div class="form-group col-md-6">
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

          <div class="form-group col-md-3">
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
          <div class="form-group col-md-6">
              <label for="servico">Serviços:</label>
                <select class="form-control " name="nome" id="nome" >
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
          </div>
          <div class="form-group">
                 <input style="background: pink; color: #fff" type="submit" name="submit" class="btn btn-block" value="Salvar" >
              
          </div>
      </form>
            
            </form>

            
        </div>
   </div>         
    
   



</div>        
    
      
    </body>
</html>
