<?php

	class User {
		private $co;
		
		
		private $pseudo; //email

		//enregistrer les informations personnelle
		private $id, $mdp, $email, $prenom, $nom, $estValide, $portable, $caution, $finance;
		private $type; // visiteur, utilisateur, gestionnaire

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
						die();
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
				//cherche un user par id
				case 3:
					$this->co = $args[0];
					$this->id = $args[1];
					$res = mysqli_query($this->co, "SELECT idPersonne, mdp, email, prenom,nom,estValide,type,caution,finance
													FROM personne
													WHERE idPersonne = '{$this->id}'");

					$row = mysqli_fetch_assoc($res);
					if (!$row) {
						header('Location:../view/gest_infoUser.php');
						//echo $_SESSION["erreurSpUser"] = "L'utilisateur n'existe pas"; 
						die();
					}else{
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

				//ajouter un utilisateur par gestionnaire
				case 4 :
					$co = $args[0];
					$nom = $args[1];
					$prenom = $args[2];
					$email = $args[3];

					$req = "INSERT INTO personne(mdp, email, prenom, nom, estValide, type, caution, finance) VALUES ('123456','".$email."','".$prenom."','".$nom."',0,'utilisateur',0,0)";

					$res = mysqli_query($co, $req)
						or die ("Erreur lors de ajouter utilisateur");

					$this->co = $co;
					$this->id = mysqli_insert_id($co); // retourne l'identifiant automatiquement généré par la dernière requête
					$this->nom = $nom;
					$this->prenom = $prenom;
					$this->email = $email;

					$this->mdp = '123456';
					$this->type = 'utilisateur';
					
					break;

				// Inscription : création du membre dans la BD
				case 5 :
					$co = $args[0];
					$nom = $args[1];
					$prenom = $args[2];
					$email = $args[3];
					$mdp = $args[4];

					$req = "INSERT INTO personne(mdp, email, prenom, nom, estValide, type, caution, finance) VALUES ('".$mdp."','".$email."','".$prenom."','".$nom."',0,'utilisateur',0,0)";

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

		public function valider($co)
		{
			$req = "UPDATE personne SET estValide=1, caution=20 WHERE idPersonne={$this->id}";
			$res = mysqli_query($co, $req)
				or die ("Erreur lors de valider");
		}

		public function supprimer($co)
		{
			$req = "DELETE FROM personne WHERE idPersonne={$this->id}";
			$res = mysqli_query($co, $req)
				or die ("Erreur lors de supprimer");
		}

		public function verif_pwd($pwd)
		{
			echo $this->mdp;
			return $pwd == $this->mdp;
		}

		public function modif_infoPersoNom($nom)
		{
			$this->nom = $nom;
			$id = $this->id; 
	    	mysqli_query($this->co, "UPDATE personne SET nom='$nom' WHERE idPersonne='$id'")
				or die ("Erreur modification infos personnelles");
			$_SESSION['nom'] = $this->nom;
		}

		public function modif_infoPersoPrenom($prenom)
		{
			$this->prenom = $prenom;
			$id = $this->id; 
	    	mysqli_query($this->co, "UPDATE personne SET prenom='$prenom' WHERE idPersonne='$id'")
				or die ("Erreur modification infos personnelles");
			$_SESSION['prenom'] = $this->prenom;
		}

		public function modif_mdpParMdpActuel($mdpNew) 
		{
			$this->mdp = $mdpNew;
			$id = $this->id; 
	    	mysqli_query($this->co, "UPDATE personne SET mdp='$mdpNew' WHERE idPersonne='$id'")
				or die ("Erreur modification mdp par mdp actuel");
			$_SESSION['mdp'] = $this->mdp;
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

		public function annulerReservation($idRservation) {
			mysqli_query($this->co, "DELETE FROM reservation WHERE idReservation=$idRservation")
				or die ("Erreur annulation sa reservation");
		}
	}
?>















