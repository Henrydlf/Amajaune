<?php
?>

<!DOCTYPE html>
<html>
 <head>
    <title> Amajaune </title> 
  </head> 
  
  <body>     
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
            <TEXTAREA name="description" rows=4 cols=40>...</TEXTAREA>
          </td>
        </tr>

        <tr>
          <td>Prix:</td>
          <td><input type="text" name="prix"></td>
        </tr>

        <tr>
          <td>Sexe:</td>
          <td><select name="sexe" size="1">
            <option>Veuillez choisir une option</option>
            <option>Homme</option>
            <option>Femme</option>
            <option>Enfant</option>
            </select>
          </td>
        </tr>

        <tr>
          <td>Taille:</td>
          <td><select name="taille" size="1">
            <option>Veuillez choisir une option</option>
            <option>S</option>
            <option>M</option>
            <option>L</option>
            </select>
          </td>
        </tr>

        <tr>
          <td>Couleur:</td>
          <td><input type="text" name="couleur"></td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="submit" name="button1" value="Vendre">
            <input type="reset" name="button2" value="Réinitialiser">
          </td>
        </tr>
      </table>
    </form>
    
    <section>
      <p id="accueil_profil"></p>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
  </body>
</html>