<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connectez-vous</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <!--INCLUDE NAV BARRE-->
    <?php
     
    $page = 'espace_client';
    require_once('includes/nav.inc.php');
    require_once('includes/init.inc.php');
    require_once('includes/functions.inc.php');

     if(!empty($_GET['id_supp']) && is_numeric($_GET['id_supp'])){


        $delete = $pdo -> prepare('DELETE FROM clients WHERE id_clients = :id');
        $delete ->bindValue(':id', $_GET['id_supp'],PDO::PARAM_INT);
        $supprOK = $delete -> execute();
        session_unset ();
        session_destroy ();
        header('location:index.php');
      }

    if(isset($_SESSION['admin'])){
       $user = selectOne('clients', $_SESSION['admin']['id_clients']);
       $commande = $pdo->prepare('SELECT * FROM commandes WHERE id_client=:id_client');
       $commande->bindValue('id_client', $_SESSION['admin']['id_clients']);
       $commande->execute();
       $commandes = $commande->fetchAll(PDO::FETCH_ASSOC);
   } else{
      $user = selectOne('clients', $_SESSION['user']['id_clients']);
       $commande = $pdo->prepare('SELECT * FROM commandes WHERE id_client=:id_client');
       $commande->bindValue('id_client', $_SESSION['user']['id_clients']);
       $commande->execute();
       $commandes = $commande->fetchAll(PDO::FETCH_ASSOC);
   }



    ?>
    <!-- FIN INCLUDE NAV BARRE-->
</header>
<main class="flex-col flex-c-c">
    <h1>Espace client</h1>

   <?php if(isset($_SESSION['admin'])){
       echo '<p><a href="admin/gerer_articles.php" class="marron-text">Se rendre sur le backoffice</a></p>';
       echo '<h4 class="width-80">Bonjour '.$_SESSION['admin']['prenom'] .' '. $_SESSION['admin']['nom'].'</h4>';
   } else{
       echo '<h4 class="width-80">Bonjour '.$_SESSION['user']['prenom'] .' '. $_SESSION['user']['nom'].'</h4>';
   }?>
  


  <ul class="collapsible popout width-80 marg-auto marg-top-30 marg-bot-30" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons marron-text">edit</i>Modifier son compte</div>
      <div class="collapsible-body">
        <form action="modif_client.php" method="post" class="flex-col flex-c-c">
        <div class="flex flex-a-c width-100">
            <div class="input-field width-50 width-100-mob">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="<?=$user['nom']?>">
            </div>
            <div class="input-field width-50 margin-left-50px no-marg-mob width-100-mob">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="<?=$user['prenom']?>">
            </div>
        </div>

        <div class="flex flex-a-c width-100">
            <div class="input-field width-50 width-100-mob">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?=$user['email']?>">
            </div>
            <div class="input-field width-50 margin-left-50px no-marg-mob width-100-mob">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" value="<?=$user['password']?>">
            </div>
         </div>
        <div class="input-field width-100">
            <label for="adresse">Adresse</label>
            <input type="text" id="adresse" name="adresse" value="<?=$user['adresse']?>">
        </div>

        <div class="flex flex-a-c width-100">
            <div class="input-field width-50 width-100-mob">
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville" value="<?=$user['ville']?>">
            </div>
            <div class="input-field width-50 margin-left-50px no-marg-mob width-100-mob">
                <label for="code_postal">Code postal</label>
                <input type="text" id="code_postal" name="code_postal" value="<?=$user['code_postal']?>">
            </div>
         </div>
        <div class="input-field width-100">
            <label for="date_naissance">Date de naissance</label><br>
            <input type="date" id="date_naissance" name="date_naissance" placeholder="AAAA/MM/JJ" value="<?=$user['date_naissance']?>">
        </div>

        <input type="submit" class="btn marron-bg marg-top-30" name="modifier" value="Modifier son compte">

    </form>
     </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons marron-text">chrome_reader_mode</i>Mes commandes</div>
      <div class="collapsible-body">
        
        <table class="hightlight responsive-table">
        <thead>
          <tr>
              <th>Numéro de commande</th>
              <th>Montant</th>
              <th>Date de la commande</th>
              <th>État</th>
          </tr>
        </thead>

        <tbody>
        <?php foreach ($commandes as $key => $value) : ?>
          
          <tr>
            <td><?=$value['id_commandes']?></td>
            <td><?=$value['montant']?> €</td>
            <td><?=$value['date_commande']?></td>
            <td><?=$value['etat']?></td>
          </tr>
        <?php endforeach; ?>  
        </tbody>
      </table>
            
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons marron-text">clear</i>Supprimer son compte</div>
      <div class="collapsible-body"><a onclick="return confirm('Êtes vous sûr(e) de vouloir supprimer votre compte ?')" href="espace_client.php?id_supp=<?=$user['id_clients']?>" class="marron-text">Supprimer ce compte en cliquant ici</a></div>
    </li>
  </ul>



    <a href="logout.php" class="marron-text marg-top-30 marg-bot-30">Se déconnecter</a>
</main>

<!--INCLUDE FOOTER-->
<?php
require_once('includes/footer.inc.php');?>
<!-- FIN INCLUDE FOOTER-->
</body>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="script.js"></script>
</html>