<?php
session_start();
require_once __DIR__."/include/header.php";
require_once __DIR__."/include/footer.php";
require_once __DIR__ . "/lib/dbb.php";
require_once __DIR__."/Class/User.class.php";


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
        <link rel= "stylesheet"  href= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  integrity= "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"  crossorigin = "anonyme" >
        <head> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integral="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
        </head> 
        <title>The place to be | Accueil</title>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js " intégrité="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonyme"></script>   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd /popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"crossorigin="anonyme"></script> 
        <?php affichage_header("THE PLACE TO BE", ["Profil"=>"affichage_profil.php","Déposer une annonce"=>"enregistrement_enchere.php", "historique des enchères"=>"histo_enchere.php","Mentions Légales"=>"mentions_legales.php", "Deconnexion"=> "page_deconnexion.php"]); ?>
        
        <main>
            <h1>Accueil</h1>
        </main> 
        <div>
            <div>
                <h2>profil</h2>
              
                <?php $req = $dbh->query('SELECT name FROM file');
                $data = $req->fetch();
                echo "<img src='./upload/".$data['name']."' width='300px' ><br>";  ?>
               
               <?php foreach($users as $index => $utilisateur) { ?>
                    <p>Nom: <?= $users["nom"]; ?></p>
                    <p>Prénom: <?= $users["prenom"]; ?></p>
                    <p>Email: <?php echo $users["email"]; ?></p>

                <?php } ?>
            </div>
                
            <div>  
                <h2>Annonce d'enchère</h2>
        
            </div>
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
                            <td><a href="affichage_annonce.php"><?= $vehicule["id"] ?></a></td>
                            <td><a href="affichage_annonce.php"><?= $vehicule["modele"] ?></a></td>
                            <td><a href="affichage_annonce.php"><?= $vehicule["annee"] ?></a></td>
                            <td><a href="affichage_annonce.php"><?= $vehicule["prix_depart_enchere"] ?></a></td>
                            <td><a href="affichage_annonce.php"><?= $vehicule["date_mise_en_ligne"] ?></a></td>
                            <td><a href="affichage_annonce.php"><?= $vehicule["date_fin_enchere"] ?></a></td>
                        </tr>       
                    <?php } ?>
                </tbody>
            </table>
        </div>   
        <?php $req = $dbh->query('SELECT name FROM annonce_produit');
        $data = $req->fetch();
        echo "<img src='./upload/".$data['name']."' width='300px' ><br>";  ?>
    
    </body>
    <footer>
        <?php affichage_footer("Tous droit reservés", "mentions_legales.php"); ?>
    </footer>

</html>
