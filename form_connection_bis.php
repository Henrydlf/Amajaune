<?php
?>

<!DOCTYPE html>
<html>
<head>
  <title>Connexion Amajaune 51</title>
  <meta charset="utf-8">
  <link href="form_connection_bis.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  

</head>

<body>
<div class="login">
  <div class="heading">
    <h2>Sign in</h2>
    <form action="init_connection.php" method="post"">

      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" class="identifiant form-control" placeholder="Username or email"> <!--là j'ai rajouté le "identifiant"-->
          </div>

        <div class="input-group input-group-lg">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input type="password" class="password form-control" placeholder="Password"> <!--là j'ai rajouté le "password"-->
        </div>

        <button type="submit" class="float">Login</button>
       </form>
 		</div>
 </div>
 </body>