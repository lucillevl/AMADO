
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gérer article</title>
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

$msg='';
    if (!empty($_SESSION['success_message'])){
    $msg = '<div class="green-text">'.$_SESSION['success_message'].'</div>';
    unset($_SESSION['success_message']);
}

 if(!isset($_SESSION['admin'])){
    header('location: ../index.php');
    }


    if(!empty($_GET['id_supp']) && is_numeric($_GET['id_supp'])){

        $photo = selectOne('articles',$_GET['id_supp']);


        $delete = $pdo -> prepare('DELETE FROM articles WHERE id_articles = :id');
        $delete ->bindValue(':id', $_GET['id_supp'],PDO::PARAM_INT);
        $supprOK = $delete -> execute();

//SUPPRIMER PHOTO PRINCIPALE ET AUTRE PHOTO

        if($supprOK) {

            if (file_exists('../photos/photo_article/' . $photo['photo_principale'])) {
                unlink('../photos/photo_article/' . $photo['photo_principale']);
             }

            $tabImage = unserialize($photo['autre_photo']);

            foreach($tabImage as $key => $value){
                if (file_exists('../photos/photo_article/' . $value)) {
                    unlink('../photos/photo_article/' . $value);
                }
            }
        }
}


    $articles = selectAll('articles');

    ?>
</header>
<main class="width-80 marg-auto">
    <h1 class="center-align marron-text engras">Tous les articles</h1>
    <?=$msg;?>
    <a href="formulaire_article.php" class="marron-text center-align">+ Ajouter un nouvel article</a>
    <table class="highlight responsive-table marg-top-30 ">
        <thead>
        <tr>
            <th>id_articles</th>
            <th>titre</th>
            <th>auteur</th>
            <!--<th>contenu</th>-->
            <th>photo_principale</th>
            <!--<th>autre_photo</th>-->
            <th>created_at</th>
            <th>updated_at</th>
            <th>Modifier</a></th>
            <th>Supprimer</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach($articles as $key=>$value) :?>
        <tr>
            <td><?=$value['id_articles']?></td>
            <td><?=$value['titre']?></td>
            <td><?=$value['auteur']?></td>
            
	      
            <td><img src="../photos/photo_article/<?= $value['photo_principale'] ?>" width="100px" height="100px"></td>
            
            <td><?=$value['created_at']?></td>
            <td><?=$value['updated_at']?></td>
            <td><a href="form_modif_article.php?id_mod=<?=$value['id_articles']?>"><i class="material-icons marron-text">edit</i></a></td>
            <td><a onclick="return confirm('Êtes vous sûr(e) de vouloir supprimer cet article ?')" href="gerer_articles.php?id_supp=<?=$value['id_articles']?>"><i class="material-icons marron-text">clear</i></a></td>

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