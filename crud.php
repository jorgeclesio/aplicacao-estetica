<?php
    include "conexao.php";

   

?>

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Izabelita Medeiros Estética</title>
      

  
       
    </head>
    <body>

<div class="container-fluid fundo">
  <?php 
        $consulta = consulta_banco("select * from usuarios");
            while ($row = mysqli_fetch_array($consulta)) {
                echo $row['usuario']. "  -  ".$row['senha']."<br>";
            }
   ?>

</div>        
    
      
    </body>
</html>
