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

    if(isset($_POST['envoyer'])){
        $modif = $pdo -> prepare("UPDATE produits SET titre = :titre,prix = :prix, description =:description, type = :type, categorie = :categorie, endroit = :endroit, materiau = :materiau,image = :image,video = :video,quantite_stock = :quantite_stock, reference = :reference, slug = :slug, created_at = NOW() WHERE id_produits =:id_produits");


        //je traite la photo

        $countPhotos = count($_FILES['image']['name']);
        if (count($_FILES['image'])) {
            for ($i = 0; $i < $countPhotos; $i++) {
                if ($_FILES['image']['error'][$i] === 0) {

                    $extension = strrchr($_FILES['image']['name'][$i], '.');
                    do {
                        $nomAutrePhoto = 'image' . mt_rand(0, 9999) . $extension;
                    } while (file_exists('../photos/photo_produit/' . $nomAutrePhoto));

                    move_uploaded_file($_FILES['image']['tmp_name'][$i], '../photos/photo_produit/' . $nomAutrePhoto);

                    if(!empty($_POST['image_presente'])){
                        $tabAutrePhoto = unserialize($_POST['image_presente']);
                        foreach ($tabAutrePhoto as $key=>$value){
                            file_exists('../photos/photo_produit/'.$value) && unlink('../photos/photo_produit/'.$value);

                        }
                    }

                } else if (isset($_POST['image_presente'])){
                    $nomAutrePhoto = $_POST['image_presente'];
                }
                else if ($_FILES['image']['error'][$i] === 4) {

                    $nomAutrePhoto = 'client-image-placeholder.png'; //mon image par défaut si je n'ai pas d'image

                } else {

                    $_SESSION['error_message'][] = 'Erreur lors de l\'upload de l\'image ' . $_FILES['image']['error'][$i];
                    $ok = false;
                }

                if (!empty($nomAutrePhoto)) {
                    $tableauPhoto[$i] = $nomAutrePhoto;
                    $nomAutrePhoto = '';
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


        if($ok){
        $modif->bindValue(':id_produits', $_GET['id_mod'], PDO::PARAM_INT);
        $modif-> bindValue(':titre', $_POST['titre'], PDO::PARAM_STR );
        $modif-> bindValue(':prix', $_POST['prix'], PDO::PARAM_INT );
        $modif-> bindValue(':description',$_POST['description'] , PDO::PARAM_STR );
        $modif-> bindValue(':type',$_POST['type'] , PDO::PARAM_STR );
        $modif-> bindValue(':categorie',$_POST['categorie'] , PDO::PARAM_STR );
        $modif-> bindValue(':endroit',$_POST['endroit'] , PDO::PARAM_STR );


        $countMateriau = count($_POST['materiau']);
        if (count($_POST['materiau'])) {
            for ($i = 0; $i < $countMateriau; $i++) {
                $tableauMateriau[$i] = $_POST['materiau'][$i];

            }
        }

        $modif-> bindValue(':materiau',serialize($tableauMateriau), PDO::PARAM_STR);
        $modif-> bindValue(':image', serialize($tableauPhoto));
        $modif->bindValue(':video', $_POST['video'], PDO::PARAM_STR);
        $modif->bindValue(':quantite_stock', $_POST['quantite_stock'], PDO::PARAM_INT);
        $modif->bindValue(':reference', $reference, PDO::PARAM_STR);
        $modif->bindValue(':slug', $slug, PDO::PARAM_STR);


        $modification = $modif-> execute();

                if($modification){
                    $_SESSION['success_message'] = 'Modification effectué avec succès';
                    header('location:gerer_produits.php'); die();
                } else {
                    $_SESSION['error_message'][] = 'Une erreur s\'est produite, veuillez réessayer';
                }
        }


    }
}else {
    foreach ($champsVides as $key => $value) {

        $_SESSION['error_message'][] = 'Le champ ' .$value. ' ne doit pas être vide';
    };
}
//var_dump($ajouter);
//var_dump($ajout->errorInfo());

$_SESSION['old_values'] = $_POST;
header('location:gerer_produits.php');

?>