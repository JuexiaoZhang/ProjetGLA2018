<?php

	session_start();

	require_once("../model/bd.php");
	// require_once("../model/user.php");
	//$_SESSION["erreurConnexion"] = "";
	
	$bd = new Bd();
	$co= $bd->connexion();

    if (empty($_POST['idReservation'])) {
        header('Location:../view/gest_reservations.php'); 
    } else {
        $idReservation = $_POST['idReservation']; 


        // verifier finance
        $idUser = $_SESSION['id'];

        $sql = "SELECT estValide,personne.caution,finance,article.caution,article.fraisEmprunt,reservation.idArticle,reservation.idUtilisateur,reservation.nbExDisponible
                FROM reservation,personne,article
                WHERE reservation.idReservation =".$idReservation."
                AND idUtilisateur = personne.idPersonne
                AND reservation.idArticle = article.idArticle"; 
        $res = mysqli_query($co, $sql)
            or die ("Erreur: SELECT estValide,personne.caution,finance,article.caution,article.fraisEmprunt,reservation.idArticle ");
        $row = mysqli_fetch_row($res);
        $estValide = $row[0];
        $cautionUser = $row[1];
        $financeUser = $row[2];
        $cautionArt = $row[3]; 
        $fraisEmprunt = $row[4]; 
        $idArticle = $row[5];
        $idUtilisateur = $row[6];
        $nbExDisponible = $row[7];

        if ($cautionUser>=$cautionArt && $financeUser>=$fraisEmprunt) {
            $sql = "SELECT idExemplaire
                FROM exemplaire
                WHERE idArticle = ".$idArticle."
                AND dansListRsv = 1"; 
            $res = mysqli_query($co, $sql)
                or die ("Erreur: SELECT idExemplaire");
            $row = mysqli_fetch_row($res);
            $idExemplaire = $row[0];

            $sql = "UPDATE exemplaire SET dansListRsv = 0 WHERE idExemplaire=".$idExemplaire; 
            $res = mysqli_query($co, $sql)
                or die ("Erreur: UPDATE exemplaire SET dansListRsv = 0 ");

            $sql = "INSERT INTO emprunt (idUtilisateur,idExemplaire,dateEmprunt) VALUES(".$idUtilisateur.", ".$idExemplaire.",CURRENT_TIMESTAMP)";
            $res = mysqli_query($co, $sql)
                or die ("Erreur: INSERT INTO emprunt (idUtilisateur,idExemplaire,dateEmprunt)");

            $sql = "DELETE FROM reservation WHERE idReservation=".$idReservation;
            $res = mysqli_query($co, $sql)
                or die ("Erreur: DELETE FROM reservation WHERE idUtilisateur=");

            $sql = "UPDATE reservation SET nbExDisponible = nbExDisponible-1 WHERE idArticle=".$idArticle; 
            $res = mysqli_query($co, $sql)
                or die ("Erreur: UPDATE reservation SET nbExDisponible = nbExDisponible-1");

            if ($nbExDisponible-1<=0) {
                $sql = "UPDATE reservation SET disponible = 0 WHERE idArticle=".$idArticle; 
                $res = mysqli_query($co, $sql)
                or die ("Erreur: UPDATE reservation SET disponible = 0");
            }

        }



        header('Location:../view/gest_reservations.php'); 
    }

	// $req = "SELECT idReservation,idUtilisateur,prenom,nom,reservation.idArticle,titre,dateReservation,disponible,nbExDisponible
 //            FROM reservation,article,personne
 //            WHERE reservation.idUtilisateur = personne.idPersonne
 //            AND reservation.idArticle = article.idArticle"; 

 //    $res = mysqli_query($co, $req)
 //           or die ("Erreur lors de l'obtention les données des réservations.");
 //    $lesReservations = "<table border=\"2\">
 //            <tr>
 //                <th>IdRservation</th>
 //                <th>IdUtilisateur</th>
 //                <th>Prenom</th>
 //                <th>Nom</th>
 //                <th>IdArticle</th>
 //                <th>Titre</th>
 //                <th>DateRservation</th>
 //                <th>Disponible</th>
 //                <th>nbExDisponible</th>
 //            </tr>";

 //    while ($row = mysqli_fetch_row($res)) {
 //        if ($row[7]==1) {$disponible="oui";} else{$disponible="non";}; 
 //        $lesReservations = $lesReservations."<tr>
 //        				 <td>".$row[0]."</td>".
 //        				"<td>".$row[1]."</td>".
 //                        "<td>".$row[2]."</td>".
 //                        "<td>".$row[3]."</td>".
 //                        "<td>".$row[4]."</td>".
 //                        "<td>".$row[5]."</td>".
 //                        "<td>".$row[6]."</td>".
 //                        "<td>".$disponible."</td>".
 //        				"<td>".$row[8]."</td></tr>";
 //    }

 //    $lesReservations = $lesReservations."</table>";


 //    $_SESSION["lesReservations"] = $lesReservations; 

 //    mysqli_free_result($res);

	
	
	
?>	