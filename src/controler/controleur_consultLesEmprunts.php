<?php

	session_start();

	require_once("../model/bd.php");
	// require_once("../model/user.php");
	//$_SESSION["erreurConnexion"] = "";
	
	$bd = new Bd();
	$co= $bd->connexion();

	$req = "SELECT idEmprunt,emprunt.idUtilisateur,prenom,nom,exemplaire.idExemplaire, titre, dateEmprunt
            FROM emprunt,article,exemplaire,personne
            WHERE emprunt.idUtilisateur = personne.idPersonne
            AND emprunt.idExemplaire = exemplaire.idExemplaire
            AND exemplaire.idArticle=article.idArticle"; 

    $res = mysqli_query($co, $req)
           or die ("Erreur lors de l'obtention les données des emprunts.");
    $lesEmprunts = "<table border=\"2\">
            <tr>
                <th>IdEmprunt</th>
                <th>IdUtilisateur</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>IdExemplaire</th>
                <th>Titre</th>
                <th>DateEmprunt</th>
            </tr>";

    while ($row = mysqli_fetch_row($res)) {
        $lesEmprunts = $lesEmprunts."<tr>
        				 <td>".$row[0]."</td>".
        				"<td>".$row[1]."</td>".
                        "<td>".$row[2]."</td>".
                        "<td>".$row[3]."</td>".
                        "<td>".$row[4]."</td>".
                        "<td>".$row[5]."</td>".
        				"<td>".$row[6]."</td></tr>";
    }

    $lesEmprunts = $lesEmprunts."</table>";


    $_SESSION["lesEmprunts"] = $lesEmprunts; 

    mysqli_free_result($res);

	header('Location:../view/gest_emprunts.php'); 
	
	
						
	
?>	