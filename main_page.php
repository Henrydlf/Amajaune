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
          else if($_SESSION['Type'] == "Vendeur")
          {?>
            <a href="vente_livre.php"><span class="glyphicon glyphicon-shopping-cart"></span> Vendre un produit </a>
          <?php }?>
        </li>
      </ul>
    </div>
  </div>
</nav>


<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=amajaune;charset=utf8', 'root', '');
  }
  catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }

  $flivre = $bdd->query('SELECT * FROM produits WHERE Categorie="livres" ORDER BY Nb_achat DESC  ');
  $alivre = $flivre->fetch();
  $fmusique = $bdd->query('SELECT * FROM produits WHERE Categorie="musique" ORDER BY Nb_achat DESC ');
  $amusique = $fmusique->fetch();
  $fvetement = $bdd->query('SELECT * FROM produits WHERE Categorie="vetements" ORDER BY Nb_achat DESC ');
  $avetement = $fvetement->fetch();
  $fsportetloisir = $bdd->query('SELECT * FROM produits WHERE Categorie="sports et loisirs" ORDER BY Nb_achat DESC ');
  $asportetloisir = $fsportetloisir->fetch();
?>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">VENTE FLASH LIVRE</div>
        <div class="panel-body"><img style="height:100px;" src="images_main/<?php echo $alivre['Image']?>" class="img-responsive" style="width:50%" alt="Image"></div>
        <div class="panel-footer">
          <a onclick="afficher_prod()" href="pageprod.php" type="button"><?php 
            $_SESSION['produits'] = $alivre['Nom'];
            echo $alivre ['Nom'];?> - <?php echo $alivre ['Prix']; ?>€</a>
          <div class="panel-footer"><button class="btn btn-block btn-success">Ajouter au panier</button></div>
        </div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading">VENTE FLASH MUSIQUE</div>
        <div class="panel-body"><img style="height:100px;" src="images_main/<?php echo $amusique['Image']?>" class="img-responsive" style="width:50%" alt="Image"></div>
        <div class="panel-footer">
          <div><?php echo $amusique ['Nom'];?> - <?php echo $amusique ['Prix'];?>€</div>
          <div class="panel-footer"><button class="btn btn-block btn-success">Ajouter au panier</button></div>
        </div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">VENTE FLASH VÊTEMENTS</div>
        <div class="panel-body"><img style="height:100px;" src="images_main/<?php echo $avetement['Image']?>" class="img-responsive" style="width:50%" alt="Image"></div>
        <div class="panel-footer">
          <div><?php echo $avetement ['Nom'];?> - <?php echo $avetement ['Prix'];?>€</div>
          <div class="panel-footer"><button class="btn btn-block btn-success">Ajouter au panier</button></div>
        </div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">VENTE FLASH SPORTS ET LOISIRS</div>
        <div class="panel-body"><img style="height:100px;" src="images_main/<?php echo $asportetloisir['Image']?>" class="img-responsive" style="width:50%" alt="Image"></div>
        <div class="panel-footer">
          <div><?php echo $asportetloisir ['Nom'];?> - <?php echo $asportetloisir ['Prix'];?>€</div>
          <div class="panel-footer"><button class="btn btn-block btn-success">Ajouter au panier</button></div>
        </div>
    </div>
  </div>
</div><br>

</div>
</div>
</ul>
</div>
</div>
</nav>



<footer>
  <p>&copy; Amajaune Copyright</p>  
</footer>
</body>
</html>