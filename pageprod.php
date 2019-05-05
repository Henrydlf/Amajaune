<?php
session_start(); 
  $_SESSION['aff_prod'] = isset($_POST["aff_prod"])? $_POST["aff_prod"] : "";

  try{
      $bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
    }

    catch (Exception $e){
      die('Erreur : ' . $e->getMessage());
    }

    $requete = "SELECT * FROM `produits` WHERE Nom = '".$_SESSION['aff_prod']."'";
    $sql=$bdd->prepare($requete);
    $sql->execute();
    $resultat = $sql->fetch();

    $_SESSION['nom_prod']=$resultat['Nom'];
    $_SESSION['image_prod']=$resultat['Image'];
    $_SESSION['prix_prod']=$resultat['Prix'];
    $_SESSION['desc_prod']=$resultat['Description'];
    $_SESSION['vendeur_prod']=$resultat['Vendeur'];

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
        <li class="active"><a href="main_page.php">Accueil</a></li>
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


<div class="container text-center"> 
  <div class="row">
    <div class="col-sm-4"> 
      <img src="images_main/<?php echo $_SESSION['image_prod'] ?>" class="img-responsive">
    </div>
    <div class="well well-lg" style="margin-top: 15px">
      <h2><?php echo $_SESSION['nom_prod']; ?></h2><br>
      <div style="margin-top: 20px" class="well well-sm">
       <h3><?php echo $_SESSION['desc_prod']?></h3>
      </div>
      <div class="col-sm-4">
       <h3>Prix:    <?php echo $_SESSION['prix_prod'] ?> €</h3>
      </div>
      <div class="text-center">
        <a href="panier.php" class="btn btn-primary btn-lg" role="button">Ajouter au panier</a>
      </div>
    </div>    
  </div>
</div><br>

<?php
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
  array_push($_SESSION['panier']['nom'],$_SESSION['nom_prod']); 
  array_push($_SESSION['panier']['prix'],$_SESSION['prix_prod']); 
  array_push($_SESSION['panier']['image'],$_SESSION['image_prod']); 
  $_SESSION['quantite']=1;
?>

<footer>
  <p>&copy; Amajaune Copyright</p>  
</footer>