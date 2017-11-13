<?php 
include 'conexao.php';
$id       = mysqli_escape_string($conexao, $_POST['id']);
$desconto = mysqli_escape_string($conexao, $_POST['desconto']);
$val_pag  = mysqli_escape_string($conexao, $_POST['total'] - $desconto);
$dinheiro = mysqli_escape_string($conexao, $_POST['dinheiro']);
$cartao   = mysqli_escape_string($conexao, $_POST['cartao']);
$troco    = mysqli_escape_string($conexao, $_POST['troco']);


$sql = mysqli_query($conexao, "UPDATE comanda SET total = $val_pag ,dinheiro = $dinheiro ,cartao = $cartao, status = 'Fechada' WHERE id_comanda = $id") or die(mysqli_error());


echo "<script>alert('Pagamento Efetuado')</script>";
echo "<script>location.href='comanda.php' </script>"





 ?>