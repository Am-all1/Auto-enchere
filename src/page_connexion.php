
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>The place to be</title>
</head>

<body>
    <form action="connection_user.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">

        <label for="mot_de_passe">Mot de passe:</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe">


        <input type="submit" value="Se connecter">

    </form>
    <form action="page_enregistrement.php" method="POST">
        <input type="submit" value="S'inscrire">
    </form>
</body>

</html>