<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paiement de la commande</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
    $page='commande_paiement';
    require_once ("includes/nav.inc.php");
    require_once ("includes/init.inc.php");
    require_once ("includes/functions.inc.php");
    $total = end($_SESSION['total']) * 100;
    ?>
</header>

<main class="width-80 marg-auto">
    <h1 class="center-align engras">Vos coordonnées bancaires</h1>
   <div class="row">
        <p>Vos informations bancaires font l'objet d'un traitement unique et sécurisé, elles ne seront pas stockées au delà des délais nécessaires à la transaction, conformément à la Réglementation Générale de Protection des Données en vigueur le 18 mai 2018.</p>
   </div>


    <div class="row">

    <div class="container">
                <form action="paiement_client.php" method="POST" class="flex-col flex-c-c">
                    <!-- Pour data-description : faire correspondre à <?php //table produits -> description ?> -->
                    <!-- Pour data-amount : faire correspondre à <?php //table produits -> prix ?> -->
                    <!-- Pour data-zip-code : faire correspondre à <?php //true or false en fonction de !empty et si la ville/code_postal correspondent au profil client ?> -->
                    <!-- Pour data-billing-address : faire correspondre à <?php //true or false en fonction de !empty et si l'adresse correspond au profil client ?> -->
                    <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_H3FXczfUJv1gO1Nj197RZkt5"
                            data-amount="<?= $total ?>"
                            data-name="Amado.fr"
                            data-description="Widget"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto"
                            data-currency="eur"
                            data-zip-code="true"
                            data-billing-adress="true">
                    </script>
                </form>
        </div>
    </div>
</main>
</body>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script>
    Stripe.setPublishableKey('pk_test_H3FXczfUJv1gO1Nj197RZkt5')
    var $form = $('#payment-form')
    $form.submit(function (e) {
        e.preventDefault()
        $form.find('button').attr('disabled', true)
        Stripe.card.createToken($form, function(status, response) {
           if(response.error) {
               $form.find('.message').remove();
               $form.prepend('<div class="card red lighten 5"<p>' . response.error.message + '</p></div>');
           } else {
               var token = response.id
               $form.append($('<input type="hidden" name="stripeToken">').val(token))
               $form.get(0).submit()
           } 
        })  
    })
    </script>
<script src="script.js"></script>
<script src="https://js.stripe.com/v3/"></script>
</html>