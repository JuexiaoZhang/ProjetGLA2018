<!-- Angélique ETIENNE - Juexiao ZHANG (3B2) -->
<!-- SAISIR DISPONIBILITES SOUTENANCE -->

<?php session_start(); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Gestion stages S4 - IUT Orsay</title>
		<link rel="stylesheet" href="../../styles/Formulaire.css" />
	</head>

	<body>

		<!-- Barre d'onglets -->
		<div class = "barre_onglets">
			<ul id="barre_nav">
				<li><a href="accueil_enseignant.php">Accueil</a></li>
				<li><a href="#"> <?php echo $_SESSION["pseudo"] ?> </a></li>
				<li><a href="../../controleurs/controleur_deconnexion.php">Déconnexion</a></li>
				<li><a href="#">Aide</a></li>
			</ul>
		</div>

		<div class = "bloc_page">

			<div><fieldset>
						<h4>Ajouter soutenance succès</h4>
			</div></fieldset

		</div>

	</body>

</html>
