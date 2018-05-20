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
/*
    button:before {
        content: "";
        border-width: 6px;
        border-style: solid;
        border-color: transparent #00486C transparent transparent;
        position: absolute;
        right: 100%;
        top: 38%;
    }*/


    #navigation {
        line-height: 30px;
        background-color: #eeeeee;
        height: 900px;
        width: 240px;
        float: left;
        padding: 5px;
    }

    #section {
        width: 650px;
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
        <a href="../view/vue_accueil.php">
            <h1>Médiathèque de l'Université Paris-Sud</h1> </a>
        <form>
            <input type="text" name="recherche" value="Chercher un article..." />
            <button> CHERCHER
            </button>
        </form>
    </div>
    <div id="navigation">
        <h2> 
            Bienvenue <br/> 
            Madame/Monsieur <br/>
            <?php echo $_SESSION["nom"]." ".$_SESSION["prenom"] ?> <br/>
        </h2>
        <br/>
        <a href="../view/vue_compte.php">Mes donées personnelles </a>
        <br/>
        <a href="../view/vue_emprunts.php">Mes emprunts </a>
        <br/>
        <a href="../view/vue_reservation.php">Mes réservations </a>
        <br/>
        <br>
    </div>
    <div id="section">
        <h2>Mes données personnelles</h2>
        <p> Id : <?php echo $_SESSION["id"] ?> </p>
        <p> Email : <?php echo $_SESSION["email"] ?></p>
        <p> Portable : pas encore definit</p>
        <p> Situation : 
            <?php if ($_SESSION["estValide"]==1)
                echo "Vous êtes un/une utilisateur validé. Vous pouver emprunter/réserver les articles
                <p> Caution : ".$_SESSION["caution"]."€</p>
                <p> Finance : ".$_SESSION["finance"]."€</p>";
                else echo "Votre inscription n'est pas encore validé.";
            ?>
        </p> 


        <br/>
        
        <p> Je souhaite modifier mes données personnelles, mes préférences de communication, mon mot de passe... </p>
        <button> Modifier </button>
    </div>
</body>

</html>