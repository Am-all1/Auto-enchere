<?php


$user_type = null;
if (isset($_GET["type_utilisateur"])) {
    $type_utilisateur = $_GET["type_utilisateur"];
}


?>




<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>The place to be</title>
    </head>
    <body>
        <form action="index.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">

            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password">

            <input type="submit" value="Se connecter">
        </form>
        <form action="page_enregistrement.php" method="POST">
            <input type="submit" value="S'inscrire">
        </form>
    </body>
</html>