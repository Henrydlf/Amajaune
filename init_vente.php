<?php
	$nom=isset($_POST["name"])? $_POST["name"] : "";
	$id=isset($_POST["id"])? $_POST["id"] : "";
	$categorie=isset($_POST["categorie"])? $_POST["categorie"] : "";
	$prix=isset($_POST["prix"])? $_POST["prix"] : "";
	$image=isset($_POST["image"])? $_POST["image"] : "";
	$description=isset($_POST["description"])? $_POST["description"] : "";
	$sexe=isset($_POST["sexe"])? $_POST["sexe"] : "";
	$couleur=isset($_POST["couleur"])? $_POST["couleur"] : "";
	$taille=isset($_POST["taille"])? $_POST["taille"] : "";
	
	$database = "amajaune";

	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	$sql = "INSERT INTO `produits` (`ID`, `Nom`, `Categorie`, `Prix`, `Image`, `Nb_achat`, `Description`, `Sexe`, `Couleur`, `Taille`) VALUES ('1001', '".$nom."','".$categorie."', '".$prix."','".$image."', '0','".$description."', '".$sexe."','".$couleur."', '".$taille."')";

	$result = mysqli_query($db_handle, $sql);
	mysqli_close($db_handle);

	if($categorie == "livres"){
		header('Location: vente_livre.php');
	}
	elseif($categorie == "vetements"){
		header('Location: vente_vetements.php');
	}
	elseif($categorie == "musique"){
		header('Location: vente_musique.php');
	}
	elseif($categorie == "sports et loisirs"){
		header('Location: vente_sel.php');
	}
?>