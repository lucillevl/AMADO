
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gérer clients</title>
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



        $delete = $pdo -> prepare('DELETE FROM clients WHERE id_clients = :id');
        $delete ->bindValue(':id', $_GET['id_supp'],PDO::PARAM_INT);
        $supprOK = $delete -> execute();

    }
    $clients = selectAll('clients');



    ?>
</header>
<main class="width-80 marg-auto">
    <h1 class="center-align marron-text engras">Tous les clients</h1>
    <table class="highlight responsive-table marg-top-30 ">
        <thead>
        <tr>
            <th>id_clients</th>
            <th>nom</th>
            <th>prénom</th>
            
            <th>email</th>
           
            <th>adresse</th>
            <th>ville</th>
            <th>code_postal</th>
            <th>date_naissance</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>Supprimer</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach($clients as $key=>$value) :?>
        <tr>
            <td><?=$value['id_clients']?></td>
            <td><?=$value['nom']?></td>
            <td><?=$value['prenom']?></td>
            <td><?=$value['email']?></td>
            <td><?=$value['adresse']?></td>
            <td><?=$value['ville']?></td>
            <td><?=$value['code_postal']?></td>
            <td><?=$value['date_naissance']?></td>
	   
            <td><?=$value['created_at']?></td>
            <td><?=$value['updated_at']?></td>
            
            <td><a onclick="return confirm('Êtes vous sûr(e) de vouloir supprimer ce client ?')" href="gerer_clients.php?id_supp=<?=$value['id_clients']?>"><i class="material-icons marron-text">clear</i></a></td>

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