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
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 700px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
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

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Informations utilisateur</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section2">Modifier mes informations personelles</a></li>
        <li><a href="#section3">Modifier mes informations de paiement</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">
    	<br><br>

     	<div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:20%" alt="Image"></div>

      <div style="margin-left: 25px">
        <p><?php echo " " .$_SESSION['Identifiant']?></p>
        <p><?php echo " " .$_SESSION['Mail']?></p>
        <p><?php echo " " .$_SESSION['Nom']?></p>
        <p><?php echo " " .$_SESSION['Prenom']?></p>
        <p><?php echo " " .$_SESSION['Mdp']?></p>
      </div>
        
    </div>
</div>
</div>
</body>

<footer>
  <p>&copy; Amajaune Copyright</p>  
</footer>

