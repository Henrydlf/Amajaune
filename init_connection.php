<?php
	include ("interface.php");

	$user = new Utilisateur;
	
	$user->setId(isset($_POST["id"])? $_POST["id"] : "");
	$user->setPassword(isset($_POST["password"])? $_POST["password"] : "");

	$interface = new Site($user);

	$interface->connectUser();
	header('Location: main_page.php');
?>