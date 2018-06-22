<?php


?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification produit</title>
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


    $affichage = selectOne('produits', $_GET['id_mod']);

    $tabPhotos = unserialize($affichage['image']);
    $tabMateriau = unserialize($affichage['materiau']);


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
    <h1 class="center-align marron-text engras">Modification du produit n° <?=$affichage['id_produits']?></h1>
    <?=$msg;?>
    <form action="modif_produit.php?id_mod=<?=$affichage['id_produits']?>" method="post" enctype="multipart/form-data" class="flex-col flex-c-c">
        <div class="input-field width-100">
            <label for="titre">Titre</label>
            <input type="text" id="titre" name="titre" value="<?=$affichage['titre']?>">
        </div>
        <div class="input-field width-100">
            <label for="prix">Prix</label>
            <input type="text" id="prix" name="prix" value="<?=$affichage['prix']?>">
        </div>
        <div class="input-field width-100">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="materialize-textarea"><?=$affichage['description']?></textarea>
        </div>
        <div class="flex width-100">
            <p class="margin-right-50px gris">Type</p>
            <div class="width-100">
                <p class="flex width-100 flex-a-c">
                    <input name="type" type="radio" id="test6" value="kit" <?php if ($affichage['type'] == 'kit') {echo 'checked';}?>/>
                    <label for="test6">Kit</label>

                    <input name="type" type="radio" id="test7" value="fini" <?php if ($affichage['type'] == 'fini') {echo 'checked';}?>/>
                    <label for="test7">Fini</label>
                </p>
            </div>
        </div>
        <div class="input-field width-100">
            <label for="categorie">Catégorie</label>
            <input type="text" id="categorie" name="categorie" value="<?=$affichage['categorie']?>">
        </div>

        <div class=" flex width-100">
            <p class="gris margin-right-50px">Position</p>
            <div class="width-100">
                <p class="flex width-100 flex-a-c">
                    <input name="endroit" type="radio" id="interieur" value="intérieur" <?php if ($affichage['endroit'] == 'intérieur'){echo 'checked';} ?>/>
                    <label for="interieur">Intérieur</label>

                    <input name="endroit" type="radio" id="exterieur" value="extérieur" <?php if ($affichage['endroit'] == 'extérieur'){ echo 'checked';}?>/>
                    <label for="exterieur">Extérieur</label>
                </p>
            </div>
        </div>
        <div class="width-100 marg-top-30 marg-bot-30">
            <p class="gris">Sélectionner un ou plusieurs matériaux</p>
            <p>
                <input type="checkbox" multiple class="filled-in" id="filled-in-box" name="materiau[]" value="bois" <?php if(!empty($tabMateriau)){foreach ($tabMateriau as $key=>$value){if ($value == 'bois'){echo 'checked';}}}?> />
                <label for="filled-in-box">Bois</label>
            </p>
            <p>
                <input type="checkbox" multiple class="filled-in" id="filled-in-box-1" name="materiau[]" value="metal" <?php if(!empty($tabMateriau)){foreach ($tabMateriau as $key=>$value){if ($value == 'metal'){echo 'checked';}}}?>/>
                <label for="filled-in-box-1">Métal</label>
            </p>
            <p>
                <input type="checkbox" multiple class="filled-in" id="filled-in-box-2" name="materiau[]" value="plastique" <?php if(!empty($tabMateriau)){foreach ($tabMateriau as $key=>$value){if ($value == 'plastique'){echo 'checked';}}}?>/>
                <label for="filled-in-box-2">Plastique</label>
            </p>

        </div>

        <div class="file-field input-field width-100">
            <div class="btn marron-bg">
                <span>File</span>
                <input type="file"  id="image_produit" multiple name="image[]">
            </div>
            <div class="file-path-wrapper">
                <input type="hidden" name="image_presente" value="<?php foreach ($tabPhotos as $key => $value){echo $value;}?>">
                <input class="file-path validate" type="text"  name="image[]" placeholder="Ajouter d'autres photos à l'article" value="<?php foreach ($tabPhotos as $key => $value){echo $value;}?>">
            </div>
        </div>

        <div class="input-field width-100">
            <label for="video">Vidéo (url de la vidéo)</label>
            <input type="text" id="video" name="video" value="<?=$affichage['video'] ?>">
        </div>

        <div class="input-field width-100">

            <label for="quantite_stock">Quantité stock</label>
            <input type="number" id="quantite_stock" name="quantite_stock" value="<?=$affichage['quantite_stock'] ?>">
        </div>

        <div class="input-field width-100">
            <label for="reference">Référence</label>
            <input type="text" id="reference" name="reference" value="<?=$affichage['reference'] ?>">
        </div>
        <div class="input-field width-100">
            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" value="<?=$affichage['slug'] ?>">
        </div>

        <input type="submit" class="btn marron-bg" value="Modifier le produit" name="envoyer">
    </form>
</main>
</body>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="../script.js"></script>
</html>