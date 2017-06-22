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
        </style>
    </head>
    <body>

        <p class="text-center text-danger">
            <?php if($_SESSION['status'] != "logado"){
                echo "voce precisa estar esta logado";
                header("Location: login.php");
                
            }?>
        </p>
       <header style="margin: 0 auto; color: #fff; background: orange">
             <h2 style="text-align: center">Departamento Municipal de Transito e Transporte</h2>
             <h4 style="text-align: center">Mikes em Ação</h4>
             <h3 class="text-center">Relatório de Operações</h3>
       </header>
<div>
    <table class="table table-responsive table-striped table-bordered" style="margin-top: 1px">
        <tr class="text-center" style="background: orange;color:#fff;">
            <td></td>
            <td>O. S.</td>
            <td>DATA</td>
            <td>LOCAL</td>
            <td>TIPO</td>
            <td>DESCRIÇÃO</td>
        </tr>

        <?php
        $i=1;

         $query = "SELECT * FROM operacao ORDER BY data DESC";
         $result = mysqli_query ($conexao, $query) or die ("Err1");

         while ($res = mysqli_fetch_array($result)) {?>
             
    <tr style="text-align:center;">
         <td> <?php echo $i++; ?> </td>
         <td> <?php echo $res['num_os'] ?></td>
         <td> <?php echo date('d-m-Y', strtotime($res['data'])) ?></td>
         <td> <?php echo $res['local'] ?></td>
         <td> <?php 

            $tipo = $res['tipo'];

                switch ($tipo) {
                    case "1":
                        echo "Blitz";
                        break;
                    case "2":
                        echo "Caminhada";
                        break;
                    case "3":
                        echo "Carreata";
                        break;
                    case "4":
                        echo "Cavalgada";
                        break;
                    case "5":
                        echo "Batedor";
                        break;
                    case "6":
                        echo "Corrida";
                        break;
                    case "7":
                        echo "Show";
                        break;
                } 



            ?>          
         </td>
         <td> <?php echo $res['descricao'] ?></td>

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
