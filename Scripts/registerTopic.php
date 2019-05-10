<?php

    session_start();

    require_once("db.class.php");
    $database = new db();//Cria "objeto" database
    $conection = $database->getConnection();//pega a connection

    $user = $_SESSION['userName'];
    $title = $_POST['title'];
    $firstText = $_POST['firstText'];
    $query = $conection->prepare("INSERT INTO topics(title, userName, firstText) VALUES(:TITLE, :USER, :TEXT) ");

    $query->bindParam(":TITLE", $title);
    $query->bindParam(":USER", $user);
    $query->bindParam(":TEXT", $firstText);

    $query->execute();

    $idtopic = $conection->lastInsertId(); //Pego o id do tópico criado, agora vou adicionar o primeiro texto nas mensagens

    //Agora vou registar a primeira mensagem
    $query = $conection->prepare("INSERT INTO messages(idtopic, texts, userName) VALUES(:IDTOPIC, :TEXTS, :USERNAME) ");
    $query->bindParam(":TEXTS", $firstText);
    $query->bindParam(":IDTOPIC", $idtopic);
    $query->bindParam(":USERNAME", $user);
    $query->execute();

    header("Location: index.php");

?>