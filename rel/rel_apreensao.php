<?php
    include "../conexao.php";

    session_start();

?>

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Equipe de Motos do DMTT</title>
         <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <style type="text/css">
            body{ color:;}
            a{color:white; font-size: 13pt;text-decoration:none;}
            a:hover{text-decoration: none}
            .link_del{color: orange}
        </style>
    </head>
    <body>

        <p class="text-center text-danger">
            <?php if($_SESSION['status'] != "logado"){
                echo "voce precisa estar esta logado";
                header("Location: ../login.php");
                
            }?>
        </p>
       <header style="margin: 0 auto; color: #fff; background: orange">
             <h2 style="text-align: center">Departamento Municipal de Transito e Transporte</h2>
             <h4 style="text-align: center">Mikes em Ação</h4>
             <h3 class="text-center">Relatório de Apreensões</h3>
       </header>
<div>
    <table class="table table-responsive table-striped table-bordered" style="margin-top: 1px">
        <tr class="text-center" style="background: orange;color:#fff;">
            <td></td>
            <td>DATA</td>
            <td>PLACA</td>
            <td>MOTIVO</td>
            <td>OBSERVAÇÃO</td>
            <td>EQUIPE</td>
            <?php
           
         if ($_SESSION['usuarioNome']=='robson') {
             echo "<td>";
             echo "</td>";
         }
         
        ?>
            
        </tr>

        <?php
        $i=1;

         $query = "SELECT * FROM apreencoes WHERE MONTH(data) = MONTH(NOW()) ORDER BY data DESC";
         $result = mysqli_query ($conexao, $query) or die ("Erro ao consultar o banco");

         while ($res = mysqli_fetch_array($result)) {?>
             
    <tr style="text-align:center;">
         <td> <?php echo $i++ ?> </td>
         <td> <?php echo date('d-m-Y', strtotime($res['data'])) ?></td>
         <td> <?php echo $res['placa'] ?></td>
         <td> <?php echo $res['motivo'] ?></td>
         <td> <?php 
            if (!empty($res['observacao'])) {
                echo $res['observacao'];
            }else{
                echo "sem observações";
            }
                  

            ?>
        </td>
         <td> <?php echo $res['equipe'] ?></td>
         <?php
           
         if ($_SESSION['usuarioNome']=='robson') {
            echo "<td>";
             echo "<a href='acao.php?acao=del&id=".$res['id']."' class='link_del'>Excluir</a>";
             echo "</td>";
         }
         
        ?> 
        
         <?php } ?>
            
        
        </tr>
        </table>

        <?php 
            $cont = mysqli_num_rows($result);

            if ($cont == 0){
        echo "Não existem registros!";
    }
        ?>
     </div>   
    </body>
</html>
