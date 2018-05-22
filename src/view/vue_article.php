<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr-FR" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" href="../style/style.css" />
    <title> Article </title>
    <meta charset="UTF-8">
    <style>
    #header {
        background-color: #eeeeee;
        color: #00486C;
        text-align: center;
        padding: 5px;
        height: 160px;
    }

    input {
        width: 480px;
        height: 50px;
        background-color: white;
        border: none;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        font: bold 20px 'lucida sans', 'trebuchet MS', 'Tahoma';
        font-style: italic;
    }

    button {

        width: 140px;
        height: 50px;
        background-color: #00486C;
        color: #fff;
        border: none;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        position: relative;
        font-size: 18px;
        font-weight: bold;
    }
    /*使用伪类来添加三角符号*/
/*        button:before {
        content: "";
        border-width: 6px;
        border-style: solid;
        border-color: transparent #00486C transparent transparent;
        position: absolute;
        right: 100%;
        top: 38%;
    }*/

    button.emprunter {

        width: 140px;
        height: 50px;
        background-color: #00486C;
        color: #fff;
        border-radius: 5px;
        position: relative;
        font-size: 18px;
        font-weight: bold;
    }

    a:link,
    a:visited {
        text-decoration: none;
        /*超链接无下划线*/
    }

    a:hover {
        text-decoration: underline;
        /*鼠标放上去有下划线*/
    }

    p {
        margin: 20px;
    }

    h2 {
        margin: 20px;
    }

    h3 {
        margin: 20px;
    }
    </style>
</head>

<body link="#00486C" alink="#00486C" vlink="#00486C">

    <div class="seConnecter1">
        <img src="../image/seConnecter1.jpg" />
    </div> 

<?php
    if (isset($_SESSION["id"])){

        if ($_SESSION["type"]=="utilisateur") {
            echo "
                <div class=\"monCompte\">
                    <a href=\"../view/vue_compte_user.php\"><img src=\"../image/monCompte.jpg\"/></a>
                </div>
                ";

        }else{
            echo "
                <div class=\"monCompte\">
                    <a href=\"../view/vue_compte_gest.php\"><img src=\"../image/monCompte.jpg\"/></a>
                </div>
                ";
        }
        // style=\"position: absolute; margin-left: 60%; height: 30px; width: 180px;
        echo "
            <div class=\"deconnecter\" \">
                <a href=\"../controler/controleur_deconnexion.php\"><img src=\"../image/deconnecter.jpg\"/></a>
            </div>
        ";

    }else{
        echo "
        <div class=\"seConnecter2\"  >
            <a href=\"../view/vue_connexion.php\"><img src=\"../image/seConnecter2.jpg\"/></a>
        </div>
        ";
    }
    
?> 

   <!--  <div class="titre">
        <a href="../view/vue_accueil.php"><img src="../image/bg.jpg" alt = "titre"/></a>
    </div>
    <br /> <br /> -->
   

    <div class="upsudLogo">
        <a href="../view/vue_accueil.php"><img src="../image/upsudLogo.png"/></a>
    </div>
    <div id="header">
        <br><br><br>
        <a href="../view/vue_accueil.php">
            <h1>Médiathèque de l'Université Paris-Sud</h1> </a>
<!--         <form >
            <input type="text" name="recherche" value="Chercher un article..." />
            <button> CHERCHER </button>
        </form> -->
    </div>


    
    <p style="color: gray;"> Accueil - Article </p>

    <h2> <?php if (isset($_SESSION['titreAff'])) {
        echo $_SESSION['titreAff']; } else {header('Location:../controler/controleur_afficherArticle.php'); }
    ?> </h2>

    <p> <?php if (isset($_SESSION['auteurAff'])) {
        echo $_SESSION['auteurAff']; } else {header('Location:../controler/controleur_afficherArticle.php'); }
    ?>(Auteur) - Paru <?php if (isset($_SESSION['datePublicationAff'])) {
        echo $_SESSION['datePublicationAff']; } else {header('Location:../controler/controleur_afficherArticle.php'); }
    ?> - <?php if (isset($_SESSION['typeAff'])) {
        echo $_SESSION['typeAff']; } else {header('Location:../controler/controleur_afficherArticle.php'); }
    ?></p>
    <div class="infoArticle">
        <img src="<?php if (isset($_SESSION['photoAff'])) {
        echo $_SESSION['photoAff']; } else {header('Location:../controler/controleur_afficherArticle.php'); }
    ?>" style="display: block; margin:auto; width: 200px; height: 321px; " />
        <h3> Détails </h3>
        <p> Date de parution : <?php if (isset($_SESSION['datePublicationAff'])) {
        echo $_SESSION['datePublicationAff']; } else {header('Location:../controler/controleur_afficherArticle.php'); }
    ?></p>
        <p> Editeur : <?php if (isset($_SESSION['auteurAff'])) {
        echo $_SESSION['auteurAff']; } else {header('Location:../controler/controleur_afficherArticle.php'); }
    ?> </p>
        <br/>
        <h3> Résumé </h4>
    	<p> <?php if (isset($_SESSION['descriptionAff'])) {
        echo $_SESSION['descriptionAff']; } else {header('Location:../controler/controleur_afficherArticle.php'); }
    ?> </p>
    </div>

    <div class="espace"> </div>

    <div class="emprunterReserver">
    	<p> <b>Frais d'emprunt : </b> <?php if (isset($_SESSION['fraisEmrpuntAff'])) {
        echo $_SESSION['fraisEmrpuntAff']; } else {header('Location:../controler/controleur_afficherArticle.php'); }
    ?></p>
    	<p> <b>Frais de réservation : </b> graduit</p>
        <p> <b>Caution : </b><?php if (isset($_SESSION['cautionAff'])) {
        echo $_SESSION['cautionAff']; } else {header('Location:../controler/controleur_afficherArticle.php'); }
    ?></p>
    	<button class="emprunter" style="display: block; margin:auto;"> EMPRUNTER </button>
    	<br/>
    </div>



</body>

</html>