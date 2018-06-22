<!DOCTYPE html>
<html lang="fr" xmlns:https="">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>CGV</title>
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
		$page = 'cgv';
		require_once('includes/nav.inc.php');?>
	<!-- FIN INCLUDE NAV BARRE-->
</header>
<main>
	<section class="width-90 marg-auto texte-justifie">
		<div class="section">
			<h1 class="center-align">Conditions Générales de Vente</h1>
			<div class="col width-80 marg-top-20px marg-auto">
				<h4 class="texte-justifie marron-text">Préambule</h4>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<p class="texte-justifie">Le présent site (x.amado.eemi.tech) est édité par le Projet AMADO, dans le cadre d’un projet de fin d’année. Il peut constituer une société en formation du fait qu’il dispose d’un système de paiement en ligne.  La structure, si elle est complétée sera immatriculée au Registre du Commerce et des Sociétés de Paris ; en attendant elle est constituée de ses mandataires sociaux qui sont solidairement et indéfiniment responsable de la société en formation :</p>
				<p class="texte-justifie">Lucille Van Laer</p>
				<p class="texte-justifie">Madison Hayat</p>
				<p class="texte-justifie">Benjamin Kissous</p>
				<p class="texte-justifie">Aubin Keravel</p>
				<p class="texte-justifie">Aurélien Bonnaud-Leroux</p>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<p class="texte-justifie">Le siège social est au Palais de la Bourse (75002), 28 place de la Bourse. AMADO est joignable au 06 76 95 38 43 (numéro du responsable de projet) ou via amado.diy@gmail.com. Les présentes conditions générales de vente s'appliquent entre AMADO et toute personne visitant ou effectuant un achat via le site amado.eemi.tech.
				</p>
				<p class="texte-justifie">AMADO peut modifier à tout moment les présentes conditions générales de vente. En cas de changement, il sera appliqué à chaque commande les conditions générales de vente en vigueur au jour de la commande. La date de dernière mise à jour des conditions générales de vente est indiquée en bas de cette page.
				</p>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<h4 class="texte-justifie marron-text">Cadre contractuel</h4>
				<p class="texte-justifie">Le client reconnaît avoir pris connaissance, préalablement à la validation de sa commande, des présentes conditions générales de vente. Il les accepte en cliquant sur le bouton de validation de sa commande. Il est précisé au client qu’il peut sauvegarder ou imprimer les présentes conditions générales de vente. De plus, ces dernières datées du jour de la commande sont envoyées au client en pièce jointe lors du mail de confirmation de commande.
				</p>
				<p class="texte-justifie">AMADO peut modifier à tout moment les présentes conditions générales de vente. En cas de changement, il sera appliqué à chaque commande les conditions générales de vente en vigueur au jour de la commande. La date de dernière mise à jour des conditions générales de vente est indiquée en bas de cette page.
				</p>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<h4 class="texte-justifie marron-text">Conclusion du Contrat</h4>
				<p class="texte-justifie">Le contrat sera, en application des dispositions du Code civil, conclu dès le clic sur le bouton "Confirmer et Payer", par lequel vous aurez confirmé votre panier d'achat après avoir pu le corriger.</p>
				<p class="texte-justifie">Tout contrat conclu avec le Client correspondant à une commande d’un montant supérieur à 200 euros TTC sera archivé par amado.eemi.tech pendant une durée de 10 (10) ans pour des raisons de garanties relative au Code de la consommation et au Code civil. Pour accéder aux contrats archivés qu’il a souscrits, le Client devra en faire la demande à amado.diy@gmail.com.</p>
				<p class="texte-justifie">La langue du contrat est le français.
				</p>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<h4 class="texte-justifie marron-text">Prix et Modalités de Paiement</h4>
				<p class="texte-justifie">Les prix sont exprimés en euros et incluent la TVA valable en France. La société d'importation AMADO, de par sa nature à travailler sur des marchés internationaux, sur lesquels peuvent fluctuer fortement les monnaies, se réserve le droit de modifier ses prix à tout moment sur son site.</p>
				<p class="texte-justifie">Le prix facturé au client est celui affiché sur le récapitulatif juste avant que le client ne confirme sa commande. Ce prix est rappelé sur la confirmation de commande.
				</p>
				<p class="texte-justifie">La date d’expédition de la commande correspond à la date effective de la réception du paiement par AMADO. AMADO livrera le client à l'adresse indiquée par celui-ci lors de sa commande.</p>
				<p class="texte-justifie">Le lien d'accès à la facture sera adressé par email au client dès l'expédition de la commande, il pourra également retrouver la facture sur son compte client. Les informations de facturation ne pourront être modifiées après expédition de la commande.
				</p>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<p class="texte-justifie">Les modes de règlement acceptés sont les suivants :</p>
				<ul>
					<li><p>Paiement par carte bancaire via Stripe ou règlement Paypal : La commande ne sera valide qu'une fois que le paiement aura été confirmé par le prestataire de paiement.
						</p></li>
					<li><p>Notre partenaire vous propose une solution de financement qui permet de payer vos achats de 500€ à 2000€ en trois fois avec votre carte bancaire.
						</p></li>
					<li><p>Cette offre est réservée aux particuliers (personnes physiques majeures) résidant en France et Belgique, titulaires d’une carte bancaire Visa et MasterCard possédant une date de validité supérieure à la durée du financement choisie.
						<p/></li>
					<li><p>Les cartes à autorisation systématique de type Electron ou Maestro, les e-cards, les cartes Indigo et American Express ne sont pas acceptées.
						Après avoir terminé votre commande, il vous suffit de cliquer sur le bouton « paiement en 3 fois par carte bancaire ».
						</p></li>
					<li><p>Vous êtes alors redirigé vers la page internet sécurisée de notre partenaire affichant le récapitulatif détaillé de votre commande et la demande de financement personnalisée, que vous devez ensuite valider.</p></li>
				</ul>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<p class="texte-justifie">La société AMADO se réserve le droit de refuser toute commande passée par un client avec lequel elle serait ou aurait été en litige. Afin d’optimiser la sécurité des paiements, nous procédons à des demandes de justificatifs complémentaires dont les seuls destinataires sont la société Ticket for the Moon SAS. En cas de défaut de réponse, nous nous réservons la possibilité d’annuler la commande.
				</p>
				<p class="texte-justifie">Vous disposez d’un droit d’accès et de rectification auprès de la société en formation AMADO, Palais Brongniart, 28 Place de la Bourse, 75002, Paris et amado.diy@gmail.com
				</p>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<h4 class="texte-justifie marron-text">Disponibilités et Livraisons</h4>
				<p class="texte-justifie">Le client est informé par AMADO de la disponibilité du ou des produits et des délais de livraison lors de la passation de sa commande.</p>
				<p class="texte-justifie">Tout empêchement technique de réceptionner le ou les colis à l'arrivée du transporteur chez le client ne peut entrainer ni retour ni remboursement. Il appartient donc au client, avant la confirmation de sa commande, de vérifier toutes ses capacités à pouvoir recueillir sa commande en lieu et place indiqués lors de sa commande. Aucune modification d'adresse ne pourra être effectuée après expédition de la commande. Par ailleurs, la société AMADO se réserve le droit d'annuler toute commande qui ne pourrait aboutir suite à des motifs conjoncturels ou techniques affectant le processus de fabrication. L'annulation de commande engage la société AMADO à rembourser intégralement les sommes versées pour cette commande, sans que le client ne puisse réclamer en plus un dédommagement supplémentaire. Les produits sont livrés à l'adresse indiquée sur la commande confirmée.
				</p>
				<p class="texte-justifie">AMADO s'engage à envoyer le produit commandé dans l'état exact auquel il aura été décrit pendant la vente et confirmé à la commande. AMADO s'engage à emballer le produit dans les meilleurs conditionnements possibles et cela au regard de l'encombrement, du poids ainsi que de la taille du produit à expédier.</p>
				<p class="texte-justifie">Le mode de livraison dépend du poids, de la zone géographique, du volume et de la valeur du produit.</p>
				<p class="texte-justifie">La livraison par transporteur : Ce service concerne l'expédition des petites pièces et de certains mobiliers et livre à titre indicatif sous 7 jours ouvrés partout en France à compter de la réception du paiement.</p>
				<p class="texte-justifie">Le client est informé par email du départ du produit commandé des entrepôts de AMADO et de la marche à suivre pour bien réceptionner son colis.
				</p>
				<p class="texte-justifie">Une fois dans la région du client, le transporteur le contactera (entre 24 et 72 h après réception dans son dépôt) afin de convenir d'un jour de livraison, hors week-end et jours fériés. Sans réponse du client, et après 72h d'attente, le colis sera réacheminé dans les locaux de AMADO.</p>
				<p class="texte-justifie">Pour les livraisons sur les Ies situées en France, nous invitons les clients à contacter notre service client afin de vérifier si la livraison est réalisable par nos transporteurs.
				</p>
				<p class="texte-justifie">Si la prestation est possible, des frais supplémentaires pourront être demandés au client.
				</p>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<h4 class="texte-justifie marron-text">La Réception du Colis</h4>
				<p class="texte-justifie">Le transporteur n’est pas un livreur. Il ne monte pas aux étages et déposent les colis à la porte du client. Le client doit impérativement vérifier le colis en présence du transporteur. Cette vérification est considérée comme effectuée dès lors que le client, ou une personne autorisée par elle, a signé le bon de livraison.
				</p>
				<p class="texte-justifie">Si le colis a été endommagé, le client doit impérativement le refuser et noter des réserves explicites sur le bordereau de livraison. Le client doit également signaler à AMADO les anomalies et confirmer ses réserves et refus de réceptionner le colis.</p>
				<p class="texte-justifie">A réception du retour du colis dans ses entrepôts et après constatation du dommage, AMADO proposera soit l'échange du produit, soit un bon d'achat ou le remboursement intégral du produit endommagé.</p>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<h4 class="texte-justifie marron-text">Réserve de Propriété</h4>
				<p class="texte-justifie">Les produits demeurent la propriété de AMADO jusqu'à la signature par le client du bon de livraison du transporteur, une fois que le client en avez acquitté le prix complet.</p>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<h4 class="texte-justifie marron-text">Droit de Rétractation</h4>
				<h5 class="texte-justifie">Périmètre du droit de rétractation</h5>
				<p class="texte-justifie">Conformément à l’article L. 121-20 du Code de la consommation, vous bénéficiez d’un délai de rétractation de quatorze (14) jours à compter de la réception pour les biens ou de l’acceptation de l’offre pour les prestations de services. Dans le cas où le délai de quatorze (14) jours expire un samedi, un dimanche ou un jour férié ou chômé, il serait prorogé jusqu’au dernier jour ouvrable suivant. Vous n’avez pas à justifier de motifs pour exercer votre droit de rétractation. A titre exceptionnel, la société en formation AMADO  porte le délai de rétractation à trente (30) jours.
				</p>
				<p class="texte-justifie">ATTENTION : Le droit de rétractation ne s'applique pas pour les livraisons en Suisse. Le droit Suisse ne prévoit aucun délai de rétractation ou autre droit de retour une fois la commande passée.</p>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<h4 class="texte-justifie marron-text">Modalité d'exercice du droit de Rétractation</h4>
				<p class="texte-justifie">L’exercice du droit de rétractation par le client n’entraîne aucune pénalité. Toutefois, le client est averti qu’une compensation pourra lui être demandée s’il a été fait un usage du produit non conforme aux principes du droit civil. En cas d’exercice du droit de rétractation, le client devra renvoyer le produit à l’adresse suivante :</p>
				<h6 class="texte-justifie">Société en formation  SAS AMADO</h6>
				<p class="texte-justifie">28 place de la Bourse
				</p>
				<p class="texte-justifie">Palais Brongniart,
				</p>
				<p class="texte-justifie">Les frais de retour sont à la charge de AmaDo. L’exercice du droit de rétractation donne lieu à un remboursement du client dans un délai de trente (30) jours à compter de la date à laquelle le client fournit la preuve du renvoi du ou des articles concernés, ou à compter de la date à laquelle le ou les articles sont réceptionnés par AmaDo dans ses entrepôts. Le remboursement du client sera effectué par le moyen de paiement utilisé lors de la commande, sauf en cas d'accord avec le client quant au moyen de paiement utilisé pour le remboursement de sa commande. Le remboursement du client comprendra le remboursement de toute somme versée, incluant les frais d’expédition du produit.</p>
				<p class="texte-justifie">Le client souhaitant exercer son droit de rétractation est invité à remplir le formulaire de rétractation disponible ici : formulaire de rétractation</p>
				<p class="texte-justifie">Un formulaire textuel peut également nous être adressé par voie postale ou sur amado.diy@gmail.com</p>
				<p class="texte-justifie">Un modèle de ce formulaire est disponible ici :
				</p>
				<p class="texte-justifie">Modèle de formulaire de rétractation (Veuillez compléter et renvoyer le présent formulaire uniquement si vous souhaitez vous rétracter du contrat)</p>
				<p class="texte-justifie">A l'attention de AmaDo , 28 place de la Bourse, Palais Brongniart 75002 Paris ou amado.diy@gmail.com</p>
				<p class="texte-justifie">Je/Nous(*) notifie/notifions (*) par la présente ma/notre (*) rétractation du contrat portant sur la vente du bien (*) ci-dessous</p>
				<p class="texte-justifie">Commandé le (*), reçu le (*)</p>
				<p class="texte-justifie">Nom du (des) consommateur(s)</p>
				<p class="texte-justifie">Adresse du (des) consommateur(s)</p>
				<p class="texte-justifie">Signature du (des) consommateur(s) (uniquement en cas de notification du présent formulaire sur papier)</p>
				<p class="texte-justifie">Date</p>
				<p class="texte-justifie">Le client à renvoyer à AmaDo le produit neuf dans son emballage d'origine, intact, accompagné de tous les accessoires éventuels, notices d'emploi et documentations. Afin d'assurer le suivi du colis, il est demandé au client d'effectuer son retour de la même façon et avec les mêmes prestataires que ceux choisis par AmaDo pour son envoi.</p>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<h6 class="texte-justifie marron-text">Annulation de commande après expédition</h6>
				<p class="texte-justifie">>Le client ne pourra demander l'annulation de sa commande si la marchandise a été prise en charge par le transporteur. Le client devra faire usage de son droit de rétractation lors de la livraison.</p>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<h4 class="texte-justifie marron-text">Propriété Intellectuelle</h4>
				<p class="texte-justifie">
				<p class="texte-justifie">La présentation et le contenu du présent site internet constituent, ensemble, une œuvre protégée par les lois en vigueur sur la propriété intellectuelle, dont AMADO est titulaire.</p>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<h6 class="texte-justifie marron-text">Droits d’auteur
				</h6>
				<p class="texte-justifie">Les textes, images, dessins et le lay-out ainsi que la charte graphique du présent site sont protégés par le droit de la propriété intellectuelle. Il est interdit de copier, extraire, diffuser ou modifier le contenu du présent site internet à des fins commerciales. Le téléchargement ainsi que l’impression de texte, images et éléments graphiques sont autorisés au seul usage privé et non commercial. La reproduction de dessins, images, documents sonores, séquences vidéo et textes dans d’autres publications électroniques ou imprimées nécessite le consentement écrit préalable de AMADO.</p>
				<p class="texte-justifie">Le défaut d’autorisation est sanctionné par le délit de contrefaçon. Toute reproduction, intégrale ou partielle, est systématiquement soumise à l’autorisation de AMADO.</p>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<h6 class="texte-justifie marron-text">Bases de Données </h6>
				<p class="texte-justifie">Les bases de données établies par AMADO sont protégées par le droit d’auteur ainsi que par la loi du 1er juillet 1998 portant transposition dans le Code de la propriété intellectuelle de la directive européenne du 11 mars 1996 relative à la protection juridique des bases de données.</p>
				<p class="texte-justifie">Sauf autorisation écrite de AMADO, toute reproduction, représentation, adaptation, traduction et/ou modification, partielle ou intégrale ainsi que toute extraction substantielle qualitative ou quantitative vers un autre site internet est interdite et sanctionnée par les articles L.343-4 et suivants du Code de la propriété intellectuelle. »
				</p>
			</div>
			<div class="col width-80 marg-top-20px marg-auto">
				<h4 class="texte-justifie marron-text">Litiges</h4>
				<p class="texte-justifie">Le présent contrat est soumis au droit français. En cas de difficultés dans l'application du présent contrat, l'acheteur a la possibilité avant toute action en justice, de rechercher une solution amiable notamment avec l'aide d'une association professionnelle de la branche, d'une association de consommateurs ou de tout autre conseil de son choix. Il est rappelé qu'en règle générale et sous réserve de l'appréciation des Tribunaux, le respect des dispositions du présent contrat relatives à la garantie contractuelle suppose que l'acheteur honore ses engagements financiers envers le vendeur. Les réclamations ou contestations seront toujours reçues avec bienveillance, la bonne foi étant toujours présumée chez celui qui prend la peine d'exposer ses situations. En cas de litige, le client s'adressera par priorité à L’EEMI pour obtenir une solution amiable.</p>
				<p class="texte-justifie">Date de dernière mise à jour des présentes Conditions Générales : février 2018.</p>
			</div>
		</div>
	</section>
</main>
<!--INCLUDE FOOTER-->
<?php
	require_once('includes/footer.inc.php');?>
<!-- FIN INCLUDE FOOTER-->
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="script.js"></script>
</html>