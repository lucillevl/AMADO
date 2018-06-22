<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire ajout article</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
    <!--INCLUDE NAV BACK OFFICE
 peut-être judicieux de faire un nav exprès pour le BO qui permettrait l'ajout d'articles et de produits directement depuis la page web
 evite de faire des chemins absolus pour récupérer les logos

 -->
    <?php
    require_once ("../includes/nav_bo.inc.php");
    require_once ("../includes/init.inc.php");
    require_once ("../includes/functions.inc.php");

    if(!isset($_SESSION['admin'])){
        header('location: ../index.php');
    }

    if(!empty($_GET['id_supp']) && is_numeric($_GET['id_supp'])){


        $produitImage = selectOne('produits',$_GET['id_supp']);



        $delete = $pdo -> prepare('DELETE FROM produits WHERE id_produits = :id');
        $delete ->bindValue(':id', $_GET['id_supp'],PDO::PARAM_INT);
        $supprOK = $delete -> execute();

//SUPPRIMER LES PHOTOS DU PRODUIT

        if($supprOK) {
            $tabImage = unserialize($produitImage['image']);

            foreach($tabImage as $key => $value){

                if (file_exists('../photos/photo_produit/' . $value)) {
                    unlink('../photos/photo_produit/' . $value);
                }
            }

        }
    }

    $produits = selectAll('produits');

    //SELECTION DE PRODUITS EN KIT PAR TABLEAU
	    $kit = $pdo->query("SELECT * FROM produits WHERE type ='kit'");
	    $kits = $kit->fetchAll(PDO::FETCH_ASSOC);

    //SELECTION DE PRODUITS FINIS PAR TABLEAU
	    $fini = $pdo->query("SELECT * FROM produits WHERE type ='fini'");
	    $finis = $fini->fetchAll(PDO::FETCH_ASSOC);
    ?>
</header>
<main class="width-80 marg-auto">
    <h1 class="center-align marron-text engras">Tous les produits</h1>
    <a href="formulaire_produit.php" class="marron-text center-align">+ Ajouter un nouveau produit</a>
    <table class="highlight responsive-table marg-top-30 ">
        <h3>Les produits en kits</h3>
        <thead>
        <tr>
            <th>id_produits</th>
            <th>Titre</th>
            <th>Prix</th>
            <th>Description</th>
            <th>Type</th>
            <th>Endroit</th>
            <!--<th>Materiaux</th>-->
            <th>Image</th>
            <th>Video</th>
            <th>Quantite/stock</th>
            <th>Reference</th>
            <th>Slug</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Modifier</a></th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($kits as $key=>$value) :
            //AFFICHER LES PRODUITS EN KIT PUIS LES PRODUITS FINIS
            ?>
            <tr>
                <td><?=$value['id_produits']?></td>
                <td><?=$value['titre']?></td>
                <td><?=$value['prix']?></td>
                <td><?= substr($value['description'],0,100)?></td>
                <td><?=$value['type']?></td>
                <td><?=$value['endroit']?></td>
                <!--<td><?=$value['materiau']?></td>-->
	            <?php $tabPhotos = unserialize($value['image'])?>
                <td><img src="../photos/photo_produit/<?= $tabPhotos[0] ?>" width="100px" height="100px"></td>
                <td><?=$value['video']?></td>
                <td><?=$value['quantite_stock']?></td>
                <td><?=$value['reference']?></td>
                <td><?=$value['slug']?></td>
                <td><?=$value['created_at']?></td>
                <td><?=$value['updated_at']?></td>
                <td><a href="form_modif_produit.php?id_mod=<?=$value['id_produits']?>"><i class="material-icons marron-text">edit</i></a></td>
                <td><a onclick="return confirm('Êtes-vous sûr(e) de vouloir supprimer ce produit ?')" href="gerer_produits.php?id_supp=<?=$value['id_produits']?>"><i class="material-icons marron-text">clear</i></a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <table class="highlight responsive-table marg-top-30 ">
        <h3>Les produits finis</h3>
    
        <thead>
        <tr>
            <th>id_produits</th>
            <th>Titre</th>
            <th>Prix</th>
            <th>Description</th>
            <th>Type</th>
            <th>Endroit</th>
            <!--<th>Materiaux</th>-->
            <th>Image</th>
            <!--<th>Video</th>-->
            <th>Quantite/stock</th>
            <th>Reference</th>
            <th>Slug</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Modifier</a></th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
		<?php foreach($finis as $key=>$value) :
			//AFFICHER LES PRODUITS EN KIT PUIS LES PRODUITS FINIS
			?>
            <tr>
                <td><?=$value['id_produits']?></td>
                <td><?=$value['titre']?></td>
                <td><?=$value['prix']?></td>
                <td><?= substr($value['description'],0,100)?></td>
                <td><?=$value['type']?></td>
                <td><?=$value['endroit']?></td>
	            <?php $tabPhotos = unserialize($value['image'])?>
                <td><img src="../photos/photo_produit/<?= $tabPhotos[0] ?>" width="100px" height="100px"></td>
                <td><?=$value['video']?></td>
                <td><?=$value['quantite_stock']?></td>
                <td><?=$value['reference']?></td>
                <td><?=$value['slug']?></td>
                <td><?=$value['created_at']?></td>
                <td><?=$value['updated_at']?></td>
                <td><a href="form_modif_produit.php?id_mod=<?=$value['id_produits']?>"><i class="material-icons marron-text">edit</i></a></td>
                <td><a onclick="return confirm('Êtes-vous sûr(e) de vouloir supprimer ce produit ?')" href="gerer_produits.php?id_supp=<?=$value['id_produits']?>"><i class="material-icons marron-text">clear</i></a></td>
            </tr>
		<?php endforeach;?>
        </tbody>
    </table>
</main>
</body>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="../script.js"></script>
</html>