<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>À propos</title>
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
    $page = 'a_propos';
    require_once('includes/nav.inc.php');?>
</header>
<main>
    <section class="marron-bg height-40 flex-col flex-c-c">
        <h1 class="white-text">Notre objectif</h1>
        <p class="width-50 center-align white-text width-100-mob pad-20-mob">Proposer du mobilier et du matériel de construction fabriqué en France et entièrement recyclé, le tout à un prix abordable. Se rajoutant à cela Ama’Do propose des solutions de montage de meubles et d’aménagement.
        </p>
    </section>

    <section class="height-40 height-mob-auto flex-col flex-c-c">
        <h3>Contexte</h3>
        <p class="width-50 width-100-mob pad-20-mob texte-justifie relative marg-bot-30">
            Aujourd’hui se loger est un enjeu de première place pour les jeunes ménages, les étudiants en déplacement ou les foyers ayant peu de moyen. Ama’Do est un projet français de la région parisienne qui vient résoudre les problèmes cités ci-dessus en ayant un autre atout majeur : le recyclage, un aspect à ne pas négliger aujourd’hui avec toutes les problématiques du respect de l’environnement.
            La montagne de déchets d'ameublement produits chaque année - plus de deux millions de tonnes - généralement enfouis ou incinérés, vont pouvoir avoir une seconde vie grâce au recyclage des déchets plastiques, métalliques et de bois.

        </p>
        <div class="white triangle hide-on-med-and-down"></div>
    </section>
    <section class="brown lighten-4 height-60 height-mob-auto flex flex-c-c row">
        <div class="col l3 s12  pad-top-30-mob ">
            <img src="photos/preserver_ressources.jpeg" alt="" class="height-40">
        </div>
        <div class=" col l6 s12 pad-20">
            <h3 class="white-text width-450px center-align">
                Des partenaires pour mieux employer nos ressources
            </h3>
            <p class=" white-text texte-justifie width-450px">
                Des partenariats ont été créés avec les déchetteries, magasins de grandes distribution et autres rassemblements de déchets à notre disposition.
                Ces déchets vont être nettoyés, remis en état et vendus.
                Un autre aspect de notre projet est de vendre des meubles finis conçus à l’aide de déchets ou d’anciens meubles voués à l’abandon ou à la casse. D’autres partenariats ont donc été créés avec des infrastructures régionales et départementales telles que des écoles et des lieux publics ou encore des entreprises pour récupérer leurs meubles usagés et leur offrir une seconde vie comme dit plus haut.

            </p>
        </div>
    </section>
    <section class=" height-60 flex flex-c-c row height-mob-auto">
        <div class="col l3 s12 pad-20">
            <h3 class="center-align">Un collectif de passionné</h3>
            <p class="texte-justifie width-450px">
                Autres points importants, nous proposons une entraide de particuliers à particuliers pour que les plus bricoleurs aident les débutants. De plus le projet a développé un logiciel permettant de manière algorithmique de proposer un agencement et un type de meubles particuliers en fonction des données qu’auront rentrées les clients concernant leur habitat à propos des pièces concernées ainsi que les surfaces et formes de celles-ci.

            </p>
        </div>
        <div class=" col l6 s12  ">
            <img src="photos/mutual_help.jpeg" alt="photo solidarité" class="height-40">
        </div>
    </section>
    <section class="brown lighten-4 height-60 height-mob-auto flex flex-c-c row">
        <div class="col l3 s12 ">
            <img src="photos/housecraft-header2.jpg" alt="photo logo housecraft" class="height-30 pad-top-30-mob ">
        </div>
        <div class=" col l6 s12 pad-20">
            <h3 class="white-text width-450px center-align">Testez vos meubles dans une autre réalité</h3>
            <p class=" white-text texte-justifie width-450px">
                AMADO veut transporter vos meubles jusque dans la réalité virtuelle !
                Notre objectif : vous faire gagner du temps en prenant une empreinte 3D des meubles dans vos favoris.
                Désormais vous pourrez aussi tester nos meubles et ceux de nos partenaires à distance !
            </p>
        </div>
    </section>
</main>



<!-- FIN INCLUDE NAV BARRE-->
<?php
require_once('includes/footer.inc.php');?>
<!-- FIN INCLUDE FOOTER-->
</body>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="script.js"></script>
</html>