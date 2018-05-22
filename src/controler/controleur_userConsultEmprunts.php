<?php

    session_start();

    require_once("../model/bd.php");
    // require_once("../model/user.php");
    //$_SESSION["erreurConnexion"] = "";
    
    $bd = new Bd();
    $co= $bd->connexion();

    $req = "SELECT idEmprunt,article.titre,dateEmprunt
            FROM emprunt,exemplaire,article 
            WHERE idUtilisateur =".$_SESSION['id']."
            AND emprunt.idExemplaire = exemplaire.idExemplaire
            AND exemplaire.idArticle = article.idArticle"; 
    
    $res = mysqli_query($co, $req)
           or die ("Erreur lors de l'obtention ses emprunts.");
    $mesEmprunts = "<table border=\"1\">
            <tr>
                <th>IdEmprunt</th>
                <th>TitreArticle</th>
                <th>DateEmprunt</th>
            </tr>";

    while ($row = mysqli_fetch_row($res)) {
        $mesEmprunts = $mesEmprunts."<tr>
                         <td>".$row[0]."</td>".
                        "<td>".$row[1]."</td>".
                        "<td>".$row[2]."</td> </tr>";
    }

    $mesEmprunts = $mesEmprunts."</table>";


    $_SESSION["mesEmprunts"] = $mesEmprunts; 

    mysqli_free_result($res);

    header('Location:../view/user_emprunts.php'); 
    
?>  