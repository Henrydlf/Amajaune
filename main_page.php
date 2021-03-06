<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Amajaune 51</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="main_page.css" rel="stylesheet" type="text/css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="favicon.ico" >

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
        <li class="active"><a href="#">Accueuil</a></li>
        <li><a href="livres.php">Livres</a></li>
        <li><a href="musique.php">Musiques</a></li>
        <li><a href="vetements.php">Vêtements</a></li>
        <li><a href="spotsetloisirs.php">Sports et loisir</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

      	<!--CONNEXION-->
      	<ul id="menu-demo2">
        <li><a href="form_connection.php">Mon Copte<span class="glyphicon glyphicon-user"></span><?php echo " " .$_SESSION['Identifiant']?></a>
        <ul>
			<li><a href="#">lien sous menu 1</a></li>
			<li><a href="#">lien sous menu 1</a></li>
			<li><a href="#">lien sous menu 1</a></li>
			<li><a href="#">lien sous menu 1</a></li>
		</ul>
        </li>
        </ul>

        <!--PANIER-->
        <li><a href="panier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">VENTE FLASH LIVRE</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Profitez de cette offre</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading">VENTE FLASH MUSIQUE</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Profitez de cette offre</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">VENTE FLASH VÊTEMENTS</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Profitez de cette offre</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">VENTE FLASH SPORTS ET LOISIRS</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Profitez de cette offre</div>
      </div>
    </div>
  </div>
</div><br>



<footer>
  <p>&copy; Amajaune Copyright</p>  
</footer>