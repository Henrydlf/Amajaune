<?php

	include ("utilisateur.php");

	class Site
	{
		protected $user;
		protected $paniers = array();

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

		public function setPanier($nom_prod): void
		{
			$panier[] = array($nom_prod);
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
					$_SESSION['panier'] = array(); 
					/* Subdivision du panier */ 
					$_SESSION['panier']['nom'] = array(); 
					$_SESSION['panier']['taille'] = array(); 
					$_SESSION['panier']['prix'] = array();
					$_SESSION['panier']['image'] = array(); 
				}

				header('Location: main_page.php');
			}
		}
	}
?>