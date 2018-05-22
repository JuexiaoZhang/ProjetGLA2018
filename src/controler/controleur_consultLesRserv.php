<?php

	session_start();

	require_once("../model/bd.php");
	// require_once("../model/user.php");
	//$_SESSION["erreurConnexion"] = "";
	
	$bd = new Bd();
	$co= $bd->connexion();

	$req = "SELECT idReservation,idUtilisateur,prenom,nom,reservation.idArticle,titre,dateReservation,disponible,nbExDisponible
            FROM reservation,article,personne
            WHERE reservation.idUtilisateur = personne.idPersonne
            AND reservation.idArticle = article.idArticle"; 

    $res = mysqli_query($co, $req)
           or die ("Erreur lors de l'obtention les données des réservations.");
    $lesReservations = "<table border=\"2\">
            <tr>
                <th>IdRservation</th>
                <th>IdUtilisateur</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>IdArticle</th>
                <th>Titre</th>
                <th>DateRservation</th>
                <th>Disponible</th>
                <th>nbExDisponible</th>
            </tr>";

    while ($row = mysqli_fetch_row($res)) {
        if ($row[7]==1) {$disponible="oui";} else{$disponible="non";}; 
        $lesReservations = $lesReservations."<tr>
        				 <td>".$row[0]."</td>".
        				"<td>".$row[1]."</td>".
                        "<td>".$row[2]."</td>".
                        "<td>".$row[3]."</td>".
                        "<td>".$row[4]."</td>".
                        "<td>".$row[5]."</td>".
                        "<td>".$row[6]."</td>".
                        "<td>".$disponible."</td>".
        				"<td>".$row[8]."</td></tr>";
    }

    $lesReservations = $lesReservations."</table>";


    $_SESSION["lesReservations"] = $lesReservations; 

    mysqli_free_result($res);

	header('Location:../view/gest_reservations.php'); 
	
	
?>	