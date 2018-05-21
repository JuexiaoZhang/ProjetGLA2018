<?php
    session_start();
    if (!isset($_SESSION["id"]))
        header('Location: vue_connexion.php');
?>
<!DOCTYPE html>
<html lang="fr-FR" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" href="../style/stylePrincipal.css" />
    <title> user_ModifierMdp </title>
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
            <fieldset>
                <legend> <h2>Modifier par mot de passe actuel</h2></legend>
           
                <form method="post" action="../controler/controleur_userModifierMdp.php">
                    <div style="color: red;font-size: 15px;">
                    <?php if(isset($_SESSION["erreurUserModifierMdp_mdpErrone"])){ echo $_SESSION["erreurUserModifierMdp_mdpErrone"]; }?>
                    </div>
                    <br/>
                    <label for="mdpOld"> Mot de passe actuel </label>
                    <input type="password" name="mdpOld" id="mdpOld">
                    <br/><br/>
                    <label for="mdpNew"> Mot de passe nouvel </label>
                    <input type="password" name="mdpNew" id="mdpNew">
                    <br/> <br/>
                    
                    <input type="submit" name="valider" value="VALIDER" > 
                </form>
                <br/>
                <button onclick="window.location='../view/vue_compte_user.php'" name="annuler"> ANNULER </button>
            </fieldset>

            <br> <br>
            <legend> 
                *Si vous avez oublié votre mot de passe actuel, veuillez nous contacter par mail ou par téléphone. 
                <p> E-mail : shuangyi.zhao@u-psud.fr </p>
                <p> Téléphone : 06 11 11 11 11 </p>
            </legend>

        </div>
</body>

</html>

<?php unset($_SESSION['erreurUserModifierMdp_mdpErrone']); ?>