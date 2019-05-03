<?php
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>   
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="connection.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Inscription</h3>
			</div>
			<div class="card-body">
				<form action="init_utilisateur.php" method="post">>
					<div class="input-group form-group">
						<input type="text" class="form-control" name="surname" placeholder="Prenom">	
					</div>
					<div class="input-group form-group">
						<input type="text" class="form-control" name="name" placeholder="Nom">
					</div>
					<div class="input-group form-group">
						<input type="text" class="form-control" name="id" placeholder="Identifiant">	
					</div>
					<div class="input-group form-group">
						<input type="password" class="form-control" name="password" placeholder="Mot de passe">
					</div>
					<div class="input-group form-group">
						<input type="text" class="form-control" name="email" placeholder="Email">
					</div>
					<div class="input-group form-group">
						<select class="form-control" name="type" size="1">
						<option>Type</option>
						<option>Acheteur</option>
						<option>Vendeur</option>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" value="S'inscrire" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Vous avez deja un compte?<a href="form_connection.php">Se connecter</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>