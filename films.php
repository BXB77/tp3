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
       echo "<option>"."Tous"."</option>";
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

<!--Tu devrais créer deux fichiers distincts pour chaque exo, plus simple à corriger
//Exo 1 : Clarté 2.5/4 (commits +fréquents appréciables, préciser commentaires des commits + remarques ci-dessus)
//        Fonctionnement 3/4 (intestable sans créer un nouveau fichier)
//        Bonus artistique 0.5/1 (présence de lignes au tableau)
//        7/8

//Exo 2 : Clarté 3/4(préciser encore le commit)
//        Fonctionnement 3.5/4 (fais marcher le "tous" en affichant tous les films)
//        Bonus artistique 0.5/1 (comme exo1)
//        7/8

//Exo 3 pas fait 0/4

//Total : 14/20 --> 