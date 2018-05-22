<?php
	session_start();
	require_once("../model/bd.php");

	$coBd = new Bd();
	$co = $coBd->connexion();

	if(empty($_GET['idArticle'])) {
		header('Location:../view/vue_accueil.php'); 
	} else {
        $idArticle = $_GET['idArticle'];
        $req = "SELECT * 
                FROM article
                WHERE idArticle = ".$idArticle; 
        
        $res = mysqli_query($co, $req)
            or die ("Erreur lors de chercher un article par idArticle");


        if ($row = mysqli_fetch_row($res)) { 
            $_SESSION['idArticleAff'] = $row[0]; 
            $_SESSION['titreAff'] = $row[1];
            $_SESSION['auteurAff'] = $row[2];
            $_SESSION['datePublicationAff'] = $row[3];
            $_SESSION['photoAff'] = $row[4];
            $_SESSION['fraisEmrpuntAff'] = $row[5];
            $_SESSION['cautionAff'] = $row[6];
            $_SESSION['descriptionAff'] = $row[7];
            $_SESSION['typeAff'] = $row[8];
        }

        header('Location:../view/vue_article.php'); 
    }
    
    




?>



