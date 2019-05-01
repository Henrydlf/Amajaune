<?php
?>

<!DOCTYPE html>
<html>
 <head>
    <title> Amajaune Vetement </title> 
  </head> 
  
  <body>     
    <form action="init_vente.php" method="post">
      <table>
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
       </table>
    </form>
    
      
    <section>
      <p id="accueil_profil"></p>
    </section>
                              
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
  </body>
</html>