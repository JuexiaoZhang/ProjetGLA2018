<?php
	session_start();
	require_once("../model/bd.php");
	require_once("../model/user.php");

	$coBd = new Bd();
	$co = $coBd->connexion();

	if (empty($_POST["prenom"]) && empty($_POST["nom"])){
		header('Location:../view/vue_compte_user.php');
	}

	if (!empty($_POST["prenom"]) && !empty($_POST["nom"]))
	{
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$m = new User($co,$_SESSION['email']);

		$m->modif_infoPersoNom($nom); 
		$m->modif_infoPersoPrenom($prenom); 
		header('Location:../view/vue_compte_user.php');
	} 

	if (!empty($_POST["nom"]))
	{
		$nom = $_POST["nom"];
		$m = new User($co,$_SESSION['email']);

		$m->modif_infoPersoNom($nom); 
		header('Location:../view/vue_compte_user.php');
	} 

	if (!empty($_POST["prenom"])) {
		$prenom = $_POST["prenom"];
		$m = new User($co,$_SESSION['email']);

		$m->modif_infoPersoPrenom($prenom); 
		header('Location:../view/vue_compte_user.php');
	}
		
	

?>



