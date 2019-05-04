<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Informations utilisateur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="main_page.css" rel="stylesheet" type="text/css"/>
  <link rel="shortcut icon" href="favicon.ico" >
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
   .row.content {height: 500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px; 
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

	<!--CLASSE DU TITRE DU CITE AMAJAUNE-->
<div class="jumbotron">
  <div class="container text-center">
    <!--TITRE DU CITE----------------------------------------------------------------------------------------->
    <h1> 
    <div class="color">Amajaune 51</div> 
    </h1>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="main_page.php">Accueuil</a></li>
        <li><a href="livres.php">Livres</a></li>
        <li><a href="musique.php">Musiques</a></li>
        <li><a href="vetements.php">Vêtements</a></li>
        <li><a href="spotsetloisirs.php">Sports et loisir</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

      	<!--CONNEXION-->
        <li class="active"><a href="form_connection.php"><span class="glyphicon glyphicon-user"></span><?php echo " " .$_SESSION['Identifiant']?></a></li>
        <!--PANIER-->
        <li><a href="panier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Informations utilisateur</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section2">Modifier mes informations personelles</a></li>
        <li><a href="info_userpay.php">Modifier mes informations de paiement</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">

     	<div class="panel-body"><img src="images_main/galibalax.jpg" class="img-responsive" style="width:20%" alt="Image"></div>

      <div style="margin-left: 25px">
      	<h4>Identifiant:</h4>
        <p><?php echo " " .$_SESSION['Identifiant']?></p>
        <h4>Adresse mail:</h4>
        <p><?php echo " " .$_SESSION['Mail']?></p>
        <h4>Nom:</h4>
        <p><?php echo " " .$_SESSION['Nom']?></p>
        <h4>Prénom:</h4>
        <p><?php echo " " .$_SESSION['Prenom']?></p>
        <h4>Mot de passe:</h4>
        <p><?php echo " " .$_SESSION['Mdp']?></p>
      </div>

      <div class="custom-file">
      	<form action="info_user.php" method="post">
		  <input type="file" class="custom-file-input" id="hFichier" name="hFichier" lang="fr" accept=".jpg,.jpeg,.gif,.png" />
		  <label class="custom-file-label" for="hFichier">Sélectionner un fichier</label>
		</form>

  <?php 
  $hFichier = isset($_POST["hFichier"])? $_POST["hFichier"] : "";

  try{
			  $bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
			}

			catch (Exception $e){
	    		die('Erreur : ' . $e->getMessage());
	    	}

			$requete = "UPDATE utilisateurs SET photo='".$hFichier."' WHERE Identifiant='".$_SESSION['Identifiants']."'";  
			$sql=$bdd->prepare($requete);
			$sql->execute();
			$resultat = $sql->fetch();
  ?>

</div>
        
    </div>
</div>
</div>
</body>

<footer>
  <p>&copy; Amajaune Copyright</p>  
</footer>

