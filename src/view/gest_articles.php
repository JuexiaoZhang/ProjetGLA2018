<?php
    
    session_start();
    ob_start();
    require_once("../model/bd.php");
    if (!isset($_SESSION["id"])){
        header('Location: vue_connexion.php');
    }
    // error_reporting(E_ERROR);  
    // ini_set("display_errors","Off");
?>
<!DOCTYPE html> <!-- html5 -->

<html lang="fr-FR" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!-- <script src="../js/selectuser.js"></script> -->
    <link rel="stylesheet" href="../style/style.css" />
    <title> GestionnaireArticle </title>
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

    #navigation {
        line-height: 30px;
        background-color: #eeeeee;
        height: 1500px;
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
    <div id="header">
        <br><br><br>
        <a href="../view/vue_accueil.php">
            <h1>Médiathèque de l'Université Paris-Sud</h1> </a>
    </div>
    <div id="navigation">
        <h2> 
            Bienvenue <br/> 
            Monsieur/Madame <br/>

            <?php echo $_SESSION["nom"]." ".$_SESSION["prenom"] ?> 
        <br/>
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
        <h2>Données articles</h2>
        <?php
            if(!isset($_SESSION["listArticle"])){
                header('Location:../controler/controleur_articleList.php');
                die();
            }
            else
                echo $_SESSION["listArticle"];
        ?>
        <h2>Opération</h2>

        <div > <fieldset>
            <legend> <h3>Ajouter un article </h3></legend>
            <div style="color: red;font-size: 14px;">
                <?php if(isset($_SESSION["erreurArticle"])){ echo $_SESSION["erreurArticle"];}?>
            </div>
            <form method="post" action="../controler/controleur_ajouterArticle.php">
                <label for="type"> Type :  </label>
                    <select name="type">
                        <option value="livre"> livre </option>
                        <option value="album"> album </option>
                        <option value="video"> vedio </option>
                    </select>
                <br/>
                <br/>
                <label for="titre"> Titre :  </label>
                    <input type="text" name="titre" id="titre" />
                <br/>
                <br/>
                <label for="auteur"> Auteur :  </label>
                    <input type="text" name="auteur" id="auteur" />
                <br/>
                <br/>
                <label for="datePublication"> Date de publication :  </label>
                   
                    <input class="date" type="text" name="dateDay" id="dateDay" />
                    -
                    <input class="date" type="text" name="dateMonth" id="dateMonth" />
                    -
                    <input class="date" type="text" name="dateYear" id="dateYear" />
                     (JJ - MM - AAAA)
                <br/>
                <br/>

                <label for="urlPhoto"> URL de photo couverture :  </label>
                    <input type="text" name="urlPhoto" id="urlPhoto" />
                <br/>
                <br/>

                <label for="frais"> Frais d'emprunt : </label>
                    <input type="text" name="frais" id="frais"/>
                <br/>
                <br/>

                <label for="caution"> Caution : </label>
                    <input type="text" name="caution" id="caution"  />
                <br/>
                <br/>

                <label for="description"> Description : </label>
                    <br/>
                    <textarea name="description" id="description" row="40" cols="50"> </textarea> <br/>
                <br/>
                <br/>

                <!-- <input class="operation" type="text" name="idArt" id="idArt" value="saisir un id article existe" /> -->
                <input type="submit" name ="ajouter" value="Ajouter">
            </form>
           </fieldset>
        </div>
        <br/>
        <br/>

        <div > <fieldset>
            <legend> <h3>Supprimer un article </h3></legend>
            <div style="color: red;font-size: 14px;">
                <?php if(isset($_SESSION["erreurSpArticle"])){ echo $_SESSION["erreurSpArticle"]; }?>
            </div>
            <form method="post" action="../controler/controleur_supprimerArticle.php">
                <input class="operation" type="text" name="idArt" id="idArt" placeholder="id d'article à supprimer" />
                <input type="submit" value="Supprimer">
            </form>
           </fieldset>
        </div>
        <br/>
        <br/>
        <div> <fieldset>
            <legend> <h3>Modifier un article </h3></legend>
            <div style="color: red;font-size: 14px;">
                <?php if(isset($_SESSION["erreurMdArticle"])){ echo $_SESSION["erreurMdArticle"]; }?>
            </div>
            <form method="post" action="../controler/controleur_modifierArticle.php">
                <label for="idArt"> ID :  </label>
                <?php 
                $bd = new Bd();
                $co= $bd->connexion();

                $req = "SELECT idArticle FROM article"; 
    
                $res = mysqli_query($co, $req)
                    or die ("Erreur : SELECT idArticle FROM article ");
                //mysql_close($co);
                 ?>
                   <!--  <select name="idArt" onchange="showUser(this.value)"> -->
                    <select name="idArt">
                    
                        <?php 
                        while ($row = mysqli_fetch_row($res)) {
                        ?>
                        <option value="<?php echo $row[0];?>"><?php echo $row[0];?> </option>
                        <?php
                        }
                         ?>
                    </select>
                <br/>
                <br/>

<!--             </form>
            <select name="idArt" onchange="showUser(this.value)">
                
                <option value="1">1 </option> 
                <option value="7">7 </option>
            </select>  
                <div id="txtHint"> <b>User info will be listed here.</b></div>
                </div> -->

               <label for="title"> Donnée à modifier :  </label>
                    <select name="title" >
                        <option value="titre">Titre</option>
                        <option value="auteur">Auteur</option>
                        <option value="datePublication">Date de publication</option>
                        <option value="photo">URL photo</option>
                        <option value="fraisEmprunt">Frais</option>
                        <option value="caution">Caution</option>
                        <option value="description">Description</option>
                    </select>
                <br/>
                <br/>


                <label for="donnee"> Nouvelle donnée :  </label>
                    <input type="text" name="donnee" id="donnee" />
                <br/>
                <br/>

                <input type="submit" value="Modifier">
            </form>
        </fieldset>

        </div>

        <br/>
        <br/>
    </div>
</body>
</html>
<?php unset($_SESSION["erreurArticle"]); 
unset($_SESSION["erreurSpArticle"]); 
unset($_SESSION["erreurMdArticle"]); 
unset($_SESSION["listArticle"]);?>