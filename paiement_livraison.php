<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Paiement / livraison</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	      rel="stylesheet">
	<link rel="stylesheet" href="style.css">


</head>
<body>
<header>
	<!--INCLUDE NAV BARRE-->
	<?php
		$page = 'paiement_livraison';
		require_once('includes/nav.inc.php');?>
	<!-- FIN INCLUDE NAV BARRE-->
</header>
<main>
	<section class="width-90 marg-auto">
		<div class="section">
			<h1 class="center-align marg-bot-30">Paiements et Livraison</h1>
            <h3 class="center-align marg-bot-30">Les Paiements</h3>
            <section class="height-50 height-mob-auto flex flex-c-c row">
            <div class="col l3 s12 offset-s3 pad-top-30-mob ">
                <img src="photos/stripe_pay.png" alt="" class="height-30">
            </div>
            <div class=" col l6 s12 pad-20">
                <h5 class="align-center marron-text width-450px center-align">
                    De nouveaux standards de paiements en ligne
                </h5>
                <p class="align-center texte-justifie width-450px">
                    Stripe est la meilleure suite d'outils pour gérer une activité sur Internet. Nous gérons des flux de plusieurs milliards d'euros chaque année pour des entreprises innovantes dans le monde entier.
                    Compatible avec les cartes Visa, MasterCard, American Express et Revolut, votre pouvoir d’achat n’a plus de limite.
                </p>
            </div>
        </section>
            <section class="height-50 height-mob-auto flex flex-c-c row">
                <div class=" col l6 s12 pad-20">
                    <h5 class="align-center marron-text width-450px center-align">
                        Adoptez une solution de paiement simple et rapide.
                    </h5>
                    <p class="align-center width-450px">
                        En souscrivant au service Paypal vous pouvez effectuer vos paiements de manière simple et sécurisée. Que vous soyez particulier ou professionnel, créez un compte en quelques minutes et enregistrez vos coordonnées bancaires : carte ou compte.
                        Ama’Do fait en sorte que vos paiements soient faciles pour vos meubles en kit ou déjà montés.
                    </p>
                </div>
                <div class="col l4 s12 offset-s3 pad-top-30-mob ">
                    <img src="photos/paypal_pay.png" alt="logo-paypal" class="height-40">
                </div>
            </section>


			<div class="divider width-80 marg-bot-30 marg-top-30 marg-auto"></div>
			<div class="col width-80 marg-top-50px marg-auto">
                <h3 class="center-align marg-bot-30">Les Livraisons</h3>

                <h5 class="center-align marron-text marg-top-30 marg-bot-30">Achat groupé = Frais de port à -30% dès le 2ème article
</h5>
				<p class="center-align">Nous livrons partout en Ile-de-France (75, 77, 78, 91, 92, 93, 94, 95)… pour le moment
</p>
				<p class="center-align">Pour une commande groupée, vous bénéficiez dès le second article et pour les suivants de 50% de remise sur les frais de port. N'hésitez pas à grouper vos achats... et faites des économies ! Remise calculée sur les frais de port les moins élevés, le plus élevé étant facturé dans sa globalité.		</p>
			</div>
			<div class="col width-80 marg-top-50px marg-auto">
				<h5 class="center-align marron-text marg-top-30 marg-bot-30">Disponibilité des articles (en jours ouvrés)
</h5>
				<p class="center-align">Certains articles peuvent mettre plus de temps à la construction et à la livraison, lors de votre commande, il sera indiqué sous combien de temps les articles seront livrés.
• sous 7 jours > en stock dans nos entrepôts.
• sous 3 ou 6 semaines > en cours d'acheminement vers nos entrepôts.
• sous 4 mois > en cours de fabrication ou fabriqués à la demande. •
• en rupture momentanée > articles que nous allons fabriquer dans les prochains mois sur lesquels nous n'avons pas encore de délai à vous communiquer.

Attention : les livraisons se font uniquement en semaine du Lundi au Vendredi de 9h à 18h (selon ouverture des agences) hors week-end et jours fériés.
</p>
			</div>
			<div class="col width-80 marg-top-50px marg-auto">
				<h5 class="center-align marron-text marg-top-30 marg-bot-30">COLIS LÉGERS (-30 KG) > Expédition par service de messagerie à domicile
</h5>
				<p class="center-align">Ce service concerne l’expédition des petites pièces de décoration et du petit mobilier. Vous êtes livré sous 7 jours ouvrés, partout en France (sauf Dom-Tom) à compter du mail annonçant le départ de votre colis. N'oubliez pas d'indiquer le numéro de votre code-porte dans le cas échéant afin d'éviter le retour de votre colis dans nos entrepôts.
</p>
				
			</div>
			<div class="col width-80 marg-top-50px marg-auto">
				<h5 class="center-align marron-text marg-top-30 marg-bot-30">Vous êtes absent lors de la livraison ? Pas d'inquiétude !
</h5>
				<p class="center-align">Un avis de passage sera déposé dans votre boite aux lettres. Vous y trouverez les coordonnées téléphoniques du service de livraison afin de convenir d’une seconde date de passage ou l'adresse du point relais le plus proche afin de retirer votre colis.

				</p>
			</div>
			<div class="col width-80 marg-top-50px marg-auto">
				<h5 class="center-align marron-text marg-top-30 marg-bot-30">COLIS LOURDS (+30 KG) > Expédition par transporteur
</h5>
<h6 class="center-align marron-text">A. Livraison Classique : Colis présenté au pas de votre porte ou en bas de votre immeuble
</h6>
				<p class="center-align">Ce service concerne l’expédition des meubles. Le transporteur vous livre sous 7 jours ouvrés partout en France (sauf Dom-Tom) à compter du mail annonçant le départ de votre colis. Vous êtes contacté par le transporteur afin de convenir d’un rendez-vous de livraison, via les coordonnées téléphoniques indiquées lors de votre commande.

				</p>
				<h6 class="center-align marron-text">B. Livraison par Point Relais : Colis présenté dans un Point Relais proche de chez vous 

</h6>
				<p class="texte-justifie">Certains meubles de petite taille peuvent être livrés en Point Relai s’ils ne dépassent pas certaines dimension et un certain poids pour une livraison plus rapide.  

				</p>
			</div>
		
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
