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

	<body >
		<div class = "bloc_page">

			<h1>Bienvenue ! </h1>

			<div class = "texte">

				<p><center>Vous êtes sur le site de Médiathèque de l'Université Paris-Sud
				</center></p>

				<div style="color: red;font-size: 14px;">
				<?php if(isset($_SESSION["erreurConnexion"])){ echo $_SESSION["erreurConnexion"]; }?>
				</div>
				
				<div><fieldset>
					<legend><h2>Connexion</h2></legend>

					<div class="connexion">
						<form method="post" action="../controler/controleur_connexion.php">
							<label for="nom"> E-mail </label>
								<input type="text" name="nom" id="nom"/> <br/>
								<br/>
							<label for="mdp"> Mot de passe </label>
								<input type="password" name="mdp" id="mdp"/> <br/>
								<br/>
							<input type="submit" name ="Action" value = "Connecter"/> <br/>
					</div>

				</div>

			<div class = "inscription">
				<p>
					Vous voulez vous inscrire? 
					<a href = "vue_inscription.php"> Cliquez ici </a>
				</p>
			</div>
			<div class = "mdpoublier">
				<p>
					Vous avez oublié votre mot de passe?
					<a href = "user_modifierMdp.php"> Cliquez ici </a>
				</p>
			</div>

		</div>

	</body>

</html>

<?php unset($_SESSION["erreurConnexion"]); ?>
