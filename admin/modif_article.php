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


if(!$empty){
    $ok = true;

    if(isset($_POST['envoyer'])){
        $modif = $pdo -> prepare("UPDATE articles SET titre = :titre,auteur = :auteur, contenu =:contenu, photo_principale = :photo_principale, autre_photo = :autre_photo , created_at = NOW() WHERE id_articles =:id_articles");


        //je traite la photo
        if ($_FILES['photo_principale']['error'] === 0) {
            $extension = strrchr($_FILES['photo_principale']['name'], '.');
            $nomPhoto = 'photo_principale' . mt_rand(0, 9999) . $extension;
            move_uploaded_file($_FILES['photo_principale']['tmp_name'], '../photos/photo_article/' . $nomPhoto);

            if(!empty($_POST['photo_presente'])){
                file_exists('../photos/photo_article/'.$_POST['photo_presente']) && unlink('../photos/photo_article/'.$_POST['photo_presente']);
            }

        }elseif (!empty($_POST['photo_presente'])){
            $nomPhoto = $_POST['photo_presente'];

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

                    if(!empty($_POST['autre_photo_presente'])){
                        $tabAutrePhoto = unserialize($_POST['autre_photo_presente']);
                        foreach ($tabAutrePhoto as $key=>$value){
                            file_exists('../photos/photo_article/'.$value) && unlink('../photos/photo_article/'.$value);

                        }
                    }

                } else if (isset($_POST['autre_photo_presente'])) {
                     $nomAutrePhoto = $_POST['autre_photo_presente'];
                }
                else if ($_FILES['autre_photo']['error'][$i] === 4) {

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
                $modif->bindValue(':id_articles', $_GET['id_mod'], PDO::PARAM_INT);
                $modif-> bindValue(':titre', $_POST['titre'], PDO::PARAM_STR );
                $modif-> bindValue(':auteur', $_POST['auteur'], PDO::PARAM_STR );
                $modif-> bindValue(':contenu',$_POST['contenu'] , PDO::PARAM_STR );
                $modif-> bindValue(':photo_principale',$nomPhoto);
                $modif-> bindValue(':autre_photo', serialize($tableauPhoto));


                $modification = $modif-> execute();
                if($modification){
                        $_SESSION['success_message'] = 'Enregistrement effectué avec succès';
                        header('location:gerer_articles.php'); die();
                } else {
                        $_SESSION['error_message'][] = 'Une erreur s\'est produite, veuillez réessayer';
                }  
            }
            
        



    }
}

$_SESSION['old_values'] = $_POST;

header('location:gerer_articles.php');

?>