<?php session_start();?>
    <nav class="nav-extended">
        <div class="nav-wrapper">
            <a href="../index.php" class="brand-logo logo"><img src="../photos/logo_amado_revisite.png" alt="logo amado"></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?php if(isset($_SESSION['user'])|| isset($_SESSION['admin'])){ echo ('../espace_client.php');} else { echo ('../connexion.php');}?>"> <i class="material-icons">person</i></a></li>
            </ul>
            <ul class="side-nav show-on-med-and-down" id="mobile-demo">
                <li><a href="../admin/gerer_articles.php" class="marron-text">Articles</a></li>
                <li><a href="../admin/gerer_produits.php" class="marron-text">Produits</a></li>
                <li><a href="../admin/gerer_commandes.php" class="marron-text">Commandes</a></li>
                <li><a href="../admin/gerer_clients.php" class="marron-text">Clients</a></li>
                <li><a href="../admin/gerer_messages.php" class="marron-text">Messages</a></li>
                <li><a href="../index.php" class="marron-text">Retour au front</a></li>
               <li><a href="<?php if(isset($_SESSION['user'])|| isset($_SESSION['admin'])){ echo ('../espace_client.php');} else { echo ('../connexion.php');}?>"> <i class="material-icons marron-text">person</i></a></li>
            </ul>
        </div>
        <div class="nav-content hide-on-med-and-down">
            <ul class="flex flex-a-c white-text nav-content-plus pad-bot-10px">
                <li><a href="../admin/gerer_articles.php">Articles</a></li>
                <li><a href="../admin/gerer_produits.php">Produits</a></li>
                <li><a href="../admin/gerer_commandes.php">Commandes</a></li>
                <li><a href="../admin/gerer_clients.php">Clients</a></li>
                <li><a href="../admin/gerer_messages.php">Messages</a></li>
                <li><a href="../index.php">Retour au front</a></li>
            </ul>
        </div>
    </nav>