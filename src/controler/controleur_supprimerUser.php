<?php

	session_start();

	require_once("../model/bd.php");
	require_once("../model/user.php");
	$_SESSION["erreurSpUser"] = "";
	
	// Si les champs ont bien été saisis
	if (!empty($_POST["idUser"]))
	{	
		$idUser = $_POST["idUser"];
		
		$bd = new Bd();
		$co= $bd->connexion();
		$art= new User($co,$idUser);

		$art->supprimer($co);
		header('Location:../view/gest_infoUser.php');
		
	}
	// Si les champs n'ont pas été saisis
	else {
		header('Location:../view/gest_infoUser.php');
		echo $_SESSION["erreurIn"] = "Veuille remplir tout les champs, svp."; 
	}
	?>	