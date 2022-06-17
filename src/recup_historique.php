<?php
session_start();
require_once __DIR__ . "/include/header.php";
require_once __DIR__ . "/include/footer.php";


/*  si le verbe http est different de POST*/
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405);
    die();
}
//recup encheres
$id_historique_enchere = htmlspecialchars($_POST["historique_enchere"]);
$derniere_enchere = htmlspecialchars($_POST["derniere_enchere"]);
$prix_final = htmlspecialchars($_post["prix_final"]);

$dbh = new PDO("mysql:dbname=auto_enchere;host=mysql", "root", "root");

$query = $dbh->prepare("INSERT INTO historique_enchere ( derniere_enchere, prix_final) 
    VALUES (?, ?);");

$result = $query->execute([$id_historique_enchere, $derniere_enchere, $prix_final]);


?>;

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The place to be | historique des enchères</title>
</head>

<body>
    <?php if ($result == 1) { ?>
        <p>Votre enchère a bien été enregistré.</p>
    <?php } else { ?>
        <p>Une erreur s'est produite lors de l'enregistrement de votre enchère.</p>
    <?php } ?>
</body>

</html>