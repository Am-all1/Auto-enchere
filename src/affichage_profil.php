<?php
session_start();
require_once __DIR__."/include/header.php";
require_once __DIR__."/include/footer.php";
require_once __DIR__ . "/lib/dbb.php";
require_once __DIR__."/Class/User.class.php";



$email = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));



/* Préparation de la requête */
$query = $dbh->prepare("SELECT * FROM users ORDER BY id DESC");

    $tmpName = $_FILES['file']['tmp_name_users'];
    $name_users = $_FILES['file']['name_users'];
    $tabExtension = explode('.', $name_users);
    $extension = strtolower(end($tabExtension));

    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    if(in_array($extension, $extensions)){
        move_uploaded_file($tmpName_users, './upload/'.$name_users);
    }
    else{
        echo "Mauvaise extension";
    }

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
           <?php $req = $dbh->query('SELECT name_users FROM users');
            $data = $req->fetch();
            echo "<img src='./upload/".$data['name_users']."' width='300px' ><br>"; ?>
                
           

        <ul>
            <?php while($a = $query->fetch()) { ?>
                <li>Nom: <?=  $a["nom"]; ?></li>
                <li>Prénom: <?= $a["prenom"]; ?></li>
                <li>Email: <?= $a["email"]; ?></li>
                <li>Votre mot de passe <?= $a["mot_de_passe"]; ?></li>
                
            <?php } ?>
        </ul>
       

        
              
                
        
       
    </div>
    <?php affichage_footer("Tous droit reservés", "mentions_legales.php"); ?>
</body>
</html>
<div>