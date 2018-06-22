<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualité Détail</title>
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
    $page = 'detail_actu';
    require_once('includes/nav.inc.php');
    require_once('includes/init.inc.php');
    require_once('includes/functions.inc.php');

    //select d'un des articles en fonction de l'id qu'il y a dans l'url
    $detail = selectOne('articles', $_GET['id']);



    ?>
    <!-- FIN INCLUDE NAV BARRE-->
    <div class="flex-col flex-c-c white-text height-40 actu-detail-page">
        <h1 class="engras left-align"><?=$detail['titre']?></h1>
        <p><?=$detail['auteur']?> - <?=$detail['created_at']?></p>
    </div>
</header>

<main>
        <section class="width-80 marg-auto pad-bot-10px marg-top-30">
            <p class="texte-justifie"><?=$detail['contenu']?></p>
        </section>
        <section class="width-80 marg-auto pad-bot-10px">
            <h4>Galerie photos</h4>
        <hr>
         <div class="row center-align marg-top-30">
       <?php $tabPhotos = unserialize($detail['autre_photo']); ?>
       
           <?php foreach($tabPhotos as $key => $value) : ?>

            <img src="photos/photo_article/<?= $value ?>" class="col l2 s6 no-marg-mob height-150px width-150px margin-right-20px marg-bot-30">

           <?php endforeach ; ?>
   </div>
    </section>


    <div class="flex flex-c-c">
     <a href="actualites.php" class="marron-text center-align flex flex-c-c marg-bot-30">
         <i class="material-icons">keyboard_arrow_left</i>
         Retour aux actualités
     </a>
    </div>
</main>


<!--INCLUDE FOOTER-->
<?php
require_once('includes/footer.inc.php');?>
<!-- FIN INCLUDE FOOTER-->
</body>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="script.js"></script>
</html>
