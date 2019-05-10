<?php

    session_start();

    require_once("db.class.php");
    $database = new db();//Cria "objeto" database
    $conection = $database->getConnection();//pega a connection

    $text = nl2br($_POST['texts']);
    $idtopic =  $_SESSION['idtopic'];
    $user = $_SESSION['userName'];

    $query = $conection->prepare("INSERT INTO messages(idtopic, texts, userName) VALUES(:IDTOPIC, :TEXTS, :USERNAME) ");

    $query->bindParam(":TEXTS", $text);
    $query->bindParam(":IDTOPIC", $idtopic);
    $query->bindParam(":USERNAME", $user);

    $query->execute();

    header("Location: topic.php?topic=$idtopic");

?>