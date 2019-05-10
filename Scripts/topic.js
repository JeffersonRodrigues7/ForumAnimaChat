var qtdMessages = 10;//Quantidade de mensagens por página 
var page = 1;//pagina inicial

$(document).ready( function(){//quando o documento estiver pronto...

    toListMessages(page, qtdMessages);



})

function toListMessages(page, qtdMessages){
    var data = {
        page: page,
        qtdMessages: qtdMessages
    }
    
    $.post('listMessages.php', data, function(returns){//vai fazer uma requisição para listMessages.php através do post
        $("#messages").html(returns);
    });
}


