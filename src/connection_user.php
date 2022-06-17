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

$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$mot_de_passe = $_POST["mot_de_passe"];

/* Préparation de la requete*/
$query = $dbh->prepare("SELECT * FROM users WHERE email = ?");

/*Execution de la requete*/
$query->execute([$email]);
$user = $query->fetch(PDO::FETCH_ASSOC);


/* Vérification de l'existence de l'utilisateur et de son mot de passe */
if ($user != false && password_verify($mot_de_passe, $user["mot_de_passe"])) {
    /* Stockage dans la session des infos de l'utilisateur */
    $_SESSION["email_users"] = $user["email"];
    $_SESSION["id_users"] = $user["id"];
    $success = true;
} else {
    $success = false;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>The place to be</title>
</head>

<body>
    <?php if ($success) { ?>
        <p>Connection reussie.</p>
        <meta http-equiv="refresh" content="1;index.php" />
    <?php } else { ?>
        <p>Erreur de connection.</p>
    <?php } ?>
</body>

</html>