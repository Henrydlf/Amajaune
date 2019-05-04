<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Informations paiement utilisateur</title>
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
        <li><a href="info_user.php">Modifier mes informations personelles</a></li>
        <li class="active"><a href="#section3">Modifier mes informations de paiement</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">


      <div style="margin-left: 25px">
        <h4>Numéro de carte:</h4>
        <p><?php echo " " .$_SESSION['num_carte']?></p>
        <h4>Date d'expiration:</h4>
        <p><?php echo " " .$_SESSION['date_exp']?></p>
        <h4>CVV:</h4>
        <p><?php echo " " .$_SESSION['cvv']?></p>
        <h4>Type de carte:</h4>
        <p><?php echo " " .$_SESSION['type_carte']?></p>
        <h4>Nom propriétaire de la carte:</h4>
        <p><?php echo " " .$_SESSION['nom_carte']?></p>
      </div>
        
    </div>
</div>
</div>
</body>

<footer>
  <p>&copy; Amajaune Copyright</p>  
</footer>

