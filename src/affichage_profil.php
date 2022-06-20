<?php
session_start();
require_once __DIR__."/include/header.php";
require_once __DIR__."/include/footer.php";
require_once __DIR__ . "/lib/dbb.php";
require_once __DIR__."/Class/User.class.php";



$email = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));




$tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));

    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    if(in_array($extension, $extensions)){
        move_uploaded_file($tmpName, './upload/'.$name);
    }
    else{
        echo "Mauvaise extension";
    }
    /* Préparation de la requête */
$query = $dbh->prepare("SELECT * FROM users ORDER BY id DESC");

/* Exécution de la requête */
$query->execute();

/* Récupération des données retournées par la requête */
$users = $query->fetch();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
</head>
<body>
    <div>
        <?php affichage_header("THE PLACE TO BE", ["Accueil"=>"index.php","Déposer une annonce"=>"enregistrement_enchere.php", "historique des enchères"=>"histo_enchere.php", "Deconnexion"=>"page_connexion.php"]); ?>
    </div>   

    <div>
        <h1>profil</h1>

        <form method="POST" enctype="multipart/form-data">
            <label for="file">Fichier</label>
            <input type="file" name="file">
            <input type="submit" name="submit"><br/>
        </form>
           <?php $req = $dbh->query('SELECT name FROM users');
            $data = $req->fetch();
            echo "<img src='./upload/".$data['name']."' width='300px' ><br>"; ?>
                
           

        <?php while($b = $query->fetch()) { ?>
            <ul>
                <li>Nom: <?=  $b["nom"]; ?></li>
                <li>Prénom: <?= $b["prenom"]; ?></li>
                <li>Email: <?= $b["email"]; ?></li>
                <li>Modifier votre mot de passe <?= $b["mot_de_passe"]; ?></li>
            </ul>

        <?php } ?>
       

        
              
                
        
       
    </div>
    <?php affichage_footer("Tous droit reservés", "mentions_legales.php"); ?>
</body>
</html>
<div>