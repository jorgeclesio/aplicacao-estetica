
<?php
require '../conexao.php'; 
session_start();
?>


      <?php


      if ($_GET['acao'] == 'del') {
      	
      
          $id = $_GET['id'];
          $deleta = "DELETE FROM apreencoes WHERE id = $id";
          $exec_deleta = mysqli_query($conexao, $deleta) or die ("Não foi possivel excluir...");
          
          echo "<script> alert('Registro Excluído!!!');</script>";
      	  echo "<SCRIPT> location.href='rel_apreensao.php' </SCRIPT>"; 
    
      }



?>