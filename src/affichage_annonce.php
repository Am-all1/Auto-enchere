<?php
session_start();
require_once __DIR__."/include/header.php";
require_once __DIR__."/include/footer.php";
require_once __DIR__ . "/lib/dbb.php";
require_once __DIR__."/Class/Produit.class.php";


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
        <?php affichage_header("THE PLACE TO BE", ["Accueil"=>"index.php",  "Profil"=>"affichage_profil.php", "historique des enchères"=>"histo_enchere.php"]); ?>
      
                
                
                <h2>Annonce</h2>
        
        <?php $req = $dbh->query('SELECT name FROM annonce_produit');
        $data = $req->fetch();
        echo "<img src='./upload/".$data['name']."' width='300px' ><br>";  ?>
            
                
                    <ul>
                        
                            <li>Enchère numéro: <?= $id ?></li>
                            <li>Modele: <?= $modele?></li>
                            <li>Année demise en circulation:<?= $annee ?></li>
                            <li>Prix de reserve: <?= $prix_depart_enchere ?></li>
                            <li>Date de mise en ligne de l'enchere: <?= $date_mise_en_ligne ?></li>
                            <li>Date de fin de l'enchere:<?= $date_fin_enchere ?></li>
                    
    
                    </ul>
                
       
 
    
</body>
<footer>
    <?php affichage_footer("Tous droit reservés", "mentions_legales.php"); ?>
</footer>

</html>
