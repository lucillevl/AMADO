<?php

require_once('includes/init.inc.php');
session_start();

if(isset ($_POST['modifier'])){
 if($_SESSION['admin']){
      $id = $_SESSION['admin']['id_clients'];

   } else{
       $id = $_SESSION['user']['id_clients'];
        
   }
    $modif = $pdo->prepare("UPDATE clients SET 
        nom=:nom,
        prenom=:prenom,
        email=:email,
        password=:password,
        adresse=:adresse,
        ville=:ville,
        code_postal=:code_postal,
        date_naissance=:date_naissance,
        created_at=NOW() 

        WHERE id_clients =".$id);

    



    $modif-> bindValue(':nom', $_POST['nom'], PDO::PARAM_STR );
    $modif-> bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR );
    $modif-> bindValue(':email', $_POST['email'], PDO::PARAM_STR );
    $modif-> bindValue(':password', $_POST['password'], PDO::PARAM_STR );
    $modif-> bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR );
    $modif-> bindValue(':ville', $_POST['ville'], PDO::PARAM_STR );
    $modif-> bindValue(':code_postal', $_POST['code_postal'], PDO::PARAM_INT );
    $modif-> bindValue(':date_naissance', $_POST['date_naissance']);

    $modifier = $modif->execute();



    header('Location:espace_client.php');
}

