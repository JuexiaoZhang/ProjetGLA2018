<?php

	session_start();

	require_once("../model/bd.php");
	require_once("../model/user.php");
	$_SESSION["erreurConnexion"] = "";
	
	// Si les champs ont bien été saisis
	if (!empty($_POST["nom"]) && !empty($_POST["mdp"]))
	{
		$nom = $_POST["nom"];
		$pwd = $_POST["mdp"];
		
		$bd = new Bd();
		$co= $bd->connexion();
		$m = new User($co,$nom);
		
		// Si le mot de passe est correct
		if ($m->verif_pwd($pwd))
		{
			$m->connexion();
			header('Location:controleur_typeUtilisateur.php');
		}
		// Si le mot de passe n'est pas correct
		else 
			header('Location:../view/vue_connexion.php');
			echo $_SESSION["erreurConnexion"] = "Mot de passe erroné."; 
	}
	// Si les champs n'ont pas été saisis
	else {
		header('Location:../view/vue_connexion.php');
		echo $_SESSION["erreurConnexion"] = "Tous les champs n'ont pas été saisis."; 
	}
	?>	