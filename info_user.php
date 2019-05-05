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
      height: 700px;
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

<div class="container-fluid" style = "margin-top: -25px">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Informations utilisateur</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section2">Modifier mes informations personelles</a></li>
        <?php if($_SESSION['Type'] == "Acheteur")
        {?>
        <li><a href="info_userpay.php">Modifier mes informations de paiement</a></li>
      <?php } ?>
      </ul><br>
    </div>

    <div class="col-sm-9">

     	<div class="panel-body"><img src="images_main/<?php echo $_SESSION['photo']; ?>" class="img-responsive" style="width:20%" alt="Image"></div>

      <div style="margin-left: 25px">
   
		<form action="info_user.php" method="post">

			<input type="file" class="custom-file-input" id="hFichier" name="hFichier" lang="fr" accept=".jpg,.jpeg,.gif,.png" />
		  <label class="custom-file-label" for="hFichier">Modifier photo de profil</label> <br><br>

            <h4>Identifiant:</h4>
              <div class="input-group form-group">
            <input type="text" class="form-control" name="Identifiant" placeholder="<?php echo " " .$_SESSION['Identifiant']?>">
          </div>

          <h4>Adresse mail:</h4>  
          <div class="input-group form-group">
            <input type="text" class="form-control" name="Mail" placeholder="<?php echo " " .$_SESSION['Mail']?>">
          </div>

            <h4>Nom:</h4>
          <div class="input-group form-group">
            <input type="text" class="form-control" name="date_exp" placeholder="<?php echo " " .$_SESSION['Nom']?>">
          </div>

          <h4>Prénom:</h4>
          <div class="input-group form-group">
            <input type="text" class="form-control" name="Prenom" placeholder="<?php echo " " .$_SESSION['Prenom']?>">
          </div>

          <h4>Mot de passe:</h4>
          <div class="input-group form-group">
            <input type="text" class="form-control" name="Mdp" placeholder="<?php echo " " .$_SESSION['Mdp']?>">
          </div>

          <div class="form-group">
            <input type="submit" value="Enregistrer" class="btn float-right btn-success">
          </div>
        </form>

  <?php 
  $hFichier = isset($_POST["hFichier"])? $_POST["hFichier"] : "";
  $Identifiant = isset($_POST["Identifiant"])? $_POST["Identifiant"] : "";
  $Mail = isset($_POST["Mail"])? $_POST["Mail"] : "";
  $Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
  $Prenom = isset($_POST["Prenom"])? $_POST["Prenom"] : "";
  $Mdp = isset($_POST["Mdp"])? $_POST["Mdp"] : "";

if($hFichier != '')
{
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
	}
	catch (Exception $e){
  	die('Erreur : ' . $e->getMessage());
  }

	$requete = "UPDATE utilisateurs SET photo='".$hFichier."' WHERE Identifiant='".$_SESSION['Identifiant']	."'";  
	$sql=$bdd->prepare($requete);
	$sql->execute();
	$resultat = $sql->fetch();
	$_SESSION['photo']=$hFichier;
}
  
if($Identifiant != '')
{
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
	}
	catch (Exception $e){
  	die('Erreur : ' . $e->getMessage());
  }

	$requete = "UPDATE utilisateurs SET Identifiant='".$Identifiant."' WHERE Identifiant='".$_SESSION['Identifiant']	."'";  
	$sql=$bdd->prepare($requete);
	$sql->execute();
	$resultat = $sql->fetch();
	$_SESSION['Identifiant']=$Identifiant;
}

if($Mail != '')
{
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
	}
	catch (Exception $e){
  	die('Erreur : ' . $e->getMessage());
  }

	$requete = "UPDATE utilisateurs SET Mail='".$Mail."' WHERE Identifiant='".$_SESSION['Identifiant']	."'";  
	$sql=$bdd->prepare($requete);
	$sql->execute();
	$resultat = $sql->fetch();
	$_SESSION['Mail']=$Mail;
}

if($Nom != '')
{
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
	}
	catch (Exception $e){
  	die('Erreur : ' . $e->getMessage());
  }

	$requete = "UPDATE utilisateurs SET Nom='".$Nom."' WHERE Identifiant='".$_SESSION['Identifiant']	."'";  
	$sql=$bdd->prepare($requete);
	$sql->execute();
	$resultat = $sql->fetch();
	$_SESSION['Nom']=$Nom;
}

if($Prenom != '')
{
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
	}
	catch (Exception $e){
  	die('Erreur : ' . $e->getMessage());
  }

	$requete = "UPDATE utilisateurs SET Prenom='".$Prenom."' WHERE Identifiant='".$_SESSION['Identifiant']	."'";  
	$sql=$bdd->prepare($requete);
	$sql->execute();
	$resultat = $sql->fetch();
	$_SESSION['Prenom']=$Prenom;
}

if($Mdp != '')
{
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
	}
	catch (Exception $e){
  	die('Erreur : ' . $e->getMessage());
  }

	$requete = "UPDATE utilisateurs SET Mdp='".$Mdp."' WHERE Identifiant='".$_SESSION['Identifiant']	."'";  
	$sql=$bdd->prepare($requete);
	$sql->execute();
	$resultat = $sql->fetch();
	$_SESSION['Mdp']=$Mdp;
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

