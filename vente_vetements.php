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
        <li class="active"><a href="#section2">Vetements</a></li>
        <li><a href="vente_musique.php">Musique</a></li>
        <li><a href="vente_sel.php">Sports et Loisirs</a></li>
		  </ul><br>
		</div>
	</div>
</div>

	<h2>Mettre en vente</h2>

	<form action="init_vente.php" method="post">
		<table>
			<tr>
				<td>Categorie:</td>
				<!--<td><input type="button" value="Livres" onclick="venteLivres()"></td>
				<td><input type="button" value="Vetements" onclick="venteVetements()"></td>
				<td><input type="button" value="Musique" onclick="venteMusique()"></td>
				<td><input type="button" value="Sports et Loisirs" onclick="venteSL()"></td>-->
				<td>
					<select id="cat" name="taille" size="1" onchange="det_cat()">
						<option>Selectionner une categorie</option>
						<option>Livres</option>
						<option>Musique</option>
						<option>Vetements</option>
						<option>Sports et Loisirs</option>
					</select>
				</td>
			</tr>
		</table>
	</form>

	<div class id= "div_section">
    <p id="acceuil"></p>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
	<script>
		function venteVetements(){
			var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            	if (this.readyState == 4 && this.status == 200) {
              		document.getElementById("acceuil").innerHTML = this.responseText;
            	}
            };
            <?php
  				//$categorie = "Vetements";
			?>
            xhttp.open("GET", "parametre_vetements.php", true);                
            xhttp.send();
		}
		function venteAutres(){
			var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            	if (this.readyState == 4 && this.status == 200) {
              		document.getElementById("acceuil").innerHTML = this.responseText;
            	}
            };
            xhttp.open("GET", "parametre_autres.php", true);                
            xhttp.send();
		}
		/*function venteMusique(){
			var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            	if (this.readyState == 4 && this.status == 200) {
              		document.getElementById("acceuil").innerHTML = this.responseText;
            	}
            };
            <?php
  				//$categorie = "Musique";
			?>
            xhttp.open("GET", "parametre_autres.php", true);                
            xhttp.send();
		}
		function venteSL(){
			var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            	if (this.readyState == 4 && this.status == 200) {
              		document.getElementById("acceuil").innerHTML = this.responseText;
            	}
            };
            <?php
  				//$categorie = "Sports et Loisirs";
			?>
            xhttp.open("GET", "parametre_autres.php", true);                
            xhttp.send();
		}
		function venteLivres(){
			var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            	if (this.readyState == 4 && this.status == 200) {
              		document.getElementById("acceuil").innerHTML = this.responseText;
            	}
            };
            <?php
  				//$categorie = "Livres";
			?>
            xhttp.open("GET", "parametre_autres.php", true);                
            xhttp.send();
		}*/
		function det_cat(){
			var cat = document.getElementById("cat").value; 
			if(cat == "Livres")
			{
				<?php $categorie = "Livres";?>
				venteAutres();
			}
			if(cat == "Musique")
			{
				<?php $categorie = "Musique";?>
				venteAutres();
			}
			if(cat == "Vetements")
			{
				<?php $categorie = "Vetements";?>
				venteVetements();
			}
			if(cat == "Sports et Loisirs")
			{
				<?php $categorie = "Sports et Loisirs";?>
				venteAutres();
			}
				
		}
	</script>
</body>
</html>