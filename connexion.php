<?php
	require_once ('includes/init.inc.php');
	require_once('includes/functions.inc.php');
$msg='';
   if(isset($_POST['connexion'])) {

        $resultat = $pdo->prepare("SELECT * FROM clients WHERE email = :email AND password = :password");

        $resultat->bindValue(':email', $_POST['email']);
        $resultat->bindValue(':password', $_POST['password']);
        $resultat->execute();

        $resultats = $resultat->fetch(PDO::FETCH_ASSOC);


            if($resultats) {
                session_start();

                if($resultats['email'] == 'admin@gmail.com' && $resultats['password'] == 'admin'){
                    $_SESSION['admin'] = $resultats;
                }else{
                    $_SESSION['user'] = $resultats;
                }
                header('location:espace_client.php?signup=success');
            }
            else {
                $msg= '<p class="red-text">Mauvais identifiant ou mot de passe</p>';
            }
    }
?>
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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116153416-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-116153416-1');
    </script>

</head>
<body>
<header>
    <!--INCLUDE NAV BARRE-->
    <?php
    $page = 'connexion';
    require_once('includes/nav.inc.php');
    ?>
    <!-- FIN INCLUDE NAV BARRE-->
</header>
<main class="flex-col flex-c-c">
    <h1>Connectez-vous</h1>
    <?= $msg ?>
    <form action="#" method="post" class="width-50">
        <div class="row">
            <div class="input-field">
            <label for="email">Entrez votre Email</label>
            <input name="email" id="email" type="text" required>
            </div>
        </div>
        <div class="row">
            <div class="input-field">
            <label for="password">Mot de passe</label>
            <input name="password" id="password" type="password" required>
            </div>
        </div>
        <div class="row flex flex-c-c">
            <div class="input-field">
                <input type="submit" name="connexion" class="btn marron-bg" value="Connexion">
            </div>
        </div>
    </form>

    <a href="formulaire_client.php" class="marg-top-30 marg-bot-30 marron-text">Si vous n'êtes pas encore inscrit cliquez ici</a>
    <br>
    <a href="reset_mdp.php" class="marg-top-30 marg-bot-30 marron-text">Mot de passe oublié ?</a>
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