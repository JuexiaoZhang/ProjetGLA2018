<?php
	session_start();
	require_once("../model/bd.php");
	require_once("../model/user.php");
	$_SESSION["erreurInscription"] = "";


	// if (isset($_POST["nom"]) && 
	// 	isset($_POST["prenom"]) && 
	// 	isset($_POST["mdp"]) && 
	// 	isset($_POST["mdp2"]) && 
	// 	isset($_POST["email"])
	// 	){
	// 	$nom = $_POST["nom"];
	// 	$prenom = $_POST["prenom"];
	// 	//vérifier la mot de passe
	// 	$mdp = $_POST["mdp"];
	// 	$mdp2 = $_POST["mdp2"];
	// 	if($mdp!=$mdp2){
	// 		header('Location:../view/vue_inscription.php');
	// 		echo $_SESSION["erreurMdp"] = "Veillez confirmer votre mot de passe correctement"; 
	// 		die("Veillez confirmer votre mot de passe correctement");
	// 	}
	// 	//vérifier format de l'email
	// 	$email = $_POST["email"];
	// 	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
	// 		header('Location:../view/vue_inscription.php');
	// 		echo $_SESSION["erreurEmail"] = "Adresse email impossible"; 
	// 		die("Adresse email impossible");
	// 	}
	// }
	// // Si les champs n'ont pas été saisis
	// else {
	// 	header('Location:../view/vue_inscription.php');
	// 	echo $_SESSION["erreurInscription"] = "Tous les champs n'ont pas été saisis."; 
	// 	die("Tous les champs n'ont pas été saisis.");
	// }


	if (empty($_POST["nom"]) || empty($_POST["prenom"])){
		// Si les champs n'ont pas été saisis
		header('Location:../view/vue_inscription.php');
		echo $_SESSION["erreurInscription"] = "Tous les champs n'ont pas été saisis."; 
		die("Tous les champs n'ont pas été saisis.");
	}
	else {
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];

		//vérifier format de l'email
		$email = $_POST["email"];
		//$mode = '/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/'; 
		$mode = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
		if (!preg_match($mode,$email)) {
			header('Location:../view/vue_inscription.php');
			echo $_SESSION["erreurEmail"] = "Adresse email impossible"; 
			die("Adresse email impossible");
		}

		//vérifier la mot de passe
		$mdp = $_POST["mdp"];
		$mdp2 = $_POST["mdp2"];
		if($mdp!=$mdp2){
			header('Location:../view/vue_inscription.php');
			echo $_SESSION["erreurMdp"] = "Veillez confirmer votre mot de passe correctement"; 
			die("Veillez confirmer votre mot de passe correctement");
		}
		
	}	

	$coBd = new Bd();

	$co = $coBd->connexion();

	$user = new User($co,$nom,$prenom,$email,$mdp);

	header('Location:../view/vue_connexion.php');

?>
