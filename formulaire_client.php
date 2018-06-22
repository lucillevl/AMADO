<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire ajout client</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <?php
    $page='formulaire_client';
    require_once ("includes/nav.inc.php");
    require_once('includes/init.inc.php');

    ?>
</header>
<main class="width-80 marg-auto">
    <h1 class="center-align  engras">Création de son compte client</h1>

    <form action="ajout_client.php" method="post" class="flex-col flex-c-c">
        <div class="flex flex-a-c width-100">
            <div class="input-field width-50 width-100-mob">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom">
            </div>
            <div class="input-field width-50 margin-left-50px no-marg-mob width-100-mob">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom">
            </div>
        </div>

        <div class="flex flex-a-c width-100">
            <div class="input-field width-50 width-100-mob">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="input-field width-50 margin-left-50px no-marg-mob width-100-mob">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password">
            </div>
           
         </div>
        <div class="input-field width-100">
            <label for="adresse">Adresse</label>
            <input type="text" id="adresse" name="adresse">
        </div>

        <div class="flex flex-a-c width-100">
            <div class="input-field width-50 width-100-mob">
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville">
            </div>
            <div class="input-field width-50 margin-left-50px no-marg-mob width-100-mob">
                <label for="code_postal">Code postal</label>
                <input type="text" id="code_postal" name="code_postal">
            </div>
         </div>
        <div class="input-field width-100">
            <label for="date_naissance">Date de naissance</label><br>
            <input type="date" id="date_naissance" name="date_naissance" placeholder="AAAA/MM/JJ">
        </div>

        <input type="submit" class="btn marron-bg marg-top-30" name="ajouter" value="Créer son compte">

    </form>
</main>
</body>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="script.js"></script>
</html>