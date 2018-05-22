<?php
	session_start();
	require_once("../model/bd.php");

    if (empty($_SESSION['id'])) {
        header('Location:../view/vue_article.php');
    }

	$coBd = new Bd();
	$co = $coBd->connexion();

    
	if(empty($_POST['idEx'])) {
        $_POST['erreurRtArticle'] = "Veuillez saisir un id exemplaire.";
        header('Location:../view/gest_emprunts.php'); 
	} else {

        $idEx = $_POST['idEx'];
        //delete emprunt
        $sql = "DELETE FROM emprunt WHERE idExemplaire=".$idEx;
        if(!mysqli_query($co, $sql)){
            $_SESSION['erreurRtArticle'] = "erruer : delete emprunt ";
            header('Location:../view/gest_emprunts.php');
            die();
        }

        //idArticle correspond
        $sql = "SELECT idArticle FROM exemplaire WHERE idExemplaire=".$idEx;
        $res = mysqli_query($co, $sql)
            or die ("Erreur : select idArticle");;
        $row = mysqli_fetch_row($res);
        $idArticle = $row[0];

        //count nbr reservation where idarticle
        $sql = "SELECT COUNT(*) FROM reservation WHERE idArticle = ".$idArticle;
        $res = mysqli_query($co, $sql)
            or die ("Erreur : count reservation");
        $row = mysqli_fetch_row($res);
        $nbRsv = $row[0];

        //nbr disponnible reservation  

        $sql = "SELECT nbExDisponible FROM reservation WHERE idArticle = ".$idArticle;
        $res = mysqli_query($co, $sql)
            or die ("Erreur : select nbExDisponible");
        $row = mysqli_fetch_row($res);
        $nbDispo = $row[0];

        if ($nbDispo<$nbRsv) { //si il y a pas assez d'article pour la reservation

            //update reservation
            $sql = "UPDATE `reservation` SET disponible=1, nbExDisponible=nbExDisponible+1 WHERE idArticle=".$idArticle;
            if(!mysqli_query($co, $sql)){    
                $_SESSION['erreurRtArticle'] = "erruer : update reservation.dispo";
                header('Location:../view/gest_emprunts.php');   
                die();
            } 
            //update exemplaire
            $sql = "UPDATE exemplaire SET dansListRsv= 1 WHERE idExemplaire=".$idEx;
            if(!mysqli_query($co, $sql)){    
                $_SESSION['erreurRtArticle'] = "erruer : update reservation.dispo";
                header('Location:../view/gest_emprunts.php');   
                die();
            }
        }else{ //si il y a assez article pour reservation
            //update exemplaire.empDispo
            $sql = "UPDATE exemplaire SET empDispo= 1 WHERE idExemplaire=".$idEx;
            if(!mysqli_query($co, $sql)){    
                $_SESSION['erreurRtArticle'] = "erruer : exemplaire.empDispo";
                header('Location:../view/gest_emprunts.php');   
                die();
            }
        }

        header('Location:../view/gest_emprunts.php'); 
    }
    
?>



