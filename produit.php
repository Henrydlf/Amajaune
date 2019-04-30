<?php
	class Produit
	{
		protected $id, $name, $categorie, $prix, $image, $nbachat, $description;

		//GETTERS
		public function __toString(): string{
	        return (string) $this->getUsername();
	    }

		public function getId(){
			return $this->id;
		}

		public function getName(){
			return $this->name;
		}

		public function getCategorie(){
			return $this->categorie;
		}

		public function getPrix(){
			return $this->prix;
		}

		public function getImage(){
			return $this->image;
		}

		public function getNbachat(){
			return $this->achat;
		}

		public function getDescription(){
			return $this->description;
		}

		//SETTERS
		public function setId(int $id): void{
			$this->id = $id;
		}

		public function setName(string name): void{
			$this->name = $name;
		}


		public function setCategorie(string $categorie): void{
			$this->categorie = $categorie;
		}

		public function setPrix(flaot $prix): void{
			$this->surname = $surname;
		}

		public function setImage(string $image): void{
			$this->image = $image;
		}

		public function setType(int $nbachat): void{
			$this->nbachat = $nbachat;
		}

		public function setDescription(string $description): void{
			$this->description = $description;
		}


	}
?>