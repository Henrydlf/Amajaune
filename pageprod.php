<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Musiques</title>
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
        <li><a href="main_page.php">Accueil</a></li>
        <li><a href="livres.php">Livres</a></li>
        <li><a href="musique.php">Musiques</a></li>
        <li><a href="vetements.php">Vêtements</a></li>
        <li><a href="sportsetloisirs.php">Sports et loisir</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

        <!--CONNEXION-->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <?php if($_SESSION){
            ?>
            <span class="glyphicon glyphicon-user"></span>
            <?php
              echo " " .$_SESSION['Identifiant'];
            ?>
            <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="info_user.php">Mes informations</a></li>
                <li class="divider"></li>
                <li><a href="deconnexion.php">Deconnexion</a></li>
              </ul>
            <?php
            }
            else{
            ?>
          </a>
          <li><a href="form_connection.php">Se connecter</a></li>
          <?php } ?>
        </li>
        <li>
          <?php 
            if($_SESSION){
              if($_SESSION['Type'] == "Acheteur")
              {?>
                <a href="panier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier </a>
              <?php }
              else if($_SESSION['Type'] == "Vendeur")
              {?>
                <a href="vente_livre.php"><span class="glyphicon glyphicon-shopping-cart"></span> Vendre un produit </a>
              <?php }
            }
          ?>
          
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container text-center">    
  <h3><?php echo $_SESSION['produits'] ?></h3><br>
  <div class="row">
    <div class="col-sm-4"> 
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      
       <p>Prix à l'unité</p>
      
    </div>
    <div class="col-sm-4">
      <div class="well well-sm">
       <p>Titre,Auteur</p>
      </div>
      <div class="well well-lg">
       <p>Description du produit</p>
      </div>
      
    </div>


 <div class="btn-group">
  <button type="button" class="btn btn-default">Quantité</button>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span>
   <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
     <li><a href="#" title="1">1</a></li>
     <li><a href="#" title="2">2</a></li>
     <li><a href="#" title="3">3</a></li>
     <li><a href="#" title="4">4</a></li>
     <li><a href="#" title="5">5</a></li>
     <li><a href="#" title="6">6</a></li>
     <li><a href="#" title="7">7</a></li>
     <li><a href="#" title="8">8</a></li>
     <li><a href="#" title="9">9</a></li>
     <li><a href="#" title="10">10</a></li>
     
  </ul>
</div>
  <br><br><br><br>

    <div class="text-center">
    <a href="panier.php" class="btn btn-primary btn-lg" role="button">Ajouter au panier</a>
    </button>
    </div>
    
  </div>
</div><br>




<footer>
  <p>&copy; Amajaune Copyright</p>  
</footer>