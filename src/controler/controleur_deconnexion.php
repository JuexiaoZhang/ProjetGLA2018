<?php
	require_once("../model/bd.php");
	require_once("../model/user.php");
	
	session_start();

	$bd = new BD();
	$co = $bd->connexion();
	
	session_unset();
	session_destroy();
	
	mysqli_close($co);
	
	header('Location:../view/vue_accueil.php');
?>	