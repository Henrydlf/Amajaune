<?php
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inscription Amajaune 51</title>
	<meta charset="utf-8">
</head>

<body>
	<h2>Inscription</h2>

	<form action="init_utilisateur.php" method="post">
		<table>
			<tr>
				<td>Prenom:</td>
				<td><input type="text" name="surname"></td>
			</tr>
			
			<tr>
				<td>Nom:</td>
				<td><input type="text" name="name"></td>
			</tr>

			<tr>
				<td>Email:</td>
				<td><input type="text" name="email"></td>
			</tr>

			<tr>
				<td>Identifiant:</td>
				<td><input type="text" name="id"></td>
			</tr>

			<tr>
				<td>Mot de passe:</td>
				<td><input type="password" name="password"></td>
			</tr>

			<tr>
				<td>Type:</td>
				<td><select name="type" size="1">
					<option>Veuillez choisir une option</option>
					<option>Acheteur</option>
					<option>Vendeur</option>
					</select>
				</td>
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