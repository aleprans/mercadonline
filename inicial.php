<?php

include_once('connect.php');

$sql = "select * from mercados;";
$result = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/inicial.css">

    <title>MercadOnlines</title>
</head>
<body>
    <div id="superior">
        <!-- <button id="entrar">Entrar</button> -->
        <h1 id="superior">Seu mercado em sua casa!</h1>
    </div>
    <h3 id="escolha">Escolha seu mercado preferido</h3>
    <div id="mecs">
        <?php while($dados = $result->fetch_array()) {?>
        <img src="<?php echo $dados['mec_logo'];?>" title="<?php echo $dados['mec_name'];?>" onclick="carregar(<?php echo $dados['id_mercados'];?>)">
        <?php }?>
    </div>
    <footer>
        <?php
        include_once('rodape.php');
        ?>
    </footer>
</body>
<script src="/script/inicial.js"></script>
</html>


