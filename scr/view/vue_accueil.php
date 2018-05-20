<!DOCTYPE html>
<html lang="fr-FR" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" href="../style/style.css" />
    <title> Page d'accueil </title>
    <meta charset="UTF-8">
        <style>
        *{
            margin:auto;
            padding:0;
        }
        .recherche{
            width: 630px;
            height: 48px;
            background:rgba(0,0,0,.2);
            padding:15px;
            border:none;
            border-radius:5px;          
        }
        input{
            width: 480px;
            height: 50px;
            background-color: #eeeeee;
            border:none;
            border-top-left-radius:5px;
            border-bottom-left-radius:5px;
            font: bold 20px 'lucida sans', 'trebuchet MS', 'Tahoma';
            font-style:italic;
        }
        button{
            
            width:140px;
            height: 50px;
            background-color:#00486C;
            color:#fff;
            border:none;
            border-top-right-radius:5px;
            border-bottom-right-radius:5px;
            position: relative;
            font-size:18px;
            font-weight: bold;
        }
        /*使用伪类来添加三角符号*/
        button:before{
            content:"";
            border-width:6px;
            border-style:solid;
            border-color: transparent #00486C transparent transparent;
            position: absolute;
            right:100%;
            top:38%;
        }

    </style>
</head>

<body>
    <div class="seConnecter1">
        <img src="../image/seConnecter1.jpg" />
    </div>
    <div class="seConnecter2">
        <a href="../view/vue_connexion.php"><img src="../image/seConnecter2.jpg"/></a>
    </div>
    <div class="titre">
        <a href="../view/vue_accueil.php"><img src="../image/bg.jpg" alt = "titre"/></a>
    </div>
    <br /> <br />
    <form>
        <div class="recherche">
            <input type="text" name="recherche" value="Chercher un article..." />
            <button> CHERCHER
            </button>
        </div>
    </form>

        <br/> <br/><br/><br/>
        
    <div class="infoAccueil" style="column-count:3;">
        <h3> HORAIRES </h3>
        <br/>
        mardi : 10h - 18h <br/>
        mercredi : 10h - 18h <br/>
        jeudi : 10h - 18h <br/>
        vendredi : 10h - 18h<br/>
        samdi : 10h - 18h <br/>
        <br/> 
  
        <h3> ADRESSE </h3>
        <br/>
        15 Rue Georges Clemenceau, <br/>
        91400 Orsay <br/>
        <br/> <br/> <br/> 


        <h3> CONTACTS </h3>
        <br/>
        E-mail : shuangyi.zhao@u-psud.fr <br/>
        Téléphone : 06 11 11 11 11<br/>
        <br/> 
    </div>

    <br/>
</body>

</html>