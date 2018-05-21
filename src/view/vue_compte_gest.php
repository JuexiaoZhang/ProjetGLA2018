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
    /*    .recherche{
            width: 630px;
            height: 48px;
            background:rgba(0,0,0,.2);
            padding:15px;
            
            border-radius:5px;          
        }*/

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

    button:before {
        content: "";
        border-width: 6px;
        border-style: solid;
        border-color: transparent #00486C transparent transparent;
        position: absolute;
        right: 100%;
        top: 38%;
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
            Monsieur/Madame <br/>
            <?php echo $_SESSION["nom"]." ".$_SESSION["prenom"] ?> <br/>
        </h2>
        <br/>

        <a href="../view/vue_compte_gest.php">Mes données </a>
        <br/>
        <a href="../view/gest_infoUser.php">Données d'utilisateurs </a>
        <br/>
        <a href="../view/gest_emprunts.php">Les emprunts </a>
        <br/>
        <a href="../view/gest_reservations.php">Les réservations </a>
        <br/>
        <a href="../view/gest_articles.php">Les articles </a>
        <br/>
        <a href="../view/gest_exemplaires.php">Les exemplaires </a>
        <br/>
        <br>
    </div>
    <div id="section">
        <h2>Mes données personnelles</h2>
        <table style="width:100%">
            <tr>
                <th>Id :</th>
                <td><?php echo $_SESSION["id"] ?></td> 
            </tr>
            <tr>
                <th>Email :</th>
                <td><?php echo $_SESSION["email"] ?></td> 
            </tr>
            <tr>
                <th>Nom :</th>
                <td><?php echo $_SESSION["nom"] ?></td> 
            </tr>
            <tr>
                <th>Prénom :</th>
                <td><?php echo $_SESSION["prenom"] ?></td> 
            </tr>
            <tr>
                <th>Type :</th>
                <td><?php echo $_SESSION["type"] ?></td> 
            </tr>
        </table>
    </div>
</body>

</html>