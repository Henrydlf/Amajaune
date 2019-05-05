<?php  
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Panier</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="main_page.css" rel="stylesheet" type="text/css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="favicon.ico" >
</head>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 

<body>

<div class="jumbotron">
  <div class="container text-center">
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


<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Produit</th>
                            <th scope="col">Disponible</th>
                            <th scope="col" class="text-center">Quantité</th>
                            <th scope="col" class="text-right">Prix</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        for($i = 0; $i < sizeof($_SESSION['panier']['nom']); $i++)
                        {
                      ?>
                        <tr>
                            <td><img  style="height: 100px" src="images_main/<?php echo $_SESSION['panier']['image'][$i] ?>"></td>
                            <td><?php echo $_SESSION['panier']['nom'][$i] ?></td>
                            <td>In stock</td>
                            <form action="panier.php" method="post">
                              <td><input class="form-control" type="text" value="<?php echo $_SESSION['quantite']; ?>" id="quantite" name="quantite"></td>
                            <td><input type="submit" value="valider"></td></form>
                            <td class="text-right"><?php $p=$_SESSION['panier']['prix'][$i]*$_SESSION['quantite']; echo $p; ?> €</td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                      <?php
                        }
                      ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sous-Total</td>
                            <td class="text-right"><?php 
                            $soustot = 0;
                            for($i = 0; $i < sizeof($_SESSION['panier']['nom']); $i++)
                            {
                              $soustot = $soustot+$_SESSION['panier']['prix'][$i]*$_SESSION['quantite'];
                            }
                              echo $soustot;
                            ?> €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Livraison</td>
                            <td class="text-right">6,90 €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?php echo $tot = $soustot + 6.90 ?> €</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <!--button class="btn btn-block btn-light">Continuer mes achats</button-->
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a style="width: 300px;" class="btn btn-success" href="checkout.php" role="button">Paiement</a>
                </div>
            </div>
        </div>
        <br /><br />
    </div>
</div>
</ul>
</div>
</div>
</nav>

<?php
  //$_SESSION['quantite']=isset($_POST["quantite"])?$_POST["quantite"] : "";

?>

<!-- Footer -->
<footer>
  <p>&copy; Amajaune Copyright</p>  
</footer>

</body>
</html>