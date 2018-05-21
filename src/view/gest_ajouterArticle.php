<?php
    session_start();
    if (!isset($_SESSION["id"]))
        header('Location: vue_connexion.php');
?>
<!DOCTYPE html>
<html lang="fr-FR" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" href="../style/style.css" />
    <title> GestionnaireAjouterArticle </title>
    <meta charset="UTF-8">
    <style>

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
    </style>
</head>

<body link="#00486C" alink="#00486C" vlink="#00486C">
    

    <div class = "bloc_page">

            <div class = "texte">
                <div><fieldset>
                    <legend><h2>Ajouter un article</h2></legend>

                    <div class="connexion">
                        <form method="post" action="../controleurs/controleur_inscription.php">
                            <label for="type"> Type </label>
                                <select name="type">
                                    <option value="livre"> livre </option>
                                    <option value="album"> album </option>
                                    <option value="video"> vedio </option>
                                </select>
                            <br/>
                            <br/>
                            <label for="titre"> titre </label>
                                <input type="text" name="titre" id="titre"/> <br/>
                                <br/>
                            <label for="auteur"> auteur </label>
                                <input type="text" name="auteur" id="auteur"/> <br/>
                                <br/>
                            <label for="datePublication"> datePublication </label>
                                <input type="date" name="datePublication" id="datePublication"/> <br/>
                                <br/>
                            <label for="photo"> url de la photo </label>
                                <input type="text" name="photo" id="photo"/> <br/>
                                <br/>
                            <label for="fraisEmprunt"> fraisEmprunt </label>
                                <input type="int" name="phfraisEmpruntoto" id="fraisEmprunt"/> <br/>
                                <br/>
                            <label for="caution"> caution </label>
                                <input type="int" name="caution" id="photo"/> <br/>
                                <br/>
                            <label for="description"> description </label>
                                <textarea row="40" cols="50"> </textarea> <br/>
                                <br/>
                            
                            <input type="submit" name ="Action" value = "ENVOYER"/> <br/>
                    </div>

                </div>

        </div>

</body>

</html>