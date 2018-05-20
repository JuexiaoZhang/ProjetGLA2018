<?php
	class Bd {

		private $co;
		private $host;
		private	$user;
		private	$bdd;
		private	$passwd;
	
		public function __construct(){
			$this->host = "localhost";
			$this->user = "root";
			$this->passwd = "";
			$this->bdd = "mediatheque";
			
		}
	
		// Connexion à la base de données
		public function connexion() {
			$this->co = mysqli_connect($this->host, $this->user, $this->passwd, $this->bdd)
			or die("erreur de connexion");
			return $this->co;
		}

		// Déconnexion à la base de données
		public function deconnexion() {
			mysqli_close($this->co);		
		}
	}

?>