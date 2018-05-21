<?php
    session_start();
    if (!isset($_SESSION["id"]))
        header('Location: vue_connexion.php');
?>
<!DOCTYPE html>
<html lang="fr-FR" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" href="../style/stylePrincipal.css" />
    <title> user_ModifierInfo </title>
    <meta charset="UTF-8">
    <style>
/*    button {

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
    }*/
    button {
    width:100px;
    height: 31px;
    margin-left:5px;
     
    background-color: #00486C;
    padding: 3px;
    border:1px solid #AADAEF;
    border-radius:5px;
    box-shadow:1px 1px 1px #00486C;
    cursor:pointer;
     
    /*font-family: Calibri;*/
    font-size: 20px;
    color: white;
}
    </style>

</head>

<body link="#00486C" alink="#00486C" vlink="#00486C">
    <div class="bloc_page">
        <div class="texte">
            <div>
                <fieldset>
                    <legend>
                        <h2>Modifier vos informations personnells</h2></legend>
                    <div class="connexion">
                        <form method="post" action="../controler/controleur_user.php">

                            <br/>
                            <label for="prenom"> Prénom </label>
                            <input type="text" name="prenom" id="prenom" placeholder="<?php echo $_SESSION['prenom'];?>">
                            <br/>
                            <br/>
                            <label for="nom"> Nom </label>
                            <input type="text" name="nom" id="nom" placeholder="<?php echo $_SESSION['nom'];?>">
                            <br/> <br/>
                            <label for="portable"> Portable </label>
                            <input type="int" name="portable" id="portable" placeholder="<?php
                                        if (! empty ( $_SESSION ['portable'] )) {
                                        echo $_SESSION ['portable'];
                                        }
                                        ?>">
                            <br/><br/>
                            <input type="submit" name="envoyer" value="ENVOYER" > 

                            <button onclick="window.location='../view/vue_compte_user.php'" name="annuler"> ANNULER </button>
                        </form>
                            
                    </div>
            </div>
        </div>
</body>

</html>

