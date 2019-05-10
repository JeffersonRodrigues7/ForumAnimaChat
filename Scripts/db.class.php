<?php

    class db{

        function getConnection(){
            $dns = 'mysql:host=localhost;dbname=AnimaChat;charset=utf8';
            //Passamos o tipo de banco MYSQL, PostGress, o host e o nome do banco, e o charset que nos permite
            //colocar acentos
            $username = 'root';
            $password = '';

            try{
                $pdo = new PDO($dns, $username, $password);
                return $pdo;
            } catch(PDOException $e){
                echo "Erro: ", $e->getMessage();
            }
        }

    }

?>