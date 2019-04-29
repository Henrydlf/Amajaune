<?php
	class Utilisateur
	{
		protected $id, $username, $name, $surname, $email, $password, $type;

		//GETTERS
		public function __toString(): string{
	        return (string) $this->getUsername();
	    }

		public function getId(){
			return $this->id;
		}

		public function getUsername(){
			return $this->id;
		}

		public function getName(){
			return $this->name;
		}

		public function getSurname(){
			return $this->surname;
		}

		public function getEmail(){
			return $this->email;
		}

		public function getPassword(){
			return $this->password;
		}

		public function getType(){
			return $this->type;
		}

		//SETTERS
		public function setUsername(string $username): void{
			$this->username = $username;
		}

		public function setId(string $id): void{
			$this->id = $id;
		}

		public function setName(string $name): void{
			$this->name = $name;
		}

		public function setSurname(string $surname): void{
			$this->surname = $surname;
		}

		public function setEmail(string $email): void{
			$this->email = $email;
		}

		public function setType(string $type): void{
			$this->type = $type;
		}

		public function setPassword(string $password): void{
			$this->password = $password;
		}

		public function addUser(): void{
			$database = "amajaune";

			$db_handle = mysqli_connect('localhost', 'root', '');
			$db_found = mysqli_select_db($db_handle, $database);

			$sql = "INSERT INTO `utilisateurs`(`Identifiant`, `Mdp`, `Nom`, `Prenom`, `Mail`, `Type`) VALUES ('".$this->getId()."','".$this->getPassword()."','".$this->getName()."', '".$this->getSurname()."','".$this->getEmail()."', '".$this->getType()."')";

			$result = mysqli_query($db_handle, $sql);
			mysqli_close($db_handle);
		}
	}
?>