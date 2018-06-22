<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire de livraison</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://js.stripe.com/v3/"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116153416-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-116153416-1');
    </script>

</head>
<body>
<header>
    <?php
    $page='formulaire_client';
    require_once ("includes/nav.inc.php");

if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header("location:panier.php");
    $_SESSION['connexion_ob'][] = 'Vous devez vous conneter avant de procéder au paiement';
}


    $type = '';

    if(isset($_SESSION['admin'])){
        $type = 'admin';
    } else{
        $type = 'user';
    }


    ?>
</header>
<main class="width-80 marg-auto">
    <h1 class="center-align  engras">Confirmer les informations de livraison</h1>
    <form action="ajout_commande.php" method="post" class="flex-col flex-c-c">
        <div class="flex flex-a-c width-100">
            <div class="input-field width-50 margin-right-50px">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Votre nom" value ="<?=$_SESSION[$type]['prenom']?>" required>
            </div>

            <div class="input-field width-50">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Votre nom" value ="<?=$_SESSION[$type]['nom']?>" required>
            </div>
        </div>
        <div class="input-field width-100">
                <label for="adresse">Adresse de livraison</label>
                <input type="text" id="adresse" name="adresse" placeholder="20 rue des myrtilles" value="<?=$_SESSION[$type]['adresse']?>" required>
        </div>
         <div class="input-field width-100">
                <label for="email">Email de suivi commande</label>
                <input type="email" id="email" name="email" placeholder="rogerrabbit@mail.com" value="<?=$_SESSION[$type]['email']?>">
        </div>
         <div class="flex flex-a-c width-100">
            <div class="input-field width-50">
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville" value="<?=$_SESSION[$type]['ville']?>">
            </div>
            <div class="input-field width-50 margin-left-50px">
                <label for="code_postal">Code postal</label>
                <input type="text" id="code_postal" name="code_postal" required value="<?=$_SESSION[$type]['code_postal']?>">
            </div>
         </div>
        <div class="input-field width-100">
            <label for="date_naissance">Date de naissance</label>
            <br>
            <input type="date" id="date_naissance" name="date_naissance" required value="<?=$_SESSION[$type]['date_naissance']?>">
        </div>
        
        <p>
            <button type="submit" name="stripe" src="https://js.stripe.com/v3/" class="btn marron-bg marg-top-30">Payer avec Stripe</button>
          <form action="commande_paiement_paypal.php" method="post" class="flex-col flex c-c">
            <button type="submit" name="paypal" class="btn marron-bg marg-top-30">Payer avec Paypal</button>
        </form>
        </p>
    </form>
</main>
</body>

<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="script.js"></script>
</html>