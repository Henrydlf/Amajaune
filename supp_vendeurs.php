<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Suppression vendeurs</title>
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
        <?php if($_SESSION['Type'] == "Acheteur")
        {?>
        <li><a href="info_userpay.php">Modifier mes informations de paiement</a></li>
      <?php } ?>
        <?php if($_SESSION['Type']=="Administrateur")
        {?>
          <li class="active"><a href="supp_vendeurs.php">Supprimer des vendeurs</a></li>
        <?php }?>
         <?php if($_SESSION['Type']=="Administrateur" || $_SESSION['Type']=="Vendeur")
        {?>
          <li><a href="supp_produits.php">Supprimer des Produits</a></li>
        <?php } ?>

      </ul><br>
    </div>

    <div class="col-sm-9">

  

      <div style="margin-left: 25px">
   
        <table class="table table-bordered table-striped table-sm">
        <br>
    <h4>Vendeurs de Amajaune 51</h4>

<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
  }
  catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }

  $requete = "SELECT * FROM utilisateurs WHERE Type = 'Vendeur' ";
  $reponse = $bdd->query($requete);

  while ( $donnees = $reponse->fetch() ) {
?> 
             <p> 
               <?php echo $donnees ['Identifiant'];?>
               <form action="supp_vendeurs.php" method="post">
               <input type="hidden" name="nomasupp" value="<?php echo $donnees ['Identifiant'];?>">
               <input type="submit" name="submit" value="Supprimer" class="btn btn-warning">
               </form>
             </p>
              <br>
<?php  
  }
$pseudo = isset($_POST["nomasupp"])? $_POST["nomasupp"] : "";

  $requete = "DELETE FROM `utilisateurs` WHERE Identifiant = '".$pseudo."'";
  $sql=$bdd->prepare($requete);
  $sql->execute();
  $resultat = $sql->fetch();

$reponse->closeCursor();
?>
 </tbody>
</table>

      </div>
        
    </div>
</div>
</div>
</body>
</ul>
</div>

<footer>
  <p>&copy; Amajaune Copyright</p>  
</footer>

