<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification article</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
    <?php
    require_once ("../includes/nav_bo.inc.php");
    require_once ("../includes/init.inc.php");
    require_once ("../includes/functions.inc.php");
    // if(!isset($_SESSION['admin'])){
    //   header('location: ../index.php');
    //}

  $affichage = selectOne('articles', $_GET['id_mod']);

    $tabPhotos = unserialize($affichage['autre_photo']);

    $msg='';
if (!empty($_SESSION['error_message'])) {
    foreach ($_SESSION['error_message'] as $key => $value) {
        $msg.='<div class="red-text">'.$value.'</div>';
    }
    unset($_SESSION['error_message']); //détruit le tableau  qui contient les messages d'erreurs car sinon co   nservé dans la session

} 

    
if(!empty($_SESSION['old_values'])){

    extract($_SESSION['old_values']); //comme le extract du $_POST, on fabrique des variables à partir des clés du tableau donc $_SESSION['titre'] devient $titre
    //$tabPhotos = unserialize($image);
    //$tabMateriau = unserialize($materiau);
    unset($_SESSION['old_values']); // j'ai récupérer les infos de old_values je peux détruire ce tableau
    
}
    ?>
</header>
<main class="width-80 marg-auto">
    <h1 class="center-align marron-text engras">Modification de l'article n° <?=$affichage['id_articles']?></h1>
    <?= $msg?>
    <form action="modif_article.php?id_mod=<?=$affichage['id_articles']?>" method="post" enctype="multipart/form-data"  class="flex-col flex-c-c">
        <div class="input-field width-100">
            <label for="titre_article">Titre</label>
            <input type="text" id="titre_article" name="titre" value="<?=$affichage['titre']?>">
        </div>
        <div class="input-field width-100">
            <label for="auteur">Auteur</label>
            <input type="text" id="auteur" name="auteur" value="<?=$affichage['auteur']?>">
        </div>
        <div class="input-field width-100">
            <label for="contenu_article">Contenu de l'article</label>
            <textarea id="contenu_article" name="contenu" class="materialize-textarea"><?=$affichage['contenu']?></textarea>
        </div>
        <div class="file-field input-field width-100">
            <div class="btn marron-bg">
                <span>File</span>
                <input type="file" id="photo_principale_article" name="photo_principale" >
            </div>
            <div class="file-path-wrapper">
                <input type="hidden" name="photo_presente" value="<?=$affichage['photo_principale']?>">
                <input class="file-path validate" type="text"  name="photo_principale" placeholder="Photo principale de l'article" value="<?=$affichage['photo_principale']?>">
            </div>
        </div>

        <div class="file-field input-field width-100">
            <div class="btn marron-bg">
                <span>File</span>
                <input type="file"  id="photo_autre_article" multiple name="autre_photo[]" >
            </div>
            <div class="file-path-wrapper">
                <input type="hidden" name="autre_photo_presente" value="<?php foreach ($tabPhotos as $key => $value){echo $value;}?>">
                <input class="file-path validate" type="text"  name="autre_photo" placeholder="Ajouter d'autres photos à l'article" value="<?php foreach ($tabPhotos as $key => $value){echo $value;}?>">

            </div>
        </div>

        <input type="submit" class="btn marron-bg" name="envoyer" value="Modifier l'article">

    </form>
</main>
</body>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="../script.js"></script>
</html>