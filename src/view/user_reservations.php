<?php
    session_start();
    if (!isset($_SESSION["id"]))
        header('Location: vue_connexion.php');
?>

<!DOCTYPE html>
<html lang="fr-FR" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" href="../style/style.css" />
    <title> Mon compte </title>
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


    button.annuler {
        width: 88px;
        height: 20px;
        background-color: #00486C;
        color: #fff;
        border: none;
        border-radius: 5px;
        position: relative;
        font-size: 14px;
        font-weight: bold;
    } 


    #navigation {
        line-height: 30px;
        background-color: #eeeeee;
        height: 900px;
        width: 240px;
        float: left;
        padding: 5px;
    }

    #section {
        /*width: 800px;*/
        float: left;
        padding: 10px;
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
    </style>
</head>

<body link="#00486C" alink="#00486C" vlink="#00486C">
    <div class="upsudLogo">
        <a href="../view/vue_accueil.php"><img src="../image/upsudLogo.png"/></a>
    </div>
    <div id="header">
        <br><br><br>
        <a href="../view/vue_accueil.php">
            <h1>Médiathèque de l'Université Paris-Sud</h1> </a>
    </div>
    <div id="navigation">
        <h2> 
            Bienvenue <br/> 
            Monsieur/Madame <br/>
            <?php echo $_SESSION["nom"]." ".$_SESSION["prenom"] ?> <br/>
        </h2>
        <br/>
        <a href="../view/vue_compte_user.php">Mes donées personnelles </a>
        <br/>
        <a href="../view/user_emprunts.php">Mes emprunts </a>
        <br/>
        <a href="../view/user_reservations.php">Mes réservations </a>
        <br/>
        <br>
    </div>

    <div id="section">
        <h2>Mes réservations </h2>
        <?php
            if(!isset($_SESSION["mesReservations"])) 
               header('Location:../controler/controleur_userConsultRserv.php');
            else
               echo $_SESSION["mesReservations"];
        ?> <br> <br> 
        <p> *Votre reservation sera annulée automatiquement dans 15 jours, si elle est toujous non dispinible ou si vous n'avez toujous pas recuperé votre article. </p>
    </div>
</body>

</html>

<?php unset($_SESSION["mesReservations"]);?>