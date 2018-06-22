<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détail du produit</title>
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
    $page = 'detail_produit';
    require_once('includes/nav.inc.php');
    require_once('includes/init.inc.php');
    require_once('includes/functions.inc.php');

    $detail = selectOne('produits', $_GET['id']);

    $tabPhotoProduit = unserialize($detail['image']);

    ?>
</header>
<main>
    <section class="marg-top-30">
        <div class="row">
            <div class="col l6 s12  flex-col flex-c-c height-80 height-mob-auto">
                <div class="carousel carousel-slider " data-indicators="true">
                    <?php foreach($tabPhotoProduit as $key => $value) : ?>
                        <a class="carousel-item" href="#"><img src="photos/photo_produit/<?=$value?>"></a>

                    <?php endforeach ; ?>
                </div>
            </div>
            <div class="col l6 s12">
            <h1 class="engras center-align"><?=$detail['titre']?></h1>
                <a href="#description_produit" class="marron-text engras savoir-plus" id="ancre">En savoir plus</a>
                <p class="prix"><?=$detail['prix']?>€</p>
                <p>Référence : <?=$detail['reference']?></p>

                <form action="ajout_panier.php" method="post">
                    <div class="flex flex-c-c ">
                        <input type="hidden" name="id_produits" value="<?=$detail['id_produits']?>">
                        <select name="quantite" id="" class="col l3 s12 no-pad">
                            <?php for($i = 1; $i <= intval($detail['quantite_stock']); $i++) :?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor ?>
                        </select>
                        <input type="submit" class="btn col s12 l8 offset-l1 marron-bg" value="Ajouter au panier">
                    </div>
                </form>
                <div class="col l8 offset-l4  s12 no-pad marg-top-30 marg-bot-30">
                    <a href="#" class="flex flex-c-c marron-text"><i class="material-icons margin-right-20px">favorite_border</i>Ajouter à la wishlist</a>
                </div>
                <hr class="marg-top-30" />
                <p class="vert "><i class="material-icons">check</i> En stock</p>
                <div class=" brown lighten-5 pad-10 flex-col flex-j-c height-150px height-mob-auto">
                    <p class="engras no-marg">Frais de livraison estimés</p>
                    <div class="flex flex-b-c no-marg">
                        <p>À domicile</p>
                        <p class="prix">20€</p>
                    </div>
                    <p class="no-marg">Plus d'information sur les <a href="#" class="marron-text">livraisons et sur les retours</a></p>

                </div>
            </div>
        </div>
    </section>

    <section class="flex-col flex-c-c">
        <h4 class="center-align" id="description_produit">Description</h4>
        <p class="texte-justifie width-50 marg-top-30">
            <?=$detail['description']?>
        </p>
    </section>
<?php if ($detail['type'] == 'kit'):?>
    <section class="marg-top-30 marg-bot-30 flex-col flex-c-c">
        <h4 class="center-align">Tutos</h4>
        <iframe width="90%" height="560" src="<?=$detail['video']?>" frameborder="1" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </section>

    <section class="marg-top-30 marg-bot-30 flex-col flex-c-c">
        <h4 class="center-align">Conditions de sécurité</h4>
        <p class="texte-justifie width-50 marg-top-30">
            Mettez des gants et lunettes de protection lorsque vous coupez, poncez des matériaux.
        </p>
        <p class="texte-justifie width-50 marg-top-30">
            Mettez une bache de protection sur la surface de travail avant de couper, peindre ou laquer des matériaux.
        </p>
        <p class="texte-justifie width-50 marg-top-30">
            Protégez les surfaces lorsque vous poncez du bois ou du métal chez vous.
        </p>
        <p class="texte-justifie width-50 marg-top-30">
            Vérifiez avant utilisation que vous n'avez pas d'allergies aux peintures / colles que nous pouvons fournir dans nos kits.
        </p>
        <p class="texte-justifie width-50 marg-top-30">
            Laissez le matériel de bricolage hors de portée des enfants et animaux.
        </p>
        <p class="texte-justifie width-50 marg-top-30">
            Ne laissez pas les kits et le matériel en extérieur, le conserver à l'abri de l'humidité et du froid.
        </p>
    </section>
  <?php endif; ?>
</main>
<?php
require_once('includes/footer.inc.php');?>
<!-- FIN INCLUDE FOOTER-->
</body>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="script.js"></script>
</html>