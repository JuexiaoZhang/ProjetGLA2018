<?php

	class Article {
		private $co;
		

		//enregistrer les informations personnelle
		private $titre,$auteur,$datePublication,$urlPhoto,$frais,$caution,$description;

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
				case 8 :
					$co = $args[0];
					$type = $args[1];
					$titre = $args[2];
					$auteur = $args[3];
					$datePublication = $args[4];
					$urlPhoto = $args[5];
					$frais = $args[6];
					$caution = $args[7];
					$description = $args[8];

					$req = "INSERT INTO article(mdp, email, prenom, nom, estValide, type, caution, finance) VALUES ('".$mdp."','".$email."','".$prenom."','".$nom."',0,'utilisateur',0,0)";

					"INSERT INTO article (titre, auteur, datePublication, photo, fraisEmprunt, caution, description, type) 
						VALUES ('".$titre."', '".$auteur."', '2018-05-01', 'https://static.fnac-static.com/multimedia/Images/FR/NR/df/57/90/9459679/1507-1/tsp20180222082724/Le-manuscrit-inacheve.jpg', '2', '20', 'Un manuscrit sans fin, une enquête sans corps, une défunte sans visage...\r\nAux alentours de Grenoble, un jeune a fini sa trajectoire dans un ravin après une course-poursuite avec la douane. Dans son coffre, le corps d\'une femme, les orbites vides, les mains coupées et rassemblées dans un sac. À la station-service où a été vue la voiture pour la dernière fois, la vidéosurveillance est claire : l\'homme qui conduisait n\'était pas le propriétaire du véhicule et encore moins le coupable.\r\n\r\nLéane Morgan et Enaël Miraure sont une seule et même personne. L\'institutrice reconvertie en reine du thriller a toujours tenu sa vie privée secrète. En pleine promo pour son nouveau roman dans un café parisien, elle résiste à la pression d\'un journaliste : elle ne donnera pas à ce vautour ce qu\'il attend, à savoir un papier sur un auteur à succès subissant dans sa vie l\'horreur racontée dans ses livres. Car sa vie, c\'est un mariage dont il ne reste rien sauf un lieu, L\'inspirante, villa posée au bord des dunes de la Côte d\'Opale où est resté son mari depuis la disparition de leur fille. Mais un appel lui annonçant son hospitalisation à la suite d\'une agression va faire resurgir le pire des quatre dernières années écoulées. Il a perdu la mémoire. Elle est seule.\r\nDans le vent, le sable et le brouillard, une question se posera : faut-il faire de cette vie-là un manuscrit inachevé, et en commencer un autre ?', 'livre');"

					$res = mysqli_query($co, $req)
						or die ("Erreur lors de l'inscription");

					$this->co = $co;
					$this->id = mysqli_insert_id($co); // retourne l'identifiant automatiquement généré par la dernière requête
					$this->nom = $nom;
					$this->prenom = $prenom;
					$this->email = $email;
					$this->mdp = $mdp;
					$this->type = $type;
					
					break;
			}
		}

		public function verif_pwd($pwd)
		{
			echo $this->mdp;
			return $pwd == $this->mdp;
		}

		public function modif_mdp($mdp)
		{
			$id = $this->id;
			$this->mdp = $mdp;
			mysqli_query($co, "UPDATE Utilisateur SET Mdp='$mdp' WHERE id='$id'")
			or die ("Erreur modification mot de passe");
		}

		public function connexion()
		{
			session_start();
			$_SESSION['id'] = $this->id;
			$_SESSION['mdp'] = $this->mdp;
			$_SESSION['email'] = $this->email;
			$_SESSION['nom'] = $this->nom;
			$_SESSION['prenom'] = $this->prenom;
			$_SESSION['type'] = $this->type;
			$_SESSION['estValide'] = $this->estValide;
			//$_SESSION['portable'] = $this->portable;
			$_SESSION['caution'] = $this->caution;
			$_SESSION['finance'] = $this->finance;
		}	
		public function deconnexion()
		{
			session_destroy();
			mysqli_close($this->co);
		}
	}
?>















