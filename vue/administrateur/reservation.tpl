<!doctype html>
    <html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>Réservation</title>
        <link rel="stylesheet" href="vue/styleCSS/page/inscription.css">
    </head>

    <body>
        <form action="index.php?controle=entreprise&action=reservationAdministrateur" method="post">
            <div class="formulaire">
                <h2 class="titre"> Réservation Administrateur</h2>
                <div class="contenu">
                    <div class="dateD">
                        <label for=""> Date début </label>
                        <input type="datetime-local" name="dateD">
                    </div>

                    <div class="dateF">
                        <label for=""> Date fin </label>
                        <input type="datetime-local" name="dateF">
                    </div>

                    <div class="title">
                        <label for=""> Titre évènement </label>
                        <input type="text" name="title" placeholder="Insérer le titre">
                    </div>

                    <div class="url">
                        <label for=""> url évènement </label>
                        <input type="url" name="url" placeholder="Insérer l'url">
                    </div>

                    <div class="descri">
                        <label for=""> Description </label>
                        <input type="text" name="descri" placeholder="Décrivez l'évènement">
                    </div>

                    <!-- <div class="">
                        <label for=""> Couleur de fond</label>
                        <input type="text" name="backC" placeholder="Code couleur fond">
                    </div>

                    <div class="">
                        <label for=""> Bordure </label>
                        <input type="text" name="borderC" placeholder="Code couleur bordure">
                    </div>

                    <div class="">
                        <label for=""> Couleur text </label>
                        <input type="text" name="textC" placeholder="Code couleur text">
                    </div> -->

                    <div class="nomU">
                        <label for=""> Nom url </label>
                        <input type="text" name="nomU" placeholder="Insérer le nom de l'url">
                    </div>

                    <div class="button-end">	 
                        <input type="button" id="Bretour" value="Retour" onclick="history.go(-1)">	 
                        <input type= "submit"  id="Bvalider" value="Réservation">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>