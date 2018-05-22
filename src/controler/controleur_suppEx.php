<?php

	session_start();

	require_once("../model/bd.php");
	require_once("../model/article.php");
	$_SESSION["erreurExSup"] = "";
	
	// Si les champs ont bien été saisis
	if (!empty($_POST["idEx"]))
	{	

    	$idEx = $_POST["idEx"];
		
		$bd = new Bd();
		$co= $bd->connexion();

		$req = "DELETE FROM exemplaire WHERE idExemplaire=".$idEx; 
    	
    	mysqli_query($co, $req);
		
		header('Location:../view/gest_exemplaires.php');

	}
	// Si les champs n'ont pas été saisis
	else {
		header('Location:../view/gest_exemplaires.php');
		echo $_SESSION["erreurExSup"] = "Veuille saisir un id exemplaire , svp."; 
	}
	?>	