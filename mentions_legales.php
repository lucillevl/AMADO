<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Mentions légales</title>
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
		$page = 'mentions_legales';
		require_once('includes/nav.inc.php');?>
	<!-- FIN INCLUDE NAV BARRE-->
</header>
	<main>
		<section class="width-80 marg-auto">
			<div class="section">
				<h1 class="center-align">Mentions légales</h1>
				<p class="center-align">Le présent site lvanlaer.eemi.tech/amado (prochainement www.amado.io) est édité par le Projet AMADO.</p>
			</div>
			<div class="divider"></div>
				<div class="section">
					<h5 class="texte-justifie marron-text">Projet AmaDo</h5>
					<p class="texte-justifie">PROJET AMADO, est un projet de fin d’année proposé dans le cadre des projets de 2ème année de l’EEMI. Il est coproduit par Madison Hayat, Benjamin Kissous, Lucille Van Laer, Aubin Keravel et Aurélien Bonnaud-Leroux.</p>
				</div>
			<div class="section">
				<h5 class="texte-justifie marron-text">Siège social</h5>
				<p class="texte-justifie">28 Place de la Bourse, 75002 Paris, France</p>
			</div>
			<div class="divider"></div>
				<div class="section">
					<h5 class="texte-justifie marron-text">Telephone</h5>
					<p class="texte-justifie">06 76 95 38 43 (Gratuit depuis un poste fixe ou un mobile)</p>
			</div>
			<div class="divider"></div>
			<div class="section">
				<h5 class="texte-justifie marron-text">Email</h5>
				<p class="texte-justifie">amado.diy@gmail.com</p>
			</div>
			<div class="divider"></div>
				<div class="section">
					<h6 class="texte-justifie engras">Directeur de publication</h6>
					<p class="texte-justifie">Aubin Keravel - Responsable de projet</p>
					<h6 class="texte-justifie engras">Responsables de projet en marketing</h6>
					<p class="texte-justifie">Madison Hayat & Aurélien Bonnaud-Leroux</p>
					<h6 class="texte-justifie engras">Responsable design & intégration</h6>
					<p class="texte-justifie">Benjamin Kissous</p>
					<h6 class="texte-justifie engras">Responsable intégration, développement et MOA</h6>
					<p class="texte-justifie">Lucille Van Laer</p>
				</div>
			<div class="divider"></div>
				<div class="section">
					<h5 class="texte-justifie marron-text">Hébergement</h5>
					<p class="texte-justifie">Notre site est hébergé sur les serveurs de de l’EEMI.</p>
				</div>
		</section>
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