<!DOCTYPE html>
<html lang="fr-FR" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" href="../style/style.css" />
    <title> Article </title>
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
    /*    button:before {
        content: "";
        border-width: 6px;
        border-style: solid;
        border-color: transparent #00486C transparent transparent;
        position: absolute;
        right: 100%;
        top: 38%;
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

    p {
        margin: 20px;
    }

    h2 {
        margin: 20px;
    }

    h3 {
        margin: 20px;
    }
    </style>
</head>

<body link="#00486C" alink="#00486C" vlink="#00486C">
    <div class="seConnecter1">
        <img src="../image/seConnecter1.jpg" />
    </div>
    <div class="seConnecter2">
        <a href="../vue/seConnecter.html"><img src="../image/seConnecter2.jpg"/></a>
    </div>
    <div class="upsudLogo">
        <a href="../vue/accueil.html"><img src="../image/upsudLogo.png"/></a>
    </div>
    <div id="header">
        <a href="../vue/accueil.html">
            <h1>Médiathèque de l'Université Paris-Sud</h1> </a>
        <form >
            <input type="text" name="recherche" value="Chercher un article..." />
            <button> CHERCHER </button>
        </form>
    </div>
    
    <p> Accueil - Article </p>
    <h2> Une fille comme elle </h2>
    <p> Marc Levy(Auteur) - Paru le mai 2018 - Roman</p>
    <div class="infoArticle">
        <img src="../image/uneFilleCommeElle.jpg" style="display: block; margin:auto; width: 200px; height: 321px; " />
        <h3> Détails produits</h3>
        <p> Date de parution : blabla</p>
        <p> Editeur : blabla </p>
        <br/>
        <h3> Résumé </h4>
    	<p> « Quelle distance nous sépare, un océan et deux continents ou huit étages ? — Ne soyez pas blessant, vous croyez qu’une fille comme moi… — Je n’ai jamais rencontré une femme comme vous. — Vous disiez me connaître à peine. — Il y a tellement de gens qui se ratent pour de mauvaises raisons. Quel risque y a-t-il à voler un peu de bonheur ? » New York, sur la 5e Avenue, s’élève un petit immeuble pas tout à fait comme les autres… Ses habitants sont très attachés à leur liftier, Deepak, chargé de faire fonctionner l’ascenseur mécanique, une véritable antiquité. Mais la vie de la joyeuse communauté se trouve chamboulée lorsque son collègue de nuit tombe dans l’escalier. Quand Sanji, le mystérieux neveu de Deepak, débarque en sauveur et endosse le costume de liftier, personne ne peut imaginer qu’il est à la tête d’une immense fortune à Bombay… Et encore moins Chloé, l’habitante du dernier étage. Entrez au N°12, Cinquième Avenue, traversez le hall, montez à bord de son antique ascenseur et demandez au liftier de vous embarquer… dans la plus délicieuse des comédies new-yorkaises ! </p>
    </div>

    <div class="espace"> </div>

    <div class="emprunterReserver">
    	<p> <b>Frais d'emprunt : </b></p>
    	<p> <b>Frais de réservation : </b></p>
        <p> <b>Caution : </b></p>
    	<button style="display: block; margin:auto;"> EMPRUNTER </button>
    	<br/>
    </div>



</body>

</html>