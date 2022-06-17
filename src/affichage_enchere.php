<?php

/* Import */
require_once __DIR__ . "/lib/dbb.php";


/* Préparation de la requête */
$query = $dbh->prepare("SELECT * FROM annonce_produit;");

/* Exécution de la requête */
$query->execute();

/* Récupération des données retournées par la requête */

$annonce_produit = $query->fetchAll(PDO::FETCH_ASSOC);
function affichage_annonce_enchere() { ?>
   <h1>Annonce d'enchère</h1>

   <table>
       <thead>
           <tr>
               <th>Id</th>
               <th>Modele</th>
               <th>Année demise en circulation</th>
               <th>Prix de reserve</th>
               <th>Date de mise en ligne de l'enchere</th>
               <th>Date de fin de l'enchere</th>
               <th></th>
           </tr>
       </thead>
       <tbody>
           <?php foreach ($annonce_produit as $index => $vehicule) { ?>
               <tr>
                   <td><?= $vehicule["id"] ?></td>
                   <td><?= $vehicule["modele"] ?></td>
                   <td><?= $vehicule["annee"] ?></td>
                   <td><?= $vehicule["prix_depart_enchere"] ?></td>
                   <td><?= $vehicule["date_mise_en_ligne"] ?></td>
                   <td><?= $vehicule["date_fin_enchere"] ?></td>
               </tr>

           <?php } ?>
       </tbody>
   </table>
<?php } ?>
?>


