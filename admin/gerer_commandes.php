<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Gérer les commandes</title>
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
if (isset($_GET['id_mod'])) {
	if (isset($_POST['modifier'])) {
		$modif = $pdo->prepare('UPDATE commandes SET etat = :etat WHERE id_commandes=:id_commandes');
		$modif->bindValue('id_commandes', $_GET['id_mod']);
		$modif->bindValue('etat', $_POST['etat']);
		$modification = $modif->execute();
		if ($modification) {
			$msg='La modification a bien été effectuée';
		} else{
			$msg='La modification n\'a pas pu être effectuée';
		}
		header('location:gerer_commandes.php');
	}

	
}


	$commande = $pdo->prepare('SELECT * FROM commandes,clients WHERE id_client=id_clients');
       $commande->execute();
       $commandes = $commande->fetchAll(PDO::FETCH_ASSOC);

?>

<main class="width-80 marg-auto">
    <h1 class="center-align marron-text engras">Toutes les commandes</h1>
 <?=$msg;?>

<table class="hightlight responsive-table">
        <thead>
          <tr>
              <th>Numéro de commande</th>
              <th>Clients</th>
              <th>Adresse d'envoi</th>
              <th>Montant</th>
              <th>Date de la commande</th>
              <th>État</th>
              <th>Modifier</th>
          </tr>
        </thead>

        <tbody>
        <?php foreach ($commandes as $key => $value) : ?>
          
          <tr>
            <td><?=$value['id_commandes']?></td>
            <td><?=$value['prenom'] .' '.$value['nom']?></td>
            <td><?=$value['adresse']?></td>
            <td><?=$value['montant']?> €</td>
            <td><?=$value['date_commande']?></td>
            <td>
			<?php 
			if (isset($_GET['id_mod']) && $value['id_commandes'] == $_GET['id_mod']) : ?>
			 <form action="#" method="post">
			 <select name ="etat">
			   		<option <?php if ($value['etat'] == 'en cours de traitement') {
			   			echo "selected";
			   		}?>>en cours de traitement</option>
			   		<option <?php if ($value['etat'] == 'envoyé') {
			   			echo "selected";
			   		}?>>envoyé</option>
			   		<option <?php if ($value['etat'] == 'livré') {
			   			echo "selected";
			   		}?>>livré</option>
			 </select>
			 <input type ="submit" class="btn marron-bg" name="modifier" value="Modifier">
			 
			 <?php else :?>
			 	<?=$value['etat']?>
			  <?php endif;?>
            
            </td>
            <td class="center-align"><a href="?id_mod=<?=$value['id_commandes']?>"><i class="material-icons marron-text">edit</i></a></td>
          </tr>
        <?php endforeach; ?>  
        </tbody>
      </table>
            


</main>
</body>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="../script.js"></script>
</html>
