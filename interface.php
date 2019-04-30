<?php

	include ("utilisateur.php");

	class Site
	{
		protected $user;

		public function __construct(Utilisateur $_user){
			$this->user = $_user;
		}

		//GETTERS
		public function __toString(): string{
	        return (string) $this->getUser();
	    }

		public function getUser(){
			return $this->user;
		}

		public function connectUser(): void{
			try{
			  $bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
			}

			catch (Exception $e){
	    		die('Erreur : ' . $e->getMessage());
	    	}

			$requete = "SELECT * FROM `utilisateurs` WHERE Identifiant = '".$this->user->getId()."' AND Mdp = '".$this->user->getPassword()."'";
			$sql=$bdd->prepare($requete);
			$sql->execute();
			$resultat = $sql->fetch();

			if(!$resultat)
				echo "L'identifiant ou le mot de passe est erroné. <br>";
			else{
				echo "Bonjour " .$this->user->getID(). ". <br>";
			}
		}	
	}
?>