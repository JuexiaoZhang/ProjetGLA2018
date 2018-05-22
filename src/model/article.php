<?php

	class Article {
		private $co;
		

		//enregistrer les informations personnelle
		private $id,$type,$titre,$auteur,$dateDay,$dateMonth,$dateYear,$urlPhoto,$frais,$caution,$description,$datePublication;

		public function __construct() {

			$ctp = func_num_args(); // nb de paramètres
			$args = func_get_args(); // tableau contenant les paramètres

			switch($ctp)
			{
				case 2 :
					$this->co = $args[0];
					$this->id = $args[1];

					$res = mysqli_query($this->co, "SELECT idArticle, titre, auteur, datePublication, photo, fraisEmprunt, caution, description, type
													FROM article
													WHERE idArticle = '{$this->id}'");
						
					// On stocke les valeurs de la requête dans des variables
					$row = mysqli_fetch_assoc($res);
					if (!$row) {
						header('Location:../view/gest_articles.php');
						echo $_SESSION["erreurSpArticle"] = "L'article n'existe pas"; 
						die();
					}else{

						$this->type = $row["type"];
						$this->titre = $row["titre"];
						$this->auteur = $row["auteur"];
						$this->datePublication = $row["datePublication"];
						$this->urlPhoto = $row["photo"];
						$this->frais = $row["fraisEmprunt"];
						$this->caution = $row["caution"];
						$this->description = $row["description"];

					}
					break;

				// Inscription : création du membre dans la BD
				case 11 :
					$co = $args[0];
					$type = $args[1];
					$titre = $args[2];
					$auteur = $args[3];
					$dateDay = $args[4];
					$dateMonth = $args[5];
					$dateYear = $args[6];
					$urlPhoto = $args[7];
					$frais = $args[8];
					$caution = $args[9];
					$description = $args[10];

					$req = "INSERT INTO article (titre, auteur, datePublication, photo, fraisEmprunt, caution, description, type) VALUES ('".$titre."', 'auteurtest2', '".$dateYear."-".$dateMonth."-".$dateDay."', '".$urlPhoto."', ".$frais.", ".$caution.", '".$description."', '".$type."')";

					$res = mysqli_query($co, $req)
						or die ("Erreur lors de l'inscription");

					$this->co = $co;
					$this->id = mysqli_insert_id($co); // retourne l'identifiant automatiquement généré par la dernière requête
					$this->type = $type;
					$this->titre = $titre;
					$this->auteur = $auteur;
					$this->dateDay = $dateDay;
					$this->dateMonth = $dateMonth;
					$this->dateYear = $dateYear;
					$this->urlPhoto = $urlPhoto;
					$this->frais = $frais;
					$this->caution = $caution;
					$this->description = $description;
	
					break;
			}
		}

		public function supprimer($co)
		{
			$req = "DELETE FROM article WHERE idArticle={$this->id}";
			$res = mysqli_query($co, $req)
				or die ("Erreur lors de supprimer");
		}
		public function update($co,$title,$donnee)
		{
			$req = "UPDATE article SET ".$title."=".$donnee." WHERE idArticle={$this->id}";
			if (mysqli_query($co, $req)) {
				return true;
			}else return false;	
		}

	}
?>















