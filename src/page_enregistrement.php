<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Auto-enchère</title>
    </head>
    <body>
       
        <form action="validation_profil_utilisateur.php" method="POST">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom"><br/>

            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" id="prenom"><br/>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email"><br/>

            <label for="mot_de_passe">Mot de passe:</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe"><br/>

            <input type="submit" value="S'inscrire">
        </form>
        <br/>
        <div>
            <a href="page_connexion.php">Retourner à la page de connexion</a>
        </div>
    </body>
</html>