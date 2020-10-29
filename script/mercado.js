//Variaveis comuns
var $merc = $('#merc')
var $id_mercado = queryString("id_mec")
var $itens = $('#itens')
var $body = $('#img')
var $proc = $('#procura')


// Pesquisa ID na url
function queryString(parameter) {
    var loc = location.search.substring(1, location.search.length)
    var param_value = false
    var params = loc.split("&")
    for (i=0; i<params.length; i++) {
        param_name = params[i].substring(0,params[i].indexOf('='))
        if (param_name == parameter) {
            param_value = params[i].substring(params[i].indexOf('=')+1)
        }
    }
    if (param_value) {
        return param_value
    } else {
        return undefined
    }
}

$(document).ready(function(){
    filtrar(0)
})

function filtrar($id_cat){
    
    if ($id_mercado) {
        $.getJSON('pesq_merc.php', {
            id_mec: $id_mercado,
            id_cat: $id_cat,
        },function(json) {
            $merc.attr('src', json[0].mec_logo)
            $merc.attr('title', json[0].mec_name)
            $('#itens').empty()
            for (i=0; i < json.length; i++){
                itenold = itens.innerHTML
                itenew = '<div id="ditens" onclick="comprar('+json[i].id_mercadoria+')"><div id="img"><img src='+json[i].img_mercadoria+
                '></div><p><b>'+json[i].descricao+' '+json[i].qtde_emb+'</b></p></div>'  
                itenold = itenew + itenold
                itens.innerHTML = itenold 
            }
                    
        })
        $proc.val("")
    }
}

function procurar() {
    if ($proc.val() == "") {
        exit
    }
    $.getJSON('pesq_merc.php', {
        id_mec: $id_mercado,
        pesq: $proc.val()
    }, function(json){
        if (json[0] == 'invalido') {
            alert('Item não encontrado!')
            exit
        }
         $('#itens').empty()
        for (i=0; i < json.length; i++){
            itenold = itens.innerHTML
            itenew = '<div id="ditens" onclick="comprar('+json[i].id_mercadoria+')"><div id="img"><img src='+json[i].img_mercadoria+
            '></div><p><b>'+json[i].descricao+' '+json[i].qtde_emb+'</b></p></div>'  
            itenold = itenew + itenold
            itens.innerHTML = itenold 
        }           
    })
    $proc.val("")
}

function comprar(id) {
    alert(id)
}

function div_merc(){
   
}