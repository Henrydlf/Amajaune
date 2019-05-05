<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Livres</title>
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
        <li class="active"><a href="livres.php">Livres</a></li>
        <li><a href="musique.php">Musiques</a></li>
        <li><a href="vetements.php">Vêtements</a></li>
        <li><a href="sportsetloisirs.php">Sports et loisir</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

        <!--CONNEXION-->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <?php if($_SESSION['Identifiant']!=""){
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
          if($_SESSION['Type'] == "Acheteur")
          {?>
            <a href="panier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier </a>
          <?php }
          else if($_SESSION['Type'] == "Vendeur" || $_SESSION['Type'] == "Administrateur")
          {?>
            <a href="vente_livre.php"><span class="glyphicon glyphicon-shopping-cart"></span> Vendre un produit </a>
          <?php }?>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">    
  <div class="row">

<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
  }
  catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }

  $requete = "SELECT * FROM produits WHERE Categorie = 'livres' ";
  $reponse = $bdd->query($requete);

  while ( $donnees = $reponse->fetch() ) {
?>
     

      <div class="col-sm-3">
            <div class="panel panel-primary">
              <div class="panel-body"><img style="height:100px;" src="images_main/<?php echo $donnees ['Image']; ?>" class="img-responsive" style="width:50%" alt="Image"></div>
              <div class="panel-footer">
                <form action="pageprod.php" method="post">
                  <div><?php echo $donnees ['Nom'];?> - <?php echo $donnees ['Prix'];?> €</div>
                  <input type="text" class="form-control" name="aff_prod" id="aff_prod" style="display: none;" value="<?php echo $donnees['Nom']; ?>">
                  <div class="panel-footer"><input type="submit" value="Voir details" class="btn btn-block btn-success"></div>
                </form>
                <form action="livres.php" method="post">
                  <input type="text" class="form-control" name="panier" id="panier" style="display: none;" value="<?php echo $donnees['Nom']; ?>">
                  <div class="panel-footer"><input type="submit" value="Ajouter au panier" class="btn btn-block btn-success" onClick="verif_vente(<?php echo $donnees['Nom']; ?>)"></div>
                </form>
              </div>
            </div>
          </div>

<?php  
  }

$reponse->closeCursor();
?>

  </div>
</div><br>

<?php

  $_SESSION['nom_prod'] = isset($_POST["panier"])? $_POST["panier"] : "";

  if(!isset($_SESSION['panier'])) 
  { 
      /* Initialisation du panier */ 
      $_SESSION['panier'] = array(); 
      /* Subdivision du panier */ 
      $_SESSION['panier']['nom'] = array(); 
      $_SESSION['panier']['taille'] = array(); 
      $_SESSION['panier']['prix'] = array(); 
      $_SESSION['panier']['image'] = array(); 
  } 
  /* Ici, on sait que le panier existe, donc on ajoute l'article dedans. */ 
  if($_SESSION['nom_prod'] != ""){
    try{
      $bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
    }

    catch (Exception $e){
      die('Erreur : ' . $e->getMessage());
    }

    $requete = "SELECT * FROM `produits` WHERE Nom = '".$_SESSION['nom_prod']."'";
    $sql=$bdd->prepare($requete);
    $sql->execute();
    $resultat = $sql->fetch();

    array_push($_SESSION['panier']['nom'],$resultat['Nom']); 
    array_push($_SESSION['panier']['taille'],$resultat['Taille']); 
    array_push($_SESSION['panier']['prix'],$resultat['Prix']); 
    array_push($_SESSION['panier']['image'],$resultat['Image']); 
    array_push($_SESSION['panier']['quantite'], 1);
  }
?>

<footer class="container-fluid text-center">
  <p>&copy; Amajaune Copyright</p>  
</footer>