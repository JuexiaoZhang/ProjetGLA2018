<?php
    session_start();
    
?>
<!DOCTYPE html>
<html lang="fr-FR" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" href="../style/style.css" />
    <title> Articles trouvés </title>
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

    button.chercher {

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

    button.chercher:before {
        content: "";
        border-width: 6px;
        border-style: solid;
        border-color: transparent #00486C transparent transparent;
        position: absolute;
        right: 100%;
        top: 38%;
    }

    button.annuler {
        width: 90px;
        height: 40px;
        background-color: #00486C;
        color: #fff;
        border: none;
        border-radius: 5px;
        position: relative;
        font-size: 14px;
        font-weight: bold;
    } 

    button.aller {
        width: 50px;
        height: 20px;
        background-color: #00486C;
        color: #fff;
        border: none;
        border-radius: 5px;
        position: relative;
        font-size: 14px;
        font-weight: bold;
    } 

    input[type=submit] {
        width: 50px;
        height: 20px;
        background-color: #00486C;
        color: #fff;
        border: none;
        border-radius: 5px;
        position: relative;
        font-size: 14px;
        font-weight: bold;
    }   

 /*   #section {
        width: 650px;
        float: left;
        padding: 10px;
    }*/

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
            <button class="chercher"> CHERCHER </button>
        </form>
    </div>

    <div id="section">
        <h2>Articles trouvés</h2>
        
        <?php 
            if (isset($_SESSION["articlesTrouves"])) {
                echo $_SESSION["articlesTrouves"];
            } else {
                header('Location:../controler/controleur_chercherArticle.php'); 
            }
        ?>

        <br> <div style="color: blue; font-size: 15px;">
        <?php
            if (isset($_SESSION["aucunArticleTrouve"])) {
                echo $_SESSION["aucunArticleTrouve"];
            }
        ?> <br>
        

        <br/>
        
        <button class="annuler" onclick="window.location='../view/vue_accueil.php';"> ANNULER </button>
        <br/> 
    </div>
</body>

</html>

<?php unset($_SESSION['aucunArticleTrouve']); ?>