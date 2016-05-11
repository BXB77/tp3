<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset= "UTF-8" />
    <title></title>
  </head>
  <body>
    <table border=1>
      <tr>
        <th>Titre</th>
        <th>Année</th>
        <th>Genre</th>
        <th>Réalisateur</th>
      </tr>
   <?php
     $link=mysqli_connect("dwarves.iut-fbleau.fr","carlu","ludo1811","carlu");
     if(!$link){
       die("<p>connexion impossible</p>");
     }
     $resultat=mysqli_query($link,"select titre,annee,genre,nom,prenom from Film join Artiste where idArtiste=idMes");
     if($resultat)
     {
      while ($film=mysqli_fetch_assoc($resultat)){
      echo "<tr>";
      echo "<td>".$film['titre']."</td>";
      echo "<td>".$film['annee']."</td>";
      echo "<td>".$film['genre']."</td>";
      echo "<td>".$film['nom']." ".$film['prenom']."</td>";
      echo "</tr>";
     }
     }
     else
       die("<p>Erreur dans l'exeuction de la requete.</p>");
     mysqli_close($link);
   ?>
    </table>
  </body>
</html>