<!doctype html>
<html lang="fr">
    <head>
        <title>Service Administrateur</title>
        <meta charset="utf-8">
        <!-- Fichiers CSS -->
        <link rel="stylesheet" href="controle/fullcalendar/core/main.css">
        <link rel="stylesheet" href="controle/fullcalendar/daygrid/main.css">
        <link rel="stylesheet" href="controle/fullCalendar/timegrid/main.css">
        <link rel="stylesheet" href="controle/fullCalendar/list/main.css">
        <link rel="stylesheet" href="vue/styleCSS/page/entreprise.css">
        <link rel="stylesheet" href="vue/styleCSS/page/calendrier.css">

        <!-- Fichiers JS -->
        <script src="controle/fullCalendar/core/main.js"></script>
        <script src="controle/fullCalendar/daygrid/main.js"></script>
        <script src="controle/fullCalendar/timegrid/main.js"></script>
        <script src="controle/fullCalendar/list/main.js"></script>
        <script src="vue/js/scripts.js"></script>

    </head>

    <header>
        <h1> Bienvenue dans votre Espace Administrateur </h1> 
        <ul>
            <li>

            <form action="index.php?controle=entreprise&action=accueil" method="post"> 
            <input id="input-accueil" type="submit" value=Accueil></form>

            </li>
            <li>

            <form action="index.php?controle=entreprise&action=reservationAdministrateur" method="post">
            <input id="input-reservation" type="submit" value="Effectuer une réservation"></form>

            </li>
            <li>

            <form action="index.php?controle=entreprise&action=contacter" method="post">
            <input id="input-contacter" type="submit" value="Nous contacter"></form>

            </li>
            <li>
            
            <form action="index.php?controle=entreprise&action=deconnexion" method="post">
            <input id="input-Deconnexion" type="submit" value="Déconnexion"></form>
            
            </li>
        </ul>
    </header>
    <body>
        <div id="calendrier"></div>
    </body>    
</html>
