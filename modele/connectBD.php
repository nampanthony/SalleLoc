<?php

    $hostname = "localhost";
    $base = "BDDMatp";
    $loginBD = "root";
    $passBD = "root";
    //$pdo = null;

    try {

        $pdo = new PDO ("mysql:server=$hostname; dbname=$base", "$loginBD", "$passBD");
        //die('OK connexion')
    }
    catch (PDOException $e) {
        die ("Echec de connexion : " . utf8_encode($e->getMessage()) . "\n");
    }


?>