<?php
    session_start();
    ob_start();
    if (!isset($_SESSION["id"])){
        header('Location: vue_connexion.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="fr-FR" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" href="../style/style.css" />
    <title> GestionnaireExemplaire </title>
    <meta charset="UTF-8">
    <style>
    #tete {
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
        font: bold 16px 'lucida sans', 'trebuchet MS', 'Tahoma';
        font-style: italic;
    }

    input.operation {
        width: 480px;
        height: 50px;
        background-color: #eeeeee;
        border: none;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        font: bold 16px 'lucida sans', 'trebuchet MS', 'Tahoma';
        font-style: italic;
        color: gray;
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

    fieldset {
        margin: auto;
        padding: 20px;
        border:1px solid #00486C;
        width:100%;
    }

    input[type=text],select,textarea {
        width: 200px;
        height: 25px;
        padding:3px;
        border:1px solid #AADAEF;
        border-radius:5px;
        box-shadow:1px 1px 2px #C0C0C0 inset;
        color: gray;
        background-color: #eeeeee;
    }

    textarea {
        width: 400px;
        height: 100px;
        padding:3px;
        border:1px solid #AADAEF;
        border-radius:5px;
        box-shadow:1px 1px 2px #C0C0C0 inset;
     /*   color: gray;*/
        background-color: #eeeeee;
    }

    input[type=submit] {
        width:100px;
        height: 35px;
        margin-left:5px;
         
        background-color: #00486C;
        padding: 3px;
        border:1px;
        border-radius:5px;
        box-shadow:1px 1px 1px #00486C;
       
        font-size: 20px;
        color: #FFFFFF;
    }
    input.chercher {
         width: 480px;
        height: 50px;
        background-color: white;
        border: none;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        font: bold 16px 'lucida sans', 'trebuchet MS', 'Tahoma';
        font-style: italic;
    }
    input.date{
        width: 40px;
        height: 25px;
        padding:3px;
        border:1px solid #AADAEF;
        border-radius:5px;
        box-shadow:1px 1px 2px #C0C0C0 inset;
        color: gray;
        background-color: #eeeeee;
    }
    </style>
</head>

<body link="#00486C" alink="#00486C" vlink="#00486C">
    <div class="upsudLogo">
        <a href="../view/vue_accueil.php"><img src="../image/upsudLogo.png"/></a>
    </div>

    <div id="tete">
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
        <h2>Les exemplaires</h2>
        <?php
            if(!isset($_SESSION["listEx"])){
                header('Location:../controler/controleur_exList.php');
                die();
            }
            else
                echo $_SESSION["listEx"];
        ?>

        <h2>Opération</h2>

        <div> <fieldset>
            <legend> <h3>Ajouter un exemplaire </h3></legend>
            <div style="color: red;font-size: 14px;">
                <?php if(isset($_SESSION["erreurEx"])){ echo $_SESSION["erreurEx"];}?>
            </div>
            <form method="post" action="../controler/controleur_ajouterEx.php">
    
                <label for="idArt"> ID Article :  </label>
                    <input type="text" name="idArt" id="idArt" />
                <br/>
                <br/>

                <input type="submit" name ="ajouter" value="Ajouter">
            </form>
        </div>
        <br/>
        <br/>

        <div> <fieldset>
            <legend> <h3>Supprimer un exemplaire </h3></legend>
            <div style="color: red;font-size: 14px;">
                <?php if(isset($_SESSION["erreurExSup"])){ echo $_SESSION["erreurExSup"];}?>
            </div>
            <form method="post" action="../controler/controleur_suppEx.php">
    
                <label for="idEx"> ID Exemplaire :  </label>
                    <input type="text" name="idEx" id="idEx" />
                <br/>
                <br/>

                <input type="submit" name ="supprimer" value="Supprimer">
            </form>
        </div>

    </div>
</body>

</html>
<?php 
unset($_SESSION["listEx"]);
unset($_SESSION["erreurEx"]);
unset($_SESSION["erreurSup"]);?>