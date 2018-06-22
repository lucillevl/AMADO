<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Votre panier</title>
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
    <!--INCLUDE NAV BARRE-->
    <?php
    $page = 'panier';
    require_once('includes/nav.inc.php');
    require_once('includes/init.inc.php');
    require_once('includes/functions.inc.php');

$rand = $pdo->query("SELECT * FROM produits ORDER BY  RAND() LIMIT 3");
$random = $rand->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($_GET['action']) && $_GET['action'] === 'empty_cart') {
        unset($_SESSION['cart']);
    }

    // suppresion d'un produit du panier
    if(!empty($_GET['suppr']) && is_numeric($_GET['suppr'])) {
        deleteFromCart($_GET['suppr']);
    }


    if(!empty($_SESSION['cart'])) {
        $nbreProduitsDansPanier = count($_SESSION['cart']['id']);

        $totalPanier = 0; // j'initialise une variable a 0 qui va contenir mon total panier additionné

    }
    ?>
</header>

<main>
    <section>
        <div class="row">
            <div class="col l8 s12 flex-col height-auto">
                <h1 class="engras">Mon panier</h1>
                <?php if(!empty($_SESSION['connexion_ob'])){
                        echo "<p class='engras red-text'>".$_SESSION['connexion_ob'][0]."</p>";
                         unset($_SESSION['connexion_ob']);
                }?>
                <hr class="width-100 marg-bot-30">
                <div class="row">
                <?php
                if(!empty($_SESSION['cart'])) :
                    for ( $i = 0; $i < $nbreProduitsDansPanier; $i ++ ) :

                    // a chaque tour de boucle, jaditionne le prix total produit au total du panier
                    $totalPanier += $_SESSION['cart']['prix_total_produit'][ $i ];

                ?>

                    <div class="flex flex-a-c  col l12">

                        <?php $tabPhotos = unserialize($_SESSION['cart']['image'][ $i ]); ?>
                        <img src="<?='photos/photo_produit/' . $tabPhotos[0] ?>" alt="" class="col l3 s12">

                        <div class="margin-left-50px width-50 col l6 s12">
                            <h5><?= $_SESSION['cart']['titre'][ $i ] ?></h5>
                            <p>Réf: <?= $_SESSION['cart']['reference'][ $i ] ?></p>
                            <p>Quantité: <?= $_SESSION['cart']['quantite'][ $i ] ?></p>
                            <p class="vert">En stock</p>
                            <div class="flex flex-b-c">
                                <p class="engras"><?= $_SESSION['cart']['prix_unitaire'][ $i ] ?>€</p>
                            </div>
                        </div>
                        <div><a href="?suppr=<?=$_SESSION['cart']['id'][ $i ]?>" class="btn marron-bg"><i class="material-icons">delete</i></a></div>

                    </div>

                <?php 

                endfor; 
                endif;
                ?>

            </div>

            </div>
            <div class="col l3  s12 margin-left-50px  marg-top-30  no-marg-mob">
                <div class="brown lighten-5 pad-20">
                    <h5>Récapitulatif</h5>
                    <hr class="width-100">
                    <?php

                if(!empty($_SESSION['cart'])) :
                    for ( $i = 0; $i < $nbreProduitsDansPanier; $i ++ ) :?>

                        <div class="flex-b-c flex">
                            <p><?=$_SESSION['cart']['titre'][ $i ]?></p>
                            <p><?= $_SESSION['cart']['prix_total_produit'][ $i ] ?>€</p>
                        </div>
                    <?php endfor;
                    endif; ?>
                    <div class="flex-b-c flex">
                        <h5 class="engras">TOTAL</h5>
                        <h5><?php 
                        if(isset($totalPanier)){ 
                            echo $totalPanier;
                            $_SESSION['total'][] =$totalPanier;
                        } else{
                            echo "0";
                        }
                        ?>€</h5>
                    </div>


                    <button class="marron-bg btn width-100 marg-top-30 marg-bot-30"><a href="commande_adresse.php" class="white-text">Passer commande</a></button>
                    <div class="flex flex-c-c">
                        <a href="?action=empty_cart" class="marron-text engras center-align">Vider le panier</a>
                    </div>
                </div>

                
                <div class="paiement-div pad-10 marg-top-20px">
                    <h5 class="no-marg">Modes de paiement</h5>
                    <div class="flex marg-top-20px flex-mob">
                        <img src="photos/stripe-payment-icon.png" class="paiement width-100px margin-left-20px" alt="stripe-mastercard-ae-visa">
                        <img src="photos/paypal-pay.png" class="paiement width-100px margin-left-20px" alt="stripe-mastercard-ae-visa">
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section>
        <h4 class="center-align engras">Complétez votre déco avec ...</h4>

        <div class="row ">
            <?php foreach ($random as $key=>$value):?>
            <div class=" col s4 height-350px flex-col flex-c-c">
                <a href="detail_produit.php?id=<?=$value['id_produits']?>">
                    <?php $tabPhotos = unserialize($value['image']); ?>
                    <img src="<?='photos/photo_produit/' . $tabPhotos[0] ?>" alt="" class="produit-photo-mini">
                </a>
                <p class="marron-text"><?=$value['titre']?></p>
                <p class="prix"><?=$value['prix']?> €</p>
            </div>
            <?php endforeach;?>
        </div>

    </section>

    <section class=" width-100 height-70">
        <div class="flex flex-a-c height-200px lighten-1 grey pad-20">
            <div class="flex-col flex-c-c">
                <img src="photos/phone-call.png" alt="">
                <p class="white-text engras">Service client</p>
                <p class="white-text">080 89 47 56</p>
            </div>
            <div class="flex-col flex-c-c">
                <img src="photos/help.png" alt="">
                <p class="white-text engras">Aide et FAQ</p>
                <p class="white-text">En ligne</p>
            </div>
            <div class="flex-col flex-c-c">
                <img src="photos/credit-card.png" alt="">
                <p class="white-text engras">Paiement sécurisé</p>
                <p class="white-text">Mastercard/Visa/Paypal</p>
            </div>
            <div class="flex-col flex-c-c">
                <img src="photos/return.png" alt="">
                <p class="white-text engras">Retours gratuits</p>
                <p class="white-text">Pendant 14 jours</p>
            </div>
        </div>
    </section>
</main>


<!-- FIN INCLUDE NAV BARRE-->
<?php
require_once('includes/footer.inc.php');?>
<!-- FIN INCLUDE FOOTER-->
</body>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="script.js"></script>


</html>