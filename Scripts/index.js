var qtdTopicsPg = 20;//Quantidade de tópicos por página 
var page = 1;//pagina inicial

$(document).ready( function(){//quando o documento estiver pronto...

    toListTopics(page, qtdTopicsPg);

    $('#btn_register').click(function(){//pega o click no botão quando o usuario clicar em cadastrar
        
        if($('#inputUser').val().length > 16 || $('#inputUser').val().length < 4) {//verifica o campo usuário está correto
            alert('Usuario deve conter entre 4 a 16 caracteres')
            return false//o false não deixa que o cadastro seja realizado 

        }else if($('#inputPassword').val().length < 4) {//verifica se a senha está correta
            alert('Senha deve conter ao menos 4 caracteres')
            return false//o false não deixa que o cadastro seja realizado 

        }else if($('#inputPassword').val() != $('#inputPassword2').val()) {//verifica se a senhas batem
            alert('Senha de verificação não confere')
            return false//o false não deixa que o cadastro seja realizado 
        }
    })

})

function toListTopics(page, qtdTopicsPg){
    var data = {
        page: page,
        qtdTopicsPg: qtdTopicsPg
    }
    
    $.post('listTopics.php', data, function(returns){//vai fazer uma requisição para listTopics.php através do post
        $("#topics").html(returns);//coloca dentro da lista de topicos o que é retornado 
    });
}


