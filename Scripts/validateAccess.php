<?php

    session_start();//Indica que teremos acesso as variáveis de sessão

    require_once("db.class.php");
    $database = new db();//Cria "objeto" database
    $conection = $database->getConnection();//pega a connection

    $user = $_POST['userName'];
    $password = md5($_POST['password']);

    $query = $conection->prepare("SELECT userName FROM users WHERE userName = :USER AND password = :PASSWORD");

    $query->bindParam(":USER", $user);
    $query->bindParam(":PASSWORD", $password);

    $result = $query->execute();

    if($result){
        $user = $query->fetch();//pego os dados do usuário que estou entrando
        
        if(isset($user['userName'])){//se ele achou algum usuário com esse name

            $_SESSION['userName'] = $user['userName'];//Com isso eu impesso que a pagina de perfil possa ser visualizada por qualquer um, somente aqueles que validarem o acesso vão poder entrar no perfil
            header("Location: profile.php");//caso o login seja realizado com sucesso o usuário vai para sua tela de perfil
        
        }else{
            header("Location: index.php?error=1");//Caso o usuário digite o login inválido ele volta pro index com um erro enviado via GET na url
        }

    }else{
        echo "Erro na execução da consulta";//Não está relacionado com erro na hora de escolher um usuario q nao existe
    }


?>