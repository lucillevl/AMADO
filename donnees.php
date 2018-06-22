<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vos données</title>
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

    ?>
    <!-- FIN INCLUDE NAV BARRE-->
</header>
<main class=" width-80 marg-auto texte-justifie" >
    <h1 class="center-align engras">Protection des données</h1>
<p class="marg-top-30">Les données collectées sont destinées à l'usage de amado.eemi.tech. Elles sont nécessaires au traitement et à la gestion des commandes du client ainsi qu’aux relations commerciales entre AMADOet le client.
AMADO est responsable de leur traitement. Elles peuvent être transmises aux sociétés et sous-traitants auxquels AMADO fait appel dans le cadre de l’exécution des commandes et des services proposés.</p>
<p>
Nous sommes susceptibles de collecter des données à caractère personnel nécessaires à l’exécution du contrat auquel vous serez le cas échéant partie et/ou aux mesures précontractuelles prises à votre demande.</p>
<p>
Les fichiers de la société AMADOsont déclarés auprès de la Commission Nationale de l'Informatique et des Libertés sous les numéros 1313661 et 1313662.
Conformément à la loi « informatique et libertés » du 6 janvier 1978 modifiée en 2004, vous bénéficiez d’un droit d’accès et de rectification aux informations qui vous concernent et d’opposition à leur traitement. Vous pouvez l’exercer en vous adressant à : amado.diy@gmail.com
</p>
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