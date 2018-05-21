<?php
	session_start();
	require_once("../model/bd.php");
	require_once("../model/user.php");
	$_SESSION["erreurUserModifierMdp"] = "";
	$_SESSION["erreurUserModifierMdp_mdpErrone"] = "";

	$coBd = new Bd();
	$co = $coBd->connexion();

	if (!empty($_POST["mdpNew"]))
	{
		$mdpOld = $_POST["mdpOld"];
		$mdpNew = $_POST["mdpNew"];
		$m = new User($co,$_SESSION['email']);

		if ($mdpOld<>$_SESSION['mdp']) {
			header('Location:../view/user_modifierMdp.php');
			echo $_SESSION["erreurUserModifierMdp_mdpErrone"] = "Mot de passe actuel non correct!";
		} else {
			$m->modif_mdpParMdpActuel($mdpNew); 
			header('Location:../view/vue_compte_user.php');
		}
		
	} 

	if (empty($_POST["mdpNew"])){
		header('Location:../view/user_modifierMdp.php');
	}

	// header('Location:../view/vue_compte_user.php');
	

?>



