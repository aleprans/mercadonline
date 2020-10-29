<?php

include_once('connect.php');


if (isset($_GET['id_mec'])) {
    $id_merc = $_GET['id_mec'];
    
    
    if (isset($_GET['pesq'])) {
        $pesq = $_GET['pesq'];
            $sql = "select ma.*, me.* from mercadorias ma left join mercados me on ma.id_mercado = me.id_mercados where ma.id_mercado = '$id_merc' and ma.descricao like '%$pesq%' order by ma.descricao desc;";
        }
        if (isset($_GET['id_cat'])) {
            $id_cat = $_GET['id_cat'];
            if ($_GET['id_cat'] == 0) {
                $sql = "select ma.*, me.* from mercadorias ma left join mercados me on ma.id_mercado = me.id_mercados where ma.id_mercado = '$id_merc' order by ma.descricao desc;";
            }else {
                $sql = "select ma.*, me.* from mercadorias ma left join mercados me on ma.id_mercado = me.id_mercados where ma.id_mercado = '$id_merc' and ma.id_cat = '$id_cat' order by ma.descricao desc;";
            }
        }
    echo retorna($connect, $sql);
}

function retorna($connect, $sql){
   
    $result = mysqli_query($connect, $sql);
    $nrows = mysqli_num_rows($result);
    if ($nrows < 1) {
        $dados[0] = 'invalido';
        return json_encode($dados);
    }
    $row = mysqli_fetch_all($result);
    
    foreach($row as $key=>$valor){
    
        $dados[$key]['id_mercadoria'] = $valor[0];
        $dados[$key]['descricao'] = $valor[1]; 
        $dados[$key]['qtde'] = $valor[2];
        $dados[$key]['mec_name'] = $valor[8];
        $dados[$key]['mec_logo'] = $valor[9];
        $dados[$key]['img_mercadoria'] = $valor[4];
        $dados[$key]['qtde_emb'] = $valor[6];
    }
        return json_encode($dados);
}


?>