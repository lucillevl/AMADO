<?php
session_start();

require_once ('../includes/init.inc.php');
require_once ('../includes/functions.inc.php');

if(!isset($_SESSION['admin'])){
    header('location: ../index.php');
}

$empty = null;
$champsVides = [];

foreach ($_POST as $key => $value) {
    if(empty($_POST[$key])){
        $empty = true;
        $champsVides[] = $key; // je rempli le tableau $champsVides pour indiquer quels champs sont vides
    } else{
        $_POST[$key] = trim($value); // je supprime les espaces des extremites
    }
}




//si aucun des POST n'est vide alors c'est bon je fais mon traitement

if(!$empty){
    $ok = true;


    if(isset($_POST['envoyer'])) {

        $ajout = $pdo->prepare('INSERT INTO articles(titre, auteur, contenu, photo_principale, autre_photo, created_at) VALUES(:titre, :auteur, :contenu, :photo_principale, :autre_photo, NOW())');

        if ($_FILES['photo_principale']['error'] === 0) {
            $extension = strrchr($_FILES['photo_principale']['name'], '.');
            $nomPhoto = 'photo_principale' . mt_rand(0, 9999) . $extension;
            move_uploaded_file($_FILES['photo_principale']['tmp_name'], '../photos/photo_article/' . $nomPhoto);

        } else if ($_FILES['photo_principale']['error'] === 4) {

            $nomPhoto = 'client-image-placeholder.png'; //mon image par défaut si je n'ai pas d'image

        } else {

            $_SESSION['error_message'][] = 'Erreur lors de l\'upload de l\'image';
            $ok = false;
        }

        $countPhotos = count($_FILES['autre_photo']);
        if (count($_FILES['autre_photo'])) {
            for ($i = 0; $i < $countPhotos; $i++) {
                if ($_FILES['autre_photo']['error'][$i] === 0) {

                    $extension = strrchr($_FILES['autre_photo']['name'][$i], '.');
                    do {
                        $nomAutrePhoto = 'autre_photo' . mt_rand(0, 9999) . $extension;
                    } while (file_exists('../photos/photo_article/' . $nomAutrePhoto));

                    move_uploaded_file($_FILES['autre_photo']['tmp_name'][$i], '../photos/photo_article/' . $nomAutrePhoto);

                } else if ($_FILES['autre_photo']['error'][$i] === 4) {

                    $nomAutrePhoto = 'client-image-placeholder.png'; //mon image par défaut si je n'ai pas d'image

                } else {

                    $_SESSION['error_message'][] = 'Erreur lors de l\'upload de l\'image ' . $_FILES['autre_photo']['error'][$i];
                    $ok = false;
                }

                if (!empty($nomAutrePhoto)) {
                    $tableauPhoto[$i] = $nomAutrePhoto;
                    $nomAutrePhoto = '';
                }

            }
        }

        if ($ok) {
            
            $ajout->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
            $ajout->bindValue(':auteur', $_POST['auteur'], PDO::PARAM_STR);
            $ajout->bindValue(':contenu', $_POST['contenu'], PDO::PARAM_STR);
            $ajout->bindValue(':photo_principale', $nomPhoto);
            $ajout->bindValue(':autre_photo', serialize($tableauPhoto));

            $ajouter = $ajout->execute();
            if($ajouter){
                    $_SESSION['success_message'] = 'Enregistrement effectué avec succès';
                    header('location:gerer_articles.php'); die();
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

$_SESSION['old_values'] = $_POST;




//var_dump($ajouter);
//var_dump($ajout->errorInfo());

header('location: formulaire_article.php');