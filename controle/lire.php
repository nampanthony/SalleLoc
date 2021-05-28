<?php
header('content-Type: application/json');

    $hostname = "localhost";
    $base = "BDDMatp";
    $loginBD = "root";
    $passBD = "root";

try {

    $pdo = new PDO ("mysql:server=$hostname; dbname=$base", "$loginBD", "$passBD");
    $retour["success"] = true;
    $retour["message"] = "Connexion à la base de donnée réussie";
}
catch (Exception $e) {
    $retour["success"] = false;
    $retour["message"] = "Connexion à la base de donnée impossible";
}

// if(!empty($_POST["ville_depart"])) {
//     $requete = $pdo->prepare("SELECT * FROM `Vols` WHERE `ville_depart` LIKE :v");
//     $requete->bindParam(':v', $_POST["ville_depart"]);
//     $requete->execute();  
// }
// else {
//     $requete = $pdo->prepare("SELECT * FROM `Vols`");
//     $requete->execute();
// }

$requete = $pdo->prepare("SELECT * FROM `Calendrier`");
$requete->execute();
$resultats = $requete->fetchAll();

// $retour["success"] = true;
// $retour["message"] = "Voici la liste des évènements";
// $retour["results"]["nb"] =  count($resultats);
// $retour["results"]["vols"] = $resultats;


echo json_encode($resultats);
?>