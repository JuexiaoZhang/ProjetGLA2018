<?php

	session_start();

	require_once("../model/bd.php");
	// require_once("../model/user.php");
	//$_SESSION["erreurConnexion"] = "";
	
	$bd = new Bd();
	$co= $bd->connexion();

	$req = "SELECT idExemplaire,exemplaire.idArticle,titre 
            FROM exemplaire,article 
            WHERE exemplaire.idArticle=article.idArticle"; 
    
    $res = mysqli_query($co, $req)
           or die ("Erreur lors de l'obtention les données des articles.");
    $listEx = "<table border=\"3\">
            <tr>
                <th>ID Exemplaire</th>
                <th>ID Article</th>
                <th>Titre</th>
            </tr>";

    while ($row = mysqli_fetch_row($res)) {
        $listEx = $listEx."<tr>
        				 <td>".$row[0]."</td>".
        				"<td>".$row[1]."</td>".
        				"<td>".$row[2]."</td></tr>";
    }

    $listEx = $listEx."</table>";


    $_SESSION["listEx"] = $listEx; 

    mysqli_free_result($res);

	header('Location:../view/gest_exemplaires.php'); 
	
	
						
	
?>	