<?php

    session_start();
    $idtopic =  $_SESSION['idtopic'];

    $page = filter_input(INPUT_POST, 'page', FILTER_SANITIZE_NUMBER_INT); // Obtem a específica variável externa pelo nome e opcionalmente a filtra
    $qtdTopicsPg = filter_input(INPUT_POST, 'qtdMessages', FILTER_SANITIZE_NUMBER_INT);
    //calculando inicio da vizualização
    $init = ($page * $qtdTopicsPg) - $qtdTopicsPg;//init seria o id do topico inicial na pagina em questão

    require_once("db.class.php");
    $database = new db();//Cria "objeto" database
    $conection = $database->getConnection();//pega a connection
    $query = $conection->prepare("SELECT * FROM messages WHERE $idtopic = idtopic ORDER BY id LIMIT $init, $qtdTopicsPg"); //A query acima traz a partir do topico inicial mais a qtdTopics por pagina
    $query->execute();
    $result = $query->fetchAll();//pego o resultado da query, uso o fetchAll nela e mando tudo pro result

    echo '<ul>';

        if($result){//Verifica se trouxe algum resultado
            foreach($result as $value){//esse for imprime cada valor do array(Observe que ele imprime apenas a quantidade de tópicos definido em index.js)
            
                echo '<li class="messagelist">';
                    echo "<small><center> Postado por: ".$value['userName']."</center></small>";
                    echo "</br>";
                    echo $value['texts'];
                    echo "</br>";
                    echo "</br>";
                echo '</li>';  
            }

    echo '</ul>';
            
//---------------------------------ABAIXO É TUDO REFERENTE A PAGINAÇÃO---------------------------------//
            $query = $conection->prepare("SELECT COUNT(id) AS numMessages FROM messages WHERE $idtopic = idtopic");//traz a quantidade de tópicos
            $query->execute();

            $rowPg = $query->fetch();//quantidade de linhas
            $qtdPg = ceil($rowPg['numMessages']/$qtdTopicsPg);//Pega o número de página(inteiro)

            $maxLinksPg = 2;//quantidade de paginas que será mostrado anteriormente e posteriormente

            echo '<nav aria-label="pages">';
                echo '<ul class="pagination">';

                    echo '<li class="page-item2">'  ;//Aqui é só para imprimir o icone de primeira página
                        echo '<span class="page-link">' ;
                            echo "<a href='#' onclick='toListMessages(1, $qtdTopicsPg)'>Primeira</a>"; 
                        echo '</span>' ;
                    echo '</li>';

                    for($previousPage = $page - $maxLinksPg; $previousPage <= $page - 1; $previousPage++){//Imprime as página anteriores
                        if($previousPage >= 1){//Só mostra a página anterior se ela for > 0
                            echo "<li class='page-item'> <a class='page-link' href='#' onclick='toListMessages($previousPage, $qtdTopicsPg)'>$previousPage</a> </li>";
                        }    
                    }

                    echo '<li class="page-item active">';//Página atual
                        echo '<span class="page-link">';
                            echo "$page";//o link da página que estaremos não será um link
                        echo '</span>';
                    echo '</li>';

                    for($postPage = $page + 1; $postPage <= $page + $maxLinksPg; $postPage++){//Imprime as página posteriores
                        if($postPage <= $qtdPg){//Não mostra nenhuma página posterior a ultima
                            echo '<li class="page-item">';
                                echo "<a class='page-link' href='#' onclick='toListMessages($postPage, $qtdTopicsPg)'>$postPage</a>";    
                            echo '</li>';
                        }    
                    }

                    echo '<li class="page-item">';  //Aqui é só para imprimir o icone da ultima página
                        echo '<span class="page-link">';
                            echo "<a href='#' onclick='toListMessages($qtdPg, $qtdTopicsPg)'>Ultima</a>";    
                        echo '</span>';
                    echo '</li>';

                echo '</ul>';
            echo '</nav>';

        } else echo "Nenhuma mensagem encontrado";

?>

