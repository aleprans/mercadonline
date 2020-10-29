<?php
include_once('connect.php');

$sql = "select * from categorias;";
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/mercadoria.css">
    <title>MercadOnline</title>

    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <img id="logo" src="/imagens/logop.jpg" alt="Merconline">
    <span class="cab">MERCADONLINE seu mercado em casa</span>
    <a href=""><span id="carrinho">Carrinho de compras</span><i  class="fas fa-cart-arrow-down"></i></a>
    <img id="merc" src="" title="">
    <a href=""><span id="trocar">Trocar mercado</span></a>
    <div id="busca">
        <div id="menu">
            <span class="menu">Categorias</span>
            <?php
                while ($dados = $result -> fetch_array()) {?>
                    <input class="cat" type="button" onclick="filtrar(<?php echo $dados['id_categorias'];?>)" value="<?php echo $dados['desc_cat'];?>">
                <?php } ?>
                <input class="cat" type="button" onclick="filtrar(0)" value="todas">
        </div>
        <div id="pro">
            <input id="procura" type="text" placeholder="O que você procura?"><button id="procurar" onclick="procurar()">Procurar</button>
        </div>
    </div>
    
    <div id="itens">
        <!-- LIsta de produtos -->
    </div>
    <footer>
        <?php
        include_once('rodape.php');
        ?>
    </footer>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet"/>
<script src="/script/mercado.js"></script>
