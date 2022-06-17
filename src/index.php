<?php
session_start();
require_once __DIR__."/include/header.php";
require_once __DIR__."/include/footer.php";
require_once __DIR__ . "/lib/dbb.php";

/* Préparation de la requête */
$query = $dbh->prepare("SELECT * FROM annonce_produit;");

/* Exécution de la requête */
$query->execute();

/* Récupération des données retournées par la requête */
$annonce_produit = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>The place to be | Accueil</title>
    </head>
    <body>
        <?php affichage_header("THE PLACE TO BE", ["Profil"=>"profil_utilisateur.php","Déposer une annonce"=>"enregistrement_enchere.php", "historique des enchères"=>"histo_enchere.php", "Connexion"=> "page_connexion.php"]); ?>
        
        <main>
            <h1>Accueil</h1>
        </main> 
        <h2>Annonce d'enchère</h2>

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

            </div>

        
            <?php } ?>
        </tbody>
    </table>
    
    <?php affichage_footer("Tous droit reservés", "mentions_legales.php"); ?>
</body>

</html>
