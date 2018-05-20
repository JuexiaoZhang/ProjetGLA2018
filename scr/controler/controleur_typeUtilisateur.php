<!-- AFFICHAGE DU SITE EN FONCTION DU TYPE D'UTILISATEUR -->

<?php
	require_once("../model/bd.php");
	require_once("../model/user.php");
	
	session_start();
	
	if (isset($_SESSION['type']))
	{
		if ($_SESSION['type']=="utilisateur") 
			$x=1;
		else if ($_SESSION['type']=="gestionnaire") 
			$x=2;
		switch($x)
				{
					case 1:
						header('Location:../view/vue_compte_user.php');
						break;
					case 2:
						header('Location:../view/vue_compte_gest.php');
						break;
				}
	}
	
?>