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
              else if($_SESSION['Type'] == "Vendeur" || $_SESSION['Type'] == "Administrateur")
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

<div class="container-fluid" style = "margin-top: -25px">
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

          <form action="info_userpay.php" method="post">

            <h4>Type de cartre:</h4>
              <select size="1" name="type_carte">
                <option value="aucun" selected>carte actuelle:<?php echo " " .$_SESSION['type_carte']?></option>
                <option value="visa">visa</option>
                <option value="mastercard">mastercard</option>
                <option value="american express">american express</option>
              </select>

          <h4>Numéro de carte:</h4>  
          <div class="input-group form-group">
            <input type="text" class="form-control" name="num_carte" placeholder="<?php echo " " .$_SESSION['num_carte']?>">
          </div>

            <h4>Date d'expiration:</h4>
          <div class="input-group form-group">
            <input type="text" class="form-control" name="date_exp" placeholder="<?php echo " " .$_SESSION['date_exp']?>">
          </div>

          <h4>Nom du propriétaire de la carte:</h4>
          <div class="input-group form-group">
            <input type="text" class="form-control" name="nom_carte" placeholder="<?php echo " " .$_SESSION['nom_carte']?>">
          </div>

          <h4>CVV:</h4>
          <div class="input-group form-group">
            <input type="text" class="form-control" name="cvv" placeholder="<?php echo " " .$_SESSION['cvv']?>">
          </div>

          <div class="form-group">
            <input type="submit" value="Enregistrer" class="btn float-right btn-success">
          </div>
        </form>
<?php
        $type_carte = isset($_POST["type_carte"])? $_POST["type_carte"] : "";
        $num_carte = isset($_POST["num_carte"])? $_POST["num_carte"] : "";
        $date_exp = isset($_POST["date_exp"])? $_POST["date_exp"] : "";
        $nom_carte = isset($_POST["nom_carte"])? $_POST["nom_carte"] : "";
        $cvv = isset($_POST["cvv"])? $_POST["cvv"] : "";
if($type_carte != 'aucun')
{
  try{
      $bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
    }
      catch (Exception $e){
          die('Erreur : ' . $e->getMessage());
        }

      $requete = "UPDATE utilisateurs SET type_carte='".$type_carte."' WHERE Identifiant='".$_SESSION['Identifiant'] ."'";  
      $sql=$bdd->prepare($requete);
      $sql->execute();
      $resultat = $sql->fetch();
      $_SESSION['type_carte']=$type_carte;
}

if($num_carte != '')
{
  try{
      $bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
    }
      catch (Exception $e){
          die('Erreur : ' . $e->getMessage());
        }

      $requete = "UPDATE utilisateurs SET num_carte='".$num_carte."' WHERE Identifiant='".$_SESSION['Identifiant'] ."'";  
      $sql=$bdd->prepare($requete);
      $sql->execute();
      $resultat = $sql->fetch();
      $_SESSION['num_carte']=$num_carte;
}

if($date_exp != '')
{
  try{
      $bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
    }
      catch (Exception $e){
          die('Erreur : ' . $e->getMessage());
        }

      $requete = "UPDATE utilisateurs SET date_exp='".$date_exp."' WHERE Identifiant='".$_SESSION['Identifiant'] ."'";  
      $sql=$bdd->prepare($requete);
      $sql->execute();
      $resultat = $sql->fetch();
      $_SESSION['date_exp']=$date_exp;
}

if($nom_carte != '')
{
  try{
      $bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
    }
      catch (Exception $e){
          die('Erreur : ' . $e->getMessage());
        }

      $requete = "UPDATE utilisateurs SET nom_carte='".$nom_carte."' WHERE Identifiant='".$_SESSION['Identifiant'] ."'";  
      $sql=$bdd->prepare($requete);
      $sql->execute();
      $resultat = $sql->fetch();
      $_SESSION['nom_carte']=$nom_carte;
}

if($cvv != '')
{
  try{
      $bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
    }
      catch (Exception $e){
          die('Erreur : ' . $e->getMessage());
        }

      $requete = "UPDATE utilisateurs SET cvv='".$cvv."' WHERE Identifiant='".$_SESSION['Identifiant'] ."'";  
      $sql=$bdd->prepare($requete);
      $sql->execute();
      $resultat = $sql->fetch();
      $_SESSION['cvv']=$cvv;
}

  
  ?>



      </div>
        
    </div>
</div>
</div>
</body>

<footer>
  <p>&copy; Amajaune Copyright</p>  
</footer>

