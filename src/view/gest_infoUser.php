<?php
    session_start();
    ob_start();
    require_once("../model/bd.php");
    if (!isset($_SESSION["id"]))
        header('Location: vue_connexion.php');

?>

<!DOCTYPE html>
<html lang="fr-FR" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" href="../style/style.css" />
    <title> GestionnaireDonneesUtilisateur </title>
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
        <h2>Données d'utilisateurs</h2>

        <?php
            if(!isset($_SESSION["listInfoUser"])) {
                header('Location:../controler/controleur_gest_consulterUser.php');
                die();
            }   
            else
                echo $_SESSION["listInfoUser"];
        ?> 

        <h2>Opération</h2>  

        <div > <fieldset>
            <legend> <h3>Ajouter un utilisateur </h3></legend>
            <div style="color: red;font-size: 14px;">
                <?php if(isset($_SESSION["erreurUser"]))echo $_SESSION["erreurUser"]; ?>
            </div>
            <form method="post" action="../controler/controleur_ajouterUser.php">
               
                <label for="nom"> Nom :  </label>
                    <input type="text" name="nom" id="nom" />
                <br/>
                <br/>
                <label for="prenom"> Prenom :  </label>
                    <input type="text" name="prenom" id="prenom" />
                <br/>
                <br/>
                <label for="email"> Email :  </label>
                    <input type="text" name="email" id="email" />
                <br/>
                <br/>
                Mot de passe est 123456 par defaut.
                <br/>
                <br/>
                <input type="submit" name ="ajouter" value="Ajouter">
            </form>
        </fieldset>
        </div>
        <br/>
        <br/>
        <div > <fieldset>
            <legend> <h3>Supprimer un utilisateur </h3></legend>
            <form method="post" action="../controler/controleur_supprimerUser.php">
                Veuillez saisir un id d'utilisateur :
                <br/>
                <br/>
                <div style="color: red;font-size: 14px;">
                <?php if(isset($_SESSION["erreurSpUser"]))echo $_SESSION["erreurSpUser"]; ?>
                </div>
                <input class="operation" type="text" name="idUser" id="idUser" />
                <input type="submit" value="Supprimer">
            </form> 
        </fieldset>
        </div>
        <br/>
        <br/>
        <div > <fieldset>
            <legend> <h3>Valider une inscription </h3></legend>
            <form method="post" action="../controler/controleur_validerUser.php">
                Veuillez saisir un id d'utilisateur :
                <br/>
                <br/>
                <input class="operation" type="text" name="idUser" id="idUser" />
                <input type="submit" value="Valider">
            </form> 
        </div>
        <br/>
        <br/>

    <fieldset>
            <legend> <h3>Modifier un utilisateur </h3></legend>
            <div style="color: red;font-size: 14px;">
                <?php if(isset($_SESSION["erreurMdUser"])){ echo $_SESSION["erreurMdUser"]; }?>
            </div>

        <form method="post" action="../controler/controleur_gestModifUser.php">
                <label for="idUtilisateur"> ID :  </label>
                <?php 
                $bd = new Bd();
                $co= $bd->connexion();

                $req = "SELECT idPersonne FROM personne "; 
    
                $res = mysqli_query($co, $req)
                    or die ("Erreur : SELECT idUtilisateur FROM personne ");
                //mysql_close($co);
                 ?>
                   <!--  <select name="idArt" onchange="showUser(this.value)"> -->
                    <select name="idUtilisateur">
                    
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

               <label for="title"> Donnée à modifier :  </label>
                    <select name="title" >
                        <option value="nom">Nom</option>
                        <option value="prenom">Prénom</option>
                        <option value="email">Email</option>
                        <option value="caution">Caution</option>
                        <option value="finance">Finance</option>
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
</body>
</html>

<?php 

    unset($_SESSION["listInfoUser"]);
    unset($_SESSION["erreurUser"]); 
    unset($_SESSION["erreurSpUser"]);
    unset($_SESSION["erreurMdUser"]);
?>