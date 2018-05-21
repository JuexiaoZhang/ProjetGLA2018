<?php

	class Article {
		private $co;
		

		//enregistrer les informations personnelle
		private $id,$type,$titre,$auteur,$dateDay,$dateMonth,$dateYear,$urlPhoto,$frais,$caution,$description;

		public function __construct() {

			$ctp = func_num_args(); // nb de paramètres
			$args = func_get_args(); // tableau contenant les paramètres

			switch($ctp)
			{
				// Si l'utilisateur existe déjà dans la BD
				case 2 :
					$this->co = $args[0];
					$this->pseudo = $args[1];

					$res = mysqli_query($this->co, "SELECT idPersonne, mdp, email, prenom,nom,estValide,type,caution,finance
													FROM personne
													WHERE email = '{$this->pseudo}'");
						//or die("L'utilisateur n'existe pas");

					// On stocke les valeurs de la requête dans des variables
					$row = mysqli_fetch_assoc($res);
					if (!$row) {
						header('Location:../view/vue_connexion.php');
						echo $_SESSION["erreurConnexion"] = "L'utilisateur n'existe pas"; 
						die("L'utilisateur n'existe pas");
					}else{
						
						$this->id = $row["idPersonne"];
						$this->mdp = $row["mdp"];
						$this->email = $row["email"];
						$this->prenom = $row["prenom"];
						$this->nom = $row["nom"];
						$this->type = $row["type"];
						$this->estValide = $row["estValide"];
						//$this->portable = $row["portable"];
						$this->caution = $row["caution"];
						$this->finance = $row["finance"];
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
					
					// $req = "INSERT INTO article (titre, auteur, datePublication, photo, fraisEmprunt, caution, description, type) 
					// 	VALUES ('".$titre."',
					// 			'".$auteur."',
					// 			'".$dateYear."-".$dateMonth."-".$dateDay"',
					// 			'hahahaa',
					// 			20,
					// 			20,
					// 			'hahaha',
					// 			'livre')";


					// $req = "INSERT INTO article (titre, auteur, datePublication, photo, fraisEmprunt, caution, description, type) 
					// 	VALUES ('".$titre."',
					// 			'".$auteur."',
					// 			'".$dateYear."-".$dateMonth."-".$dateDay"',
					// 			'".$urlPhoto."',
					// 			".$frais.",
					// 			".$caution.",
					// 			'".$description."',
					// 			'".$type."')";

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

		// public function verif_pwd($pwd)
		// {
		// 	echo $this->mdp;
		// 	return $pwd == $this->mdp;
		// }

		// public function modif_mdp($mdp)
		// {
		// 	$id = $this->id;
		// 	$this->mdp = $mdp;
		// 	mysqli_query($co, "UPDATE Utilisateur SET Mdp='$mdp' WHERE id='$id'")
		// 	or die ("Erreur modification mot de passe");
		// }

		// public function connexion()
		// {
		// 	session_start();
		// 	$_SESSION['id'] = $this->id;
		// 	$_SESSION['mdp'] = $this->mdp;
		// 	$_SESSION['email'] = $this->email;
		// 	$_SESSION['nom'] = $this->nom;
		// 	$_SESSION['prenom'] = $this->prenom;
		// 	$_SESSION['type'] = $this->type;
		// 	$_SESSION['estValide'] = $this->estValide;
		// 	//$_SESSION['portable'] = $this->portable;
		// 	$_SESSION['caution'] = $this->caution;
		// 	$_SESSION['finance'] = $this->finance;
		// }	
		// public function deconnexion()
		// {
		// 	session_destroy();
		// 	mysqli_close($this->co);
		// }
	}
?>















