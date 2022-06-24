<?php
session_start();
require_once __DIR__."/include/header2.php";
require_once __DIR__."/include/footer.php";
require_once __DIR__ . "/lib/dbb.php";
require_once __DIR__."/Class/Produit.class.php";


/* Préparation de la requête */
$query = $dbh->prepare("SELECT * FROM annonce_produit ORDER BY id DESC");

/* Exécution de la requête */
$query->execute();

/* Récupération des données retournées par la requête */
$annonce_produit = $query->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <title>The place to be | Accueil</title>
    </head>
    <body>
      
                
                
                <h2>Annonce</h2>
        
        <?php $req = $dbh->query('SELECT name FROM annonce_produit');
        $data = $req->fetch();
        echo "<img src='./upload/".$data['name']."' width='300px' ><br>";  ?>
               
            <ul>
                <?php if($a = $query->fetch()) { ?>

                
                    <li>Enchère numéro: <?= $a['id'] ?></li>
                    <li>Modele: <?= $a['modele']?></li>
                    <li>Marque: <?= $a['marque']?></li>
                    <li>Puissance: <?= $a['puissance'] ?></li>
                    <li>Année demise en circulation: <?= $a['annee'] ?></li>
                    <li>Prix de reserve: <?= $a['prix_depart_enchere'] ?></li>
                    <li>Date de mise en ligne de l'enchere: <?= $a['date_mise_en_ligne'] ?></li>
                    <li>Date de fin de l'enchere:<?= $a['date_fin_enchere'] ?></li>
                    <li>Descritpion du véhicule: <?= $a['description'] ?></li>
                    
                <?php }  ?>    
            </ul>
                
       
 
    
</body>
<footer>
    <?php affichage_footer("Tous droit reservés", "mentions_legales.php"); ?>
</footer>

</html>
