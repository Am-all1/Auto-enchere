<?php
session_start();

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>The place to be</title>
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
            <?php if ($success) { ?>
                               
                    <p class="fs-1">Connection reussie.</p>  
                
            <meta http-equiv="refresh" content="2;index.php" />
        <?php } else { ?>
           
                <p class="fs-2">Erreur de connection.</p>  
                <meta http-equiv="refresh" content="2;page_connexion.php" />
        <?php } ?>
    
</body>

</html>

<style>
.spinner {
    display: flex;
    justify-content: space-around;
}

.figure {
    display: flex;
    flex-direction: column;
    justify-content: center;

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