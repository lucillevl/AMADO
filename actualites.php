<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toutes les actualités</title>
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
<body class="page-actualites">
<header>
<!--INCLUDE NAV BARRE-->
<?php
$page = 'actualite';
require_once('includes/nav.inc.php');
require_once('includes/init.inc.php');
require_once('includes/functions.inc.php');

//Select de tous les articles dans la base
$articles = selectAll('articles');

$rand = $pdo->query("SELECT * FROM articles ORDER BY  RAND() LIMIT 1");
$random = $rand->fetch(PDO::FETCH_ASSOC);


?>
<!-- FIN INCLUDE NAV BARRE-->
<div class="actu-debut-page height-60 flex-col flex-c-c height-mob-auto pad-20-mob">
    <h1 class="white-text width-50 center-align title"><?=$random['titre']?></h1>
    <p class="white-text width-50 texte-justifie"><?=mb_strimwidth($random['contenu'],0,200,'[...]') ?></p>
    <button class="bouton-contour-blanc white-text pad-10"><a href="detail_actualite.php?id=<?=$random['id_articles']?>" class="white-text">Voir plus</a></button>
</div>
</header>
<main>
    <h2 class="center-align margin-40px">Actualités</h2>
 <div class="container">
     <div class="row">
        <?php foreach ($articles as $key => $value) : ?>
         <div class="col l6 s12 marg-bot-30">
                 <img src="photos/photo_article/<?= $value['photo_principale'] ?>" alt="photo article" class="col s6 height-350px no-pad">
                 <div class="brown lighten-5 col s6  flex-col flex-a-c marron-text height-350px">
                     <h5><?=$value['titre']?></h5>
                     <button class="bouton-contour-marron pad-10"><a href="detail_actualite.php?id=<?=$value['id_articles']?>" class="marron-text">Voir plus</a></button>
                 </div>
             </div>
        <?php endforeach; ?>
     </div>
 </div>
</main>
<!-- INCLUDE FOOTER-->
<?php
require_once('includes/footer.inc.php');
?>
<!-- FIN INCLUDE FOOTER-->
</body>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="script.js"></script>
</html>