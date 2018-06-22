<?php 
session_start();
    require_once('includes/init.inc.php');
$type = '';

    if(isset($_SESSION['admin'])){
        $type = 'admin';
    } else{
        $type = 'user';
    }



$commande = $pdo->prepare("INSERT INTO commandes(id_client, montant, date_commande, etat) VALUES(:id_client,:montant,NOW(),:etat)");

$commande->bindValue('id_client', $_SESSION[$type]['id_clients'], PDO::PARAM_INT);
$commande->bindValue('montant', end($_SESSION['total']));
$commande->bindValue('etat', 'en cours de traitement');
$commande->execute();




$detail_commande = $pdo->prepare("INSERT INTO detail_commandes(id_commande, id_produit, quantite,prix) VALUES(:id_client,:montant,NOW(),:etat)");

if(isset($_POST['stripe'])){
header('location:commande_paiement.php');
} else if(isset($_POST['paypal'])){
header('location:commande_paiement_paypal.php');
}




?>