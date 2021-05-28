<?php
    // Ouverture session
    session_start();
    date_default_timezone_set('Indian/Antananarivo');

    if((count($_GET)!=0) && !(isset($_GET['controle']) && isset($_GET['action'])))
        require ('./vue/message/erreur404.tpl');
    else {
        if (count($_GET) == 0) {
            include ('vue/utilisateur/accueil.tpl');
        }
        else {
            if (isset($_GET['controle']) && isset($_GET['action'])) {
                $controle = $_GET['controle']; // Cas d'un appel à index.php
                $action = $_GET['action']; // Avec les 2 paramètres controle et action
            }
            require ('./controle/' . $controle . '.php'); 
            $action(); // On execute la fonction dont le nom est dans la variable $action
        }
    }
?>