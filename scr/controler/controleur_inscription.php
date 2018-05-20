<?php
	session_start();
	require_once("../model/bd.php");
	require_once("../model/user.php");

	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$email = $_POST["email"];
	$mdp = $_POST["mdp"];
	$mdp2 = $_POST["mdp2"];

	if($mdp!=$mdp2){
		header('Location:../view/vue_inscription.php');
		echo $_SESSION["erreurMdp"] = "Veillez confirmer votre mot de passe correctement"; 
		die("Veillez confirmer votre mot de passe correctement");
	}

	$email = test_input(($_POST["email"]);
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
		$emailErr = "adresse email impossible"; 
	}


	$coBd = new Bd();

	$co = $coBd->connexion();

	$user = new User($co,$nom,$prenom,$email,$mdp,$mdp2);

	header('Location:../view/vue_connexion.php');

?>
