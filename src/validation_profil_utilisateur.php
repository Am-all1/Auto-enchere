<?php
session_start();
require_once __DIR__ . "/lib/dbb.php";
require_once __DIR__."/Class/User.class.php";
require_once __DIR__."/lib/serveur_requette.php";
/*  si le verbe http est different de POST*/


/* recuperation des données du formulaire*/
$nom = htmlspecialchars($_POST["nom"]);
$prenom = htmlspecialchars($_POST["prenom"]);
$email = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
$mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
$name = [""];

/* Préparation de la requette*/
$query = $dbh->prepare("INSERT INTO users (nom, prenom, email, mot_de_passe, name) 
    VALUES (?, ?, ?, ?, ?);");

/*Execution de la requette*/
$result = $query->execute([$nom, $prenom, $email, $mot_de_passe, $name]);

$user = $query->fetch(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>The place to be | Profil utilisateur</title>
</head>

<body>
    <div class="spinner">
        <button class="btn btn-primary" type="button" disabled>
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span class="visually-hidden">Loading...</span>
        </button>
        <button class="btn btn-primary" type="button" disabled>
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Loading...
        </button>
    </div>
   
    <?php if ($result == 1) { ?>
        <p class="fs-1">Votre profil a bien été enregistré.</p>
        <meta http-equiv="refresh" content="2;page_connexion.php" />
    <?php } else { ?>
        <p class="fs-2">Une erreur s'est produite lors de votre enregistrement.</p>
        <meta http-equiv="refresh" content="2;page_connexion.php" />
    <?php } ?>


</body>

</html>

<style>
.spinner {
    display: flex;
    justify-content: space-around;
}
.fs-1 {
    display: flex;
    justify-content: center;
    margin-top: 20%;
    color: green;
}

.fs-2 {
    display: flex;
    justify-content: center;
    margin-top: 20%;
    color: red;
}

</style>