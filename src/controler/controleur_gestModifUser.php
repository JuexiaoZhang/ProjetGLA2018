<?php

    session_start();

    require_once("../model/bd.php");
    require_once("../model/user.php");
    $_SESSION["erreurMdUser"] = "";
    
    // Si les champs ont bien été saisis

    if (!empty($_POST["idUtilisateur"])&&
        !empty($_POST["title"])&&
        !empty($_POST["donnee"])) {
        
        $id = $_POST["idUtilisateur"];
        $title = $_POST["title"];
        $donnee = $_POST["donnee"];

        $bd = new Bd();
        $co= $bd->connexion();

        if ($title == "finance" || $title == "caution" ) {
            $req = "UPDATE personne SET ".$title."=".$donnee." WHERE idPersonne=".$id;
        }else {
            $req = "UPDATE personne SET ".$title."='".$donnee."' WHERE idPersonne=".$id;
        }
        

        
        
        if (mysqli_query($co, $req)) {
            header('Location:../view/gest_infoUser.php');
        }else{
            $_SESSION["erreurMdUser"] = $id;
            header('Location:../view/gest_infoUser.php');
            die();
        } 

    }else{
        $_SESSION["erreurMdUser"] = "il y a des champs vide";
        header('Location:../view/gest_infoUser.php');
        die();
    }

    



    // $md = "";
    // $art= new Article($co,$id,$md);

    // if ($art->update($co,$title,$donnee)) {

    //     header('Location:../view/gest_articles.php');
    // }else{
    //     $_SESSION["erreurMdArticle"] = "error: update()";
    //     header('Location:../view/gest_articles.php');
    //     die();
    // }
?>  