<!-- PAGE DE CONNEXION -->

<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title> Bienvenue </title>
		<link rel="stylesheet" href="../style/stylePrincipal.css" />
	</head>

	<body>
		<div class = "bloc_page">

			<h1>Bienvenue ! </h1>

			<div class = "texte">

				<p><center>Vous pouvez saisir votre information si-cesous:</center></p>

				<div style="color: red;font-size: 14px;">
				<?php if(isset($_SESSION["erreurConnexion"])){ echo $_SESSION["erreurConnexion"]; }?>
				</div>

				<div><fieldset>
					<legend><h2>Inscription</h2></legend>

					<div class="connexion">
						<form method="post" action="../controler/controleur_inscription.php">
						<!--
							<label for="type"> Type </label>
								<select name="type">
									<option value="Utilisateur"> Utilisateur </option>
									<option value="Gestionnaire"> Gestionnaire </option>
								</select> 
							<br/>
						-->
							<label for="nom"> Nom </label>
								<input type="text" name="nom" id="nom"/> <br/>
								<br/>
							<label for="prenom"> Prenom </label>
								<input type="text" name="prenom" id="prenom"/> <br/>
								<br/>
							<label for="email"> Email </label>
								<input type="text" name="prenom" id="prenom"/> <br/>
								<br/>
							<label for="mdp"> Mot de passe </label>
								<input type="password" name="mdp" id="mdp"/> <br/>
								<br/>
							<label for="mdp2"> Confirmer votre mot de passe </label>
								<input type="password" name="mdp2" id="mdp2"/> <br/>
							<div style="color: red;font-size: 14px;">
							<?php if(isset($_SESSION["erreurMdp"])){ echo $_SESSION["erreurMdp"]; }?> 
							</div>

								<br/>
							<input type="submit" name ="Action" value = "ENVOYER"/> <br/>
					</div>

				</div>

		</div>

	</body>

</html>

<?php unset($_SESSION["erreurConnexion"]); 
		unset($_SESSION["erreurMdp"])
?>
