<?php
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
				<td>Nom:</td>
				<td><input type="text" name="name"></td>
			</tr>

			<tr>
				<td>Image:</td>
				<td><input type="text" name="image"></td>
			</tr>

			<tr>
				<td>Description:</td>
				<td>
					<TEXTAREA name="description" rows=4 cols=40>Ecrivez une brève description ici...</TEXTAREA>
				</td>
			</tr>

			<tr>
				<td>Categorie:</td>
				<td><select id="categorie" size="1" onchange="redirige();">
					<option>Veuillez choisir une option</option>
					<option>Livres</option>
					<option>Musique</option>
					<option>Vetements</option>
					<option>Sport et Loisir </option>
					</select>
				</td>
	 		</tr>



	 		<tr>
				<td>Prix:</td>
				<td><input type="text" name="prix"></td>
			</tr>

			<tr>
				<td colspan="2">
				<input type="submit" name="button1" value="Vendre">
				<input type="reset" name="button2" value="Réinitialiser">
				</td>
			</tr>

		</table>
	</form>

	<div class id= "div_section">
    <p id="acceuil"></p>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
	<script>
		function redirige() {
	    var categorie = document.getElementById("categorie");
	    var selectedValue = categorie.options[categorie.selectedIndex].value;
	    if(selectedValue == "Vetements"){
	    	venteVetements();
	    }
	    }
		function venteVetements(){
			var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            	if (this.readyState == 4 && this.status == 200) {
              		document.getElementById("acceuil").innerHTML = this.responseText;
            	}
            };
            xhttp.open("GET", "parametre_vetements.php", true);                
            xhttp.send();
		}
	</script>
</body>
</html>