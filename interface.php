<?php

	include ("utilisateur.php");

	class Site
	{
		protected $user;
		protected $paniers;

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
				session_start();
				$this->user->setId($resultat['Identifiant']);
				$this->user->setEmail($resultat['Mail']);
				$this->user->setName($resultat['Nom']);
				$this->user->setSurname($resultat['Prenom']);
				$this->user->setType($resultat['Type']);
				$this->user->setPassword($resultat['Mdp']);
				echo "Vous êtes connecté !<br><br>";
			}
		}

		public function afficherPanier()
		{
			if($this->user->getType() == 'Acheteur' || $this->user->getType() == 'Administrateur')
				echo "Votre panier est disponible <br><br>";
			elseif($this->user->getType() == 'Vendeur')
				echo "Vous etes un vendeur";
		}
	}
?>