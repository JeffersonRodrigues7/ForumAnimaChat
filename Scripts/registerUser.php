<?php

    require_once("db.class.php");
    $database = new db();//Cria "objeto" database
    $conection = $database->getConnection();//pega a connection

    $user = $_POST['userName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);//md5 criptografa a senha gerando um hash de 32 bits, 

    $UserAlreadyExists = false;//Variáveis que vão verificar se o usuário ou email já foram utilizados
    $EmailAlreadyExists = false;


    //Verificando se o Usuário digitado já está no banco de dados
    $query = $conection->prepare("SELECT userName FROM users WHERE userName = :USER");
    $query->bindParam(":USER", $user);
    $result = $query->execute();
    if($result){
        $data = $query->fetch();
        if(isset($data['userName'])) $UserAlreadyExists = true;
    }else  "Erro na execução da consulta no momento de cadastro";//Não está relacionado com erro na hora de escolher um usuario q nao existe
    
    //Verificando se o email digitado já está no banco de dados
    $query = $conection->prepare("SELECT email FROM users WHERE email = :EMAIL");
    $query->bindParam(":EMAIL", $email);
    $result = $query->execute();
    if($result){
        $data = $query->fetch();
        if(isset($data['email'])) $EmailAlreadyExists = true;
    }else  "Erro na execução da consulta no momento de cadastro";//Não está relacionado com erro na hora de escolher um usuario q nao existe

    //Se usuárioo ou email já existem no banco de dados
    if($UserAlreadyExists || $EmailAlreadyExists){
        $message = "";
        if($UserAlreadyExists) $message .= "errorUserExists=1&";
        if($EmailAlreadyExists) $message .= "errorEmailExists=1";
        header('Location: index.php?'.$message);
        die();//encerro o script
    }
    
    $query = $conection->prepare("INSERT INTO users (userName, email, password) VALUES(:USER, :EMAIL, :PASSWORD) ");

    $query->bindParam(":USER", $user);
    $query->bindParam(":EMAIL", $email);
    $query->bindParam(":PASSWORD", $password);

    $query->execute();

    session_start();
    $_SESSION['userName'] = $user['userName'];
    header("Location: profile.php");


?>