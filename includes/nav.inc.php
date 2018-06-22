<?php session_start();?>

<nav class="nav-extended">
    <div class="nav-wrapper">
        <a href="index.php" class="brand-logo logo"><img src=<?php if($page == 'accueil'){echo "photos/logo-final-blanc.png";} else {echo "photos/logo_amado_revisite.png";}?> alt="logo amado en blanc"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <!-- <li><a href="#"> <i class="material-icons">search</i></a></li> -->
            <li><a href="#"> <i class="material-icons">favorite_border</i></a></li>
            <li><a href="panier.php"> <i class="material-icons">shopping_basket</i></a></li>
            <li><a href="<?php if(isset($_SESSION['user'])|| isset($_SESSION['admin'])){ echo ('espace_client.php');} else { echo ('connexion.php');}?>"> <i class="material-icons">person</i></a></li>
        </ul>
        <ul class="side-nav show-on-med-and-down" id="mobile-demo">
            <li><a href="index.php" class="marron-text">Accueil</a></li>
            <li><a href="meuble_kit.php" class="marron-text">Meubles en kit</a></li>
            <li><a href="meuble_fini.php" class="marron-text">Meubles finis</a></li>
            <li><a href="actualites.php" class="marron-text">Actualités</a></li>
            <li><a href="a_propos.php" class="marron-text">À propos</a></li>
            <li><a href="contact.php" class="marron-text">Contact</a></li>
           <!-- <li><a href="#" > <i class="material-icons marron-text">search</i></a></li> -->
            <li><a href="#" > <i class="material-icons marron-text">favorite_border</i></a></li>
            <li><a href="panier.php"> <i class="material-icons marron-text">shopping_basket</i></a></li>
            <li><a href="<?php if(isset($_SESSION['user'])|| isset($_SESSION['admin'])){ echo ('espace_client.php');} else { echo ('connexion.php');}?>"> <i class="material-icons marron-text">person</i></a></li>
        </ul>
    </div>
    <div class="nav-content hide-on-med-and-down">
        <ul class="flex flex-a-c white-text nav-content-plus pad-bot-10px">
            <li><a href="meuble_kit.php">Meubles en kit</a></li>
            <li><a href="meuble_fini.php">Meubles finis</a></li>
            <li><a href="actualites.php">Actualités</a></li>
            <li><a href="a_propos.php">À propos</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>
</nav>