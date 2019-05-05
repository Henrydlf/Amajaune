<?php 

session_start();
// Suppression des variables de session et de la session

$_SESSION = array();

session_destroy();
session_start();
$_SESSION['Identifiant']="";
$_SESSION['Type']="";
header('Location: main_page.php');
		exit();
?>