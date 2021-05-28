<?php
function verif_ident($nom, $mdp, &$profil) {
    //connexion au serveur de BD -> voir fichier connectBD.php
    //requete select en BD -> voir fin cours PDO -> requete paramétrée
    require ("connectBD.php"); 
    $sql = "SELECT * FROM entreprise where nomEnt=:nom and mdpEnt=:mdp";
    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':nom', $nom, PDO::PARAM_STR);
        $commande->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $commande->execute();
        
        if ($commande->rowCount() > 0) { //compte le nombre d'enregistrement
            $profil = $commande->fetch(PDO::FETCH_ASSOC); //svg du profil
            return true;
        }
        else {
            return false;
        }
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); // On arrête tout
    }
// return true ou false; suivant le cas
}

function newReservation ($dateD, $dateF, $title, $url, $descri, $nomU, &$profil) {
    require ("connectBD.php");
    $sql = "INSERT INTO Calendrier(start, end, title, url , description, nom_url) 
    VALUES(:dateD, :dateF, :title, :url, :descri, :nomU)";

    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':dateD', $dateD, PDO::PARAM_STR);
        $commande->bindParam(':dateF', $dateF, PDO::PARAM_STR);
        $commande->bindParam(':title', $title, PDO::PARAM_STR);
        $commande->bindParam(':url', $url, PDO::PARAM_STR);
        $commande->bindParam(':descri', $descri, PDO::PARAM_STR);
        $commande->bindParam(':nomU', $nomU, PDO::PARAM_STR);
        $commande->execute();

        if ($commande->rowCount() > 0) { 
            $profil = $pdo->lastInsertId();
            return true;
        }
        else {
            return false;
        }
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); // On arrête tout
    }
}

function verif_dispo ($dateD, $dateF, &$profil) {
    require ("connectBD.php"); 
    $sql = "SELECT * FROM Calendrier where start=:dateD and end=:dateF";
    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':dateD', $dateD, PDO::PARAM_STR);
        $commande->bindParam(':dateF', $dateF, PDO::PARAM_STR);
        $commande->execute();
        
        if ($commande->rowCount() > 0) { //compte le nombre d'enregistrement
            $profil = $commande->fetch(PDO::FETCH_ASSOC); //svg du profil
            return true;
        }
        else {
            return false;
        }
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); // On arrête tout
    }
}

function get_TypeEntreprise($IdEnt){
    require ("connectBD.php");
    $sql="SELECT typeEnt FROM entreprise  where IdEnt=$IdEnt";
    try{
        $commande = $pdo->prepare($sql);
        $commande->execute();
        $types = $commande->fetch();
        return $types[0];
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die();
    }
}
?>