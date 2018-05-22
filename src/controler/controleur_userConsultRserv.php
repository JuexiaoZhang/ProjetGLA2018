<?php

    session_start();

    require_once("../model/bd.php");
    // require_once("../model/user.php");
    //$_SESSION["erreurConnexion"] = "";
    
    $bd = new Bd();
    $co= $bd->connexion();

    $req = "SELECT idReservation,article.titre,dateReservation,disponible
            FROM reservation,article 
            WHERE idUtilisateur =".$_SESSION['id']."
            AND reservation.idArticle = article.idArticle"; 
    
    $res = mysqli_query($co, $req)
           or die ("Erreur lors de l'obtention ses emprunts.");

    $mesReservations = "<table border=\"1\">
            <tr>
                <th>IdReservation</th>
                <th>TitreArticle</th>
                <th>DateRservation</th>
                <th>Disponnible</th>
                <th>Annuler</th> 
            </tr>";

    while ($row = mysqli_fetch_row($res)) {
        if ($row[3]==1) { $disponible="oui";} else {$disponible="pas encore";}
        $mesReservations = $mesReservations."<tr>
                         <td>".$row[0]."</td>".
                        "<td>".$row[1]."</td>".
                        "<td>".$row[2]."</td>".
                        "<td>".$disponible.
                        "<td><button class=\"annuler\" onclick=\"window.location='../controler/controleur_userAnnulerRserv.php?idReservation=".$row[0]."'\" />Annuler</button> </td>".
                        "</td> </tr>";
    }

    $mesReservations = $mesReservations."</table>";


    $_SESSION["mesReservations"] = $mesReservations; 

    mysqli_free_result($res);

    header('Location:../view/user_reservations.php'); 
    
?>  