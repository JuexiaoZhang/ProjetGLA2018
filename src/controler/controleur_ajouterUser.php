<?php

	session_start();

	require_once("../model/bd.php");
	require_once("../model/user.php");
	//$_SESSION["erreurUser"] = "";
	
	// Si les champs ont bien été saisis
	if (!empty($_POST["nom"]) &&
		!empty($_POST["prenom"]) && 
		!empty($_POST["email"]))
	{	
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$email = $_POST["email"];

		$mode = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
		if (!preg_match($mode,$email)) {
			header('Location:../view/gest_infoUser.php');
			echo $_SESSION["erreurUser"] = "Adresse email impossible"; 
			die("Adresse email impossible");
		}
		
		$bd = new Bd();
		$co= $bd->connexion();
		$m = new User($co,$nom,$prenom,$email);
		
		header('Location:../view/gest_infoUser.php');
	}
	// Si les champs n'ont pas été saisis
	else {
		$_SESSION["erreurUser"] = "Veuille remplir tout les champs, svp."; 
		header('Location:../view/gest_infoUser.php');
		
	}
	?>	