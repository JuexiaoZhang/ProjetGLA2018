<?php

	session_start();

	require_once("../model/bd.php");
	// require_once("../model/user.php");
	//$_SESSION["erreurConnexion"] = "";
	
	$bd = new Bd();
	$co= $bd->connexion();

	$req = "SELECT * FROM personne"; 
    
    $res = mysqli_query($co, $req)
           or die ("Erreur lors de l'obtention les données des utilisateurs.");
    $listInfoUser = "<table border=\"3\">
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>EstValide</th>
                <th>Caution</th>
                <th>Finance</th>
            </tr>";

    while ($row = mysqli_fetch_row($res)) {
        $listInfoUser = $listInfoUser."<tr>
        				 <td>".$row[0]."</td>".
        				"<td>".$row[2]."</td>".
        				"<td>".$row[3]."</td>".
        				"<td>".$row[4]."</td>".
        				"<td>".$row[5]."</td>".
        				"<td>".$row[7]."</td>".
        				"<td>".$row[8]."</td> </tr>";
    }

    $listInfoUser = $listInfoUser."</table>";


    $_SESSION["listInfoUser"] = $listInfoUser; 

    mysqli_free_result($res);

	header('Location:../view/gest_infoUser.php'); 
	
	
						
	
	
?>	