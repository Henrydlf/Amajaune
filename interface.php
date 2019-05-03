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

			if(!$resultat){
				header('Location: form_connection.php');
			}

			else{
				session_start();
				$_SESSION['Identifiant'] = $resultat['Identifiant'];
				$_SESSION['Mail'] = $resultat['Mail'];
				$_SESSION['Nom']=$resultat['Nom'];
				$_SESSION['Prenom']=$resultat['Prenom'];
				$_SESSION['Type']=$resultat['Type'];
				$_SESSION['Mdp']=$resultat['Mdp'];
				$_SESSION['photo']=$resultat['photo'];
				if($resultat['Type'] == 'Acheteur')
				{
					$_SESSION['num_carte']=$resultat['num_carte'];
					$_SESSION['date_exp']=$resultat['date_exp'];
					$_SESSION['cvv']=$resultat['cvv'];
					$_SESSION['type_carte']=$resultat['type_carte'];
					$_SESSION['nom_carte']=$resultat['nom_carte'];
				}

				header('Location: main_page.php');
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