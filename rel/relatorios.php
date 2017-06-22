<?php
    include "../conexao.php";

    session_start();

if(!$_SESSION['status'] == "logado"){
                echo $_SESSION['logar'];
                header("Location: login.php");
            }
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Equipe de Motos do DMTT - Relatórios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../js/jquery-ui.min.css" rel="stylesheet">
        <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <style type="text/css">
            body{ color:white;}
            a{color:white;font-size: 13pt; text-decoration:none;}
            a:hover{color:white;text-decoration: none}
            button{height: 20%;}
    
        </style>
</head>
<body style="margin: 0 auto; background: orange; height: 100%">

        <p class="text-center text-danger">
            <?php if($_SESSION['status'] != "logado"){
                echo "voce precisa estar esta logado";
                header("Location: login.php");
                
            }?>
        </p>
        <h1 style="text-align: center">Relatórios</h2>
        <h4 style="text-align: center">Mikes em Ação</h4>
        <hr>
            
            <div class="container">
                <div class="col-md-6 col-sm-6 log_label"><p class="text text-success" style="font-family: 'comic sans';">Usuário: <span><?php echo $_SESSION['usuarioNome']; ?></span></p></div>
                
            </div>
 
<div class="menu box_menu" style="display: flex; flex-flow: column;height: 20%">

<!-- <div class="row" >-->
        <button class="btn btn-block btn-success"  style="background: green;border:1px solid green; border-radius: 10px;line-height: 2.5em; margin-bottom: 1%" >
            <a style=" display:block; line-height: 2.5em; " class="text-center" href="rel_apreensao.php">
                Relatório de Apreensões 
            </a>
        </button>
<!--    </div>-->

<!--    <div class="row">-->
        <button class="btn btn-block btn-success" style="background: green;border:1px solid green; border-radius: 10px;line-height: 2.5em; margin-bottom: 1% " >
            <a style=" display:block; line-height: 2.5em; " class="text-center" href="rel_eventos.php">
                Relatório de Apoio a Eventos
            </a>
        </button>
<!--    </div>-->

<!--    <div class="row" >-->
        <button class="btn btn-block btn-success" style="background: green;border:1px solid green; border-radius: 10px;line-height: 2.5em;margin-bottom: 1%" >
            <a style=" display:block; line-height: 2.5em;" class="text-center" href="rel_obras.php">
                Relatório de Apoio a Obras
            </a>
        </button>
<!--    </div>-->

<!--    <div class="row">-->
        <button class="btn btn-block btn-success" style="background: green;border:1px solid green; border-radius: 10px;line-height: 2.5em;margin-bottom: 1%" >
            <a style=" display:block; line-height: 2.5em; " class="text-center" href="rel_operacoes.php">
                Relatório de Operações
            </a>
        </button>  
 <!--   </div> -->     

       
            
        </div>
    </body>
</html>