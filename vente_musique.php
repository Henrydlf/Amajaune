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
        <li><a href="main_page.php">Accueuil</a></li>
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
                <a href="form_vente.php"><span class="glyphicon glyphicon-shopping-cart"></span> Vendre un produit </a>
              <?php }
            }
          ?>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid" style = "margin-top: -25px">
	<div class="row content">
		<div class="col-sm-3 sidenav" style= "background-color: white; height: 500px; width: 250px"  >
		  <h4>Categories de vente</h4>
		  <ul class="nav nav-pills nav-stacked">
		    <li><a href="form_vente.php">Livres</a></li>
        <li><a href="vente_vetements.php">Vetements</a></li>
        <li class="active"><a href="#section2">Musique</a></li>
        <li><a href="vente_sel.php">Sports et Loisirs</a></li>
		  </ul><br>
		</div>

	<h2 style="margin-left:275px">Mettre en vente un album</h2>

    <div style="margin-left: 300px; margin-top: 25px">
      <form action="init_vente.php" method="post">
        <div class="input-group form-group">
          <input type="text" class="form-control" name="name" placeholder="Nom du produit">  
        </div>
        <div class="input-group form-group">
          <input type="text" class="form-control" name="prix" placeholder="Prix">
        </div>
        <div class="input-group form-group">
          <input type="file" class="custom-file-input" id="image" name="image" lang="fr" accept=".jpg,.jpeg,.gif,.png" />
          <label class="custom-file-label" for="image">Ajouter une photo</label> <br><br>
        </div>
        <div class="input-group form-group">
          <textarea type="text" class="form-control" name="description" placeholder="Description" rows="5" cols="22"></textarea>
        </div>
        <div class="input-group form-group">
          <input type="text" class="form-control" id="categorie" name="categorie" value="musique" style="display: none;">
        </div>
        <div class="form-group">
            <input type="submit" value="Vendre" class="btn float-right login_btn" onClick="verif_vente()">
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function verif_vente()
  {
    alert("Produit vendue");
  }

</body>
</html>