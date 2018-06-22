<?php
/**
 * Created by PhpStorm.
 * User: Lucille
 * Date: 06/03/2018
 * Time: 14:51
 */
require_once('includes/init.inc.php');


if(isset($_POST['ajouter'])){

    $ajout = $pdo->prepare("INSERT INTO clients(nom,prenom,email,password,adresse,ville,code_postal,date_naissance,created_at) VALUES (:nom,:prenom,:email,:password,:adresse,:ville,:code_postal,:date_naissance,NOW())");
    //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	//mot de passe alex Carty : alexcarty
	//Résultat du hash pour alexcarty = $2y$10$E54MrN6KQsL/pZClZbk6Ae4cXb0KiRJ8cvsymguNr3
    $ajout-> bindValue(':nom', $_POST['nom'], PDO::PARAM_STR );
    $ajout-> bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR );
    $ajout-> bindValue(':email', $_POST['email'], PDO::PARAM_STR );
    $ajout-> bindValue(':password', $_POST['password'], PDO::PARAM_STR );
    $ajout-> bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR );
    $ajout-> bindValue(':ville', $_POST['ville'], PDO::PARAM_STR );
    $ajout-> bindValue(':code_postal', $_POST['code_postal'], PDO::PARAM_INT );
    $ajout-> bindValue(':date_naissance', $_POST['date_naissance']);
    $ajouter = $ajout->execute();

    header('Location:formulaire_client.php');
}

