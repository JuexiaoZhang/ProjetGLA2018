<?php
    session_start();
    if (!isset($_SESSION["id"]))
        header('Location: vue_connexion.php');
?>
<!DOCTYPE html>
<html lang="fr-FR" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" href="../style/style.css" />
    <title> GestionnaireReservation </title>
    <meta charset="UTF-8">
    <style>
    #header {
        background-color: #eeeeee;
        color: #00486C;
        text-align: center;
        padding: 5px;
        height: 160px;
    }

 /*   input {
        width: 480px;
        height: 50px;
        background-color: white;
        border: none;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        font: bold 16px 'lucida sans', 'trebuchet MS', 'Tahoma';
        font-style: italic;
    }
*/    input{
            width: 200px;
            height: 30px;
            background-color: #eeeeee;
            border:none;
            border-top-left-radius:5px;
            border-bottom-left-radius:5px;
            font: bold 16px 'lucida sans', 'trebuchet MS', 'Tahoma';
            font-style:italic;
            color: gray; 
        }
    input[type=submit] {

        width: 88px;
        height: 34px;
        background-color: #00486C;
        color: #fff;
        border: none;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        position: relative;
        font-size: 18px;
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
        <a href="../view/vue_compte_gest.php">Mes données personnelles</a>
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
        <br/>
    </div>
    <div id="section">  
    
        <h2>Toutes les réservations</h2>  

        <?php
            if(!isset($_SESSION["lesReservations"])){
                header('Location:../controler/controleur_consultLesRserv.php');
                die();
            }
            else
                echo $_SESSION["lesReservations"];
        ?>

        <h2>Opération </h2> <br>

        <fieldset>
            <legend> <h3>Valider que le client a bien retiré son article reservé </h3></legend>
            <div style="color: red;font-size: 14px;">
                <!-- <?php if(isset($_SESSION["erreurExSup"])){ echo $_SESSION["erreurExSup"];}?> -->
            </div>
            <form method="post" action="../controler/controleur_validerRetire.php">
                <br><br>
                <label for="idReservation"> ID Réservation :  </label>
                    <input type="text" name="idReservation" id="idReservation" />

                <input class="operation" type="submit" name ="valider" value="Valider">
                <br><br>
            </form>
        </div>
    </fieldset> 

    </div>

</body>

</html>

<?php 
unset($_SESSION["lesReservations"]);
// unset($_SESSION["erreurEx"]);
// unset($_SESSION["erreurSup"]);
?>

