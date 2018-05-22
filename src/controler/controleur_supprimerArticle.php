<?php

	session_start();

	require_once("../model/bd.php");
	require_once("../model/article.php");
	$_SESSION["erreurSpArticle"] = "";
	
	// Si les champs ont bien été saisis
	if (!empty($_POST["idArt"]))
	{	
		$idArt = $_POST["idArt"];
		
		$bd = new Bd();
		$co= $bd->connexion();
		$art= new Article($co,$idArt);

		$art->supprimer($co);
		header('Location:../view/gest_articles.php');
		
	}
	// Si les champs n'ont pas été saisis
	else {
		header('Location:../view/gest_articles.php');
		echo $_SESSION["erreurSpArticle"] = "Veuille saisir un id article, svp."; 
	}
	?>	