<?php
session_start();

require_once __DIR__."/include/header2.php";
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <head> 
        </head> 
        <title>The place to be | Accueil</title>
    </head>
    <body>
        <br/>
        <main>
            <h1>Accueil</h1>
        </main> 
        <br/>
        <div class="body">
            <div class="profil">
                
                <?php require_once __DIR__."/affichage.lib.php"; ?>
            </div>
                
            <div class="tableau">
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
                <div class="img">
                    <?php $req = $dbh->query('SELECT name FROM annonce_produit');
                    $data = $req->fetch();
                    echo "<img src='./upload/".$data['name']."' width='300px' ><br>";  ?>
                </div>
            </div>
        </div>   

        <div class="ratio ratio-16x9">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/1LgXv05w-qk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </body>
    <br/>
    <footer>
        <?php affichage_footer("Tous droit reservés", "mentions_legales.php"); ?>
    </footer>

</html>

<style>
.profil {
    border: 5px solid grey;
    border-radius: 2%;
    width: 50%;
}

.body {
    display: inline-flex;
    flex-direction: row;
    flex: 2 100px;
    margin: 0% 0%, 0%, 2%;
}

.tableau {
    border: 5px solid grey;
    border-radius: 2%;
    width: 50%;
}

table {
    height: 50%;
}

.img {
    display: flex;
    height: auto;
    justify-content: center;
}

.ratio {
    width: 50%;
    height: 50%;
}
</style>
