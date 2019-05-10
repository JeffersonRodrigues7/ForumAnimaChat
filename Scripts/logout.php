<?php

    session_start();

    unset($_SESSION['userName']);//Apaga a sessão do usuário quando ele clica em sair

    header("Location: index.php");//Envia o usuário de volta para a tela inicial

?>