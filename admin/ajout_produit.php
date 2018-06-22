<?php
session_start();

require_once ('../includes/init.inc.php');
require_once ('../includes/functions.inc.php');

if(!isset($_SESSION['admin'])){
    header('location: ../index.php');
}

$empty = null;
$champsVides = [];

if ($_POST['type'] == 'fini' && empty($_POST['video'])) {
    $_POST['video'] = ' ';    
}

foreach ($_POST as $key => $value) {
    if(empty($_POST[$key])){
        $empty = true;
        $champsVides[] = $key; // je rempli le tableau $champsVides pour indiquer quels champs sont vides
    } else{
        if ($_POST['materiau']) {
            //
        } else{
            $_POST[$key] = trim($value); // je supprime les espaces des extremites
        }
    }
}




if(!$empty){
    $ok = true;

    if(isset($_POST['envoyer'])) {

        $ajout = $pdo->prepare('INSERT INTO produits(titre, prix, description, type, categorie, endroit, materiau, image, video, quantite_stock, reference, slug, created_at) VALUES(:titre, :prix, :description, :type, :categorie, :endroit, :materiau, :image, :video, :quantite_stock, :reference, :slug, NOW())');

     $countPhotos = count($_FILES['image']['name']);

    if (count($_FILES['image'])) {
        for ($i = 0; $i < $countPhotos; $i++) {
            if ($_FILES['image']['error'][$i] === 0) {

                $extension = strrchr($_FILES['image']['name'][$i], '.');
                do {
                    $nomImage = 'image' . mt_rand(0, 9999) . $extension;
                } while (file_exists('../photos/photo_produit/' . $nomImage));

                move_uploaded_file($_FILES['image']['tmp_name'][$i], '../photos/photo_produit/' . $nomImage);

            } else if ($_FILES['image']['error'][$i] === 4) {

                $nomImage = 'client-image-placeholder.png'; //mon image par défaut si je n'ai pas d'image

            } else {

                $_SESSION['error_message'][] = 'Erreur lors de l\'upload de l\'image ' . $_FILES['image']['error'][$i];
                $ok = false;
            }

            if (!empty($nomImage)) {
                $tableauPhoto[$i] = $nomImage;
                $nomImage = '';
            }

        }
    }



            if(!is_numeric($_POST['prix'])){
                $_SESSION['error_message'][] = 'Le prix doit être un chiffre';
                $ok = false;
            }
            if(!is_numeric($_POST['quantite_stock'])){
                $_SESSION['error_message'][] = 'La quantité doit être un chiffre';
                $ok = false;
            }

            $reference = clean($_POST['reference']);
            $slug = clean($_POST['slug']);


    if ($ok) {
        $ajout->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
        $ajout->bindValue(':prix', $_POST['prix'], PDO::PARAM_INT);
        $ajout->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
        $ajout->bindValue(':type', $_POST['type'], PDO::PARAM_STR);
        $ajout->bindValue(':categorie', $_POST['categorie'], PDO::PARAM_STR);
        $ajout->bindValue(':endroit', $_POST['endroit'], PDO::PARAM_STR);
        $countMateriau = count($_POST['materiau']);

        if (count($_POST['materiau'])) {
            for ($i = 0; $i < $countMateriau; $i++) {
                $tableauMateriau[$i] = $_POST['materiau'][$i];

            }
        }

        $ajout->bindValue(':materiau', serialize($tableauMateriau), PDO::PARAM_STR);



        $ajout->bindValue(':image', serialize($tableauPhoto));
        $ajout->bindValue(':video', $_POST['video'], PDO::PARAM_STR);
        $ajout->bindValue(':quantite_stock', $_POST['quantite_stock'], PDO::PARAM_INT);
        $ajout->bindValue(':reference', $reference, PDO::PARAM_STR);
        $ajout->bindValue(':slug', $slug, PDO::PARAM_STR);


        $ajouter = $ajout->execute();


                if($ajouter){
                    $_SESSION['success_message'] = 'Enregistrement effectué avec succès';
                    header('location:gerer_produits.php'); die();
                } else {
                    $_SESSION['error_message'][] = 'Une erreur s\'est produite, veuillez réessayer';
                }
    }

        



    }
} else {
    foreach ($champsVides as $key => $value) {

        $_SESSION['error_message'][] = 'Le champ ' .$value. ' ne doit pas être vide';
    };
}

$_SESSION['old_values'] = $_POST;
//var_dump($ajouter);
//var_dump($ajout->errorInfo());

header('location: formulaire_produit.php');