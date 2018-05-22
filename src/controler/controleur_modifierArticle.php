<?php

    session_start();

    require_once("../model/bd.php");
    require_once("../model/article.php");
    $_SESSION["erreurMdArticle"] = "";
    
    // Si les champs ont bien été saisis

    if (!empty($_POST["idArt"])&&
        !empty($_POST["title"])&&
        !empty($_POST["donnee"])) {
        
        $id = $_POST["idArt"];
        $title = $_POST["title"];
        $donnee = $_POST["donnee"];

        $bd = new Bd();
        $co= $bd->connexion();

        if ($title == "fraisEmprunt" || $title == "caution" ) {
            $req = "UPDATE article SET ".$title."=".$donnee." WHERE idArticle=".$id;
        }else $req = "UPDATE article SET ".$title."='".$donnee."' WHERE idArticle=".$id;

        
        
        if (mysqli_query($co, $req)) {
            header('Location:../view/gest_articles.php');
        }else{
            $_SESSION["erreurMdArticle"] = "error: updateeeee()";
            header('Location:../view/gest_articles.php');
            die();
        } 
    }else{
        $_SESSION["erreurMdArticle"] = "il y a des champs vide";
        header('Location:../view/gest_articles.php');
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