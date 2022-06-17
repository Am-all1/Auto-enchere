<?php
session_start();
require_once __DIR__ . "/include/header.php";
require_once __DIR__ . "/include/footer.php";
require_once __DIR__ . "/lib/dbb.php";
require_once __DIR__."/Class/User.class.php";
/*  si le verbe http est different de POST*/
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405);
    die();
}

/* recuperation des données du formulaire*/
$nom = htmlspecialchars($_POST["nom"]);
$prenom = htmlspecialchars($_POST["prenom"]);
$email = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
$mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);

/* Préparation de la requette*/
$query = $dbh->prepare("INSERT INTO users (nom, prenom, email, mot_de_passe) 
    VALUES (?, ?, ?, ?);");

/*Execution de la requette*/
$result = $query->execute([$nom, $prenom, $email, $mot_de_passe]);
$user = $query->fetch(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The place to be | Profil utilisateur</title>
</head>

<body>
    <?php if ($result == 1) { ?>
        <p>Votre profil a bien été enregistré.</p>
        <meta http-equiv="refresh" content="1;page_connexion.php" />
    <?php } else { ?>
        <p>Une erreur s'est produite lors de votre enregistrement.</p>
    <?php } ?>
</body>

</html>