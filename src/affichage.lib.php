<?php
require_once __DIR__ . "/lib/dbb.php";
require_once __DIR__."/Class/User.class.php";

$nom = htmlspecialchars($_POST["nom"]);
$prenom = htmlspecialchars($_POST["prenom"]);
$email = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
$mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);


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

    <h1>profil</h1>

    <?php $req = $dbh->query('SELECT name FROM users');
        $users = $query->fetch();
        echo "<img src='./upload/".$users['name']."' width='300px' ><br>"; ?>
            
    

    <ul>
        <?php if($a = $query->fetch()) { ?>
            <h4>Nom: <?=  $a["nom"]; ?></h4>
            <h4>Prénom: <?= $a["prenom"]; ?></h4>
            <h4>Email: <?= $a["email"]; ?></h4>
           
            
        <?php } ?>
    </ul>
    