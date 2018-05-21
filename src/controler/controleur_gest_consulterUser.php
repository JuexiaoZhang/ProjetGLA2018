<?php

	session_start();

	require_once("../model/bd.php");
	// require_once("../model/user.php");
	//$_SESSION["erreurConnexion"] = "";
	
	$bd = new Bd();
	$co= $bd->connexion();

	$_SESSION["co"] = $co; 

	header('Location:../view/gest_infoUser.php'); 
	



	$req = "SELECT * FROM personne"; 
	$res = mysqli_query($co, $req)
		or die ("Erreur lors de l'obtention les données des utilisateurs.");

	$row = mysqli_fetch_assoc($res);
	
						
	
	
?>	