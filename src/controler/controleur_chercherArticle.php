<?php

    session_start();

    require_once("../model/bd.php");
    $_SESSION["aucunArticleTrouve"] = "";
    
    $bd = new Bd();
    $co= $bd->connexion();

    if (empty($_POST['chercherArticle'])) {
         header('Location:../view/vue_accueil.php'); 
    }

    $type = $_POST['type'];
    if ($_POST['type']=='idArticle') {
        
        $idArticle = $_POST['chercherArticle']; 
        $req = "SELECT idArticle,titre,auteur,datePublication,fraisEmprunt,caution,type
                    FROM article
                    WHERE idArticle =".$idArticle;
    } else {
        $chaine = $_POST['chercherArticle']; 

        $req = "SELECT idArticle,titre,auteur,datePublication,fraisEmprunt,caution,type
                    FROM article
                    WHERE titre = '".$chaine."'
                    OR auteur ='".$chaine."'
                    OR type ='".$chaine."'"; 

    }

    
    $nbArticlesTrouves=0; 
    $res = mysqli_query($co, $req)
        or die ("Erreur lors de chercher un article");

    $articlesTrouves = "<table border=\"2\">
            <tr>
                <th>IdArticle</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>DatePublication</th>
                <th>FraisEmprunt</th>
                <th>Caution</th>
                <th>Type</th>
                <th>Consulter</th>
            </tr>";

    while ($row = mysqli_fetch_row($res)) { 
        $nbArticlesTrouves = $nbArticlesTrouves + 1; 
        $articlesTrouves = $articlesTrouves."<tr>
                         <td>".$row[0]."</td>".
                        "<td>".$row[1]."</td>".
                        "<td>".$row[2]."</td>".
                        "<td>".$row[3]."</td>".
                        "<td>".$row[4]."</td>".
                        "<td>".$row[5]."</td>".
                        "<td>".$row[6]."</td>".
                        // "<td><input type=\"submit\" name=\"consulter\" value=\"Aller\"> </td>".
                        "<td><button class=\"aller\" onclick=\"window.location='../controler/controleur_afficherArticle.php?idArticle=".$row[0]."'\" />Aller</button> </td>".
                        " </tr>";
    }

    // <td>name:</td><td><input type="text" name="name" id="myinput" /></td><td><input type="button" value="submit" onclick="doThing();" /></td>

    $articlesTrouves = $articlesTrouves."</table>";

    $_SESSION["articlesTrouves"] = $articlesTrouves; 

    if ($nbArticlesTrouves==0) {
        $_SESSION["aucunArticleTrouve"] = "Aucun article touvé. Vous pourriez chercher un article par IdArticle/Titre/Auteur/Type(livre ou album ou video)."; 
    }

    mysqli_free_result($res);

    header('Location:../view/vue_articlesTrouves.php'); 

    
    
?>  