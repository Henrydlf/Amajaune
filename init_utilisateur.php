<?php
	include ("utilisateur.php");

	$user = new Utilisateur;
	
	$user->setSurname(isset($_POST["surname"])? $_POST["surname"] : "");
	$user->setName(isset($_POST["name"])? $_POST["name"] : "");
	$user->setEmail(isset($_POST["email"])? $_POST["email"] : "");
	$user->setId(isset($_POST["id"])? $_POST["id"] : "");
	$user->setPassword(isset($_POST["password"])? $_POST["password"] : "");
	$user->setType(isset($_POST["type"])? $_POST["type"] : "");

	echo "Bienvenue " . $user->getSurname() . ".<br>";

	$user->addUser();
?>