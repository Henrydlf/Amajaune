<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion Amajaune 51</title>
	<meta charset="utf-8">
</head>

<body>
	<!--<h2>Connection</h2>-->
	<!--CLASSE DU TITRE DU CITE AMAJAUNE-->
<div class="jumbotron">
  <div class="container text-center">
    <!--TITRE DU CITE----------------------------------------------------------------------------------------->
    <h1> 
    <div class="color">AMAJAUNE</div> 
    </h1>    
    <p>Mission, Vission & Values</p>
  </div>
</div>

	<form action="init_connection.php" method="post">
		<table>
			<tr>
				<td>Identifiant:</td>
				<td><input type="text" name="id"></td>
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