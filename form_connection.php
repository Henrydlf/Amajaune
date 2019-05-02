<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion Amajaune 51</title>
	<meta charset="utf-8">
	<link href="form_connection.css" rel="stylesheet" type="text/css"/>
</head>

<body>
	<!--<h2>Connexion</h2>-->

    <!--TITRE CONNECTION----------------------------------------------------------------------------------------->

	<div class="icone_connection">
  <div class="container text-center">
    <h1> 
    <div class="color_icone_connection">Connection</div> 
    </h1>    
  </div>
</div>

	<form action="init_connection.php" method="post">
		<table>
			<p>Veuillez entrer vos identifiants</p>
			<tr>
				<div class="identifiant">
				<td>Identifiant:</td>
				<td><input type="text" name="id"></td>
			    </div>
			</tr>

			<tr>
				<td>Mot de passe:</td>
				<td><input type="password" name="password"></td>
			</tr>

			<tr>
				<td colspan="2">
				<input type="submit" name="button1" value="Envoyer">
				<input type="reset" name="button2" value="Réinitialiser">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>