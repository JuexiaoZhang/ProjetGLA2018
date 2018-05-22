<?php

	session_start();

	require_once("../model/bd.php");
	require_once("../model/article.php");
	$_SESSION["erreurEx"] = "";
	
	// Si les champs ont bien été saisis
	if (!empty($_POST["idArt"]))
	{	
		$idArt = $_POST["idArt"];
		
		$bd = new Bd();
		$co= $bd->connexion();

		$req = "INSERT INTO exemplaire(idArticle) VALUES (".$idArt.")"; 
    	
    	if (mysqli_query($co, $req)) {
			header('Location:../view/gest_exemplaires.php');
    	}else{
    		header('Location:../view/gest_exemplaires.php');
			echo $_SESSION["erreurEx"] = "Article n'existe pas";
    	}   
	}
	// Si les champs n'ont pas été saisis
	else {
		header('Location:../view/gest_exemplaires.php');
		echo $_SESSION["erreurEx"] = "Veuille saisir un id article , svp."; 
	}

?>	