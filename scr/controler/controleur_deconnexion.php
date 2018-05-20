<?php
	require_once("../modeles/bd.php");
	require_once("../modeles/user.php");
	
	session_start();

	$bd = new BD();
	$co = $bd->connexion();
	
	session_unset();
	session_destroy();
	
	mysqli_close($co);
	
	header('Location:../vues/formulaire_connexion.php');
	
	?>	