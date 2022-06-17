<?php
/* Démarrage de la session */
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Demo class pdo</title>
</head>

<body>
    <p>Votre adresse email est <?= $_SESSION["email"] ?> et votre id <?= $_SESSION["user_id"] ?> .</p>
</body>

</html>
