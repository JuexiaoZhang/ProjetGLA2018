<?php

	session_start();

	require_once("../model/bd.php");
	require_once("../model/article.php");
	$_SESSION["erreurArticle"] = "";
	
	// Si les champs ont bien été saisis
	if (!empty($_POST["type"]) &&
		!empty($_POST["titre"]) && 
		!empty($_POST["auteur"]) &&
		!empty($_POST["dateDay"]) &&
		!empty($_POST["dateMonth"]) &&
		!empty($_POST["dateYear"]) &&
		!empty($_POST["urlPhoto"]) &&
		!empty($_POST["frais"]) &&
		!empty($_POST["caution"]) &&
		!empty($_POST["description"]))
	{	
		$type = $_POST["type"];
		$titre = $_POST["titre"];
		$auteur = $_POST["auteur"];

		$dateDay = $_POST["dateDay"];
		$dateMonth = $_POST["dateMonth"];
		$dateYear = $_POST["dateYear"];

		// if ($dateDay<0 || $dateDay>31) {
		// 	header('Location:../view/gest_articles.php');
		// 	echo $_SESSION["erreurArticle"] = "Veuille remplir tout les champs, svp.";
		// }

		$urlPhoto = $_POST["urlPhoto"];
		$frais = $_POST["frais"];
		$caution = $_POST["caution"];
		$description = $_POST["description"];
		
		$bd = new Bd();
		$co= $bd->connexion();
		$m = new Article($co,$type,$titre,$auteur,$dateDay,$dateMonth,$dateYear,$urlPhoto,$frais,$caution,$description);
		
		
		// // Si le mot de passe est correct
		// if ($m->verif_pwd($pwd))
		// {
		// 	$m->connexion();
		// 	header('Location:../view/vue_accueil.php');
		// }
		// // Si le mot de passe n'est pas correct
		// else 
		// 	header('Location:../view/vue_connexion.php');
		// 	echo $_SESSION["erreurArticle"] = "Mot de passe erroné."; 
	}
	// Si les champs n'ont pas été saisis
	else {
		header('Location:../view/gest_articles.php');
		echo $_SESSION["erreurArticle"] = "Veuille remplir tout les champs, svp."; 
	}
	?>	