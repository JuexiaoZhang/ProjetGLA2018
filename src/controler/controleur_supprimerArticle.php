<?php

	session_start();

	require_once("../model/bd.php");
	require_once("../model/article.php");
	$_SESSION["erreurArticle"] = "";
	
	// Si les champs ont bien été saisis
	if (!empty($_POST["idArt"]))
	{	
		$idArt = $_POST["idArt"];
		
		$bd = new Bd();
		$co= $bd->connexion();
		$art= new Article($co,$idArt);

		// if ($art->supprimer()) {
		// 	header('Location:../view/gest_articles.php');
		// }else{
		// 	$_SESSION["erreurArticle"] = "Mot de passe erroné."; 
		// 	header('Location:../view/gest_articles.php');
			
		// }

		$art->supprimer($co);
		header('Location:../view/gest_articles.php');
		
	}
	// Si les champs n'ont pas été saisis
	else {
		header('Location:../view/gest_articles.php');
		echo $_SESSION["erreurArticle"] = "Veuille remplir tout les champs, svp."; 
	}
	?>	