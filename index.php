<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
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
<body class="page-accueil">
<header class="height-80">
<!--INCLUDE NAV BARRE-->
    <?php
    $page = 'accueil';
    require_once('includes/nav.inc.php');
    require_once('includes/init.inc.php');
    require_once('includes/functions.inc.php');

    $article = $pdo->query("SELECT * FROM articles ORDER BY id_articles DESC LIMIT 1");
    $articles = $article->fetch(PDO::FETCH_ASSOC);


    $rand = $pdo->query("SELECT * FROM produits ORDER BY  RAND() LIMIT 6");
$random = $rand->fetchAll(PDO::FETCH_ASSOC);

    ?>
<!-- FIN INCLUDE NAV BARRE-->


    <div class=" flex-col flex-c-c height-70">
        <div class="flex flex-c-c marg-bot-30-mob">
        <h1 class="center-align white-text">20%</h1>
       <div class="flex-col left-align white-text">
           <p class="no-marg title margin-left-20px center-align-mob">Remise</p>
           <p class="no-marg margin-left-20px center-align-mob">sur meubles de chambre</p>
       </div>
        </div>
        <button class="orange btn btn-waves btn-light">ACHETER</button>
    </div>
</header >
<main>
    <section class="flex-col brown lighten-5 height-80 valign-wrapper height-mob-auto">
        <h2 class="center-align">Ama'Do</h2>
        <img src="photos/infographie.png" alt="" class="width-30 hide-on-med-and-down">
        <div class="flex flex-a-c width-80 center-align marg-top-30 marg-bot-30 row">
            <div class="white width-250px flex-col flex-a-c pad-10 marg-bot-30-mob">
               <p class="title">Conseils</p>
                <p class="texte-justifie">Avec la mise en place de tutoriels, plans de montage, utilisez la réalité virtuelle pour de nouveaux  d’agencement</p>
            </div>
            <div class="white width-250px flex-col flex-a-c pad-10 marg-bot-30-mob">
               <p class="title">Partenariats</p>
                <p class="texte-justifie">Accords avec des écoles, des déchetteries et autres infrastructures sensibles de nous procurer des déchets à exploiter.</p>
            </div>
            <div class="white width-250px flex-col flex-a-c pad-10 marg-bot-30-mob">
               <p class="title">Écologie</p>
                <p class="texte-justifie">Ama’Do s'engage pour préserver l’environnement grâce aux déchets recyclés pour donner une seconde vie aux meubles.
                </p>
            </div>
            <div class="white width-250px flex-col flex-a-c pad-10 marg-bot-30-mob">
               <p class="title">Entraide</p>
                <p class="texte-justifie">Nous proposons une entraide de particulier à particulier pour que les plus bricoleurs aident les débutants

                </p>
            </div>

        </div>
    </section>
    <section class="width-90 marg-auto height-mob-auto">
        <h2 class="center-align">Nouveautés</h2>
        <div class="row">
        <?php foreach ($random as $key => $value) :?>
            <div class=" col l4 s6 height-250px flex-col flex-c-c marg-bot-30">
                <?php $tabPhotos = unserialize($value['image']); ?>
                    <img src="<?='photos/photo_produit/' . $tabPhotos[0] ?>" alt="" class="produit-photo-mini">
                <p class="marron-text"><?=$value['titre']?></p>
                <p class="prix"><?=$value['prix']?> €</p>
            </div>
        <?php endforeach;?>    
        </div>
        <div class="width-100 flex flex-c-c marg-bot-30">
            <button class="marron-bg btn btn-light btn-waves"><a href="meuble_kit.php" class="white-text">Voir les produits en kit</a></button>
        </div>
    </section>
        <section class="row no-marg">
                <div class="col s12 actu-photo height-70 flex-col height-mob-auto ">
                    <h2 class="center-align">Actualités</h2>
                    <div class="flex-col flex-s height-70 marg-top-30 height-mob-auto">
                        <div class="col l12 margin-left-50px no-marg-mob">
                            <h3 class="engras center-align-mob"><?=$articles['titre']?></h3>
                        </div>
                        <p class="left-align col l6 s12 margin-left-50px center-align-mob no-marg-mob"><?=mb_strimwidth($articles['contenu'],0,200,'[...]') ?></p>
                        <div class="flex flex-s-c col l12 margin-left-50px marg-top-30 no-marg-mob pad-top-30-mob ">
                        <button class="btn marron-bg"><a href="detail_actualite.php?id=<?=$articles['id_articles']?>" class="white-text">Lire l'article</a></button>
                        <a href="actualites.php" class="marron-text margin-left-50px no-marg-mob pad-top-30-mob">Voir toutes les actualités</a>
                        </div>
                    </div>
                </div>
        </section>
    <section class="newsletter flex-col flex-c-c height-40 white-text height-mob-auto">
        <div class="opacity height-40 width-100 height-mob-auto"></div>
    <p class="z-index">Inscrivez-vous dès maintenant</p>
        <h4 class="z-index center-align">Restez connectés grâce à notre newsletter</h4>
        <form action="#" class="flex flex-c-c z-index">
            <input type="text" placeholder="email">
            <input type="submit" class="btn orange margin-left-20px">
        </form>
    </section>

</main>
<!--INCLUDE FOOTER-->
<?php
require_once('includes/footer.inc.php');?>
<!-- FIN INCLUDE FOOTER-->
</body>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script type="text/javascript" src="tarteaucitron/tarteaucitron.js"></script>

<script src="script.js"></script>
</html>