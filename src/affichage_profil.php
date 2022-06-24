<?php
session_start();
require_once __DIR__."/include/header2.php";
require_once __DIR__."/include/footer.php";
require_once __DIR__ . "/lib/dbb.php";
require_once __DIR__."/Class/User.class.php";


/* Préparation de la requête */
$query = $dbh->prepare("SELECT * FROM users ORDER BY id DESC");

/*Execution de la requette*/
$query->execute();

/* Récupération des données retournées par la requête */
$users = $query->fetch();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
    <head> 
            <title>The place to be | Profil</title>
</head>
<body>
        <h1>profil</h1>

        <?php $req = $dbh->query('SELECT name FROM users');
            $data = $req->fetch();
            echo "<img src='./upload".$data['name']."' width='300px' ><br>"; ?>
            <form action="photo_profil.php" method="POST" enctype="multipart/form-data">
                <label for="file">Fichier</label>
                <input type="file" name="file">
                <input type="submit" name="submit"><br/>
            </form>
               
        <form class="row g-3">
            <?php if($a = $query->fetch()) { ?>
            <div id="change" class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" value="<?= $a["email"]; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="inputPassword4" value="<?= $a["mot_de_passe"]; ?>">
            </div>
            <div class="col-6">
                <label for="inputAddress" class="form-label">Nom</label>
                <input type="text" class="form-control" id="inputAddress" value="<?=  $a["nom"]; ?>">
            </div>
            <div class="col-6">
                <label for="inputAddress2" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="inputAddress2" value="<?= $a["prenom"]; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Ville</label>
                <input type="text" class="form-control" id="inputCity" value="Nice">
            </div>
            
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Code postal</label>
                <input type="text" class="form-control" id="inputZip" value="06000">
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </div>
        <?php } ?>
        </form>  
   
    <?php affichage_footer("Tous droit reservés", "mentions_legales.php"); ?>
</body>
</html>

<style>
#change {
    display: flex;
    flex-direction: column;
}
</style>