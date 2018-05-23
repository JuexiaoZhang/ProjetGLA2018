<?php
	session_start();
	require_once("../model/bd.php");

    if (empty($_SESSION['id'])) {
        $_SESSION['erreurEmpCon'] = "Il faut connecter d'abord";
        header('Location:../view/vue_article.php');
    }

	$coBd = new Bd();
	$co = $coBd->connexion();

    
	if(empty($_SESSION['idArticleAff'])) {
		header('Location:../view/vue_accueil.php'); 
	} else {

        $idArticle = $_SESSION['idArticleAff'];

        $sql = "SELECT COUNT(*) FROM exemplaire WHERE idArticle=".$idArticle;
        $res = mysqli_query($co, $sql)
            or die ("Erreur lors de count exemplaire");
        $row = mysqli_fetch_row($res);
        $nbExemplaire = $row[0];


        $sql = "SELECT COUNT(*) FROM emprunt WHERE idExemplaire IN (SELECT idExemplaire FROM exemplaire WHERE idArticle = ".$idArticle." )";
        $res = mysqli_query($co, $sql)
            or die ("Erreur lors de count emprunt");
        $row = mysqli_fetch_row($res);
        $nbEmprunt = $row[0];


        $sql = "SELECT nbExDisponible FROM reservation WHERE idArticle = ".$idArticle;
        $res = mysqli_query($co, $sql)
            or die ("Erreur lors de nbExDisponible");
        $row = mysqli_fetch_row($res);
        $nbArtRsv = $row[0];

        $stock = $nbExemplaire - $nbEmprunt -$nbArtRsv;

        $idUser = $_SESSION['id'];
        $sql = "SELECT estValide,caution,finance FROM personne WHERE idPersonne = ".$idUser;
        $res = mysqli_query($co, $sql)
            or die ("Erreur: SELECT estValide,caution,finance FROM personne WHERE idPersonne = .$idUser; ");
        $row = mysqli_fetch_row($res);
        $estValide = $row[0];
        $cautionUser = $row[1];
        $financeUser = $row[2];

        $sql = "SELECT fraisEmprunt,caution FROM article WHERE idArticle = ".$idArticle;
        $res = mysqli_query($co, $sql)
            or die ("Erreur: SELECT fraisEmprunt,caution FROM article WHERE idArticle = $idArticle ");
        $row = mysqli_fetch_row($res);
        $cautionArt = $row[0];
        $frais = $row[1];

        
        if ($cautionUser>=$cautionArt && $financeUser>=$frais) {
            if ($stock>0) {

                //cherche idexemplaire
                $sql = "SELECT idExemplaire FROM exemplaire WHERE idArticle = ".$idArticle." AND empDispo=1";
                $res = mysqli_query($co, $sql)
                    or die ("Erreur: SELECT idExemplaire FROM exemplaire WHERE idArticle = $idArticle AND empDispo=1 ");
                $row = mysqli_fetch_row($res);
                $idExemplaire = $row[0];

                //insert emprunt
                $sql = "INSERT INTO emprunt(idUtilisateur, idExemplaire, dateEmprunt) VALUES (".$idUser.",".$idExemplaire.",CURRENT_TIMESTAMP)";
                if(!mysqli_query($co, $sql)){
                    $_SESSION['erreurEmpCon'] = "erruer : insert emprunt, idExemplaire est ".$idExemplaire." idArticle est ".$idArticle;
                    header('Location:../view/vue_article.php');
                    die();
                }
                $idEmprunt = mysqli_insert_id($co);
                //$_SESSION['idEmprunt'] = $idEmprunt; 


                //update exemplaire.empDispo
                $sql = "UPDATE exemplaire SET empDispo=0 WHERE idExemplaire =".$idExemplaire;
                if(!mysqli_query($co, $sql)){    
                    $_SESSION['erreurEmpCon'] = "erruer : update exemplaire.empDispo";
                    header('Location:../view/vue_article.php');   
                    die();
                }                

                //update personne.finance
                $sql = "UPDATE personne SET finance=finance-".$frais." WHERE idPersonne =".$idUser;
                if(!mysqli_query($co, $sql)){    
                    $_SESSION['erreurEmpCon'] = "erruer : update personne.finance";
                    header('Location:../view/vue_article.php');   
                    die();
                } 
                $_SESSION['erreurEmpCon'] = "Bien emprunter, Votre numéro d'emprunt est ".$idEmprunt;
                header('Location:../view/vue_article.php'); 
            }else{

                //utilisateur est déjà reserver cette article?
                $sql = "SELECT idReservation FROM reservation WHERE idArticle =".$idArticle." and idUtilisateur =".$idUser;
                $res = mysqli_query($co, $sql);
                $row = mysqli_fetch_row($res);
                $idReservation = $row[0];
                if($idReservation>=1){    
                    $_SESSION['erreurEmpCon'] = "Vous avez déjà reservé cette article";
                    header('Location:../view/vue_article.php');   
                    die();
                }else{
                    //sinon le réserver
                    $sql = "INSERT INTO reservation(dateReservation, idUtilisateur, idArticle, disponible, nbExDisponible) VALUES (CURRENT_TIMESTAMP,".$idUser.",".$idArticle.",0,0)";
                    if(!mysqli_query($co, $sql)){
                        $_SESSION['erreurEmpCon'] = "erruer : insert reservation ";
                        header('Location:../view/vue_article.php');
                        die();
                    }
                    $idReservation = mysqli_insert_id($co);
                }

                $_SESSION['erreurEmpCon'] = "Il y a plus d'exemplaire. Votre demande est bien reservé, Votre numéro de reservation est ".$idReservation;
                header('Location:../view/vue_article.php');

            }
        }else{
                $_SESSION['erreurEmpCon'] = "Votre caution/finance n'est pas assez, veuillez chercher Gestionnaire pour charger votre compte.";
                header('Location:../view/vue_article.php'); 
        }


        //header('Location:../view/vue_article.php'); 
    }
    
    


















?>



