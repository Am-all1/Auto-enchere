<?php

require_once __DIR__."/lib/dbb.php";
require_once __DIR__."/Class/User.class.php";
require_once __DIR__."/lib/serveur_requette.php";

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

/* Préparation de la requette*/
$query = $dbh->prepare("INSERT INTO users (nom, prenom, email, mot_de_passe, name)
VALUES (?, ?, ?, ?, ?);");

/*Execution de la requette*/
$users = $query->execute([$nom, $prenom, $email, $mot_de_passe, $name]);




?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <title>Document</title>
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
    <?php if($users == 1){ ?>
        <p class="fs-1">Votre photo a bien été enregistré.</p>
        <meta http-equiv="refresh" content="2;affichage_profil.php" />
    <?php } else { ?>
        <p class="fs-2">Une erreur s'est produite lors de l'enregistrement de votre photo.</p>
        <meta http-equiv="refresh" content="2;affichage_profil.php" />
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