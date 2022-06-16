<?php
require_once __DIR__ . "/include/header.php";
require_once __DIR__ . "/include/footer.php";
require_once __DIR__ . "/lib/dbb.php";

/*  si le verbe http est different de POST*/
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405);
    die();
}

/* recuperation des données du formulaire*/

$email = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
$mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);

/* Préparation de la requete*/
$query = $dbh->prepare("SELECT * FROM users WHERE email = ?");

/*Execution de la requete*/
$query->execute([$email]);
$user = $query->fetch(PDO::FETCH_ASSOC);


/* Vérification de l'existence de l'utilisateur et de son mot de passe */
if ($user != false && password_verify($mot_de_passe, $user["password"])) {
    /* Stockage dans la session des infos de l'utilisateur */
    $_SESSION["user_email"] = $user["email"];
    $_SESSION["user_id"] = $user["id"];
    $success = true;
} else {
    $success = false;
}
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
    <meta http-equiv="refresh" content="1;profil_utilisateur.php" />
    <?php if ($result == 1) { ?>
        <p>Connection reussie.</p>
    <?php } else { ?>
        <p>Erreur de connection.</p>
    <?php } ?>
</body>

</html>