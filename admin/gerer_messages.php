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
    
<?php
    require_once ("../includes/nav_bo.inc.php");
    require_once ("../includes/init.inc.php");
    require_once ("../includes/functions.inc.php");


    if(!isset($_SESSION['admin'])){
        header('location: ../index.php');
    }

    
    $messages = selectAll('messages');

    ?>
</header>
<main class="width-80 marg-auto">
    <h1 class="center-align marron-text engras">Tous les messages</h1>
    
    
    <table class="highlight responsive-table marg-top-30 ">
        
        <thead>
        <tr>
            <th>id_messages</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Sujet</th>
            <th>Message</th>
            <th>Répondre</th>
            
        </tr>
        </thead>
        <tbody>
        <?php foreach($messages as $key=>$value) :
            
            ?>
            <tr>
                <td><?=$value['id_messages']?></td>
                <td><?=$value['nom']?></td>
                <td><?=$value['prenom']?></td>
                <td><?=$value['email']?></td>
                <td><?=$value['sujet']?></td>
                <td><?=$value['message']?></td>
                
                <td class="center-align"><a href="mailto:<?=$value['email']?>"><i class="material-icons marron-text">reply</i></a></td>
                
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