<?php

	session_start();

	require_once("../model/bd.php");
	// require_once("../model/user.php");
	//$_SESSION["erreurConnexion"] = "";
	
	$bd = new Bd();
	$co= $bd->connexion();

	$req = "SELECT * FROM article"; 
    
    $res = mysqli_query($co, $req)
           or die ("Erreur lors de l'obtention les données des articles.");
    $listArticle = "<table border=\"3\">
            <tr>
                <th>Id</th>
                <th>Type</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date publication</th>
                <th>URL photo couverture</th>
                <th>Frais</th>
                <th>Caution</th>
            </tr>";

    while ($row = mysqli_fetch_row($res)) {
        $listArticle = $listArticle."<tr>
        				 <td>".$row[0]."</td>".
        				"<td>".$row[8]."</td>".
        				"<td>".$row[1]."</td>".
        				"<td>".$row[2]."</td>".
        				"<td>".$row[3]."</td>".
        				"<td>".$row[4]."</td>".
                        "<td>".$row[5]."</td>".
                        "<td>".$row[6]."</td></tr>";
    }

    $listArticle = $listArticle."</table>";


    $_SESSION["listArticle"] = $listArticle; 

    mysqli_free_result($res);

	header('Location:../view/gest_articles.php'); 
	
	
						
	
?>	