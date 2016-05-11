<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset= "latin1" />
    <title></title>
  </head>
  <body>
    <form method="get" action="films.php">
      <p>
        <select name="nom" >
    <?php
     $link=mysqli_connect("dwarves.iut-fbleau.fr","carlu","ludo1811","carlu");
     if(!$link){
       die("<p>connexion impossible</p>");
     }
     $resultat=mysqli_query($link,"select distinct nom from Film join Artiste where idArtiste=idMes");
     if($resultat)
     {
       echo "<option>"."Personne"."</option>";
       while ($film=mysqli_fetch_assoc($resultat)){
        echo "<option>".$film['nom']."</option>";
       }
    echo "</select>";
    echo "</p>";
    }
   ?>
    <input type="submit" value="Chercher"/></input>

</form>
    <table border=1>
      <tr>
        <th>Titre</th>
        <th>Annee</th>
        <th>Genre</th>
        <th>Realisateur</th>
      </tr>
   <?php
     if(isset($_GET["nom"])){
       $nom=$_GET["nom"];
       $resultat=mysqli_query($link,"select titre,annee,genre,nom,prenom from Film join Artiste where idArtiste=idMes");
       if($resultat)
       {
        while ($film=mysqli_fetch_assoc($resultat)){
          if ($nom==$film['nom']){
            echo "<tr>";
            echo "<td>".$film['titre']."</td>";
            echo "<td>".$film['annee']."</td>";
            echo "<td>".$film['genre']."</td>";
            echo "<td>".$film['nom']." ".$film['prenom']."</td>";
            echo "</tr>";
          }
        }
       }
       else
         die("<p>Erreur dans l'exeuction de la requete.</p>");
       mysqli_close($link);
     }
   ?>
    </table>
  </body>
</html>