<!-- ENVOI DES FORMULAIRES -->

<?php

	require_once("../modeles/bd.php");
	session_start();
	
	$page = $_POST["NumForm"];
	
	switch($page)
	{
		case 1 :
		$id = $_SESSION["id"];
		$nom = $_POST["Nom"];
		$prenom = $_POST["Prenom"];
		$dateNais = $_POST["DateNaissance"];
		$numEtu = $_POST["NumEtudiant"];
		$typeStage = $_POST["TypeStage"];
		$entreprise = $_POST["Entreprise"];
		$adresseEnt = $_POST["AdresseEntreprise"];
		$cpEntreprise = $_POST["CpEntreprise"];
		$villePays = $_POST["VillePays"];
		$date = $_POST["Date"];
		
		$bd = new Bd();
		$co= $bd->connexion();
		
		$req = "INSERT INTO `fichelocalisation` (`id_ficheLocalisation`, `NomEtudiant`, `PrenomEtudiant`, `DateNaissance`, `NumEtudiant`, `TypeStage`, `NomEntreprise`, `AdresseEntreprise`, `CpEntreprise`, `VillePays`, `Date`)
				VALUES ('$id', '$nom', '$prenom', '$dateNais', '$numEtudiant', '$typeStage', '$entreprise', '$adresseEnt', '$cpEnt', '$villePays', '$date');";
	
		mysqli_query($co, $req) or die ("erreur insertion");
		
		break;
	}

?>