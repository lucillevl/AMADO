<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Paiement de la commande</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	      rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
	<?php
		$page='Paiement par Paypal';
		require_once ("includes/nav.inc.php");
		require_once ("includes/init.inc.php");
		require_once ("includes/functions.inc.php");
		$total = end($_SESSION['total']);

		if (isset($_POST['paiement-paypal'])) {
			session_unset($_SESSION['cart']) && session_unset($_SESSION['total']);
			session_destroy($_SESSION['cart']) && session_destroy($_SESSION['total']);
		}
	?>
</header>
<main class="width-80 marg-auto">
<h1 class="center-align engras">Payer la commande avec Paypal</h1>
  <p>Vos informations bancaires font l'objet d'un traitement unique et sécurisé, elles ne seront pas stockées au delà des délais nécessaires à la transaction, conformément à la Réglementation Générale de Protection des Données en vigueur le 18 mai 2018.</p>
<table>
	<tr>
		<td class="prix center-align"><p>Le montant total a payé est <?= $total ?> €</p></td>
	</tr>
	<tr >
		<td class="center-align">
			<!--https://www.paypal.com/cgi-bin/webscr url pour les vrai adresse paypal -->
			<!-- Si vous voulez modifier la doc est votre ami bon courage -->
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" target="_blank" method="post">
				<input name="amount" type="hidden" value="<?= $total ?>" />
				<input name="currency_code" type="hidden" value="EUR" />
				<input name="shipping" type="hidden" value="10" />
				<input name="tax" type="hidden" value="TVA =<?= $total * 0.2 ?>" />
				<input name="return" type="hidden" value="http://lvanlaer.eemi.tech/perso/2A/Amado/Integration/index.php" />
				<input name="cancel_return" type="hidden" value="http://lvanlaer.eemi.tech/perso/2A/Amado/Integration/panier.php" />
				<input name="notify_url" type="hidden" value="http://www.monsite.com/ipn.php" />
				<input name="cmd" type="hidden" value="_xclick" />
				<input name="business" type="hidden" value="amado-diy@gmail.com" />
				<input name="item_name" type="hidden" value="" />
				<input name="no_note" type="hidden" value="1" />
				<input name="lc" type="hidden" value="FR" />
				<input name="bn" type="hidden" value="PP-BuyNowBF" />
				<input name="custom" type="hidden" value="45" />
				<input class="btn marron-bg" type="submit" name="paiement-paypal" value="Payer le total" />
			</form>
			
		</td>
	</tr>
</table>
</main>
</body>
<?php
	require_once('includes/footer.inc.php');?>
<!-- FIN INCLUDE FOOTER-->
</body>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="script.js"></script>
</html>
