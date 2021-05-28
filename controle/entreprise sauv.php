<?php
// Fonction qui permet à un client de se connecter
function connexion(){
    require_once ('modele/entrepriseBD.php'); 
    $nom = isset($_POST['nom'])?($_POST['nom']):'';
    $mdp = isset($_POST['mdp'])?($_POST['mdp']):'';
    $msg = '';

    if (count($_POST) == 0) {
        $msg = '';
        require ("vue/utilisateur/connexion.tpl");
    }
    else {
        $profil = array();
        if (!verif_ident($nom, ($mdp), $profil)) {
            $msg = "Nom ou Mot de passe incorrect";
            erreurMsg($msg);
            require ("vue/utilisateur/connexion.tpl");
        }
        else { 
            $_SESSION['IdEnt'] = $profil['IdEnt'];
            $nexturl = "index.php?controle=entreprise&action=accueil";
            header("Location:" . $nexturl); // On retourne à la page index !!!
        }
    }
}

// Fonction qui renvoie le bon tpl suivant le type de la personne dans l'entreprise
function accueil(){
    if(strcmp(get_Type(), "Administrateur")==0){
        accueilAdministrateur();
    }
    if(strcmp(get_Type(), "Client")==0){
        accueilClient();
    }
}

// Génération de l'accueil de la page admin
// Fonction permettant d'afficher la page d'acceuil pour l'admin
function accueilAdministrateur() {
    $IdE = $_SESSION['IdEnt'];
    require ('vue/administrateur/accueil.tpl');
}

// Génération de l'accueil de la page client
// Fonction permettant d'afficher la page d'acceuil pour les clients
function accueilClient() {
    $IdE = $_SESSION['IdEnt'];
    require ('vue/client/accueil.tpl');
}

/*
* Problème sur la redirection (function accueil n'arrive pas à afficher le bon accueil selon le type)
* Solution : spécifier directement la page d'acceuil à appeler dans $nexturl
*
*/

function reservationClient() {
    require_once ('modele/entrepriseBD.php');
    $dateD = isset($_POST['dateD'])?($_POST['dateD']):'';
    $dateF = isset($_POST['dateF'])?($_POST['dateF']):'';
    $title = isset($_POST['title'])?($_POST['title']):'';
    $url = isset($_POST['url'])?($_POST['url']):'';
    $descri = isset($_POST['descri'])?($_POST['descri']):'';
    // $backC = isset($_POST['backC'])?($_POST['backC']):'';
    // $borderC = isset($_POST['borderC'])?($_POST['borderC']):'';
    // $textC = isset($_POST['textC'])?($_POST['textC']):'';
    $nomU = isset($_POST['nomU'])?($_POST['nomU']):'';
    $msg = '';

    if (count($_POST) == 0)
        require_once ('vue/client/reservation.tpl');
    else {
        $profil = array();
        if(!empty($dateD) && !empty($dateF) && !empty($title) && !empty($url) && !empty($descri) 
        && !empty($nomU)) {
            if(newReservation($dateD, $dateF, $title, $url, $descri, $nomU, $profil)) {
                $_SESSION['IdEnt'] = $profil;
                $nexturl = "index.php?controle=entreprise&action=accueilClient";
                header("Location:" . $nexturl);
            }
            else {
                $msg = "Erreur de saisie";
                erreurMsg($msg);
                include ('vue/client/reservation.tpl');
            }
        }
    }
}

// Fonction qui permet d'effectuer une réservation dans l'espace client
// function reservationClient() {
//     require_once ('modele/entrepriseBD.php');
//     $dateD = isset($_POST['dateD'])?($_POST['dateD']):'';
//     $dateF = isset($_POST['dateF'])?($_POST['dateF']):'';
//     $title = isset($_POST['title'])?($_POST['title']):'';
//     $url = isset($_POST['url'])?($_POST['url']):'';
//     $descri = isset($_POST['descri'])?($_POST['descri']):'';
//     $backC = isset($_POST['backC'])?($_POST['backC']):'';
//     $borderC = isset($_POST['borderC'])?($_POST['borderC']):'';
//     $textC = isset($_POST['textC'])?($_POST['textC']):'';
//     $nomU = isset($_POST['nomU'])?($_POST['nomU']):'';
//     $msg = '';

//     if (count($_POST) == 0)
//         require_once ('vue/client/reservation.tpl');
//     else {
//         $profil = array();
//         if(!empty($dateD) && !empty($dateF) && !empty($title) && !empty($url) && !empty($descri) 
//         && !empty($backC) && !empty($borderC) && !empty($textC) && !empty($nomU)) {
//             if(newReservation($dateD, $dateF, $title, $url, $descri, $backC, $borderC, $textC, $nomU, $profil)) {
//                 $_SESSION['IdEnt'] = $profil;
//                 $nexturl = "index.php?controle=entreprise&action=accueilClient";
//                 header("Location:" . $nexturl);
//             }
//             else {
//                 $msg = "Erreur de saisie";
//                 erreurMsg($msg);
//                 include ('vue/client/reservation.tpl');
//             }
//         }
//     }
// }


// -------------------------------------------------------------------------------------------------------------------------------------

// function reservationClient() {
//     require_once ('modele/entrepriseBD.php');
//     $title = isset($_POST['title'])?($_POST['title']):'';
//     $dateD = isset($_POST['dateD'])?($_POST['dateD']):'';
//     $dateF = isset($_POST['dateF'])?($_POST['dateF']):'';
//     $msg = '';

//     if (count($_POST) == 0) 
//         require_once ('vue/client/reservation.tpl');
//     else {
//         $profil = array();
//         if(!verif_dispo($dateD, $dateF, $profil)) {    // Vérification créneau horaire avec dateD et dateF (fonction à améliorer)
//             if(!empty($title) && !empty($dateD) && !empty($dateF)){ // Si tous les champs sont correctement remplis
//                 if(newReservation($title, $dateD, $dateF, $profil)) { // Insertion des données sur le calendrier
//                     $_SESSION['IdEnt'] = $profil;
//                     $nexturl = "index.php?controle=entreprise&action=accueilClient";
//                     header("Location:" . $nexturl);
//                 }
//             }
//             else {
//                 $msg = "Erreur de saisie";
//                 erreurMsg($msg);
//                 include ('vue/client/reservation.tpl');
//             }
//         }
//         else {
//             $msg = "Créneau non disponible";
//             erreurMsg($msg);
//             require ('vue/client/reservation.tpl');
//         }
//     }
// }
// -------------------------------------------------------------------------------------------------------------------------------------

// Fonction qui permet d'effectuer une réservation dans l'espace administrateur
// function reservationAdministrateur() {
//     require_once ('modele/entrepriseBD.php');
//     $title = isset($_POST['title'])?($_POST['title']):'';
//     $dateD = isset($_POST['dateD'])?($_POST['dateD']):'';
//     $dateF = isset($_POST['dateF'])?($_POST['dateF']):'';
//     $msg = '';

//     if (count($_POST) == 0) 
//         require_once ('vue/administrateur/reservation.tpl');
//     else {
//         $profil = array();
//         if(!verif_dispo($dateD, $dateF, $profil)) {    
//             if(!empty($title) && !empty($dateD) && !empty($dateF)){
//                 if(newReservation($title, $dateD, $dateF, $profil)) {
//                     $_SESSION['IdEnt'] = $profil;
//                     $nexturl = "index.php?controle=entreprise&action=accueilAdministrateur";
//                     header("Location:" . $nexturl);
//                 }
//             }
//             else {
//                 $msg = "Erreur de saisie";
//                 erreurMsg($msg);
//                 include ('vue/administrateur/reservation.tpl');
//             }
//         }
//         else {
//             $msg = "Créneau non disponible";
//             erreurMsg($msg);
//             require ('vue/administrateur/reservation.tpl');
//         }
//     }
// }

// Fonction qui renvoie le type de l'entreprise qui vient de se connecter (Client ou Administrateur)
function get_Type() {
    require_once ("modele/entrepriseBD.php");
    $types = get_TypeEntreprise($_SESSION['IdEnt']);
    return $types;
}
// Fonction qui s'affiche après la détéction d'une erreur
function erreurMsg($msg) {
    $message = $msg;
    include('vue/message/erreurMess.tpl');
}

// Fonction qui permet de nettoyer la variable session et qui ramène à l'accueil non connecté
function deconnexion() {
    unset($_SESSION['IdEnt']);
    $nexturl = "index.php";
    header("Location:" . $nexturl); // On retourne à la page index
}
?>