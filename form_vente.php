<?php
 	$categorie = "12";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Vendre sur Amajaune 51</title>
	<meta charset="utf-8">
</head>

<body>
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