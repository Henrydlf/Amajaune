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