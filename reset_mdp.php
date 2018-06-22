<?php
	if(isset($_POST['email']))
	{
		require_once('includes/init.inc.php');
		//Mise à jour de la BDD pour y insérer un token
		$email = utf8_decode($_POST['email']);
		$token = sha1(uniqid(rand()));

		$sql = 'UPDATE `pdo` . `formulaire_client` SET `token` = "'.$token.'" WHERE email = "'.$_POST['email']. '"';
		$req = mysqli_query($connexion, $sql) or die ('Erreur SQL <br>' .$sql. '<br>'.mysql_error());

	}






?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Formulaire ajout article</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	      rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
	<?php
		$page='formulaire_client';
		require_once ('includes/nav.inc.php');

	?>
</header>
<main class="width-80 marg-auto">
	<h1 class="center-align  engras">Réinitialisation de votre mot de passe</h1>
		<form action="reinitialisation.php" method="post" class="flex-col flex-c-c">
			<div class="input-field width-100">
				<label for="email">Email de récupération</label>
				<input type="text" id="email" name="email" value="email">
			</div>
			<input type="button" class="btn marron-bg marg-top-30" name="reset" value="Nouveau mot de passe">
		</form>

</main>
</body>
</html>
