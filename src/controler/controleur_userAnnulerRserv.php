<?php
	session_start();
	require_once("../model/bd.php");
require_once("../model/user.php");
	$coBd = new Bd();
	$co = $coBd->connexion();

	if(empty($_GET['idReservation'])) {
		header('Location:../view/vue_accueil.php'); 
	} else {
        $idReservation = $_GET['idReservation'];
        
        $m = new User($co,$_SESSION['email']);
        $m->annulerReservation($idReservation); 

        header('Location:../view/user_reservations.php'); 
    }
    


?>



