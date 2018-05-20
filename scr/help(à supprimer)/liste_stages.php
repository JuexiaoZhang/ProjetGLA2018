<!-- Angélique ETIENNE - Juexiao ZHANG (3B2) -->
<!-- LISTE DES STAGES -->

<?php session_start(); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Gestion stages S4 - IUT Orsay</title>
		<link rel="stylesheet" href="../../styles/Formulaire.css" />
		<script>
			function $(element){
				return element = document.getElementById(element);
			}
			function $detail(){
				var d=$('class1content');
				var h=d.offsetHeight;
				var maxh=300;
				function dmove(){
					h+=50; //层展开速度
					if(h>=maxh){
						d.style.height='300px';
						clearInterval(iIntervalId);
					}else{
						d.style.display='block';
						d.style.height=h+'px';
					}
				}
				iIntervalId=setInterval(dmove,2);
			}
			function $titre(){
				var d=$('class1content');
				var h=d.offsetHeight;
				var maxh=300;
				function dmove(){
					h-=50;//层收缩速度
					if(h<=0){
						d.style.display='none';
						clearInterval(iIntervalId);
					}else{
						d.style.height=h+'px';
					}
				}
				iIntervalId=setInterval(dmove,2);
			}
			function $use(){
				var d=$('class1content');
				var sb=$('stateBut');
				if(d.style.display=='none'){
					$detail();
					sb.innerHTML='titre';
				}else{
					$titre();
					sb.innerHTML='détail';
				}
			}
			</script>
	</head>

	<body>

		<!-- Barre d'onglets -->
		<div class = "barre_onglets">
			<ul id="barre_nav">
				<li><a href="accueil_enseignant.php">Accueil</a></li>
				<li><a href="#"><?php echo $_SESSION["pseudo"] ?></a></li>
				<li><a href="../../controleurs/controleur_deconnexion.php">Déconnexion</a></li>
				<li><a href="#">Aide</a></li>
			</ul>
		</div>

		<div class = "bloc_page">

			<h1>Liste des stages</h1>

			<div class = "texte">
				<p><center>Choisissez un stage pour encadrer un étudiant.</center></p>
			</div>

			<!-- Liste des stages -->
			<div class = "listeStage">
				 <?php
					$co=mysql_connect("localhost","root","")
						or die("数据库连接失败");
					mysql_select_db("bd_stage", $co);
					mysql_query("set names utf8");

					$q="select * from stage";//设置查询指令
					$result=mysql_query($q) or die (mysql_error());;//执行查询
					if(is_resource($result)){
						while($row = mysql_fetch_array($result))//将result结果集中查询结果取出一条
						{?>
							<h3>
							<?php echo $row["Titre"];?>
							<span id="stateBut" onclick="$use()"> détail </span>
							</h3>
							<p id="class1content" style = "display: none">
							<?php echo $row["Sujet"];?>
							</p>
					<?php } }?>
				<!--
				<h3>
					Stage titre
					<span id="stateBut" onclick="$use()">détail</span>
				</h3>


					<p id="class1content" style = "display: none">
						detaillllllllllllllllllllllllllllll
						blabla
					</p>
				-->

			</div>




		</div>
	</body>
</html>
